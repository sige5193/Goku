<?php 
$vars = get_defined_vars();
$activedProject = $vars['activedProject'];
?>
<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Publisher</a></li>
  <li role="presentation"><a href="#">Listener</a></li>
</ul>
<br>
<div class="list-group">
  <a href="#" class="list-group-item">Suanhetao</a>
  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item">Morbi leo risus</a>
  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item">Vestibulum at eros</a>
  <a 
    href="/index.php?module=web&action=project/edit" 
    class="list-group-item <?php if(-1===$activedProject):?>active<?php endif;?>"
  >New Project</a>
</div>