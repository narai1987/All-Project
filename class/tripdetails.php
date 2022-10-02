<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class tripdetailClass extends DbAccess {
		public $view='';
		public $name='tripdetail';
		
		function show($view) {
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
				if($_POST['schId'])
				$schId = $_POST['schId'];
				else
				$schId = $_GET['schId'];
				
					
			
			$query = "SELECT t.*,bs.boat_name,b.id AS boat_id,bs.*,ts.*"
			. " \n ,sch.id AS schedule_id,sch.start_trip_datetime,sch.end_trip_datetime,sch.trip_price AS tripSchedule_price FROM trips t JOIN boats b ON "
			. " \n t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON  "
			. " \n ts.trip_id = t.id JOIN trip_schedules sch ON sch.trip_id = t.id WHERE bs.language_id = 1 AND "
			. " \n ts.language_id = 1 AND  t.id = '".$_REQUEST['trip_id']."' AND  sch.id = '".$schId."'";
			$this->Query($query);
			$results1 = $this->fetchArray();
			
			/*################################ *GET BOATS CABIN OPTIONS* ################################*/
			$boatCabins = $this->getBoatCabin($results1[0]['boat_id']);
			/*################################ *GET BOATS CABIN OPTIONS* ################################*/
			
			/*################################ *GET TRIP EQUIPMENTS OPTIONS* ################################*/
			$tripEquipments = $this->getBoatEquipment($_REQUEST['trip_id'],$schId);
			/*################################ *GET TRIP EQUIPMENTS OPTIONS* ################################*/
			
			/*Trip GALLERY QUERY START*/
			$queryGal = "SELECT * FROM trip_gallery WHERE trip_id = '".$_REQUEST['trip_id']."'";
			$this->Query($queryGal);
			$tripGallerys = $this->fetchArray();
			/*Trip GALLERY QUERY END*/
			
			/*Trip SCHEDULE QUERY START*/
			
			$querysch = "SELECT * FROM trip_schedules WHERE trip_id = '".$_REQUEST['trip_id']."' AND start_trip_datetime > '".date("Y-m-d H:is")."'";
			$this->Query($querysch);
			$tripSchedules = $this->fetchArray();
			
			/*Trip SCHEDULE QUERY END*/
			
			/*TRIPS ITINERARY BEGINS*/
			$q_itinerary = "SELECT tit.*, tid.night_schedule, tid.id, tid.detail, c.city FROM trip_itinerary tit JOIN trip_itinerary_details tid ON tit.id = tid.trip_itinerary_id JOIN cities c ON tit.arrival_place = c.id WHERE tit.trip_id = '".$_REQUEST['trip_id']."' AND tit.trip_schedule_id = '".$schId."' and tid.language_id = '".$_SESSION['language_id']."' ";
			$this->Query($q_itinerary);
			$tripItinerarys = $this->fetchArray();
			/*TRIPS ITINERARY CLOSE*/
			
			
			/*RELATED TRIPS CODE START*/	
			$queryR = "SELECT t.id AS tripId,sch.id AS scheduleId, t.image AS tripImage FROM trips t JOIN  trip_schedules sch ON sch.trip_id = t.id JOIN boats b "
			. " \n ON t.boat_id = b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN "
			. " \n trip_specifications ts ON ts.trip_id = t.id WHERE bs.language_id = 1 AND "
			. " \n ts.language_id = 1 AND  (t.origin_id LIKE '".$results1[0]['origin_id']."' "
			. " \n OR t.destination_id LIKE '".$results1[0]['origin_id']."') AND t.id != ".$_REQUEST['trip_id']." AND sch.start_trip_datetime >'".date("Y-m-d")."' GROUP BY sch.trip_id";
			$this->Query($queryR);
			$results = $this->fetchObject();
			/*RELATED TRIPS CODE END*/
			
			
			/*################################ *GET TRIP PACKAGE OPTIONS* ################################*/
			$tripPackages = $this->getTripPackages($_REQUEST['trip_id'],$schId);
			/*################################ *GET TRIP PACKAGE OPTIONS* ################################*/
			
			$queryReview = "SELECT r.review,r.date_time,u.fname,u.lname,u.username,u.id AS userID FROM trip_reviews r "
			. " \n JOIN users u ON u.id = r.user_id WHERE r.trip_id = '".$_REQUEST['trip_id']."'";
			$this->Query($queryReview);
			$reviews = $this->fetchArray();
			
			$getRate = "SELECT AVG(rating) rate FROM trip_rating WHERE trip_id = '".$_REQUEST['trip_id']."' group by trip_id";
			$this->Query($getRate);
			$rates = $this->fetchArray();
			
			require_once("views/".$this->name."/show.php"); 
		}
		
			
			function getUserAvgRate($userId,$tripId){
				$getRate = "SELECT AVG(rating) rate FROM trip_rating WHERE trip_id = '".$tripId."' AND user_id = '".$userId."' group by trip_id";
				$this->Query($getRate);
				$Urate = $this->fetchArray();
				return $Urate[0]['rate'];
			}
		
		
			function getBoatCabin($boatId){
				$query = "SELECT bc.*, c.cabin FROM boat_cabins bc JOIN cabins c ON c.id = bc.cabin_id WHERE bc.boat_id = '".$boatId."' AND c.language_id = 1";
				$this->Query($query);
				return $this->fetchObject();
			
			}
			
			function getBoatEquipment($tripId,$scheduleId){
				$query = "SELECT t.*, eq.equipment FROM trip_equipments t"
				. " \n JOIN equipments eq ON eq.id = t.equipment_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'paid'";
				$this->Query($query);
				return $this->fetchObject();
			
			}
			
			
		
		
	}