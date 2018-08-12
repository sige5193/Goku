<?php
namespace X\Module\Web\Action\Project;
use X\Module\Web\Component\WebPageAction;
use X\Module\Web\Component\WebPageActionMenuTrait;
use X\Model\Project;
use X\Service\Database\Query\Condition;
class Search extends WebPageAction {
    /***/
    use WebPageActionMenuTrait;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\XAction\Util\Action::runAction()
     */
    public function runAction( $text=null ) {
        $projects = array();
        if ( null !== $text ) {
            $projects = Project::find()
                ->where(Condition::build()->contains('name', $text))
                ->all();
        }
        
        $this->loadListenerMenu(-1);
        $this->addParticle('Project/Search', array(
            'projects' => $projects,
            'text' => $text,
        ), 'right');
    }
}