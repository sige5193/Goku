<?php 
use X\Service\XAction\Component\WebView\Html;
/** @var $event \X\Model\Event */
/** @var $historyProcessors \X\Model\ProcessorHistory */
$vars = get_defined_vars();
$event = $vars['event'];
$historyProcessors = $vars['historyProcessors'];
?>
<h2>
  <?php echo Html::HTMLEncode($event->name); ?> History Processors 
</h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Time</th>
      <th>Processor</th>
      <th>Status</th>
      <th>Message</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $historyProcessors as $historyProcessors ) : ?>
    <tr>
      <td><?php echo $historyProcessors->started_at; ?></td>
      <td><?php echo $historyProcessors->getProcessor()->name; ?></td>
      <td>
        <?php if ( 0 == $historyProcessors->status ): ?> Successed
        <?php else : ?> Failed
        <?php endif;?>
      </td>
      <td><?php echo $historyProcessors->message; ?></td>
      <td>
        <button class="btn btn-default btn-xs" onclick="onBtnResendClicked(<?php echo $historyProcessors->id; ?>)">Resend</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php?module=web&action=event/history&id=<?php echo $event->id; ?>" 
   class="btn btn-default btn-xs"
>&lt;&lt;Return</a>
<script>
function onBtnResendClicked( historyId ) {
  $.post('index.php?module=web&action=event/resend', {id:historyId}, function(response) {
    if ( response.success ) {
      alert('added to queue');
    } else {
      alert(response.message);
    }
  }, 'json');
}
</script>