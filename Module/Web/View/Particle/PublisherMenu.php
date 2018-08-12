<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
/** @var $projects \X\Model\Project[] */
$projects = $vars['projects'];
$activedProject = $vars['activedProject'];
?>
<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="javascript:;">Publisher</a></li>
  <li role="presentation"><a href="index.php?module=web&action=project/listening">Listener</a></li>
</ul>
<br>
<div class="list-group">
  <?php foreach ( $projects as $project ) : ?>
  <a href="index.php?module=web&action=project/detail&id=<?php echo $project->id;?>" 
     class="list-group-item <?php if($project->id == $activedProject):?>active<?php endif;?>"
  ><?php echo Html::HTMLEncode($project->name); ?></a>
  <?php endforeach; ?>
  <a 
    href="/index.php?module=web&action=project/edit" 
    class="list-group-item <?php if(-1===$activedProject):?>active<?php endif;?>"
  >New Project</a>
</div>