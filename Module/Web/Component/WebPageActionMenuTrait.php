<?php
namespace X\Module\Web\Component;
use X\Model\Project;
use X\Model\ProjectListening;
trait WebPageActionMenuTrait {
    /**
     * @param unknown $activedProjectId
     */
    protected function loadPublisherMenu( $activedProjectId ) {
        $projects = Project::findAll(['user_id'=>WebUser::load()->id]);
        $this->addParticle('PublisherMenu', array(
            'projects' => $projects,
            'activedProject' => $activedProjectId,
        ), 'left');
    }
    
    /**
     * @param unknown $activedProjectId
     */
    protected function loadListenerMenu( $activedProjectId ) {
        $listenList = ProjectListening::findAll(['user_id'=>WebUser::load()->id]);
        $this->addParticle('ListenerMenu', array(
            'listenList' => $listenList,
            'activedProject' => $activedProjectId,
        ), 'left');
    }
    
    /**
     * @param unknown $activedItem
     */
    protected function loadAdminMenu( $activedItem ) {
        $this->addParticle('Admin/Menu', array(
            'activedItem' => $activedItem,
        ), 'left');
    }
}