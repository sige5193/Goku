<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $is_admin
 * @property int $status
 * @property string $registered_at
 * @property string $password
 */
class User extends ActiveRecord {
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'name'          => 'STRING NOT_NULL',
            'email'         => 'STRING NOT_NULL UNIQUE',
            'is_admin'      => 'INT [0]',
            'status'        => 'INT [0]',
            'registered_at' => 'DATETIME',
            'password'      => 'STRING',
        );
    }
    
    /**
     * @param string $value
     * @return \X\Model\User
     */
    public function setPassword( $password ) {
        $password = md5(md5($password.$password.$password));
        $this->getAttr('password')->setValue($password);
        return $this;
    }
    
    /**
     * check for password
     * @param unknown $password
     * @return boolean
     */
    public function isPasswordMatch( $password ) {
        return md5(md5($password.$password.$password)) === $this->password;
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
        return 'users';
    }
}