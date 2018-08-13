<?php 
namespace X\Module\Web\Action\Admin\Project;
use X\Module\Web\Component\WebPageAction;
use X\Model\Project;
use X\Module\Web\Component\WebPageActionMenuTrait;
class Index extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction() {
        $projects = Project::findAll();
        
        $this->loadAdminMenu('project');
        $this->addParticle('Admin/Project/Index', array(
            'projects' => $projects,
        ),'right');
    }
}