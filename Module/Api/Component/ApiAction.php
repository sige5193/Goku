<?php
namespace X\Module\Api\Component;
use X\Service\XAction\Handler\AjaxAction;
use X\Model\User;
/**
 * @param string $account
 * @param string $sign 
 * @param string $data in json
 * @param string $timestamp
 * @param string $rand
 */
abstract class ApiAction extends AjaxAction {
    /** @var User */
    private $user = null;
    
    /** @return \X\Model\User */
    public function getUser() {
        return $this->user;
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::beforeRunAction()
     */
    protected function beforeRunAction() {
        $user = User::findOne(['account_name'=>$this->getParameter('account')]);
        $this->user = $user;
        if ( null === $user ) {
            $this->error('account is not available');
            return false;
        }
        
        try {
            $this->validateSign();
        } catch ( \Exception $e ) {
            $this->error($e->getMessage());
            return false;
        }
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::doRunAction()
     */
    protected function doRunAction($parameters) {
        $data = json_decode($parameters['data'], true);
        return parent::doRunAction($data);
    }
    
    /**
     * validate sign
     */
    private function validateSign() {
        $data = $this->getParameter('data');
        $data = json_decode($data, true);
        if ( null === $data ) {
            throw new \Exception('unable to parse event data');
        }
        ksort($data);
        foreach ( $data as $key => $value ) {
            $data[$key] = $key.'='.$value;
        }
        $data = implode(';', $data);
        
        $signData = array(
            'secret' => $this->getUser()->account_secret,
            'data' => $data,
            'timestamp' => $this->getParameter('timestamp'),
            'rand' => $this->getParameter('rand'),
        );
        $sign = md5(implode('&', $signData));
        if ( $sign !== $this->getParameter('sign') ) {
            throw new \Exception('signature is not match');
        }
    }
}