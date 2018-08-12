<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
use X\Service\Database\ActiveRecord\Attribute;
use X\Service\Database\Query\Condition;
/**
 * @property int $id
 * @property string $name
 * @property string $identifier
 * @property int $project_id
 * @property int $status
 * @property string $description
 * @property int $is_public
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_application_required
 */
class Event extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'name'          => 'STRING NOT_NULL',
            'identifier'    => 'STRING NOT_NULL',
            'project_id'    => 'INT NOT_NULL',
            'status'        => 'INT [0]',
            'description'   => 'STRING',
            'created_at'    => 'STRING',
            'updated_at'    => 'STRING',
        );
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::init()
     */
    protected function init() {
        parent::init();
        $this->getAttr('identifier')->addValidator('identifier');
    }
    
    /**
     * @param Event $model
     * @param Attribute $attribute
     */
    public function validateIdentifier( Event $model, Attribute $attribute ) {
        $condition = Condition::build()
            ->is('identifier', $attribute->getValue())
            ->is('project_id', $model->project_id);
        if ( !$model->getIsNew() ) {
            $condition->isNot('id', $model->id);
        }
        $count = Event::find()->where($condition)->count();
        if ( $count != 0 ) {
            $model->addError($attribute->getName(), 'event identifier must be unique in project');
        }
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::save()
     */
    public function save() {
        if ( $this->getIsNew() ) {
            $this->created_at = date('Y-m-d H:i:s');
        } else {
            $this->updated_at = date('Y-m-d H:i:s');
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
        return 'events';
    }
}