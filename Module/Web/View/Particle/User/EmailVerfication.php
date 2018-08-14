<?php 
use X\Service\XAction\Component\WebView\Html;

/** @var $user \X\Model\User */
/** @var $verfication \X\Model\UserEmailVerfication */
$vars = get_defined_vars();
$user = $vars['user'];
$verfyUrl = $vars['verfyUrl'];
$verfication = $vars['verfication'];
?>
Dear <?php echo Html::HTMLEncode($user->name); ?>, <br>
<br>
Welcome to Goku system, you are sucessfully registered your account, <br>
before you log into system, we need to verfy your email address to <br>
make sure your email address is available.<br>
<br>
So, please click the link belowe or copy it and paste it into address<br>
bar if unable to click it.<br>
<br>
<a href="<?php echo $verfyUrl; ?>"><?php echo $verfyUrl; ?></a><br>
<br>

<strong>NOTICE : </strong> This verfication code will expired at <?php echo date('Y-m-d H:i:s',$verfication->expired_at); ?>
