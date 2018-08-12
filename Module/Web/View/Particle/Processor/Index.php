<?php
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$project = $vars['project'];
$processors = $vars['processors'];
?>
<h2>
  <?php echo Html::HTMLEncode($project->name); ?>
  &nbsp;&nbsp;
  <small>
    <small>
      <a 
        href="index.php?module=web&action=project/unlisten&id=<?php echo $project->id; ?>" 
        class="btn btn-default btn-xs"
      >unlisten</a>
    </small>
  </small>
</h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $processors as $processor ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($processor->name); ?> </td>
      <td><?php echo Html::HTMLEncode($processor->description); ?> </td>
      <td>
        <a href="index.php?module=web&action=processor/delete&id=<?php echo $processor->id; ?>"
           class="btn btn-default btn-xs"
        >Delete</a>
        <a href="index.php?module=web&action=processor/edit&id=<?php echo $processor->id; ?>&project=<?php echo $project->id; ?>"
           class="btn btn-default btn-xs"
        >Edit</a>
        <a href="index.php?module=web&action=processor/detail&id=<?php echo $processor->id; ?>" 
           class="btn btn-default btn-xs"
        >Detail</a>
        <?php if ( 0 == $processor->status ) : ?>
        <a href="index.php?module=web&action=processor/disable&id=<?php echo $processor->id; ?>"
           class="btn btn-default btn-xs"
        >Disable</a>
        <?php else : ?>
        <a href="index.php?module=web&action=processor/enable&id=<?php echo $processor->id; ?>"
           class="btn btn-default btn-xs"
        >Enable</a>
        <?php endif; ?>
        <a href="index.php?module=web&action=processor/history&id=<?php echo $processor->id; ?>"
           class="btn btn-default btn-xs"
        >History</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php?module=web&action=processor/edit&project=<?php echo $project->id; ?>"
   class="btn btn-default btn-xs"
>Add Processor</a>