<?php 
use X\Service\XAction\Component\WebView\Html;

$vars = get_defined_vars();
$message = $vars['message'];
?>
<br><br><br>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <?php if ( null === $message) :  ?>
    <div class="alert alert-dismissible alert-success">
      Your email has been verficated !<br>
      <br>
      <a href="index.php?module=web&action=user/login"
      >&gt;&gt; Login</a>
    </div>
    <?php else : ?>
    <div class="alert alert-dismissible alert-danger">
      <?php echo Html::HTMLEncode($message); ?>
    </div>
    <?php endif; ?>
  </div>
</div>