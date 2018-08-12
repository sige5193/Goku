<?php
namespace X\Module\Web\Action\Processor;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Processor;
use X\Model\Project;
use X\Model\Event;
use X\Module\Web\Component\WebUser;
class Edit extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $project, $id=null, $form=null ) {
        $project = Project::findOne(['id'=>$project]);
        $events = Event::findAll(['project_id'=>$project->id]);
        
        $processor = new Processor();
        if ( null !== $id ) {
            $processor = Processor::findOne(['id'=>$id]);
        }
        
        if ( null !== $form ) {
            $processor->project_id = $project->id;
            $processor->user_id = WebUser::load()->id;
            $processor->setValues($form);
            if ( $processor->save() ) {
                $this->gotoURL('index.php?module=web&action=processor/detail',array('id'=>$processor->id));
            }
        }
        
        $this->loadListenerMenu($project->id);
        $this->addParticle('Processor/Edit', array(
            'project' => $project,
            'events' => $events,
            'processor' => $processor,
        ), 'right');
    }
}