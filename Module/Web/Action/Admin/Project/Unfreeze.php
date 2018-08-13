<?php
namespace X\Module\Web\Action\Admin\Project;
use X\Module\Web\Component\WebPageAction;
use X\Model\Project;
class Unfreeze extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $project = Project::findOne(['id'=>$id]);
        $project->status = Project::STATUS_OK;
        $project->save();
        
        $this->goBack();
    }
}