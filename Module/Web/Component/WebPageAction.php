<?php
namespace X\Module\Web\Component;
use X\Service\XAction\Handler\WebPageAction as XWebPageAction;
abstract class WebPageAction extends XWebPageAction {
    /** @var string */
    protected $layout = 'Management';
    /** @var boolean */
    protected $loginRequired = true;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::beforeRunAction()
     */
    protected function beforeRunAction() {
        if ( $this->loginRequired && WebUser::isGuest() ) {
            return $this->gotoURL('/index.php?module=web&action=user/login');
        }
        
        $this->title = 'Goku';
        
        $meta = $this->getView()->getMetaManager();
        $meta->setCharset('UTF-8');
        $meta->addMetaByArray('X-UA-Compatible',array('http-qequi'=>'X-UA-Compatible','content' => 'IE=edge'));
        $meta->addMetaData('viewport', 'viewport', 'width=device-width, initial-scale=1');
        
        $links = $this->getView()->getLinkManager();
        $links->addCSS('bootstrap', '/assets/lib/bootstrap/css/bootstrap.min.css');
        
        $scripts = $this->getView()->getScriptManager();
        $scripts->add('jquery', 'https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js');
        $scripts->add('bootstrap', '/assets/lib/bootstrap/js/bootstrap.min.js');
        
        if ( !WebUser::isGuest() ) {
            $this->addParticle('Header', array(
                'user' => WebUser::load()->getUser()
            ), 'top');
        }
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::afterRunAction()
     */
    protected function afterRunAction() {
        $this->display();
    }
}