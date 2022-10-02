<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
GALLERY
</h2>
</div>

<div class="grid_container" id="mmm" style="min-height: 500px;min-width:600px;padding-left:6px;">

<?php 
$i=0; 
if(count($galls)) {
	foreach($galls as $branch){ 
	$i++;
?>

<img src="<?php echo $branch['images']; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>

<?php } }else{ ?>
<strong>Data not found.</strong>
<?php } ?>

<img src="<?php echo $mains->upper_deck; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>
<h2>Upper Deck</h2>

<img src="<?php echo $mains->main_deck; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>
<h2>Main Deck</h2>

<img src="<?php echo $mains->lower_deck; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>
<h2>Lower Dech</h2>


</div>
</div>



      
</div>