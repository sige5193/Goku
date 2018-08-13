<?php 
$vars = get_defined_vars();
$activedItem = $vars['activedItem'];
?>
<br>
<div class="list-group">
  <a 
    href="/index.php?module=web&action=admin/project/index" 
    class="list-group-item <?php if('project'===$activedItem):?>active<?php endif;?>"
  >Projects</a>
  <a 
    href="/index.php?module=web&action=admin/user/index" 
    class="list-group-item <?php if('user'===$activedItem):?>active<?php endif;?>"
  >Users</a>
</div>