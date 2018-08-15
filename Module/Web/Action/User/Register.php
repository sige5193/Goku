<?php
namespace X\Module\Web\Action\User;
use X\Core\X;
use X\Module\Web\Component\WebPageAction;
use X\Model\User;
use X\Model\UserEmailVerfication;
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
        if ( !X::system()->getConfiguration()->get('params')->get('enableRegistion', true) ) {
            throw new \Exception('Registion is not allowed');
        }
        
        $error = null;
        if ( null !== $form ) {
            try {
                $this->registerNewUser($form);
                return $this->gotoURL('index.php?module=web&action=user/login');
            } catch ( \Exception $e ) {
                $error = $e->getMessage();
            };
        }
        $this->addParticle('User/Register', array(
            'error' => $error,
        ));
    }
    
    /**
     * @param unknown $userData
     */
    private function registerNewUser( $userData ) {
        if ( $userData['password'] !== $userData['password_repeat'] ) {
            throw new \Exception('password are not match');
        }
        
        User::validatePasswordStrength($userData['password']);
        
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
        
        $emailVerfication = new UserEmailVerfication();
        $emailVerfication->uesr_id = $user->id;
        $emailVerfication->verficationViewPath = $this->getViewPathByName('User/EmailVerfication', 'Particle');
        if ( false === $emailVerfication->save() ) {
            throw new \Exception('unable to create email verfication');
        }
    }
}