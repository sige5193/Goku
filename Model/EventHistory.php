<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $event_id
 * @property string $trigged_at
 * @property string $started_at
 * @property string $ended_at
 * @property string $summary
 * @property string $parameters
 * @property int $duration
 */
class EventHistory extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'event_id'      => 'INT NOT_NULL',
            'trigged_at'    => 'STRING NOT_NULL',
            'started_at'    => 'STRING NOT_NULL',
            'ended_at'      => 'STRING NOT_NULL',
            'summary'       => 'STRING NOT_NULL',
            'parameters'    => 'STRING NOT_NULL',
            'duration'      => 'INT NOT_NULL',
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
        return 'event_history';
    }
}