<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Model\Project;
use X\Module\Web\Component\WebUser;
use X\Module\Web\Component\WebPageActionMenuTrait;
class Edit extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id=null, $form=array() ) {
        if ( null !== $id ) {
            $project = Project::findOne(['id'=>$id]);
        } else {
            $project = new Project();
        }
        
        if ( !empty($form) ) {
            $project->setValues($form);
            $project->user_id = WebUser::load()->id;
            if ( $project->save() ) {
                return $this->gotoURL('index.php?module=web&action=project/detail', array('id'=>$project->id));
            }
        }
        
        $this->loadPublisherMenu( (null === $id) ? -1 : $id);
        $this->addParticle('Project/Edit',array(
            'project' => $project,
        ), 'right');
    }
}