<?php
ob_start(); 
    //ini_set("display_errors","Off");
	if(file_exists('configuration.php')){
		require_once('configuration.php');
	}
	session_start();
	$_SESSION['language_id'] = $_SESSION['language_id']?$_SESSION['language_id']:'1';
	require_once('class/dbaccess.php');
	require_once('class/users.php');
	require_once('textconfig/config.php');
	date_default_timezone_set("Asia/Calcutta");
	$db = new DbAccess();
	$template = $db->getTemplate($_REQUEST['tmpid']);	
	$menus =  $db->getMenuTop();
	$footermenus =  $db->getMenuFooter();
	$bottomfootermenus =  $db->getMenuBottomFooter();
	$termsConditionMenus =  $db->getTermsCondition();
	$getLanguages = $db->getLanguage();
	$getCurrency = $db->getCurrency();
	
	if(!$_SESSION['currency']) {
	$setCurrency = $db->setCurrency();	
	}
	
	/*######################MENU FAMOUS BOATS############################*/
	$FBMquery = "SELECT * FROM companies WHERE language_id = '".$_SESSION['language_id']."'";
	$db->Query($FBMquery);
	$famousBoats = $db->fetchObject();
	
		/*###################BOATS UNDER COMPANY*/
		foreach($famousBoats AS $bc):
			 $cBoatquery = "SELECT bs.boat_name,b.id AS boat_id,b.main_image FROM boats b "
			. "\n JOIN boatspecifications bs ON bs.boat_id = b.id WHERE b.company_id = '".$bc->id."' AND bs.language_id = '".$_SESSION['language_id']."'";
			$db->Query($cBoatquery);
			$cBoats = $db->fetchObject();
			$allCBoats[$bc->id] = $cBoats;
		endforeach;
		/*###################BOATS UNDER COMPANY*/
	
	/*######################MENU FAMOUS BOATS############################*/
	
	$control = $_REQUEST['control'];
	$view = $_REQUEST['view']?$_REQUEST['view']:$_REQUEST['control'];
	$task= $_REQUEST['task'];
	$tmpid= $_REQUEST['tmpid'];
			
	
	/*TOP HEADER SHOPPING CART SECTION HERE*/
	$Squery = "SELECT * FROM trips t JOIN addtocart ct ON ct.trip_id = t.id JOIN boats b ON t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = '".$_SESSION['language_id']."' AND  ct.user_id = '".session_id()."'";
	$db->Query($Squery);
	$Shcarts = $db->fetchObject();
	/*TOP HEADER SHOPPING CART SECTION HERE*/
	
	/*LEFT NEWS SECTION DATA START */
	
			 
		 $db->Query("SELECT * FROM news WHERE status = '1' LIMIT 0,3");
		 $newss = $db->fetchArray();
		 $db->Query("SELECT * FROM news WHERE status = '1'");
		 $news_count = $db->fetchArray();
	/*LEFT NEWS SECTION DATA END */
	/* WHAT PEOPLE SAY'S*/
	 $db->Query("SELECT * FROM feeds f JOIN users u ON f.user_id = u.id WHERE f.status = '1' order by rand() ");
			 $feeds = $db->fetchArray();
			 
	/* WHAT PEOPLE SAY'S*/
	
	
	/* FOOTER ADDRESS DATA START*/
	 $db->Query("SELECT * FROM pages  WHERE category_id = '2' and status = '1'");
			 $addresss = $db->fetchArray();
			 
	/* FOOTER ADDRESS DATA END*/
	/* FOOTER LINKS START HERE*/
		$db->Query("SELECT * FROM pages p JOIN categories c ON p.category_id = c.id WHERE c.status = '1' AND p.status = '1'");
		$otherlinks = $db->fetchArray();
	
	/* FOOTER LINKS END HERE*/
	
	
	
	/*FOOTER BOATS LIVEABOARD TRIPS AND DAY TRIPS START*/
	$q_live = "SELECT t.id AS trip_id,t.image AS tripImage,sc.id AS schedule_id"
	. " \n FROM trips t JOIN trip_schedules sc ON sc.trip_id = t.id WHERE "
	. " \n sc.start_trip_datetime >'".date("Y-m-d H:is")."' AND t.trip_type_id = 1"
	. " \n GROUP BY sc.trip_id ORDER BY RAND(),sc.start_trip_datetime LIMIT 0,3";
	$db->Query($q_live);
	$LiveAboards = $db->fetchObject();
	
	$q_Day = "SELECT t.id AS trip_id,t.image AS tripImage,sc.id AS schedule_id"
	. " \n FROM trips t JOIN trip_schedules sc ON sc.trip_id = t.id WHERE "
	. " \n sc.start_trip_datetime >'".date("Y-m-d H:is")."' AND t.trip_type_id = 2"
	. " \n GROUP BY sc.trip_id ORDER BY RAND(),sc.start_trip_datetime LIMIT 0,3";
	$db->Query($q_Day);
	$DayTrips = $db->fetchObject();
	/*FOOTER BOATS LIVEABOARD TRIPS AND DAY TRIPS END*/
	
	
	/*SHOW ADMIN ADS START*/
	 require_once("includes/ads.php");
	/*SHOW ADMIN ADS END*/
	session_start();
	if(!$_SESSION['username'] and $_REQUEST['email']) {
		$db->Auth('user');
	}
		
		
		/*########################## /***SEARCH OPTIONS***/ ################################*/
		
		$def_lang = $_SESSION['language_id']?$_SESSION['language_id']:'1';
		
		$contry_q = "SELECT distinct(t.country_id),cn.country FROM trips t JOIN"
		          . " \n countries cn ON cn.id = t.country_id JOIN trip_schedules sch ON "
		          . " \n sch.trip_id = t.id WHERE t.status = '1' and cn.language_id = '".$def_lang."'"
		          . " \n AND sch.start_trip_datetime > '".date("Y-m-d H:i:s")."'";
		
		$db->Query($contry_q);
		$countrys = $db->fetchArray();
		 
		 $origin_q = "SELECT distinct(t.origin_id),cn.city FROM trips t JOIN"
		          . " \n cities cn ON cn.id = t.origin_id JOIN trip_schedules sch ON "
		          . " \n sch.trip_id = t.id WHERE t.status = '1' and cn.language_id = '".$def_lang."'"
		          . " \n AND sch.start_trip_datetime > '".date("Y-m-d H:i:s")."'";
		 $db->Query($origin_q);
		 $origins = $db->fetchArray();
		 
		 $destination_q = "SELECT distinct(t.destination_id),cn.city FROM trips t JOIN"
		          . " \n cities cn ON cn.id = t.destination_id JOIN trip_schedules sch ON "
		          . " \n sch.trip_id = t.id WHERE t.status = '1' and cn.language_id = '".$def_lang."'"
		          . " \n AND sch.start_trip_datetime > '".date("Y-m-d H:i:s")."'";
		 $db->Query($destination_q);
		 $destinations = $db->fetchArray();
		 
		 $dep_q = "SELECT distinct(sc.start_trip_datetime),sc.* FROM trips t JOIN"
		          . " \n trip_schedules sc ON "
		          . " \n sc.trip_id = t.id WHERE t.status = '1'"
		          . " \n AND sc.start_trip_datetime > '".date("Y-m-d H:i:s")."'";
		 $db->Query($dep_q);
		 $departures = $db->fetchArray();
		 
		 
		 
		 /*######################## /***SEARCH OPTION***/ #################################*/
		 
		 /*QUERY FOR WISHLIST COUNT START*/
		 $queryW = "SELECT * FROM wishlist  WHERE user_id = '".$_SESSION['userid']."'";
			$db->Query($queryW);
			$Wtotal = $db->rowCount();
		 /*QUERY FOR WISHLIST COUNT CLOSE*/
		 
		 /*QUERY FOR COMPARE COUNT START*/
		 
		 $queryC = "SELECT * FROM compare  WHERE user_id = '".session_id()."'";
			$db->Query($queryC);
			$Ctotal = $db->rowCount();
		 /*QUERY FOR COMPARE COUNT CLOSE*/
	/*SET TAXONOMY FOR THE SITE START HERE*/
			$taxonomy = $db->taxolist();
			/*echo "<pre>";
			print_r($taxonomy);
			echo "</pre>";*/
	/*SET TAXONOMY FOR THE SITE END HERE*/
	/*CHECK MY ACCOUNT TEMPLATES FOR LOGIN*/
	if($_REQUEST['tmpid']==5) {
		if(!$_SESSION['login']) {
			header('location:index.php');
		}
	}
	/*CHECK MY ACCOUNT TEMPLATES FOR LOGIN END*/
	$tmp = "template/".$template[0]['name'];
	include_once("template/".$template[0]['name']."/index.php");
	 
	ob_flush();