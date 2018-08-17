<?php 
use X\Service\XAction\Component\WebView\Html;
use X\Module\Web\Component\WebUser;
/** @var $project \X\Model\Project */
/** @var $events \X\Model\Event */
$vars = get_defined_vars();
$project = $vars['project'];
$events = $vars['events'];
?>
<br>
<p>
  <strong><?php echo Html::HTMLEncode($project->name); ?></strong>
  <small>(<?php echo $project->identifier?>)</small>
  <?php if ( WebUser::load()->id == $project->user_id ) : ?>
  &nbsp;&nbsp;
  <a href="index.php?module=web&action=project/edit&id=<?php echo $project->id; ?>"
  ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
  <?php endif; ?>
</p>
<p><?php echo Html::HTMLEncode($project->description); ?></p>

<table class="table table-bordered table-hover">
<caption>Events</caption>
  <thead>
    <tr>
      <th>Name</th>
      <th>Id</th>
      <th>Description</th>
      <th>Status</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $events as $event ) : ?>
    <tr>
      <td><?php echo Html::HTMLEncode($event->name); ?></td>
      <td><?php echo Html::HTMLEncode($event->identifier); ?></td>
      <td><?php echo Html::HTMLEncode($event->description); ?></td>
      <td>
        <?php if ( 0==$event->status ) : ?> Enabled
        <?php else : ?> Disabled
        <?php endif; ?>
      </td>
      <td>
        <div class="btn-group">
          <a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="index.php?module=web&action=event/trigger&id=<?php echo $event->id; ?>" 
              >Trigger</a>
            </li>
            <li class="divider"></li>
            <li>
            <?php if ( 0 == $event->status ) : ?>
            <a href="index.php?module=web&action=event/disable&id=<?php echo $event->id; ?>" 
            >Disable</a>
            <?php else : ?>
            <a href="index.php?module=web&action=event/enable&id=<?php echo $event->id; ?>" 
            >Enabled</a>
            <?php endif; ?>
            </li>
            <li>
              <a href="index.php?module=web&action=event/edit&project=<?php echo $project->id?>&id=<?php echo $event->id;?>" 
              >Edit</a>
            </li>
            <li>
              <a href="index.php?module=web&action=event/delete&id=<?php echo $event->id; ?>" 
              >Delete</a>
            </li>
          </ul>
        </div>
        <a href="index.php?module=web&action=event/history&id=<?php echo $event->id; ?>" 
           class="btn btn-default btn-xs"
        >History</a>
        <a href="index.php?module=web&action=event/processors&id=<?php echo $event->id; ?>" 
           class="btn btn-default btn-xs"
        >Processors</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<p>
  <a href="index.php?module=web&action=event/edit&project=<?php echo $project->id; ?>" 
     class="btn btn-default btn-xs" 
  >Add Event</a>
</p>