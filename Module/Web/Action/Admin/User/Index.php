<?php 
namespace X\Module\Web\Action\Admin\User;
use X\Module\Web\Component\WebPageAction;
use X\Model\User;
use X\Module\Web\Component\WebPageActionMenuTrait;
class Index extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction() {
        $users = User::findAll();
        
        $this->loadAdminMenu('user');
        $this->addParticle('Admin/User/Index', array(
            'users' => $users,
        ),'right');
    }
}