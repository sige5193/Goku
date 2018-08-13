<?php
/** @var $user \X\Model\User */
$vars = get_defined_vars();
$user = $vars['user'];
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">Goku</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <?php if ( 1 == $user->is_admin ): ?>
      <li><a href="index.php?module=web&action=admin/project/index">Admin</a></li>
      <?php endif; ?>
      <li class="dropdown">
        <a href="#" 
           class="dropdown-toggle" 
           data-toggle="dropdown" 
        ><?php echo $user->name; ?> &nbsp;<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?module=web&action=user/profile">Profile</a></li>
          <li><a href="index.php?module=web&action=user/setting">Setting</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="index.php?module=web&action=user/logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>