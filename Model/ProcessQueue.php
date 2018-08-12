<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $event_id
 * @property string $processor_id
 * @property string $parameters
 * @property string $status
 * @property string $started_at
 */
class ProcessQueue extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'event_id'      => 'INT NOT_NULL',
            'processor_id'  => 'INT NOT_NULL',
            'parameters'    => 'STRING NOT_NULL',
            'status'        => 'INT NOT_NULL [0]',
            'started_at'    => 'STRING',
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
        return 'process_queue';
    }
}