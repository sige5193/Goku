<?php 
use X\Service\XAction\Component\WebView\Html;
$vars = get_defined_vars();
/** @var $project \X\Model\Project */
$project = $vars['project'];
?>
<h2>Edit Project</h2>
<form action="/index.php?module=web&action=project/edit" method="post">
  <?php if ( !$project->getIsNew() ): ?>
  <input type="hidden" name="id" value="<?php echo $project->id; ?>">
  <?php endif; ?>
  <div class="form-group">
    <label>Name</label>
    <input 
      type="text" 
      class="form-control" 
      name="form[name]" 
      value="<?php echo Html::HTMLAttributeEncode($project->name); ?>"
    >
    <?php foreach ( $project->getErrors('name') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <div class="form-group <?php if($project->hasError('identifier')):?>has-error<?php endif;?>">
    <label>Id</label>
    <input 
      type="text" 
      class="form-control" 
      name="form[identifier]"
      value="<?php echo Html::HTMLAttributeEncode($project->identifier); ?>"
    >
    <?php foreach ( $project->getErrors('identifier') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="form[description]"
    ><?php echo Html::HTMLEncode($project->description); ?></textarea>
    <?php foreach ( $project->getErrors('description') as $error ) : ?>
      <span class="help-block"><?php echo Html::HTMLEncode($error); ?></span>
    <?php endforeach; ?>
  </div>
  <!--  
  <div class="radio">
    <label>
      <input 
        type="radio" 
        name="form[is_public]" 
        value="1" 
        <?php if ( 1==$project->is_public): ?>checked<?php endif;?>
      >
      Public - <small> project can be serached and viewed. </small>
    </label>
  </div>
  <div class="radio">
    <label>
      <input 
        type="radio" 
        name="form[is_public]" 
        value="0"
        <?php if ( 0==$project->is_public): ?>checked<?php endif;?>
      >
      Private - <small> only porject owner is able to see the project </small>
    </label>
  </div>
  <div class="checkbox">
    <label> 
      <input type="hidden" name="form[is_application_required]" value=0>
      <input 
        type="checkbox" 
        name="form[is_application_required]" 
        value="1" 
        <?php if ( 1==$project->is_application_required): ?>checked<?php endif;?>
      > 
      application required for registing processor 
    </label>
  </div>
  -->
  <button type="submit" class="btn btn-default">Save</button>
</form>