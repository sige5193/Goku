<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
$event = $vars['event'];
$queueItem = $vars['queueItem'];
?>
<h2>Trigger : <?php echo Html::HTMLEncode($event->name); ?></h2>
<?php if ( null !== $queueItem && !$queueItem->hasError() ): ?>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Event has been succefully trigged.
</div>
<?php elseif (null!==$queueItem && $queueItem->hasError() ): ?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php foreach ( $queueItem->getErrors() as $errors ) : ?>
    <?php foreach ( $errors as $error ) : ?>
      <span><?php echo Html::HTMLEncode($error); ?></span> <br>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>
<?php endif; ?>
<form action="index.php?module=web&action=event/trigger&id=<?php echo $event->id; ?>" method="post">
  <div class="form-group">
    <label>Parameters</label>
    <textarea class="form-control" rows="10" name="form[parameters]"></textarea>
  </div>
  <a href="index.php?module=web&action=project/detail&id=<?php echo $event->project_id; ?>"
     class="btn btn-xs btn-default"
  >&lt;&lt; Return</a>
  <button type="submit" class="btn btn-default btn-xs">Trigger</button>
</form>