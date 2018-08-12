<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$error = $vars['error'];
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <br><br><br><br>
      <h2>Welcome To Goku</h2>
      <br><br>
      <?php if ( null !== $error ) : ?>
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>ERROR!</strong><br>
        <?php echo Html::HTMLEncode($error); ?>
      </div>
      <?php endif; ?>
      <form action="index.php?module=web&action=user/register" method="post">
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="form[email]">
       </div>
       <div class="form-group">
         <label>Password</label>
         <input type="password" class="form-control" name="form[password]">
       </div>
       <div class="form-group">
         <label>Repeat Password</label>
         <input type="password" class="form-control" name="form[password_repeat]">
       </div>
       <a href="index.php?module=web&action=user/login" class="btn btn-default"> &lt;&lt; Login</a>
       <button type="submit" class="btn btn-default pull-right">Register</button>
     </form>
    </div>
  </div>
</div>