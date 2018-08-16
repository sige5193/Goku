<?php
namespace X\Module\Api\Action;
use X\Module\Api\Component\ApiAction;
use X\Model\ProcessQueue;
use X\Model\Project;
use X\Model\Event;
class Trigger extends ApiAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    protected function runAction( $project, $event, $data ) {
        $project = Project::findOne(['identifier'=>$project,'user_id'=>$this->getUser()->id]);
        if ( null === $project ) {
            return $this->error('project does not exists.');
        }
        
        $event = Event::findOne(['project_id' => $project->id,'identifier' => $event]);
        if ( null === $event ) {
            return $this->error('event does not exists');
        }
        
        $queueItem = new ProcessQueue();
        $queueItem->project_id = $project->id;
        $queueItem->event_id = $event->id;
        $queueItem->parameters = $data;
        $queueItem->save();
        $this->success();
    }
}