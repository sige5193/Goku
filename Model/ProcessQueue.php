<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $project_id
 * @property string $event_id
 * @property string $processor_id default to 0, 
 * means all processors will be executed, 
 * or specified processor will be executed if processor_id is not 0.
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
            'project_id'      => 'INT NOT_NULL',
            'event_id'      => 'INT NOT_NULL',
            'processor_id'  => 'INT NOT_NULL [0]',
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