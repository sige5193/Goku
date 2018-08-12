<?php /** @var \X\Service\XAction\Component\WebView\Html $this*/ ?>
<body style="padding-top:50px;">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Goku</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Admin</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Michel &nbsp;<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li><a href="index.php?module=web&action=user/setting">Setting</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="index.php?module=web&action=user/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <?php echo $this->getParticleViewManager()->toString(); ?>
      </div>
    </div>
  </div>
</body>