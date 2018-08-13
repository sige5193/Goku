<?php
use X\Service\XAction\Component\WebView\Html;
/** @var $users \X\Model\User[] */
$vars = get_defined_vars();
$users = $vars['users'];
?>
<h2> Users </h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $users as $user ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($user->name); ?> </td>
      <td><?php echo Html::HTMLEncode($user->email); ?> </td>
      <td>
        <?php if ( 0 == $user->status ) : ?>
        <a href="index.php?module=web&action=admin/user/freeze&id=<?php echo $user->id; ?>" 
           class="btn btn-default btn-xs" 
        >Freeze</a>
        <?php elseif ( 1 == $user->status ) : ?>
        <a href="index.php?module=web&action=admin/user/unfreeze&id=<?php echo $user->id; ?>" 
           class="btn btn-default btn-xs" 
        >Unfreeze</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>