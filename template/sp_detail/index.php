<?php
$db->Query("select * from m_service where status = '1' ORDER BY service");
			$services = $db->fetchArray();
			$db->Query("select * from m_countries where status = '1'");
			$countrys = $db->fetchArray();
			$db->Query("select * from cities where status = '1' ORDER BY city");
			$citys = $db->fetchArray();
			$db->Query("select * from states where status = '1' order by state");
			$states = $db->fetchArray();
	$db->Query("SELECT * FROM adverties WHERE status =  '1' AND category =  'bottom' and rand()");
	$bottom_adver = $db->fetchArray();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trade All Stars</title>
<link rel="stylesheet" href="template/sp_detail/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/sp_template/styles/message.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/sp_detail/styles/menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/sp_detail/styles/slide.css" type="text/css" media="screen" />
<!-- What you think-->
<script src="assets/javascript/feed.js" type="text/javascript"></script>
<!-- What you think end-->

<!--javascript for subscription start-->
	<script src="assets/javascript/script.js" type="text/javascript"></script>
    <script src="assets/javascript/validation.js"></script>

<!--javascript for subscription end-->
 <!-- login Slider -->
	<script src="template/sp_detail/jquery/login/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="template/sp_detail/jquery/login/slide.js" type="text/javascript"></script>
 <!-- login Slider -->
 
 <!--provider Slider-->
 <script type="text/javascript" src="template/sp_detail/jquery/pro_slider/jquery.min.js"></script>
<script type="text/javascript" src="template/sp_detail/jquery/pro_slider/stepcarousel.js"></script>
<link href="template/sp_detail/jquery/pro_slider/tech_gal.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:2000},
	panelbehavior: {speed:500, wraparound:true, wrapbehavior:'slide', persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['template/sp_detail/jquery/pro_slider/back.png', 375, -35], rightnav: ['template/sp_detail/jquery/pro_slider/next.png', -20, -35]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
})

</script>
 <!--provider Slider-->
 <!--popup--->
 <link rel="stylesheet" href="template/sp_detail/jquery/popup/popup.css" type="text/css" />
	<!--<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
	<script type="text/javascript" src="template/sp_detail/jquery/popup/popup.js"></script>
<!--popup Close--->


<!-- price Slide -->
<!-- bin/jquery.slider.min.css -->
	<link rel="stylesheet" href="template/sp_detail/jquery/price_slide/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="template/sp_detail/jquery/price_slide/css/jslider.blue.css" type="text/css">
	<link rel="stylesheet" href="template/sp_detail/jquery/price_slide/css/jslider.plastic.css" type="text/css">
	<link rel="stylesheet" href="template/sp_detail/jquery/price_slide/css/jslider.round.css" type="text/css">
	<link rel="stylesheet" href="template/sp_detail/jquery/price_slide/css/jslider.round.plastic.css" type="text/css">
  <!-- end -->

	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/jquery-1.7.1.js"></script>
	
	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/tmpl.js"></script>
	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="template/sp_detail/jquery/price_slide/js/jquery.slider.js"></script>
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
<link rel="stylesheet" href="template/sp_detail/jquery/loginTab/css/style.css">
   <!-- <script href="template/sp_detail/jquery/loginTab/js/jquery.min.js"></script>-->
    <script src="template/sp_detail/jquery/loginTab/js/organictabs.jquery.js"></script>
    <script>
        $(function() {
    
            $("#example-one").organicTabs();
           
            
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
       /* $(function() {
            
            $("#pop-login").organicTabs();
    
        });*/
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
<!--autocompeted data-->
<link href="auto/css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <link href="auto/css/main.css" rel="stylesheet" type="text/css" />
        <!--<script type="text/javascript" src="auto/js/jquery-1.5.2.min.js"></script>-->
        <script type="text/javascript" src="auto/js/jquery.autocomplete.pack.js"></script>
        <script type="text/javascript" src="auto/js/script.js"></script>
<!--autocompeted data-->

    <!------------provider Gallery---------------->
    <link href="template/sp_detail/jquery/domain/css/style.css" rel="stylesheet" type="text/css" />
<!-- JS -->
	<!--<script src="domain/js/jquery-1.4.1.min.js" type="text/javascript"></script>	-->
	<script src="template/sp_detail/jquery/domain/js/jquery.jcarousel.pack.js" type="text/javascript"></script>	
	<script src="template/sp_detail/jquery/domain/js/jquery-func.js" type="text/javascript"></script>
<!--	<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>	-->
	
	<!-- End JS -->
    
    <!------------provider Gallery Close---------------->
    
    <!-------Remark Tab----------->
    <link rel="stylesheet" href="template/sp_detail/jquery/re_tabs/css/general.css" type="text/css" media="screen" />
    <!--<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>-->
	<script type="text/javascript" src="template/sp_detail/jquery/re_tabs/tabs.js"></script>
    <!-------Remark Tab Close----------->
    

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
<li style="padding-top:7px;"><a href="index.php" title="Home"><img src="template/sp_detail/images/home.png" alt="home" /></a></li>
<!--<li><a href="#">About Us</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Providers</a></li>
<li><a href="#">Contact Us</a></li>-->
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
<!--<div class="gog_add2"><a><img src="template/sp_detail/images/google.png" alt="google" /></a></div>-->
<!--google ads end-->

<!--Banner Close-->
<!--Container-->

<div class="middle_box left">
<div id="container">
      <div class="content"> 
<?php include_once('controller.php'); ?>
<!--Container Close-->
 <div class="right_box right"> 
          <!--google add-->
          
          <!--<div class="gg_add"></div>-->
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
          <!--news panel-->
<!--<div class="left_box left">
<h3><span class="news_bg">What's New</span></h3>
<div class="newsbox">
<?php
$i = 1;
if($newss) {
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
}
if(count($news_count)>3) {
?>
<p align="right" style="padding-top:5px;">
<a href="index.php?control=news&tmpid=1" class="anch"><strong>Read More...</strong></a></p>
<?php
}
?>
</div>



</div>-->
<!--news panel Close-->

          <!--google add-->
          
          <!--<div class="gg_add"></div>-->
          <!--google add Close--> 
         
<!-- Subscription box start-->
<!--<div class="newslatter">
<h6>Subscribe to our NewsLetter</h6>
<div class="subscribe">Subscribe to our newsletter and get
exclusive deals you won't find anywhere else.
<div class="email">
<form action="index.php" method="post" name="subscriptnForm" >
    <input type="text" name="subscribe" id="subscribe" class="news_leterbox left" placeholder="Email Address" /> 
    <button type="button" class="subscribe_but right" onclick="subscribe1(subscribe.value)">Subscribe</button>
</form>
</div><span id="subs_msg"></span>

</div>

</div>-->

<!-- Subscription box end--> 
        </div>
    <!--/right panel Close/--> 
    
    <!-- google Add -->
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
      
      
      
    </div>
 <!--PopUp Starts-->
<?php
	include_once("includes/signup_pop.php");
?>		
<!--PopUp Close--> 
    
<!--footer begin-->
<?php include_once("includes/footer.php");?>
	  <!--footer begin-->
<div id="divid"></div>
</div>
</body>
</html>
