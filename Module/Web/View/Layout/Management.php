<?php /** @var \X\Service\XAction\Component\WebView\Html $this*/ ?>
<body style="padding-top:50px;">
  <?php echo $this->particleViewManager->toString('top'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <?php echo $this->getParticleViewManager()->toString('left'); ?>
      </div>
      <div class="col-md-10">
        <?php echo $this->getParticleViewManager()->toString('right'); ?>
      </div>
    </div>
  </div>
</body>