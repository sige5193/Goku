<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Project;
use X\Model\ProjectListening;
use X\Module\Web\Component\WebUser;
class Unlisten extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $listen = ProjectListening::findOne([
            'project_id'=>$id,
            'user_id'=>WebUser::load()->id,
        ]);
        $listen->delete();
        $this->gotoURL('index.php?module=web&action=project/listening');
    }
}