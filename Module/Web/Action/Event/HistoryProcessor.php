<?php
namespace X\Module\Web\Action\Event;
use X\Module\Web\Component\WebPageAction;
use X\Model\Event;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\EventHistory;
use X\Model\ProcessorHistory;
class HistoryProcessor extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction($id) {
        $history = EventHistory::findOne(['id'=>$id]);
        $event = Event::findOne(['id'=>$history->event_id]);
        $historyProcessors = ProcessorHistory::findAll(['event_history_id'=>$history->id]);
        
        $this->loadPublisherMenu($event->project_id);
        $this->addParticle('Event/HistoryProcessors',array(
            'event' => $event,
            'historyProcessors' => $historyProcessors,
        ), 'right');
    }
}