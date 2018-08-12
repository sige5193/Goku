<?php
namespace X\Module\Web\Action\Processor;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Processor;
use X\Model\ProcessorHistory;
class History extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $processor = Processor::findOne(['id'=>$id]);
        $historyList = ProcessorHistory::findAll(['processor_id'=>$id]);
        
        $this->loadListenerMenu($processor->project_id);
        $this->addParticle('Processor/History', array(
            'processor' => $processor,
            'historyList'=>$historyList,
        ), 'right');
    }
}