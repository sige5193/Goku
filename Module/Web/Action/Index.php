<?php
namespace X\Module\Web\Action;
use X\Module\Web\Component\WebPageAction;
class Index extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    protected function runAction() {
        $this->addParticle('PublisherMenu', array(), 'left');
        $this->addParticle('Index', array(), 'right');
    }
}