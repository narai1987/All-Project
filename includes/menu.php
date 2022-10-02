<nav id="primary-nav" class="clearfix-mobile">
      <ul class="clearfix-mobile">
      		<li id="menu-item-550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550"><a href="index.php"><?php echo $taxonomy['home'];?></a></li>
         
          <li>
         
          <a href="#"><?php echo $taxonomy['famous_boats'];?></a>
            <ul class="categories sub-menu">
                    <?php foreach($famousBoats AS $famousBoat): ?>
                    <li class="boat-category ">
                      <a href="#"><?php echo $famousBoat->company; ?></a>
                       <div class="models">
                              <div class="pat">
                                  <ul>
                                        
                                        <?php foreach($allCBoats[$famousBoat->id] AS $Allboat): ?>
                                        <li>
                                             <a href="index.php?control=boat&boat_id=<?php echo $Allboat->boat_id; ?>">
                                                <img class="boat_img" width="160" height="79" src="admin/<?php echo $Allboat->main_image ?>" alt="1900" title="1900"/>																			              			  						<h5 class="title"><?php echo substr($Allboat->boat_name,0,25) ?></h5>
                                             </a>
                                        </li>
                                        <?php endforeach; ?>
                                  </ul>
                             </div>
                       </div>
                   </li>
                   <?php endforeach; ?>
            
            </ul>
          </li>
        
      <li id="menu-item-1709" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1709"><a class="active" href="index.php?control=trip"><?php echo $taxonomy['our_trips'];?></a> </li>
      <li id="menu-item-538" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-538"><a href="#"><?php echo $taxonomy['products'];?></a>
          <ul class="sub-menu">
            <li id="menu-item-1643" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1643"><a href="#"><?php echo $taxonomy['events'];?></a></li>
            <li id="menu-item-540" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-540"><a href="#"><?php echo $taxonomy['owners'];?><?php echo $taxonomy['owners'];?></a></li>
            <li id="menu-item-541" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-541"><a href="#"><?php echo $taxonomy['share_your_story'];?></a></li>
            <li id="menu-item-543" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-543"><a href="#"><?php echo $taxonomy['tips'];?> &amp; <?php echo $taxonomy['safety'];?></a></li>
            <li id="menu-item-15180" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15180"><a href="#"><?php echo $taxonomy['sportswear'];?></a></li>
            </ul>
      </li>
      
            <?php //echo "Helllgfhfgh";print_r($menus);
foreach($menus as $menu) {?>
	<li id="menu-item-550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550"><a href="<?php echo $menu['link'];?>"><?php echo $menu['title'];?></a></li>	
<?php
} ?>
       
        </ul>
    </nav>