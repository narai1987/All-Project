<?php
	$db->Query("SELECT * FROM adverties WHERE status =  '1' AND category =  'bottom' and rand() ");
	$bottom_adver = $db->fetchArray();
?>
<?php  //$db->setCTitle('KKKKK');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $db->getTitle();?></title>
<link rel="stylesheet" href="<?php echo $tmp;?>/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/sp_template/styles/message.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $tmp;?>/styles/menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $tmp;?>/styles/slide.css" type="text/css" media="screen" />
<!-- What you think-->
<script src="assets/javascript/feed.js" type="text/javascript"></script>
<!-- What you think end-->

<!--javascript for subscription start-->
	<script src="assets/javascript/script.js" type="text/javascript"></script>
    <script src="assets/javascript/validation.js"></script>

<!--javascript for subscription end-->
 <!-- login Slider -->
	<script src="<?php echo $tmp;?>/jquery/login/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="<?php echo $tmp;?>/jquery/login/slide.js" type="text/javascript"></script>
 <!-- login Slider -->
 
 <!--provider Slider-->
 <script type="text/javascript" src="<?php echo $tmp;?>/jquery/pro_slider/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/jquery/pro_slider/stepcarousel.js"></script>
<link href="<?php echo $tmp;?>/jquery/pro_slider/tech_gal.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:2000},
	panelbehavior: {speed:500, wraparound:true, wrapbehavior:'slide', persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['<?php echo $tmp;?>/jquery/pro_slider/back.png', 375, -35], rightnav: ['<?php echo $tmp;?>/jquery/pro_slider/next.png', -20, -35]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
})

</script>
 <!--provider Slider-->
 <!--popup--->
 <link rel="stylesheet" href="<?php echo $tmp;?>/jquery/popup/popup.css" type="text/css" />
	<!--<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/popup/popup.js"></script>
<!--popup Close--->


<!-- price Slide -->
<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/price_slide/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/price_slide/css/jslider.blue.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/price_slide/css/jslider.plastic.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/price_slide/css/jslider.round.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/price_slide/css/jslider.round.plastic.css" type="text/css">
  <!-- end -->

	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/jquery-1.7.1.js"></script>
	
	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/tmpl.js"></script>
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="<?php echo $tmp;?>/jquery/price_slide/js/jquery.slider.js"></script>
  <!-- end -->
	
	<style type="text/css" media="screen">
	 /* body { background: #EEF0F7; }
	 .layout { padding: 50px; font-family: Georgia, serif; }*/
	 .layout-slider { margin-bottom: 15px; width: 99%; margin-top:14px; }
	 /*.layout-slider-settings { font-size: 12px; padding-bottom: 10px; }
	 .layout-slider-settings pre { font-family: Courier; }*/
	</style>
<!-- price Slide Close-->
 <!--for bag css and js-->
 <link href="assets/styles/bag.css" rel="stylesheet" type="text/css" />
 <script src="assets/javascript/bag.js" type="text/javascript"></script>
 <!--for bag css and js-->


<!--popup tab--->
<link rel="stylesheet" href="<?php echo $tmp;?>/jquery/loginTab/css/style.css">
   <!-- <script href="<?php echo $tmp;?>/jquery/loginTab/js/jquery.min.js"></script>-->
    <script src="<?php echo $tmp;?>/jquery/loginTab/js/organictabs.jquery.js"></script>
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
<?php session_start();?>
favouiteList('<?php echo $_SESSION['userid'];?>');
</script>
<!--Fill faourite end-->
<!--autocompeted data-->
<link href="auto/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <link href="auto/css/main.css" rel="stylesheet" type="text/css" />
        <!--<script type="text/javascript" src="auto/js/jquery-1.5.2.min.js"></script>-->
        <script type="text/javascript" src="auto/js/jquery.autocomplete.pack.js"></script>
        <script type="text/javascript" src="auto/js/script.js"></script>
<!--autocompeted data-->


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
<!------NEWS STYLE SHEET & JAVASCRIPT-->
 <link href="<?php echo $tmp;?>/styles/news.css" rel="stylesheet" type="text/css" />
  
<script type="text/javascript">
$(document).ready(function(){
	
	$(".accordion h4:first").addClass("active");
	$(".accordion p:not(:first)").hide();

	$(".accordion h4").click(function(){
		$(this).next("p").slideToggle("slow")
		.siblings("p:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h4").removeClass("active");
	});

});
</script>
<!------NEWS STYLE SHEET & JAVASCRIPT END-->
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


</div><!--<div class="_search right">
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
<!--Banner-->
<!--<div id="banner">
<div class="top_search">
<h2>Find Providers</h2>
<div class="box_s">
<div class="ddl_search"><select>
<option>Select Category</option>
<option>Select Category</option>
<option>Select Category</option>
</select></div>
<div class="ddl_search"><select>
<option>Select City</option>
<option>Select City</option>
<option>Select City</option>
</select></div><br />

<input type="text" class="location_box" placeholder="Select Location" />

<p align="center"><input type="button" class="findnow" /></p>
</div>

</div>
<div class="banner"></div>
</div>-->
<!--google ads-->
<!--<div class="gog_add2"><a href="#"><img src="<?php echo $tmp;?>/images/google.png" alt="google" /></a></div>-->

<!--google ads end-->

