<?php
namespace X\Module\Web\Action\Event;
use X\Module\Web\Component\WebPageAction;
use X\Model\Event;
class Enable extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction($id) {
        $event = Event::findOne(['id'=>$id]);
        $event->status = 0;
        $event->save();
        
        $this->gotoURL('index.php?module=web&action=project/detail',array('id'=>$event->project_id));
    }
}