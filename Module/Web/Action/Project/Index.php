<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Project;
use X\Module\Web\Component\WebUser;
class Index extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( ) {
        $projects = Project::findAll(['user_id'=>WebUser::load()->id]);
        
        $this->loadPublisherMenu(null);
        $this->addParticle('Project/Index', array(
            'projects' => $projects,
        ), 'right');
    }
}