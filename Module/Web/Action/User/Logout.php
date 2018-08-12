<?php
namespace X\Module\Web\Action\User;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebUser;
class Logout extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction() {
        WebUser::load()->logout();
        $this->gotoURL('index.php?module=web&action=user/login');
    }
}