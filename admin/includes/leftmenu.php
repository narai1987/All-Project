<?php $langSites = ($ob->langAll());
$colapsControl = array('','countrie','state','city','menu','customer','relation','certificate','paymentgateway')


?> 
<?php //if($_REQUEST['control']) { ?>
<div class="accordion2">
	<h3 <?php if(in_array($_REQUEST['control'],$colapsControl)) {?> class="active" <?php }// elseif($_REQUEST['control']!='') { echo class="active"; }?> ><span class="quick_link_">Quick Link</span></h3>
	<div <?php if(in_array($_REQUEST['control'],$colapsControl)) {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
     <li><a href="index.php?control=countrie" class="left" >Countries</a></li>
     <li><a href="index.php?control=countrie&task=state" class="left" >State</a></li>
     <li><a href="index.php?control=countrie&task=city" class="left" >City</a></li>
     <li><a href="index.php?control=menu" class="left" >Menu</a> </li> 
     <li><a href="index.php?control=customer" class="left" >Customers</a> <!--<a class="right tot_alert">23</a>--></li>
     <!--<li><a href="index.php?control=relation" class="left" >Relations</a> </li>--> 
     <li><a href="index.php?control=certificate" class="left" >Certification</a> </li>
     <li><a href="index.php?control=paymentgateway" class="left" >Gateway Method</a> </li>
     </ul>
    </div>
  <!--COUPON MENU START HERE-->
  <h3 <?php if($_REQUEST['control'] == 'coupon') {?> class="active" <?php } ?>><span class="coupon_">Coupons</span></h3>
	<div <?php if($_REQUEST['control'] == 'coupon') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
    <li><a href="index.php?control=coupon" class="left">Coupon</a></li>
    <li><a href="index.php?control=coupon&task=addCoupon" class="left">Add New Coupon</a></li>
   <!-- <li><a href="index.php?control=coupon" class="left">Coupon Category</a></li>-->
    </ul>
    </div>
  <!--COUPON MENU END HERE-->
  
  
  <!--EMAIL MENU START HERE-->
  <h3 <?php if($_REQUEST['control'] == 'emailTemplate') {?> class="active" <?php } ?>><span class="mail_">Email Setting</span></h3>
	<div <?php if($_REQUEST['control'] == 'emailTemplate') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
    <li><a href="index.php?control=emailTemplate" class="left">emailTemplate</a></li>
    </ul>
    </div>
  <!--EMAIL MENU END HERE-->
  
  <!--BOAT AVAILABLE MENU START HERE-->
  <h3 <?php if($_REQUEST['control'] == 'equipment' or $_REQUEST['control'] == 'food' or $_REQUEST['control'] == 'beverage' or $_REQUEST['control'] == 'cabin') {?> class="active" <?php } ?>><span class="boat_">Boats Available Options</span></h3>
	<div <?php if($_REQUEST['control'] == 'equipment' or $_REQUEST['control'] == 'food' or $_REQUEST['control'] == 'beverage' or $_REQUEST['control'] == 'cabin') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
     <li><a href="index.php?control=equipment" class="left" >Equipments</a> <!--<a class="right tot_alert">23</a>--></li>
      <li><a href="index.php?control=food" class="left" >Foods</a></li>
      <li><a href="index.php?control=food&task=food" class="left" >Food Type</a></li>
      <li><a href="index.php?control=beverage" class="left" >Beverages</a></li>
      <li><a href="index.php?control=beverage&task=beverage" class="left" >Beverage Type</a></li>  
     <li><a href="index.php?control=cabin" class="left" >Boat Cabins</a> </li> 
     <li><a href="index.php?control=cabin&task=showoption" class="left" >Cabin Options</a> </li>
    </ul>
    </div>
  <!--BOAT AVAILABLE END HERE-->
  
  
  <h3 <?php if($_REQUEST['control'] == 'boat' or $_REQUEST['control'] == 'boatfeature' or $_REQUEST['control'] == 'boatgallery' or $_REQUEST['control'] == 'company' or $_REQUEST['control'] == 'operator') {?> class="active" <?php } ?>>
  <span class="boat_set_">Boat Setting</span></h3>
  <div <?php if($_REQUEST['control'] == 'boat' or $_REQUEST['control'] == 'boatfeature' or $_REQUEST['control'] == 'boatgallery' or $_REQUEST['control'] == 'company' or $_REQUEST['control'] == 'operator') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
     <li><a href="index.php?control=company" class="left" >Companies</a> <!--<a class="right tot_alert">23</a>--></li>
     <li><a href="index.php?control=operator" class="left" >Operators</a> <!--<a class="right tot_alert">23</a>--></li>
     <li><a href="index.php?control=boat" class="left" >Boats</a> <!--<a class="right tot_alert">23</a>--></li>
     <!--<li><a href="index.php?control=boatfeature" class="left" >Technical Options</a></li>
     <li><a href="index.php?control=boatfeature&task=boat_cockpit_feature" class="left" >Cockpit Features</a></li>
     <li><a href="index.php?control=boatfeature&task=boat_helm_feature" class="left" >Helm Features</a></li>
     <li><a href="index.php?control=boatfeature&task=boat_hulldeck_feature" class="left" >Hull & Deck Features</a></li>
     <li><a href="index.php?control=boatfeature&task=engine_power_option" class="left" >Engine Power Options</a> </li>
     <li><a href="index.php?control=boatfeature&task=boat_engineTechnical_feature" class="left" >Engine & Technical Features</a></li> -->
     <li><a href="index.php?control=boatfeature&task=boat_safety" class="left" >Safety Features</a></li>
     <li><a href="index.php?control=boatfeature&task=boat_communication" class="left" >Communication & Navigation</a></li>
     <li><a href="index.php?control=boatfeature&task=boat_facility" class="left" >Boat Facilities</a></li>
      <li><a href="index.php?control=boatgallery" class="left" >Boat Gallery</a></li> 
    
    </ul>
  
  </div>
  
  <h3 <?php if($_REQUEST['control'] == 'trip' or $_REQUEST['control'] == 'triptype') {?> class="active" <?php } ?>><span class="trip_">Trip Setting</span></h3>
  <div <?php if($_REQUEST['control'] == 'trip' or $_REQUEST['control'] == 'triptype' or $_REQUEST['control'] == 'tripgallery' or $_REQUEST['control'] == 'tripsale') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
     <li><a href="index.php?control=trip" class="left" >Trips</a> <!--<a class="right tot_alert">23</a>--></li>
     <li><a href="index.php?control=triptype" class="left" >Trip Types</a> <!--<a class="right tot_alert">23</a>--></li>
      <li><a href="index.php?control=tripgallery" class="left" >Trip Gallery</a> <!--<a class="right tot_alert">23</a>--></li>
      <li><a href="index.php?control=triptype&task=showgas" class="left" >Trip Gases</a> <!--<a class="right tot_alert">23</a>--></li>
      <li><a href="index.php?control=triptype&task=showtank" class="left" >Scuba cylinder </a> <!--<a class="right tot_alert">23</a>--></li>
      <li><a href="index.php?control=tripsale" class="left" >Trip Sales</a> <!--<a class="right tot_alert">23</a>--></li>
    </ul>
  
  </div>
  
	<h3 <?php if($_REQUEST['control'] == 'taxonomy' or $_REQUEST['control'] == 'language') {?> class="active" <?php } ?>><span class="lang_">Language Options</span></h3>
    <div <?php if($_REQUEST['control'] == 'taxonomy' or $_REQUEST['control'] == 'language') {?> style="display:block;" <?php } ?>>
        <ul class="l_menulist">  
    		 <li><a href="index.php?control=language" class="left" >Languages</a> </li> 
            <li><a href="index.php?control=taxonomy" class="left" >Show Taxonomy</a> <!--<a class="right tot_alert">23</a>--></li>
            <li><a href="index.php?control=taxonomy&task=addTaxonomyFle" class="left" >Add Taxonomy</a> <!--<a class="right tot_alert">23</a>--></li>
        </ul>  
    </div>
  
	<h3 <?php if($_REQUEST['control'] == 'currency') {?> class="active" <?php } ?>><span class="currency_">Currency Setting</span></h3>
    <div <?php if($_REQUEST['control'] == 'currency') {?> style="display:block;" <?php } ?>>
        <ul class="l_menulist">  
    		 
     <li><a href="index.php?control=currency" class="left" >Currencys</a> </li> 
        </ul>  
    </div>
  
	<h3 <?php if($_REQUEST['control'] == 'config') {?> class="active" <?php } ?>><span class="settting_">Settings</span></h3>
	<div <?php if($_REQUEST['control'] == 'config') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
    <li><a href="index.php?control=config" class="left">Config</a> <!--<a class="right tot_alert">23</a>--></li>
    </ul>
    </div>
	<h3 <?php if($_REQUEST['control'] == 'report') {?> class="active" <?php } ?>><span class="report_">Reports</span></h3>
	<div <?php if($_REQUEST['control'] == 'report') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
    <li><a href="index.php?control=report" class="left">Trip Report</a></li>
    <li><a href="index.php?control=report&task=trip_cancel_report" class="left">Trip Cancel Report</a></li>
    <!--<li><a href="index.php?control=report" class="left">Report-2</a></li>-->
   <!-- <li><a href="index.php?control=coupon" class="left">Coupon Category</a></li>-->
    </ul>
    </div>
    
 
    
    <h3 <?php if($_REQUEST['control'] == 'review') {?> class="active" <?php } ?>><span class="boat_set_">Review</span></h3>
	<div <?php if($_REQUEST['control'] == 'review') {?> style="display:block;" <?php } ?>>
    <ul class="l_menulist">
    <li><a href="index.php?control=review" class="left">All review</a></li>
    <!--<li><a href="index.php?control=report" class="left">Report-2</a></li>-->
   <!-- <li><a href="index.php?control=coupon" class="left">Coupon Category</a></li>-->
    </ul>
    </div>
    
   <!-- <h3><span class="acco_set_">Languages</span></h3>
	<div>
    <ul class="l_menulist">
    <?php foreach($langSites as $langSite) {?>
    <li><a href="index.php?control=language&task=addLanguage&id=<?php echo $langSite['id'];?>" class="left"><?php echo $langSite['content'];?></a></li>
    <?php }?>
    </ul>
    </div>-->
</div>

<?php //} ?>