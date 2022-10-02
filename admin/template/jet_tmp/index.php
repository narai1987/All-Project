<?php
ob_start();
ini_set("display_errors","Off");
session_start();
if(!$_SESSION['admin']){
header('location:login.php');
}
date_default_timezone_set("Asia/Calcutta");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iDive Center</title>


<!--POPUP JQUERY START HERE-->
  <link href="<?php echo $tmp;?>/jquery/popup/popup.css" rel="stylesheet">
  <script src="<?php echo $tmp;?>/jquery/popup/jquery-latest.js"></script>
  <script src="<?php echo $tmp;?>/jquery/popup/popup.js"></script>

<!--POPUP JQUERY END HERE-->
<!--Assets script javascript start-->
  <script src="assets/javascript/script.js"></script>
<!--Assets script javascript end-->
<link href="<?php echo $tmp;?>/styles/admin_styles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $tmp;?>/styles/admin_menu.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/popup/popup.css" type="text/css" />
<script src="<?php echo $tmp;?>/jquery/popup/jquery-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/jquery/popup/popup.js"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/jquery/grid/jquery-1.7.2.js"></script>
<script>
$(document).ready(function() {
$('.nav-toggle').click(function(){
var collapse_content_selector = $(this).attr('href');
var toggle_switch = $(this);
$(collapse_content_selector).toggle(function(){
if($(this).css('display')=='none'){
toggle_switch.html('+');//change the button label to be 'Show'
}else{
toggle_switch.html('-');//change the button label to be 'Hide'
}
});
});

});	
</script>

<script type="text/javascript" src="assets/javascript/providercity.js"> </script>
<script type="text/javascript" src="assets/javascript/validation.js"> </script>
<script type="text/javascript" src="assets/javascript/javascript.js"> </script>
<script type="text/javascript" src="assets/javascript/script.js"> </script>
<!--<script type="text/javascript">
	function paging(str) {
		document.getElementById("page").value = str;
		document.getElementById("tpages").value = document.getElementById("filter").value;
		document.forms['filterForm'].submit();
	}
	function paging1(str) {
		document.getElementById("page").value = 1;
		document.getElementById("tpages").value = str;
		document.forms['filterForm'].submit();
	}
</script>-->
<!--autocompeted data-->
<link href="auto/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <!-- <link href="auto/css/main.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="auto/js/jquery-1.5.2.min.js"></script>-->
        <script type="text/javascript" src="auto/js/jquery.autocomplete.pack.js"></script>
        <script type="text/javascript" src="auto/js/script.js"></script>
        
<!--autocompeted data-->
</head>

<body id="example">
<!--header start--> 
<?php $img = $_SESSION['image']?"images/admin/".$_SESSION['image']:"images/admin/avtar.png"; ?>
<div id="header_p">
<div id="header">
<div class="logoarrange"><a href="index.php"><img src="<?php echo $tmp;?>/images/logo.png" alt="logo" height="58" /></a> </div>
<div class="right_part_main right">
<div class="h_menu ">
<div class="left msg_alert" >
<div class="left"><a ><img src="<?php echo $tmp;?>/<?php echo $img;?>" alt="icon" class="left_icon" /></a></div>
<div class="right log_detail">    
<a  title="admin"><strong><?php echo $_SESSION['admin_name']; ?></strong><br />Admin</a>
</div>
</div>
<div class="left admin_role" >
<ul class="drpadmin">
	<li>
    	<a href="#" ><img src="images/backend/setting.png" alt="setting"  /></a>
		<ul>
            <li class="rad_top">
              <a href="index.php?control=user&task=updateprofile"> Update Personal Details</a>
            </li>
            <li class="rad_bottom">
              <a href="index.php?control=user&task=changepassword"> Change Password</a>
            </li>
    	</ul>
	</li>
	<li>
		<a href="logout.php" title="Logout"><img src="<?php echo $tmp;?>/images/backend/logout.png" alt="logout"  /></a>
    </li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!--header close--> 
<!--menu starts-->

<div id="menu_p">
<div id="menu">
<div class="menu_mid ">
<div class="btn_part">
<ul>
<li<?php if(empty($_REQUEST['control'])){ ?> class="active" <?php } ?> ><a href="index.php"  >Dashboard</a></li>
<!--<li <?php if($_REQUEST['control']=="provider"){ ?>class="active"<?php } ?>><a href="index.php?control=provider&view=provider">Providers </a></li>
<li <?php if($_REQUEST['control']=="user"){ ?>class="active"<?php } ?> ><a href="index.php?control=user&task=show" >Users</a></li> -->           
</ul>
</div>
</div>
</div>
</div>

<!--menu close--> 



<!--menu2 start--> 

<div id="menu_p2"></div>

<!--menu2 close--> 

<!--container starts-->

<div id="container"> 

<!--content starts-->
<div id="content">

<div class="user_panel"> 

<?php


if(!empty($_REQUEST['control'])){ 
include_once('includes/admin_left_menu.php');
 } ?>
<?php include_once('controller.php'); ?>
</div>
</div>
</div>

<!--container close--> 

<!--footer starts-->

<div id="footer_p">
<div id="footer">
<div class="f_menu left_drag">
<p> © Copyright, 2012 Service Provider. All Right Reserved.</p>
</div>
</div>
</div>

<!--footer close-->

<!--POPUP START-->
<div class="popupContent" id="popupContent">
    <a class="popupClose"></a>
    <div id="popdivid">
    
    </div>
</div>
<div class="backgroundPopup"></div>
<!--POPUP END--> 
<?php ob_flush(); ?>
</body>
</html>
