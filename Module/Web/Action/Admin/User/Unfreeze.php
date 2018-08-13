<?php
namespace X\Module\Web\Action\Admin\User;
use X\Module\Web\Component\WebPageAction;
use X\Model\User;
class Unfreeze extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id ) {
        $user = User::findOne(['id'=>$id]);
        $user->status = User::STATUS_OK;
        $user->save();
        
        $this->goBack();
    }
}