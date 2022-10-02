<!--for alert message start-->
<style type="text/css">
	<?php if($_SESSION['alert'] == 1) { ?>
		.alert_boxes_green {
			display:block;
		}
	<?php  } 
	else if($_SESSION['alert'] == 2) { ?>
		.alert_boxes_yellow {
			display:block;
		}
		
	<?php    } 
	else if($_SESSION['alert'] == 3) { ?>
		.alert_boxes_pink {
			display:block;
		}
	<?php    } 
	
	else if($_SESSION['alert'] == 4) { ?>
		.alert_boxes_blue {
			display:block;
		}
	<?php   }
	
	else if($_SESSION['alert'] == 5) { ?>
		.alert_boxes_pink2 {
			display:block;
		}
	<?php }
	 $closeid = "closeid".$_SESSION['alert'];
	?>
	
</style>
<script type="text/javascript">
	setTimeout("closeMsg('<?php echo $closeid;?>')",10000);
	function closeMsg(clss) {
		document.getElementById(clss).style.display = 'none';
	}
	//document.getElementById("green").style.display = "none";
	
</script>
<!--for alert message end-->