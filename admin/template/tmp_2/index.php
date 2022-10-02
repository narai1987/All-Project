<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="/idive/admin/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iDive Trips</title>
<link rel="stylesheet" href="<?php echo $tmp;?>/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $tmp;?>/styles/menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $tmp;?>/styles/nav.css" type="text/css" media="screen" />


<!--DATE CALENDER JS START HERE-->
<!--<link rel="stylesheet" href="assets/datePicker/css/datepicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="assets/datePicker/css/layout.css" />
	<script type="text/javascript" src="assets/datePicker/js/jquery.js"></script>
	<script type="text/javascript" src="assets/datePicker/js/datepicker.js"></script>
    <script type="text/javascript" src="assets/datePicker/js/eye.js"></script>
    <script type="text/javascript" src="assets/datePicker/js/utils.js"></script>
    <script type="text/javascript" src="assets/datePicker/js/layout.js?ver=1.0.2"></script>-->
    
    
    

<!--DATE CALENDER JS CLOSE HERE-->



<!--POPUP JQUERY START HERE-->

<link rel="stylesheet" href="jquery/popup/popup.css" type="text/css" />
<script src="jquery/popup/jquery-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery/popup/popup.js"></script>
<!--<script type="text/javascript" src="jquery/grid/jquery-1.7.2.js"></script>-->

<!--POPUP JQUERY END HERE-->
<!--Assets script javascript start-->
 <script src="assets/javascript/paging.js"></script>
  <script src="assets/javascript/script.js"></script>
  <script src="assets/javascript/javascript.js"></script>
  <script src="assets/javascript/idiveLanguage.js"></script>
  
<!--Assets script javascript end-->
<!-- ----------left Menu script--------    --->
<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/collasp/collaps.css" type="text/css" media="all">
<link rel="stylesheet" href="template/jet_tmp/styles/alertbox.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo $tmp;?>/jquery/collasp/jquery.js"></script>





<!--MULTI CHECKBOX DROP DOWN CSS AND JS START HERE FOR ONLY BOAT ADD NEW SECTION ON CABIN OPTIONS-->
<link rel="stylesheet" type="text/css" href="assets/multiDropdown/dropdown/jquery-ui-1.8.13.custom.css">
<script type="text/javascript" src="assets/multiDropdown/dropdown/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="assets/multiDropdown/dropdown/jquery-ui-1.8.13.custom.min.js"></script>
    <script type="text/javascript" src="assets/multiDropdown/dropdown/ui.dropdownchecklist-1.4-min.js"></script>

<script type="text/javascript">
	
		jQuery.noConflict();
        jQuery(document).ready(function($) {
			 $(".mdrop").dropdownchecklist( { icon:'',emptyText: "Select Cabin Options", width: 100 } );
        });
  </script>


<!--MULTI CHECKBOX DROP DOWN CSS AND JS START HERE FOR ONLY BOAT ADD NEW SECTION ON CABIN OPTIONS-->






