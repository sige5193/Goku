<?php
namespace X\Module\Web\Action\Event;
use X\Module\Web\Component\WebPageAction;
use X\Model\Event;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\EventHistory;
class History extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction($id) {
        $event = Event::findOne(['id'=>$id]);
        $historyList = EventHistory::findAll(['event_id'=>$event->id]);
        
        $this->loadPublisherMenu($event->project_id);
        $this->addParticle('Event/History',array(
            'event' => $event,
            'historyList' => $historyList,
        ), 'right');
    }
}