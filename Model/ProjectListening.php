<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
use X\Module\Web\Component\WebUser;
/**
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 */
class ProjectListening extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'user_id'       => 'INT NOT_NULL',
            'project_id'    => 'INT NOT_NULL',
        );
    }
    
    /** @return Project */
    public function getProject() {
        return Project::findOne(['id'=>$this->project_id]);
    }
    
    /**
     * @return string
     */
    public static function getDB () {
        return 'goku';
    }
    
    /**
     * @return string
     */
    public static function tableName() {
        return 'project_listening';
    }
    
    /**
     * @param unknown $project
     * @return boolean
     */
    public static function amIListening($project) {
        $projectId = $project;
        if ( $project instanceof Project ) {
            $projectId = $project->id;
        }
        return 1 == self::find()->where([
            'project_id'=>$projectId,
            'user_id' => WebUser::load()->id,
        ])->count(); 
    }
}