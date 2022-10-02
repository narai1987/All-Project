<?php
	$db->Query("select * from m_service where status = '1' ORDER BY service");
	$services = $db->fetchArray();
	$q_country = "select * from m_countries where status = '1' ORDER BY country";
	$db->Query($q_country);
	$countrys = $db->fetchArray();
	
	
	$db->Query("select * from cities where status = '1'");
	$citys = $db->fetchArray();
	$db->Query("select * from states where status = '1'");
	$states = $db->fetchArray();
			$db->Query("select * from provider_view where provider_id = '".$_SESSION['userid']."'");
			$visits = $db->fetchArray();
			$db->Query("SELECT * from services_offered s join m_service m on s.service_id=m.id join provider_address p on s.provider_id=p.provider_id JOIN cities c ON p.city_id = c.id where s.provider_id='".$_SESSION['userid']."' AND m.status = '1'");
			$countservice = $db->fetchArray();
			/*$db->Query("SELECT count(*) numrow FROM favorite f JOIN m_service s ON f.service_id = s.id JOIN providers p ON f.provider_id = p.id JOIN services_offered so ON (f.provider_id = so.provider_id and f.service_id = so.service_id ) WHERE f.user_id = '".$_SESSION['userid']."' AND f.status = '1'");*/
			$db->Query("SELECT count(*) numrow from favorite f JOIN providers p on f.provider_id = p.id JOIN m_service s on f.service_id =s.id  where f.user_id='".$_SESSION['userid']."' AND s.status = '1'");
			$countfav = $db->fetchArray();
			$countfavourite = $countfav[0]['numrow'];
			
			$db->Query("select count(*) numrow from provider_view pv JOIN users u ON pv.user_id = u.id where pv.provider_id='".$_SESSION['userid']."'");
			$visit = $db->fetchArray();
			$vtt = $visits = $visit[0]['numrow'];
			//echo $_SESSION['userid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Trade All Stars</title>
  <link rel="stylesheet" href="template/my_account/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/sp_template/styles/message.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="template/my_account/styles/menu.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="template/my_account/styles/slide.css" type="text/css" media="screen" />
  
  <!-- What you think-->
<script src="assets/javascript/feed.js" type="text/javascript"></script>
<!-- What you think end-->

  <!-- login Slider -->
  <script src="template/my_account/jquery/login/jquery-1.3.2.min.js" type="text/javascript"></script>
  <script src="template/my_account/jquery/login/slide.js" type="text/javascript"></script>
  <!-- login Slider -->


  <!--provider Slider-->
  <script type="text/javascript" src="template/my_account/jquery/pro_slider/jquery.min.js"></script>
  <script type="text/javascript" src="template/my_account/jquery/pro_slider/stepcarousel.js"></script>
  <link href="template/my_account/jquery/pro_slider/tech_gal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:2000},
	panelbehavior: {speed:500, wraparound:true, wrapbehavior:'slide', persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['jquery/pro_slider/back.png', 375, -35], rightnav: ['jquery/pro_slider/next.png', -20, -35]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
})

</script>
  <!--provider Slider-->
  <script type="text/javascript" src="assets/javascript/script.js"> </script>
  <!--popup--->
  <link rel="stylesheet" href="template/my_account/jquery/popup/popup.css" type="text/css" />
  <!--<script src="template/my_account/http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
  <script type="text/javascript" src="template/my_account/jquery/popup/popup.js"></script>
   <script src="assets/javascript/providerForm.js"></script>
   <script src="assets/javascript/userForm.js"></script>
  <!--popup Close--->
  
<!--provider add city for service-->
  <link rel="stylesheet" href="template/my_account/styles/providercity.css" type="text/css"/>
  <script src="assets/javascript/providercity.js" type="text/javascript"></script>
