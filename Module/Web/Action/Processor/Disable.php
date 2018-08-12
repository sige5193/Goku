<?php
namespace X\Module\Web\Action\Processor;
use X\Module\Web\Component\WebPageAction;
use X\Model\Processor;
class Disable extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $processor = Processor::findOne(['id'=>$id]);
        $processor->status = 1;
        $processor->save();
        $this->gotoURL('index.php?module=web&action=processor/index', array('id'=>$processor->project_id));
    }
}