<!--Banner Close-->
<!--Container-->
<div id="container">
<div class="content">
<!--news panel-->
<div class="left_box left">
<div class="top_search_pro">
<h2>Find Providers</h2>
<div class="box_s2">
<form action="index.php" method="post" name="advanceForm" >
<!--<strong>Price Range:</strong>-->
<div class="layout-slider" style="width: 100%">
     <!-- <span style="display: inline-block; width: 250px; padding: 0 5px;"><input id="Slider1" type="slider" name="price" value="<?php echo $_REQUEST['price']?$_REQUEST['price']:FROMRATE.";".TORATE;?>" /></span>-->
    </div>
    <script type="text/javascript" charset="utf-8">
      jQuery("#Slider1").slider({ from: <?php echo MINRATE;?>, to: <?php echo MAXRATE;?>, step: <?php echo RATESTEP;?>, smooth: true, round: 0, dimension: "&nbsp;$", skin: "plastic" });
    </script>

<strong>Services:</strong>
<div class="ddl_search2">
<select name="service">
<option value="0">Select Service</option>
<?php
foreach($services as $service) {?>
<option value="<?php echo $service['id'];?>" <?php echo $_REQUEST['service']==$service['id']?'selected':'';?>><?php echo $service['service'];?></option>
<?php } ?>
</select>
</div>

<strong>State:</strong>
<div class="ddl_search2">
<select name="state" id="state" onchange="fillcity(this.value)">
<option value="0">Select State</option>
<?php
foreach($states as $state) {?>
<option value="<?php echo $state['id'];?>"  <?php echo $_REQUEST['state']==$state['id']?'selected':'';?>><?php echo $state['state'];?></option>
<?php } ?>
</select>
</div>

<!--<strong>City:</strong>
<div class="ddl_search2">
<select name="city" id="city">
<option value="0">Select City</option>
<?php

foreach($citys as $city) {?>
<option value="<?php echo $city['id'];?>"  <?php echo $_REQUEST['city']==$city['id']?'selected':'';?>><?php echo $city['city'];?></option>
<?php
}
?>
</select>
</div>-->

<strong>Location:</strong>
<input type="text" class="location_box" placeholder="Select Location" id="location" name="location" value="<?php echo $_REQUEST['location'];?>"  autocomplete="off" />

<p align="center"><input type="submit" class="findnow" value=" " /></p>

<input type="hidden" name="control" value="provider"  />
<input type="hidden" name="view" value="provider"  />
<input type="hidden" name="task" value="search"  />
<input type="hidden" name="tmpid" value="1"  />
<input type="hidden" name="tpages" value="<?php echo $_REQUEST['tpages'];?>"  />

</form>
</div>
</div>
<!--google add-->

<!--<div class="gg_add"><?php echo $bottomleft;?></div>bottom-->
<!--google add Close-->
</div>
<!--news panel Close-->
<!--Service Provider panel-->

<?php include_once('controller.php'); ?>
<!--Service Provider panel Close-->


<!--/right panel/-->
<div class="right_box right">
<!--google add-->

<!--<div class="gg_add"><?php echo $topright;?></div>-->
<!--google add Close-->

       <?php
	if(($_SESSION['usertype']==1)or(!$_SESSION['usertype'])){
?>
    <div class="add">
        <a href="index.php?control=user&task=usersignup&tmpid=6" class="button11">
        	<img src="template/sp_detail/images/signup.png" alt="signup" />
        </a>
    </div>
<?php
	}
	if(($_SESSION['usertype']==2)or(!$_SESSION['usertype'])){
?>
    <div class="add">
        <a href="index.php?control=provider&task=tradesignup&tmpid=6" class="button11">
        	<img src="template/sp_detail/images/trade_business.png" alt="signup" />
        </a>
    </div>
    <?php }?>

<!--<div class="newslatter"><h6>Subscribe to our NewsLetter</h6>
<div class="subscribe">Subscribe to our newsletter and get
exclusive deals you won't find anywhere
<div class="email">
<input type="text" class="news_leterbox" placeholder="Email Address" /> <button class="subscribe_but">Subscribe</button>
</div>
<span><a href="#"><strong>x</strong></a> &nbsp;Please enter a valid E-mail Address</span><br />

<span><em><a href="#"><strong></strong></a> Please enter a valid E-mail Address</em></span>

</div>

</div>-->

<!--google add-->
<!--google add Close-->

</div>
<!--/right panel Close/-->


<!-- google Add -->

<br />
<?php if(count($bottom_adver)) {
	?>
<div class="gog_add">
<?php 
	foreach($bottom_adver as $adver) {
		?>
<div>
<a href="<?php echo $adver['link'];?>" target="_blank"><img src="admin/images/banner/<?php echo $adver['banner'];?>" width="960" height="90" /></a>
</div>
<?php }?>
</div>
    <?php }?>
<!-- google Add -->

</div>


 <!--PopUp Starts-->
			<?php
				include_once("includes/signup_pop.php");
			?>		
<!--PopUp Close-->


</div>
<!--Container Close-->
<!--footer begin-->
<?php include_once("includes/footer.php");?>
	  <!--footer begin-->
      <div id="tptp"></div>
      
<script type="text/javascript">
	setTimeout("closeMsg('closeid2')",<?php echo CLOSETIME;?>);
	function closeMsg(clss) {
		/*document.getElementById(clss).style.display = "none";*/
		document.getElementById(clss).className = "clspop";
	}
	
</script>
</body>
</html>
