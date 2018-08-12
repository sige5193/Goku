<?php
use X\Service\XAction\Component\WebView\Html;
/** @var $historyList \X\Model\ProcessorHistory[] */
$vars = get_defined_vars();
$processor = $vars['processor'];
$historyList = $vars['historyList'];
?>
<h2>Processor : <?php echo Html::HTMLEncode($processor->name); ?></h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Time</th>
      <th>Status</th>
      <th>Message</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $historyList as $processorHistory ) : ?>
    <tr>
      <td><?php echo $processorHistory->started_at; ?></td>
      <td>
        <?php if ( 0 == $processorHistory->status ): ?> Successed
        <?php else : ?> Failed
        <?php endif;?>
      </td>
      <td><?php echo $processorHistory->message; ?></td>
      <td>
        <button class="btn btn-default btn-xs" onclick="onBtnResendClicked(<?php echo $processorHistory->id; ?>)">Resend</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="index.php?module=web&action=processor/index&id=<?php echo $processor->id; ?>" 
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