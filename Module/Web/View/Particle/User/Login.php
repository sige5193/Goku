<?php 
use X\Core\X;
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
      
      <form method="post" action="index.php?module=web&action=user/login">
        <div class="form-group">
          <label>Email</label>
          <input 
            type="email" 
            class="form-control"
            name="form[email]"
          >
        </div>
        <div class="form-group">
          <label>Password</label>
          <input 
            type="password" 
            class="form-control"
            name="form[password]"
          >
        </div>
        <?php if ( X::system()->getConfiguration()->get('params')->get('enableRegistion', true) ): ?>
        <a href="index.php?module=web&action=user/register" class="btn btn-default">Register &gt;&gt;</a>
        <?php endif; ?>
        <button type="submit" class="btn btn-default pull-right">Login</button>
      </form>
    </div>
  </div>
</div>