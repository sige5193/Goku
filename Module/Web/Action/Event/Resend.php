<?php
namespace X\Module\Web\Action\Event;
use X\Model\Event;
use X\Model\ProcessQueue;
use X\Model\ProcessorHistory;
use X\Model\EventHistory;
use X\Service\XAction\Handler\AjaxAction;
class Resend extends AjaxAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $processHistory = ProcessorHistory::findOne(['id'=>$id]);
        $eventHistory = EventHistory::findOne(['id'=>$processHistory->event_history_id]);
        
        $queueItem = new ProcessQueue();
        $queueItem->event_id = $eventHistory->event_id;
        $queueItem->processor_id = $processHistory->processor_id;
        $queueItem->parameters = $eventHistory->parameters;
        $queueItem->save();
        
        $this->success(array());
    }
}