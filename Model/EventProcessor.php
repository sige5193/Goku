<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property int $event_id
 * @property int $processor_id
 * @property int $duration
 */
class EventProcessor extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'event_id'      => 'INT NOT_NULL',
            'processor_id'  => 'INT NOT_NULL',
        );
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
        return 'event_processors';
    }
}