<?php
namespace X\Module\Web\Action\Event;
use X\Module\Web\Component\WebPageAction;
use X\Model\Event;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Processor;
class Processors extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction($id) {
        $event = Event::findOne(['id'=>$id]);
        $processors = Processor::findAll(['event_id'=>$event->id]);
        
        $this->loadPublisherMenu($event->project_id);
        $this->addParticle('Event/Processors',array(
            'event' => $event,
            'processors' => $processors
        ), 'right');
    }
}