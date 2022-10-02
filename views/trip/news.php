<?php
	$alert = $alert?$alert:$_SESSION['alert'];
	$message = $message?$message:$_SESSION['message'];
?>
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
<div class="middle_box left">
<!--/---------message box start--------/-->

<!--new-new-new-new-new-new-new-->
<div  class="darkbase_bg" id="closeid2">
    <div class="<?php echo $alertcls;?>" >
        <a class="pop_close">
        	<img src="images/close.png" onclick="closeMsg('closeid2')" />
        </a>
        <div class="pop_text">
            <h4><?php echo $titlemsg;?></h4>
            <p>
            <?php echo $message;?>
            </p>
        </div>
    </div>
</div>
<!--end new-->


<?php 
session_start();
$closeid = "closeid2";
$_SESSION['message'] = "";
$_SESSION['alert'] = "";
?>
<!--/---------message box Close--------/-->

<!--news panel-->
<div class="left_box1 left">
<h3><span class="news_bg">News</span></h3>
<div class="newsbox">
<?php
$i = 1;
foreach($newss as $news) {
	$color = ($i==1?'purple':($i==2?'green':'orange'))
?>
<div class="news">
<div class="n_color_l <?php echo $color;?> left">
<p><?php echo date("d",strtotime($news['date_time']));?><br />
<span><?php echo date("M",strtotime($news['date_time']));?></span>
</p>
</div>
<div class="news_text left">
<p class="n_heading<?php echo ($i==2?2:($i==3?3:''));?>"><?php echo $news['title'];?></p>
<p><?php echo substr($news['news'],0,120);?></p>

</div>

</div>

<?php
$i++;
}
?>

</div>



</div>
<!--news panel Close-->
</div>