<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Project;
use X\Model\ProjectListening;
use X\Module\Web\Component\WebUser;
class Listen extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $listen = new ProjectListening();
        $listen->project_id = $id;
        $listen->user_id = WebUser::load()->id;
        $listen->save();
        
        $this->gotoURL('index.php?module=web&action=processor/index', array('id'=>$id));
    }
}