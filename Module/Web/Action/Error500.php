<?php 
namespace X\Module\Web\Action;
use X\Module\Web\Component\WebPageAction;
class Error500 extends WebPageAction {
    /** @var boolean */
    protected $loginRequired = false;
    /** @var string */
    protected $layout = 'OneColumn';
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction() {
        echo "System Error ...";
    }
}