<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$errors = $vars['errors'];
?>
<h2>User Settings</h2>
<br>
<?php if ( isset($errors['updatePassword']) ): ?>
  <?php if (false === $errors['updatePassword']) :?>
  <div class="alert alert-success" role="alert">
    Password successfully updated
  </div>
  <?php else : ?>
  <div class="alert alert-danger" role="alert">
    <?php echo Html::HTMLEncode($errors['updatePassword']); ?>
  </div>
  <?php endif;?>
<?php endif; ?>
<form action="index.php?module=web&action=user/setting&do=updatePassword" method="post">
  <p><strong>Update Password</strong></p>
  <div class="form-group">
    <label>Old Password</label>
    <input type="password" class="form-control" name="oldPassword">
  </div>
  <div class="form-group">
    <label>New Password</label>
    <input type="password" class="form-control" name="newPassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input type="password" class="form-control" name="newPasswordRepeat">
  </div>
  <button type="submit" class="btn btn-default">Save</button>
</form>