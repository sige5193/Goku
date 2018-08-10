<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
class Edit extends WebPageAction {
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $id=null, $form=array() ) {
        $this->addParticle('PublisherMenu', array(
            'activedProject' => (null === $id) ? -1 : $id,
        ), 'left');
        $this->addParticle('Project/Edit',array(), 'right');
    }
}