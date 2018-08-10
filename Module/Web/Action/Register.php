<?php
namespace X\Module\Web\Action;
use X\Module\Web\Component\WebPageAction;
use X\Model\User;
class Register extends WebPageAction {
    /** @var boolean */
    protected $loginRequired = false;
    /** @var string */
    protected $layout = 'Blank';
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $form=null ) {
        $error = null;
        if ( null !== $form ) {
            try {
                $this->registerNewUser($form);
                return $this->gotoURL('index.php?module=web&action=login');
            } catch ( \Exception $e ) {
                $error = $e->getMessage();
            };
        }
        $this->addParticle('Register', array(
            'error' => $error,
        ));
    }
    
    /**
     * @param unknown $userData
     */
    private function registerNewUser( $userData ) {
        if ( empty($userData['password']) ) {
            throw new \Exception('password can not be empty');
        }
        if ( $userData['password'] !== $userData['password_repeat'] ) {
            throw new \Exception('password are not match');
        }
        
        $isAdmin = (0 === User::find()->count()) ? 1 : 0;
        
        $user = new User();
        $user->is_admin = $isAdmin;
        $user->name = substr($userData['email'], 0, strpos($userData['email'], '@'));
        $user->email = $userData['email'];
        $user->password = $userData['password'];
        $user->registered_at = date('Y-m-d H:i:s');
        if ( !$user->save() ) {
            $errors = $user->getErrors();
            foreach ( $errors as &$error ) {
                $error = implode(';', $error);
            }
            throw new \Exception(implode(';', $errors));
        }
    }
}