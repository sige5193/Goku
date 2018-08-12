<?php 
use X\Service\XAction\Component\WebView\Html;
/** @var $project \X\Model\Project */
/** @var $event \X\Model\Event */
$vars = get_defined_vars();
$project = $vars['project'];
$event = $vars['event'];
?>
<h2>Edit Event</h2>
<form action="index.php?module=web&action=event/edit" method="post">
  <input type="hidden" name="project" value="<?php echo $project->id; ?>">
  <?php if ( !$event->getIsNew() ): ?>
  <input type="hidden" name="id" value="<?php echo $event->id; ?>">
  <?php endif; ?>
  <div class="form-group <?php if($event->hasError('name')):?>has-error<?php endif;?>">
    <label>Name</label>
    <input 
      type="text" 
      class="form-control" 
      name="form[name]"
      value="<?php echo Html::HTMLAttributeEncode($event->name); ?>"
    >
    <?php foreach ( $event->getErrors('name') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <div class="form-group <?php if($event->hasError('identifier')):?>has-error<?php endif;?>">
    <label>Id</label>
    <input 
      type="text" 
      class="form-control" 
      name="form[identifier]"
      value="<?php echo Html::HTMLAttributeEncode($event->identifier); ?>"
    >
    <?php foreach ( $event->getErrors('identifier') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <div class="form-group <?php if($event->hasError('description')):?>has-error<?php endif;?>">
    <label>Description</label>
    <textarea 
      class="form-control"
      name="form[description]"
    ><?php echo Html::HTMLEncode($event->description); ?></textarea>
    <?php foreach ( $event->getErrors('description') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <button type="submit" class="btn btn-default">Save</button>
</form>
