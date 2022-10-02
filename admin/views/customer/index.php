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

</script>
<!--for alert message end-->
<div class="dashboard">
<div class="circle_con">
<a href="#"><div class="circle">Subscribers123</div></a>   
</div>
<div class="circle_con">
<a href="#"><div class="circle2">Add City</div></a>   
</div>
<div class="circle_con">
<a href="#"><div class="circle3">Adds</div></a>   
</div>
<div class="circle_con">
<a href="#"><div class="circle4">Testimonials</div></a>   
</div>
<div class="circle_con">
<a href="index.php?control=service&task=show"><div class="circle5">Services</div></a>   
</div>
<div class="circle_con">
<a href="#"><div class="circle6">Total Visits</div></a>   
</div>
<div class="circle_con">
<a href="index.php?control=admin_provider&view=admin_provider"><div class="circle7">Providers</div></a>   
</div>
<div class="circle_con">
<a href="index.php?control=user&task=show"><div class="circle8">Users</div></a>   
</div>
<div class="circle_con">
<a href="#"><div class="circle9">News</div></a>   
</div>
<div class="circle_con">
<a href="#"><div class="circle10">Reports</div></a>   
</div>
</div>  