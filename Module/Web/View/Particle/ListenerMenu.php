<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
/** @var $listenList \X\Model\ProjectListening[] */
$listenList = $vars['listenList'];
$activedProject = $vars['activedProject'];
?>
<br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="index.php?module=web&action=project/index">Publisher</a></li>
  <li role="presentation" class="active"><a href="javascript:;">Listener</a></li>
</ul>
<br>
<div class="list-group">
  <?php foreach ( $listenList as $listenItem ) : ?>
  <?php $project = $listenItem->getProject(); ?>
  <a href="index.php?module=web&action=processor/index&id=<?php echo $project->id;?>" 
     class="list-group-item <?php if($project->id == $activedProject):?>active<?php endif;?>"
  ><?php echo Html::HTMLEncode($project->name); ?></a>
  <?php endforeach; ?>
  <a 
    href="/index.php?module=web&action=project/search" 
    class="list-group-item <?php if(-1===$activedProject):?>active<?php endif;?>"
  >Search Project</a>
</div>