<!--provider add city for service end-->

  <!-- price Slide -->
  <!-- bin/jquery.slider.min.css -->
  <link rel="stylesheet" href="template/my_account/jquery/price_slide/css/jslider.css" type="text/css">
  <link rel="stylesheet" href="template/my_account/jquery/price_slide/css/jslider.blue.css" type="text/css">
  <link rel="stylesheet" href="template/my_account/jquery/price_slide/css/jslider.plastic.css" type="text/css">
  <link rel="stylesheet" href="template/my_account/jquery/price_slide/css/jslider.round.css" type="text/css">
  <link rel="stylesheet" href="template/my_account/jquery/price_slide/css/jslider.round.plastic.css" type="text/css">
  <!-- end -->

  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/jquery-1.7.1.js"></script>

  <!-- bin/jquery.slider.min.js -->
  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/jshashtable-2.1_src.js"></script>
  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/jquery.numberformatter-1.2.3.js"></script>
  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/tmpl.js"></script>
  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/jquery.dependClass-0.1.js"></script>
  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/draggable-0.1.js"></script>
  <script type="text/javascript" src="template/my_account/jquery/price_slide/js/jquery.slider.js"></script>
  <!-- end -->

  <style type="text/css" media="screen">
/* body { background: #EEF0F7; }
	 .layout { padding: 50px; font-family: Georgia, serif; }*/
	 .layout-slider {
	margin-bottom: 15px;
	width: 99%;
	margin-top:14px;
}
	 /*.layout-slider-settings { font-size: 12px; padding-bottom: 10px; }
	 .layout-slider-settings pre { font-family: Courier; }*/
</style>
  <!-- price Slide Close-->

  <!--popup tab--->
  <link rel="stylesheet" href="template/my_account/jquery/loginTab/css/style.css">
  <!-- <script src="template/my_account/jquery/loginTab/js/jquery.min.js"></script>-->
  <script src="template/my_account/jquery/loginTab/js/organictabs.jquery.js"></script>
  <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
    </script>

  <!--popup tab Close--->

 <!--for bag css and js-->
 <link href="assets/styles/bag.css" rel="stylesheet" type="text/css" />
 <script src="assets/javascript/bag.js" type="text/javascript"></script>
 <!--for bag css and js-->
 <!--Fill faourite-->
<script type="text/javascript">
favouiteList('<?php echo $_SESSION['userid'];?>');
</script>
<!--Fill faourite end-->
  <!----------Auto Complete------------->
  <!--<script src="template/my_account/jquery/autoComplete/jquery-1.4.2.js"></script>-->
  <link rel="stylesheet" href="template/my_account/jquery/autoComplete/jquery.autocomplete.css" type="text/css" />
  <script type="text/javascript" src="template/my_account/jquery/autoComplete/jquery.autocomplete.js"></script>
  <script>
  $(document).ready(function(){
    var data = "AndraPradesh ArunachalPradesh Assam Bihar Chhattisgarh Goa Gujarat Haryana HimachalPradesh Jammuan&Kashmir Jharkhand Karnataka Kerala MadyaPradesh Maharashtra Manipur Meghalaya Mizoram Nagaland Orissa Punjab Rajasthan Sikkim Tamil Nadu Tripura Uttaranchal UttarPradesh WestBengal".split(" ");
$("#example").autocomplete(data);
  });
  </script>
  <!----------Auto Complete Close------------->
  
  <script type="text/javascript">
	function paging(str) {
		document.getElementById("page").value = str;
		document.getElementById("tpages").value = document.getElementById("filter").value;
		document.filterForm.submit();
	}
	function paging1(str) {
		document.getElementById("page").value = 1;
		document.getElementById("tpages").value = str;
		document.filterForm.submit();
	}
	
</script>

  </head>

  <body>
<!--header begin-->
<?php include_once("includes/header.php");?>
<!--header close--> 
<!--Menu-->
<div id="menu_p">
<div id="menu">
<div class="menu">
<div class="btn_part">
<ul>
<li style="padding-top:7px;"><a href="index.php" title="Home"><img src="template/sp_template/images/home.png" alt="home" /></a></li>

<?php //print_r($menus);
include_once("menu/menu.php");
?>
</ul>


</div>

