<?php
namespace X\Module\Web\Action\User;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebUser;
class Profile extends WebPageAction {
    /** @var string */
    protected $layout = 'OneColumn';
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $form=null ) {
        $isSuccssed = null;
        if ( null !== $form ) {
            $user = WebUser::load()->getUser();
            $user->setValues($form);
            $isSuccssed = $user->save();
        }
        
        $this->addParticle('User/Profile', array(
            'user' => WebUser::load()->getUser(),
            'isSuccssed' => $isSuccssed,
        ));
    }
}