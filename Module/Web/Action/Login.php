<?php
namespace X\Module\Web\Action;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebUser;
class Login extends WebPageAction {
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
                WebUser::login($form['email'], $form['password']);
                return $this->gotoURL('/index.php');
            } catch ( \Exception $e ) {
                $error = $e->getMessage();
            };
        }
        
        $this->addParticle('Login', array(
            'error' => $error,
        ));
    }
}