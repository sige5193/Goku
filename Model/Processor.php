<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $name
 * @property int $project_id
 * @property int $event_id
 * @property int $user_id
 * @property int $status
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $http_url
 * @property string $http_method
 */
class Processor extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'name'          => 'STRING NOT_NULL',
            'project_id'    => 'INT NOT_NULL',
            'event_id'      => 'INT NOT_NULL',
            'user_id'       => 'INT NOT_NULL',
            'status'        => 'INT NOT_NULL [0]',
            'description'   => 'STRING',
            'created_at'    => 'STRING',
            'updated_at'    => 'STRING',
            'http_url'      => 'STRING',
            'http_method'   => 'STRING [POST]',
        );
    }
    
    /**
     * @return User
     */
    public function getUser() {
        return User::findOne(['id'=>$this->user_id]);
    }
    
    /** @return \X\Model\Event */
    public function getEvent() {
        return Event::findOne(['id'=>$this->event_id]);
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
        return 'processors';
    }
}