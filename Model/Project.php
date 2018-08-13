<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $name
 * @property string $identifier
 * @property int $user_id
 * @property int $status
 * @property string $description
 * @property int $is_public
 * @property string $created_at
 * @property int $is_application_required
 */
class Project extends ActiveRecord {
    const STATUS_OK = 0;
    const STATUS_FREEZED = 1;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'name'          => 'STRING NOT_NULL',
            'identifier'    => 'STRING NOT_NULL UNIQUE',
            'user_id'       => 'INT NOT_NULL',
            'status'        => 'INT [0]',
            'description'   => 'STRING',
            'is_public'     => 'INT [1]',
            'created_at'    => 'STRING',
            'is_application_required' => 'INT [0]',
        );
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::save()
     */
    public function save() {
        if ( $this->getIsNew() ) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        return parent::save();
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
        return 'projects';
    }
}