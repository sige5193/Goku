<?php
namespace X\Model;
use X\Core\X;
use X\Service\Database\ActiveRecord;
use X\Service\XMail\Service as MailService;
use X\Service\Database\ActiveRecord\Attribute;
use X\Service\XAction\Component\WebView\Html;
/**
 * @property int $id
 * @property int $uesr_id
 * @property int $code
 * @property int $expired_at
 */
class UserEmailVerfication extends ActiveRecord {
    /** @var string */
    public $verficationViewPath = null;
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::getDefination()
     */
    protected function getDefination() {
        return array(
            'id'            => 'INT PRIMARY_KEY AUTO_INCREASE NOT_NULL UNIQUE',
            'uesr_id'       => 'INT NOT_NULL',
            'code'          => 'STRING NOT_NULL',
            'expired_at'    => 'INT NOT_NULL',
        );
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::init()
     */
    protected function init () {
        $this->getAttr('code')->setValueBuilder(array($this, 'generateCode'));
        $this->getAttr('expired_at')->setValueBuilder(array($this, 'generateExpiredAt'));
    }
    
    /**
     * @param UserEmailVerfication $model
     * @param Attribute $attr
     * @return string
     */
    public function generateCode( UserEmailVerfication $model, Attribute $attr ) {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = substr($chars,0,8) . '-';
        $uuid .= substr($chars,8,4) . '-';
        $uuid .= substr($chars,12,4) . '-';
        $uuid .= substr($chars,16,4) . '-';
        $uuid .= substr($chars,20,12);
        return $uuid;
    }
    
    /**
     * @param UserEmailVerfication $model
     * @param Attribute $attr
     * @return int
     */
    public function generateExpiredAt(UserEmailVerfication $model, Attribute $attr) {
        $liftime = X::system()->getConfiguration()->get('params')->get('emailVerficationLifeTime', 3600);
        return time() + $liftime;
    }
    
    /**
     * {@inheritDoc}
     * @see \X\Service\Database\ActiveRecord::save()
     */
    public function save() {
        $user = User::findOne(['id'=>$this->uesr_id]);
        
        self::deleteAll(['uesr_id'=>$this->uesr_id]);
        $isSaved = parent::save();
        if ( $isSaved ) {
            $email = MailService::getService()->create('Goku Account Verfication');
            $email->isHTML(true);
            $email->addAddress($user->email);
            $email->setHandler('emailVerification');
            
            $isHttps = X::system()->getConfiguration()->get('params')->get('enableHttps', false);
            $verfyUrl = array();
            $verfyUrl[] = $isHttps ? 'https://' : 'http://';
            $verfyUrl[] = $_SERVER['HTTP_HOST'].'/';
            $verfyUrl[] = 'index.php?module=web&action=user/verfyEmail';
            $verfyUrl[] = '&code='.$this->code;
            $verfyUrl = implode('', $verfyUrl);
            $email->Body = Html::renderView($this->verficationViewPath, array(
                'user' => $user,
                'verfyUrl' => $verfyUrl,
                'verfication' => $this,
            ));
            if ( !$email->send() ) {
                throw new \Exception('email verfication send failed : '.$email->ErrorInfo);
            }
        }
        return $isSaved;
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
        return 'user_email_verfications';
    }
}