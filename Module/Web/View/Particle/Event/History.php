<?php 
use X\Service\XAction\Component\WebView\Html;
/** @var $event \X\Model\Event */
/** @var $historyList \X\Model\EventHistory[] */
$vars = get_defined_vars();
$event = $vars['event'];
$historyList = $vars['historyList'];
?>
<h2>
  <?php echo Html::HTMLEncode($event->name); ?> History
</h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Time</th>
      <th>Summary</th>
      <th>Duration</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $historyList as $historyRecord ) : ?>
    <tr>
      <td><?php echo $historyRecord->trigged_at; ?></td>
      <td><?php echo Html::HTMLEncode($historyRecord->summary); ?> </td>
      <td><?php echo $historyRecord->duration; ?> ms</td>
      <td>
        <a href="index.php?module=web&action=event/historyProcessor&id=<?php echo $historyRecord->id; ?>" 
           class="btn btn-default btn-xs" 
        >Processors</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php?module=web&action=project/detail&id=<?php echo $event->project_id; ?>" 
   class="btn btn-default btn-xs"
>&lt;&lt;Return</a>