<!--<div class="_search right">
<form action="index.php" method="post" name="searchForm1" >
<div class="s_box left">
<input type="text" id="mysearch" placeholder="Search" name="textsearch" class="search_text" value="<?php echo $_REQUEST['textsearch'];?>" /></div>
<div class="left">
<button type="submit" class="right" style="background:none; border:none; cursor:pointer;">
<img src="template/sp_template/images/search.png" alt="search" class="search_but" /></button></div>
<input type="hidden" name="control" value="provider"  />
<input type="hidden" name="task" value="textsearch"  />
<input type="hidden" name="tmpid" value="1"  />

</form>
</div>-->
</div>
</div>
</div>
<!--Menu Close--> 
<!--Container-->
<div id="container" class="merg_top">
    <div class="content">
    <div class="user_panel"> 
    <!--news panel-->
    <div class="left_box_menu left">
       <div class="left_menu">
       <?php if($_SESSION['usertype']==1) {  ?>
       <ul>
       <li id="lit1" ><a href="index.php?control=providersaccount&views=myprofile&task=myprofile&tmpid=5" class="pro_icon">My Profile</a></li>
       <li id="lit2"><a href="index.php?control=providersaccount&views=provideraccount&tmpid=5" class="serv_icon">My Services</a> <span class="right count_in">
       <a href="index.php?control=providersaccount&views=provideraccount&tmpid=5"><?php echo count($countservice);?></a></span></li>
       <li  id="lit11"><a href="index.php?control=providersaccount&views=provideraccount&task=myreview&tmpid=5" class="review_icon">My Review</a></li>
       <li id="lit3"><a href="index.php?control=providersaccount&views=provideraccount&task=changepassword&tmpid=5" class="pass_icon">Change Password</a></li>
       <li id="lit4"><a href="index.php?control=providersaccount&task=visit&tmpid=5" class="visit_icon">My Visits</a> <span class="right count_in"><a href="template/my_account/#"><?php echo $visits;?></a></span></li>
       <li id="lit5"><a href="index.php?control=user&task=logout" class="logout_icon">Logout</a></li>
       </ul> 
       <?php } else if($_SESSION['usertype']==2) {  ?>   
       <ul>
       <li  id="lit6"><a href="index.php?control=usersaccount&views=usersaccount&task=myprofile&tmpid=5" class="pro_icon">My Profile</a></li>
       <li  id="lit7"><a href="index.php?control=usersaccount&views=usersaccount&tmpid=5" class="wish_icon">My Wishlist</a> <span class="right count_in">
       <a href="index.php?control=usersaccount&views=usersaccount&tmpid=5" id="wcount"><?php echo $countfavourite;?></a></span></li>
       <li  id="lit8"><a href="index.php?control=usersaccount&views=usersaccount&task=myreview&tmpid=5" class="review_icon">My Review</a></li>
       <li  id="lit9"><a href="index.php?control=usersaccount&views=usersaccount&task=changepassword&tmpid=5" class="pass_icon">Change Password</a></li>
       <li  id="lit10"><a href="index.php?control=user&task=logout" class="logout_icon">Logout</a></li>
       </ul>
       <?php } ?>   
       </div>
      </div>
    <!--news panel Close--> 
    
    <!--------user Panel right--------->
	<?php
    	include_once('controller.php'); 
    ?>
    <!--------user Panel right---------> 
    
    </div>
    
  </div>
  
  
    <div class="backgroundPopup"></div>
    <!--PopUp Close--> 
    
  </div>
<!--Container Close--> 
<!--footer begin-->
<?php include_once("includes/footer.php");?>
	  <!--footer begin-->
      <script type="text/javascript">
	  
	menuselect('<?php echo $_REQUEST['task'];?>');
    </script>
    
<script type="text/javascript">
	setTimeout("closeMsg('closeid2')",<?php echo CLOSETIME;?>);
	function closeMsg(clss) {
		/*document.getElementById(clss).style.display = "none";*/
		document.getElementById(clss).className = "clspop";
	}
	
</script>
</body>
</html>