<script type="text/javascript">
$(document).ready(function(){
	<?php if(!$_REQUEST['control']) {?>
	$(".accordion2 h3").eq(0).addClass("active");
	$(".accordion2 div").eq(0).show();
	<?php }?>

	$(".accordion2 h3").click(function(){
		$(this).next("div").slideToggle("slow")
		.siblings("div:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});

});
</script>
<!--            ----------left Menu script Close--------    --->

<!-- -------------Chart style------------ -->
  <link href="<?php echo $tmp;?>/jquery/chart/css/style.css" rel="stylesheet">
  <script src="<?php echo $tmp;?>/jquery/chart/js/jquery-1.7.2.min.js"></script>
  <script src="<?php echo $tmp;?>/jquery/chart/js/flot/jquery.flot.js"></script>
  <script src="<?php echo $tmp;?>/jquery/chart/js/qtip/jquery.qtip.min.js"></script>
  <script src="<?php echo $tmp;?>/jquery/chart/js/charts.js"></script>
<!-- -------------Chart style Close------------ -->



<!--------Combobox style------>
<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/jquery/msdropdown/dd.css" />
<!--<script type="text/javascript" src="jquery/msdropdown/js/jquery-1.3.2.min.js"></script>-->
<script type="text/javascript" src="<?php echo $tmp;?>/jquery/msdropdown/js/jquery.dd.js"></script>
<!--------Combobox style close------>

<!--------Placeholder---------->
<script type="text/javascript" src="<?php echo $tmp;?>/jquery/placeholder/Placeholders.min.js"></script>
<!--------Placeholder Close---------->

<!--coloaps start here-->
<script src="jquery/collasp_sec/jquery-1.7.2.js"></script>
	<!--<script src="jquery/collasp_sec/jquery.ui.core.js"></script>-->
	<script src="jquery/collasp_sec/jquery.ui.widget.js"></script>
	<script src="jquery/collasp_sec/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="jquery/collasp_sec/demos.css">
	<script>
	$(function() {
		$( "#accordion_data" ).accordion({
			collapsible: true
		});
	});
	</script>
<!--coloaps end here-->
  
 <!--------multi tab style close------> 
  <link rel="stylesheet" href="<?php echo $tmp;?>/jquery/multi_tab/tabs.css">
  <script src="<?php echo $tmp;?>/jquery/multi_tab/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="<?php echo $tmp;?>/jquery/multi_tab/jquery.easytabs.min.js" type="text/javascript"></script>
   <script type="text/javascript">
   
    $(document).ready( function() {
		
	
      $('.tab-container').easytabs();
	 
    });
	
	
  </script> 
  

  <!--------multi tab style close------>

<!--------Combobox style------>
<!--<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/jquery/msdropdown/dd.css" />-->
<!--<script type="text/javascript" src="jquery/msdropdown/js/jquery-1.3.2.min.js"></script>-->
<!--<script type="text/javascript" src="<?php echo $tmp;?>/jquery/msdropdown/js/jquery.dd.js"></script>-->
<!--------Combobox style close------>

  
</head>

<script type="text/javascript">
	function paging(str) {
		try {
		document.getElementById("task").value=document.getElementById("defftask").value;
		}
		catch(e) {
			
		}
		document.getElementById("page").value = str;
		document.getElementById("tpages").value = document.getElementById("filter").value;
		document.filterForm.submit();
	}
	function paging1(str) {
		//
		document.getElementById("task").value = (document.getElementById("task").value)=="delete"?'':(document.getElementById("task").value);
		document.getElementById("page").value = 1;
		document.getElementById("tpages").value = str;
		//alert(document.getElementById("tpages").value);
		document.filterForm.submit();
	}
</script>

<body>

<!--Header-->
<div id="header_p">
<div id="header">
<div class="logo left"><a href="index.php"><img src="<?php echo $sitelogo;?>" alt="iDive Trip" /></a></div>


<div class="welcome_user right">
<div class="left wel_text">Welcome <?php echo $_SESSION['admin_name'];?>!</div>

<ul>
<li><a href="index.php?control=user&task=updateprofile"><img src="<?php echo $tmp;?>/images/setting.png" alt="" /></a>
<ul>
<li><a href="index.php?control=user&task=updateprofile">Edit Account</a></li>
<li class="top_m_radius"><a href="index.php?control=user&task=changepassword">Change Password</a></li>
</ul>


</li>
<li><a href="logout.php" title="Logout"><img src="<?php echo $tmp;?>/images/logout.png" alt="" /></a></li>
</ul>
 </div>
</div>
</div>
<!--Header Close-->
<!--Menu-->

<div id="navigation_cont">
  <div class="navigation"> 
    <!--navigation-->
    <nav id="primary-nav" class="clearfix-mobile">
      <ul class="clearfix-mobile">
        <li id="menu-item-550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550"><a class="active" href="index.php">Home</a></li>
      </ul>
    </nav>
    <!--//navigation--> 
  </div>
</div>
<!--Menu Close-->
<!--Container-->
<div id="container">
<div class="content">
<div class="rightside left">
        <?php include_once('includes/leftmenu.php');?>
        
        
        </div>

<div class="left_content right">
 <div class="inner_content"><!--user_panel-->

<?php
	include_once('controller.php'); ?>
    </div>
</div>
</div>
</div>
<!--Container Close-->

<!--footer starts-->
<div id="footer_p">
<div id="footer">
<div class="f_menu left_drag">
<p>
© iDive Trips 2013, All Rights Reserved.
</p>
</div>

</div>


</div>
<!--POPUP START-->
<div class="popupContent" id="popupContent">

  
    <a class="popupClose"></a>
    <div style="min-height:200px;" id="popdivid">
    
    <img align="middle" src="images/image.gif" style="margin-top: 45px;
margin-left: 480px;" />
    <!--<input type="text" id="inputDate" name="start_date"   />
    <input type="text" id="inputDate2" name="testDate"   />-->
   </div>
     
    
    
</div>
<div class="backgroundPopup"></div>
<!--POPUP END-->
<!--footer close-->

<script language="javascript" type="text/javascript">

/*function showvalue(arg) {
	alert(arg);
	//arg.visible(false);
}*/

/*$(document).ready(function() {

try {
		oHandler = $("#flag").msDropDown().data("dd");
		$("#ver").html($.msDropDown.version);
		} catch(e) {
			alert("Error: "+e.message);
		}
})
	

$(document).ready(function() {

try {
		oHandler = $("#page_style").msDropDown().data("dd_2");
		$("#ver1").html($.msDropDown.version);
		} catch(e) {
			alert("Error: "+e.message);
		}
})*/

</script>

<!--<script type="text/javascript" src="assets/jquery.min.js"></script>--><!--
  <script src="assets/javascript/jquery.easyui.min.js"></script>
  <script src="assets/javascript/ajax.js"></script>-->
</body>
</html>
