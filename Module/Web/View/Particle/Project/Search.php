<?php 
use X\Service\XAction\Component\WebView\Html;
use X\Model\ProjectListening;
/** @var $projects \X\Model\Project[] */
$vars = get_defined_vars();
$text = $vars['text'];
$projects = $vars['projects'];
?>
<h2>Search Projects </h2>
<div class="row">
  <div class="col-md-4">
    <form action="index.php?module=web&action=project/search" method="post">
    <div class="input-group">
      <input 
        type="text" 
        class="form-control" 
        placeholder="Search for..." 
        name="text"
        value="<?php echo Html::HTMLAttributeEncode($text); ?>"
      >
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Search</button>
      </span>
    </div>
    </form>
  </div>
</div>
<br>
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
        <?php if ( !ProjectListening::amIListening($project) ) : ?>
        <a href="index.php?module=web&action=project/listen&id=<?php echo $project->id; ?>" 
           class="btn btn-default btn-xs" 
        >Listen</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>