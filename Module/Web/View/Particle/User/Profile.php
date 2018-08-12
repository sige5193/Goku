<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$user = $vars['user'];
$isSuccssed = $vars['isSuccssed'];
?>
<h2>User Profile</h2>
<br>
<?php if ( true === $isSuccssed ): ?>
  <div class="alert alert-success" role="alert">
    Profile successfully updated
  </div>
<?php endif; ?>
<form action="index.php?module=web&action=user/profile" method="post">
  <div class="form-group <?php if($user->hasError('name')):?>has-error<?php endif;?>">
    <label>Name</label>
    <input 
      type="text" 
      class="form-control" 
      name="form[name]"
      value="<?php echo Html::HTMLAttributeEncode($user->name); ?>"
    >
    <?php foreach ( $user->getErrors('name') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <div class="form-group <?php if($user->hasError('email')):?>has-error<?php endif;?>">
    <label>Email</label>
    <input 
      type="email" 
      class="form-control" 
      name="form[email]"
      value="<?php echo Html::HTMLAttributeEncode($user->email); ?>"
    >
    <?php foreach ( $user->getErrors('email') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <button type="submit" class="btn btn-default">Save</button>
</form>