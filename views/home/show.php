<!--for alert message start-->
<style type="text/css">
.clspop,.alert_boxes_green123,.alert_boxes_yellow123 {
	display:none;	
}
	<?php if($alert == 1) { ?>
		.darkbase_bg {
			display:block !important;
			
		}
		<?php
		$alertcls = "alert_green";
		$titlemsg = "Success Message";
		?>
	<?php } 
	else if($alert == 2) { ?>
		.darkbase_bg {/*
		.alert_boxes_yellow123 {*/
			
			display:block !important;
			
		}
		<?php
		$alertcls = "alert_yellow";
		$titlemsg = "Warning Message";
		?>
	<?php } 
	else if($alert == 3) { ?>
		.darkbase_bg {/*
		.alert_boxes_yellow123 {*/
			
			display:block !important;
			
		}
		<?php
		$alertcls = "alert_pink";
		$titlemsg = "Error Message";
		?>
	<?php } 
	else if($alert == 4) { ?>
		.darkbase_bg {/*
		.alert_boxes_yellow123 {*/
			
			display:block !important;
			
		}
		<?php
		$alertcls = "alert_blue";
		$titlemsg = "Notice Message";
		?>
	<?php }
	else if($alert == 5) { ?>
		.darkbase_bg {/*
		.alert_boxes_yellow123 {*/
			
			display:block !important;
			
		}
		<?php
		$alertcls = "alert_pink2";
		$titlemsg = "Success  Message";
		?>
	<?php }?>
</style>
<!--for alert message end-->

<script type="text/javascript">
<?php 
//$_SESSION['skip'] = 0;
if(!$_SESSION['skip']) {?>
	//centerPopupHome();
	//loadPopupHome();
	<?php }?>
</script>