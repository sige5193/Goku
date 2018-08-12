<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Project;
use X\Module\Web\Component\WebUser;
use X\Model\ProjectListening;
class Listening extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( ) {
        $listenList = ProjectListening::findAll(['user_id'=>WebUser::load()->id]);
        
        $this->loadListenerMenu(null);
        $this->addParticle('Project/Listening', array(
            'listenList' => $listenList,
        ), 'right');
    }
}