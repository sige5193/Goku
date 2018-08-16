<?php
namespace X\Model;
use X\Service\Database\ActiveRecord;
use X\Service\Database\ActiveRecord\Attribute;
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $is_admin
 * @property int $status
 * @property string $registered_at
 * @property string $password
 * @property string $account_name
 * @property string $account_secret
 */
class User extends ActiveRecord {
    const STATUS_OK = 0;
    const STATUS_FREEZED = 1;
    const STATUS_EMAIL_NOT_VERFIED = 2;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'name'          => 'STRING NOT_NULL',
            'email'         => 'STRING NOT_NULL UNIQUE NOT_EMPTY',
            'is_admin'      => 'INT [0]',
            'status'        => 'INT [2]',
            'registered_at' => 'DATETIME',
            'password'      => 'STRING',
            'account_name'  => 'STRING',
            'account_secret'=> 'STRING',
        );
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::init()
     */
    protected function init() {
        $this->getAttr('email')->addValidator('email');
        $this->getAttr('account_name')->setValueBuilder(array($this, 'generateAccountName'));
        $this->getAttr('account_secret')->setValueBuilder(array($this, 'generateAccountsecret'));
    }
    
    /**
     * @param User $user
     * @param Attribute $accountName
     * @return string
     */
    public function generateAccountName ( User $user, Attribute $accountName ) {
        return md5(uniqid(mt_rand(), true));
    }
    
    /**
     * @param User $user
     * @param Attribute $accountName
     * @return string
     */
    public function generateAccountsecret ( User $user, Attribute $accountName ) {
        return md5(uniqid(mt_rand(), true));
    }
    
    /**
     * @param User $user
     * @param Attribute $email
     */
    public function validateEmail( User $user, Attribute $email ) {
        if ( !filter_var($email->getValue(), FILTER_VALIDATE_EMAIL) ) {
            $user->addError($email->getName(), 'email address is not available');
        }
    }
    
    /**
     * @param string $password
     * @return array
     */
    public static function validatePasswordStrength( $password ) {
        $length = strlen($password);
        if ( 8 > $length ) {
            throw new \Exception('password must over 8 characters');
        }
        
        $checkMap = array(
            'lowercase' => false,
            'uppercase' => false,
            'number' => false,
        );
        foreach ( str_split($password) as $char ) {
            $charCode = ord($char);
            if ( 64<$charCode && 91>$charCode ) {
                $checkMap['uppercase'] = true;
            } else if ( 96<$charCode && 123>$charCode ) {
                $checkMap['lowercase'] = true;
            } else if ( 47<$charCode && 58>$charCode ) {
                $checkMap['number'] = true;
            }
        }
        
        $errors = array();
        foreach ( $checkMap as $checkName => $checkMapItem ) {
            if ( !$checkMapItem ) {
                $errors[] = $checkName;
            }
        }
        if ( !empty($errors) ) {
            throw new \Exception('password must contains lowercase, uppercase and numberic');
        }
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