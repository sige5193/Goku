<?php
namespace X\Module\Web\Action\Processor;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Processor;
use X\Model\Event;
class Detail extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $processor = Processor::findOne(['id'=>$id]);
        $event = Event::findOne(['id'=>$processor->event_id]);
        
        $this->loadListenerMenu($processor->project_id);
        
        $this->addParticle('Processor/Detail', array(
            'event' => $event,
            'processor' => $processor,
        ), 'right');
    }
}