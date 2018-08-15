<?php 
namespace X\Module\Web\Action\User;
use X\Core\X;
use X\Module\Web\Component\WebPageAction;
use X\Model\UserEmailVerfication;
use X\Model\User;
class VerfyEmail extends WebPageAction {
    /** @var boolean */
    protected $loginRequired = false;
    /** @var string */
    protected $layout = 'Blank';
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $code ) {
        $message = null;
        try {
            $this->verficate($code);
        }catch ( \Exception $e ) {
            $message = $e->getMessage();
        }
        
        $this->addParticle('User/EmailVerficate', array(
            'message' => $message,
        ));
    }
    
    /**
     * @param unknown $code
     * @throws \Exception
     */
    private function verficate( $code ) {
        $verfication = UserEmailVerfication::findOne(['code'=>$code]);
        if ( null === $verfication ) {
            throw new \Exception('invalidated verfication code');
        }
        
        $user = User::findOne(['id'=>$verfication->uesr_id]);
        
        if ( time() > $verfication->expired_at ) {
            $emailVerfication = new UserEmailVerfication();
            $emailVerfication->uesr_id = $user->id;
            $emailVerfication->verficationViewPath = $this->getViewPathByName('User/EmailVerfication', 'Particle');
            if ( false === $emailVerfication->save() ) {
                throw new \Exception('unable to create email verfication');
            }
            
            throw new \Exception('verfication code has been expired, we have send you a new verfication code, please check your email and verficate again.');
        }
        
        $user->status = User::STATUS_OK;
        $user->save();
        $verfication->delete();
    }
}