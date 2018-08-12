<?php
namespace X\Module\Web\Action\Event;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Project;
use X\Model\Event;
class Edit extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $project, $id=null, $form=null ) {
        $project = Project::findOne(['id'=>$project]);
        $event = new Event();
        if ( null !== $id ) {
            $event = Event::findOne(['id'=>$id]);
        }
        
        if ( null !== $form ) {
            $event->project_id = $project->id;
            $event->setValues($form);
            if ( $event->save() ) {
                $this->gotoURL('index.php?module=web&action=project/detail', array('id'=>$project->id));
            }
        }
        
        $this->loadPublisherMenu($project->id);
        $this->addParticle('Event/Edit', array(
            'project' => $project,
            'event' => $event,
        ), 'right');
    }
}