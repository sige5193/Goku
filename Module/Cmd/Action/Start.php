<?php
namespace X\Module\Cmd\Action;
use X\Service\XAction\Handler\CommandAction;
use X\Model\ProcessQueue;
use X\Model\Processor;
use X\Model\Event;
use X\Model\ProcessorHistory;
use X\Model\EventHistory;
use X\Model\Project;
class Start extends CommandAction {
    /** @var ProcessQueue */
    private $queueItem = null;
    /** @var Project */
    private $project = null;
    /** @var Event */
    private $event = null;
    /** @var EventHistory */
    private $eventHistory = null;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction() {
        do {
            /** @var $queueItem ProcessQueue */
            $queueItem = ProcessQueue::find()->orderBy('id', SORT_ASC)->one();
            if ( null === $queueItem ) {
                sleep(300);
                continue;
            }
            
            $this->queueItem = $queueItem;
            $this->project = $project = Project::findOne(['id'=>$this->queueItem->project_id]);
            
            $startTime = microtime(true);
            $event = Event::findOne(['id'=>$queueItem->event_id]);
            $this->event = $event;
            
            $eventHistory = new EventHistory();
            $eventHistory->event_id = $event->id;
            $eventHistory->trigged_at = $queueItem->started_at;
            $eventHistory->started_at = date('Y-m-d H:i:s');
            $eventHistory->parameters = $queueItem->parameters;
            $eventHistory->save();
            $this->eventHistory = $eventHistory;
            
            $successCount = 0;
            $errorCount = 0;
            if ( 0 !== (int)$queueItem->processor_id ) {
                $processor = Processor::findOne(['id'=>$queueItem->processor_id]);
                $this->log(0, 'Project:[%s] Event:[%s] TriggedAt:[%s] Processor:[%s]', $project->name, $event->name, $queueItem->started_at, $processor->name);
                $processorHistory = $this->executeProcessor($processor);
                if ( ProcessorHistory::STATUS_SUCCESS == $processorHistory->status ) {
                    $successCount ++;
                } else {
                    $errorCount ++;
                }
            } else {
                $this->log(0, 'Project:[%s] Event:[%s] TriggedAt:[%s] Processor:ALL', $project->name, $event->name, $queueItem->started_at);
                $processorCount = Processor::find()->where(['event_id'=>$event->id])->count();
                for ( $i=0; $i<$processorCount; $i++ ) {
                    $processor = Processor::find()->where(['event_id'=>$event->id])->offset($i)->one();
                    $processorHistory = $this->executeProcessor($processor);
                    if ( ProcessorHistory::STATUS_SUCCESS == $processorHistory->status ) {
                        $successCount ++;
                    } else {
                        $errorCount ++;
                    }
                }
            }
            
            $eventHistory->ended_at = date('Y-m-d H:i:s');
            $eventHistory->duration = microtime(true) - $startTime;
            $eventHistory->summary = "Success:{$successCount}; Error:{$errorCount}";
            $eventHistory->save();
            
            $queueItem->delete();
        } while ( true );
    }
    
    /**
     * @param Processor $processor
     * @return ProcessorHistory
     */
    private function executeProcessor( Processor $processor ) {
        $startTime = microtime(true);
        $this->log(1, "Processor : %s", $processor->name);
        $this->log(2, "%s %s", $processor->http_method, $processor->http_url);
        
        $headers = array();
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $processor->http_url);
        curl_setopt($ch,CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        switch($processor->http_method) {
        case 'GET': break;
        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->queueItem->parameters);
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->queueItem->parameters);
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        }
        
        $response = curl_exec($ch);
        $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        
        $this->log(2, 'Response : (%s) %s', $httpResponseCode, $response);
        
        $history = new ProcessorHistory();
        $history->processor_id = $processor->id;
        $history->started_at = date('Y-m-d H:i:s', intval($startTime));
        $history->duration = microtime(true) - $startTime;
        $history->event_history_id = $this->eventHistory->id;
        if('200' === $httpResponseCode){
            $history->status = 0;
        } else {
            $history->status = 1;
            $history->message = $response;
        }
        $history->save();
        
        return $history;
    }
    
    /**
     * @param string $message
     * @return void
     */
    private function log($level, $message) {
        if ( 0 == $level ) {
            echo date('Y-m-d H:i:s'), ' ';
        }
        
        $params = func_get_args();
        array_shift($params);
        
        echo str_pad('', $level, '  ');
        call_user_func_array('printf', $params);
        echo "\n";
    }
}