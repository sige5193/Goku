<?php
namespace X\Module\Web\Action\Processor;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Processor;
use X\Model\Project;
class Index extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $project = Project::findOne(['id'=>$id]);
        $processors = Processor::findAll(['project_id'=>$id]);
        
        $this->loadListenerMenu($id);
        $this->addParticle('Processor/Index', array(
            'project' => $project,
            'processors' => $processors,
        ), 'right');
    }
}