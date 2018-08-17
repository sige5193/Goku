<?php
namespace X\Module\Cmd\Action;
use X\Service\XAction\Handler\CommandAction;
use X\Model\ProcessQueue;
use X\Model\Processor;
use X\Model\Event;
use X\Model\ProcessorHistory;
use X\Model\EventHistory;
class Start extends CommandAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction() {
        do {
            $queueItem = ProcessQueue::find()->orderBy('id', SORT_ASC)->one();
            if ( null === $queueItem ) {
                sleep(300);
                continue;
            }
            
            $startTime = microtime(true);
            $event = Event::findOne(['id'=>$queueItem->event_id]);
            $eventHistory = new EventHistory();
            $eventHistory->event_id = $event->id;
            $eventHistory->trigged_at = $queueItem->started_at;
            $eventHistory->started_at = date('Y-m-d H:i:s');
            $eventHistory->parameters = $queueItem->parameters;
            $eventHistory->save();
            
            if ( 0 !== $queueItem->processor_id ) {
                $processor = Processor::findOne(['id'=>$queueItem->processor_id]);
                $this->executeProcessor($event, $processor);
            } else {
                while ( null !== ( $processor=Processor::findOne(['event_id'=>$event->id]) ) ) {
                    $this->executeProcessor($queueItem, $event, $processor, $eventHistory);
                }
            }
            
            $eventHistory->ended_at = date('Y-m-d H:i:s');
            $eventHistory->duration = microtime(true) - $startTime;
            $eventHistory->summary = null;
            $eventHistory->save();
            
        } while ( true );
    }
    
    /**
     * @param Event $event
     * @param Processor $processor
     * @return ProcessorHistory
     */
    private function executeProcessor( 
        ProcessQueue $queueItem, 
        Event $event, 
        Processor $processor,
        EventHistory $eventHistory
    ) {
        $startTime = microtime(true);
        
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
            curl_setopt($ch, CURLOPT_POSTFIELDS, $queueItem->parameters);
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $queueItem->parameters);
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        }
        
        $response = curl_exec($ch);
        $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        
        $history = new ProcessorHistory();
        $history->processor_id = $processor->id;
        $history->started_at = date('Y-m-d H:i:s', intval($startTime));
        $history->duration = microtime(true) - $startTime;
        $history->event_history_id = $eventHistory->id;
        if('200' === $httpResponseCode){
            $history->status = 0;
        } else {
            $history->status = 1;
            $history->message = $response;
        }
        $history->save();
        
        return $history;
    }
}