<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $event_history_id
 * @property string $processor_id
 * @property string $status
 * @property string $message
 * @property string $started_at
 * @property int $duration
 */
class ProcessorHistory extends ActiveRecord {
    /** Status value for success */
    const STATUS_SUCCESS = 0;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'                => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'event_history_id'  => 'INT NOT_NULL',
            'processor_id'      => 'INT NOT_NULL',
            'status'            => 'INT NOT_NULL',
            'message'           => 'STRING []',
            'started_at'        => 'STRING NOT_NULL',
            'duration'          => 'INT NOT_NULL',
        );
    }
    
    /** @return Processor */
    public function getProcessor() {
        return Processor::findOne(['id'=>$this->processor_id]);
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
        return 'processor_history';
    }
}