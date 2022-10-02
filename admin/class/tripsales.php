<?php
	require_once('dbaccess.php');	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	class tripsaleClass extends DbAccess {
		public $view='';
		public $name='tripsale';
		
		function show($view) {	
			
			
			
			 $query ="SELECT b.*,tsf.trip_title,tsf.specification,ts.start_trip_datetime,u.fname,u.lname from bookings b JOIN trips t ON b.trip_id = t.id JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN users u ON b.user_id = u.id join trip_specifications tsf ON b.trip_id = tsf.trip_id WHERE tsf.language_id='".$_SESSION['language_id']."'";
			
			$this->Query($query);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : $this->defaultPageData();
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" .$tpages. "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
			 $boat =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($boat);
			$trips = $this->fetchArray();
						
			require_once("views/".$this->name."/show.php");		
		}
		
		
		
		function alltripsale() {
			session_start();
			   //echo $query_fuel_tank ="SELECT * from bookings b JOIN trips t ON b.trip_id = t.id JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN users u ON b.user_id = u.id join trip_specifications tsf ON b.trip_id = tsf.trip_id WHERE b.trip_id='".$_REQUEST['trip_id']."' and b.trip_schedule_id ='".$_REQUEST['trip_schedule_id']."' and b.user_id ='".$_REQUEST['user_id']."' and tsf.language_id='".$_SESSION['language_id']."'";
			
			 $query_fuel_tank ="SELECT b.*,tsf.trip_title,tsf.specification,ts.start_trip_datetime,ts.end_trip_datetime,ts.trip_price,u.fname,u.lname,u.email,u.username,u.mobile,u.dob,t.image,t.origin_id,t.destination_id from bookings b JOIN trips t ON b.trip_id = t.id JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN users u ON b.user_id = u.id join trip_specifications tsf ON b.trip_id = tsf.trip_id WHERE b.id='".$_REQUEST['id']."' and b.trip_id='".$_REQUEST['trip_id']."' and b.trip_schedule_id ='".$_REQUEST['trip_schedule_id']."' and b.user_id ='".$_REQUEST['user_id']."' and tsf.language_id='".$_SESSION['language_id']."'";
			$this->Query($query_fuel_tank);
			$results = $this->fetchArray();
			
			
			 $bev ="SELECT * from trip_beverages tb JOIN beverages b ON tb.beverage_id = b.id WHERE tb.trip_id='".$_REQUEST['trip_id']."' and tb.trip_schedule_id ='".$_REQUEST['trip_schedule_id']."' and b.language_id='".$_SESSION['language_id']."'";
			$this->Query($bev);
			$bevresults = $this->fetchArray();
			
			
			 $food ="SELECT * from trip_foods tf JOIN foods f ON tf.food_id = f.id WHERE tf.trip_id='".$_REQUEST['trip_id']."' and tf.trip_schedule_id ='".$_REQUEST['trip_schedule_id']."' and f.language_id='".$_SESSION['language_id']."'";
			$this->Query($food);
			$foodresults = $this->fetchArray();
			
			 $boatname ="SELECT b.boat_name FROM `boatspecifications` b join trips t ON t.boat_id = b.boat_id where t.id = '".$_REQUEST['trip_id']."' and b.language_id='".$_SESSION['language_id']."'";
			$this->Query($boatname);
			$boatresults = $this->fetchArray();
			
			 $tripequip ="SELECT e.equipment FROM `equipments` e join trip_equipments te ON te.equipment_id = e.id where te.trip_id = '".$_REQUEST['trip_id']."' and te.trip_schedule_id = '".$_REQUEST['trip_schedule_id']."' and e.language_id='".$_SESSION['language_id']."'";
			$this->Query($tripequip);
			$equipresults = $this->fetchArray();
			
			
			 $cabin ="SELECT * FROM booking_cabins bkc join boat_cabins btc ON bkc.boat_cabin_id = btc.id join cabins c ON c.id = btc.cabin_id where bkc.booking_id = '".$_REQUEST['id']."' and c.language_id='".$_SESSION['language_id']."'";
			
			$this->Query($cabin);
			$cabinresults = $this->fetchArray();
			
			require_once("../views/".$this->name."/alltripsale.php");
			
		}
		
		
		function search(){	
						
		if($_REQUEST['search']){
		$txt = (explode(" ",$_REQUEST['search']));
		
	   
	  $query="SELECT b.*,tsf.trip_title,tsf.specification,ts.start_trip_datetime,u.fname,u.lname from bookings b JOIN trips t ON b.trip_id = t.id JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN users u ON b.user_id = u.id join trip_specifications tsf ON b.trip_id = tsf.trip_id WHERE tsf.language_id='".$_SESSION['language_id']."' and (u.fname LIKE '%".$_REQUEST['search']."%' OR u.lname LIKE '%".$_REQUEST['search']."%' OR (u.fname LIKE '".$txt[0]."' and u.lname LIKE '".$txt[1]."'))";
		}	
		else { 
		$query="SELECT b.*,tsf.trip_title,tsf.specification,ts.start_trip_datetime,u.fname,u.lname from bookings b JOIN trips t ON b.trip_id = t.id JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN users u ON b.user_id = u.id join trip_specifications tsf ON b.trip_id = tsf.trip_id WHERE tsf.language_id='".$_SESSION['language_id']."'";
		}
		$this->Query($query);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 10;//PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" .$tpages. "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
			 $boat =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($boat);
			$trips = $this->fetchArray();
		$this->task="show";
		require_once("views/".$this->name."/".$this->task.".php"); 	
		}
		
		
		
		
	
		
		
	
	}