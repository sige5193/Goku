<?php
namespace X\Module\Web\Action\Event;
use X\Module\Web\Component\WebPageAction;
use X\Model\Event;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\ProcessQueue;
class Trigger extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction($id, $form=null) {
        $event = Event::findOne(['id'=>$id]);
        
        $queueItem = null;
        if ( null !== $form ) {
            $queueItem = new ProcessQueue();
            $queueItem->project_id = $event->project_id;
            $queueItem->event_id = $event->id;
            $queueItem->parameters = $form['parameters'];
            $queueItem->started_at = date('Y-m-d H:i:s');
            $queueItem->save();
        }
        
        $this->loadPublisherMenu($event->project_id);
        $this->addParticle('Event/Trigger',array(
            'event' => $event,
            'queueItem' => $queueItem,
        ), 'right');
    }
}