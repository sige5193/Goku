<?php 
use X\Service\XAction\Component\WebView\Html;
/** @var $processor \X\Model\Processor */
$vars = get_defined_vars();
$project = $vars['project'];
$events = $vars['events'];
$processor = $vars['processor'];
?>
<h2>Edit Processor</h2>
<form action="index.php?module=web&action=processor/edit" method="post">
  <input type="hidden" name="project" value="<?php echo $project->id; ?>">
  <?php if ( !$processor->getIsNew()): ?>
  <input type="hidden" name="id" value="<?php echo $processor->id; ?>">
  <?php endif; ?>
  
  <div class="form-group">
    <label>Event</label>
    <select class="form-control" name="form[event_id]">
      <?php foreach ( $events as $event ) : ?>
      <option value="<?php echo $event->id; ?>"
        <?php if ( $processor->event_id == $event->id ): ?>selected<?php endif; ?>
      >
        <?php echo Html::HTMLEncode($event->name); ?>
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  
  <div class="form-group">
    <label>Name</label>
    <input 
      type="text" 
      class="form-control" 
      name="form[name]"
      value="<?php echo Html::HTMLAttributeEncode($processor->name); ?>"
    >
  </div>
  
  <div class="form-group">
    <label>URL</label>
    <div class="input-group">
      <div class="input-group-btn">
        <button 
          type="button" 
          class="btn btn-default dropdown-toggle active" 
          data-toggle="dropdown"
        >
          <span  id="lbl-http-method">POST</span>
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="javascript:;" onclick="setHttpMethodToInput('POST');">POST</a></li>
          <li><a href="javascript:;" onclick="setHttpMethodToInput('GET');">GET</a></li>
          <li><a href="javascript:;" onclick="setHttpMethodToInput('PUT');">PUT</a></li>
          <li><a href="javascript:;" onclick="setHttpMethodToInput('DELETE');">DELETE</a></li>
        </ul>
      </div>
      <input id="txt-http-method" type="hidden" name="form[http_method]" value="POST">
      <input 
        type="text" 
        class="form-control" 
        name="form[http_url]"
        value="<?php echo Html::HTMLAttributeEncode($processor->http_url); ?>"
      >
    </div>
  </div>
  
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="form[description]"
    ><?php echo Html::HTMLEncode($processor->description); ?></textarea>
  </div>
<button type="submit" class="btn btn-default">Save</button>
</form>
<script>
function setHttpMethodToInput( method ) {
  $('#txt-http-method').val(method);
  $('#lbl-http-method').html(method);
}

setHttpMethodToInput('<?php echo $processor->http_method; ?>');
</script>