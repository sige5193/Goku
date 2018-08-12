<?php 
use X\Service\XAction\Component\WebView\Html;
/** @var $event \X\Model\Event */
/** @var $processors \X\Model\Processor[] */
$vars = get_defined_vars();
$event = $vars['event'];
$processors = $vars['processors'];
?>
<h2>
  <?php echo Html::HTMLEncode($event->name); ?> Processors
</h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>User</th>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $processors as $processor ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($processor->getUser()->name); ?></td>
      <td><?php echo Html::HTMLEncode($processor->name); ?> </td>
      <td><?php echo Html::HTMLEncode($processor->description); ?> </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php?module=web&action=project/detail&id=<?php echo $event->project_id; ?>" 
   class="btn btn-default btn-xs"
>&lt;&lt;Return</a>