<?php //print_r($menus);
foreach($menus as $menu) {?>
	<li><a href="<?php echo $menu['link'];?>"><?php echo $menu['title'];?></a></li>	
<?php
}