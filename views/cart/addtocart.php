<?php if($output == 'already'){ ?>

<p class="content_area"> You have already added <a class="link_txt" href="#"><?php echo $results[0]->trip_title ?></a> to your <a class="link_txt" href="index.php?control=cart">Shopping Cart !</a> <a href="#" id="popupContactClose"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> 
</p>


<?php }else{ ?>
<p class="content_area"> Success: You have added <a class="link_txt" href="#"><?php echo $results[0]->trip_title ?></a> to your <a class="link_txt" href="index.php?control=cart">Shopping Cart !</a> <a href="#" id="popupContactClose"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> 
</p>
<?php } ?>