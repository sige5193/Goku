<?php
namespace X\Module\Web\Action\User;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebUser;
class Setting extends WebPageAction {
    /** @var string */
    protected $layout = 'OneColumn';
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $do=null ) {
        $errors = array();
        
        if ( null !== $do ) {
            try {
                $handler = 'do'.ucfirst($do);
                $this->$handler();
                $errors[$do] = false;
            } catch ( \Exception $e ) {
                $errors[$do] = $e->getMessage();
            }
        }
        
        $this->addParticle('User/Setting', array('errors'=>$errors));
    }
    
    /** update password */
    private function doUpdatePassword() {
        $oldPassword = $this->getParameter('oldPassword');
        $newPassword = $this->getParameter('newPassword');
        $newPasswordRepeat = $this->getParameter('newPasswordRepeat');
        
        if ( $newPassword !== $newPasswordRepeat ) {
            throw new \Exception('new password not match');
        }
        
        $user = WebUser::load()->getUser();
        if ( !$user->isPasswordMatch($oldPassword) ) {
            throw new \Exception('old password not match');
        }
        $user->password = $newPassword;
        $user->save();
    }
}