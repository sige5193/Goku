<?php
use X\Service\XAction\Component\WebView\Html;
/** @var $projects \X\Model\Project[] */
$vars = get_defined_vars();
$projects = $vars['projects'];
?>
<h2> Projects </h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $projects as $project ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($project->name); ?> </td>
      <td><?php echo Html::HTMLEncode($project->description); ?> </td>
      <td>
        <?php if ( 0 == $project->status ) : ?>
        <a href="index.php?module=web&action=admin/project/freeze&id=<?php echo $project->id; ?>" 
           class="btn btn-default btn-xs" 
        >Freeze</a>
        <?php elseif ( 1 == $project->status ) : ?>
        <a href="index.php?module=web&action=admin/project/unfreeze&id=<?php echo $project->id; ?>" 
           class="btn btn-default btn-xs" 
        >Unfreeze</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>