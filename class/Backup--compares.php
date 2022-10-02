<?php
	require_once('dbaccess.php');
	
	
	class compareClass extends DbAccess {
		public $view='';
		public $name='compare';
		
		
		function show(){
			session_start();
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			$query = "SELECT ts.trip_title,sch.trip_price,t.image,b.boat_length,b.boat_engine,b.boat_enginepower,b.boat_technical,b.boat_beam,b.fuel_capacity"
			. " ,b.draft_drive_up_high_trim,b.draft_drive_down,b.deadrise,bs.boat_name,b.id AS boat_id,b.approx_dry_weight,b.estimated_height_on_trailer_top_windshield"
			. " ,b.boat_height_windshield_to_keel,b.bridge_clearance_top_up,b.bridge_clearance_top_down,b.cockpit_depth_helm,b.cockpit_storage,t.no_of_dives"
			. " ,t.no_of_days,t.no_of_nights,t.id AS trip_id,sch.id AS scheduleId FROM trips t JOIN compare w ON  w.trip_id = t.id JOIN trip_schedules sch "
			. "  ON sch.id = w.trip_schedule_id JOIN boats b ON t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts "
			. "  ON ts.trip_id = t.id WHERE bs.language_id = '".$_SESSION['language_id']."' AND ts.language_id = '".$_SESSION['language_id']."' AND  w.user_id = '".session_id()."'";
			$this->Query($query);
			$results = $this->fetchObject();
			
			
			
			require_once("views/".$this->name."/show.php");
		}
		
		
		function addToCompare(){
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			if(!$_REQUEST['trip_id']){
				/*QUERY FOR compare COUNT START*/
		 		//$queryW = "SELECT * FROM compare  WHERE user_id = '".$_SESSION['userid']."'";
		 		$queryW = "SELECT * FROM compare  WHERE user_id = '".session_id()."'";
				$this->Query($queryW);
				echo $Wtotal = $this->rowCount();
		 		/*QUERY FOR compare COUNT CLOSE*/
			}
			else if($_REQUEST['trip_id']=="rm") {
				$query = "SELECT * FROM trips t  JOIN compare c ON c.trip_id = t.id WHERE c.user_id = '".session_id()."'";
				$this->Query($query);
				$results = $this->fetchObject();
				require_once("views/".$this->name."/display.php");
			}
			else{
				$this->Query("SELECT * FROM compare WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."' AND trip_schedule_id = '".$_REQUEST['tripScheduleId']."'");
				$num = $this->rowCount();
				
				$this->Query("SELECT * FROM compare WHERE user_id = '".session_id()."'");
				$Usernum = $this->rowCount();
			
				
				if($num){
					$output = 'already';
				}
				else if($Usernum >= 3){
					$output = "max";//Max 3 items to compare
				}else{
					$output = 'insert';
					$inQuery = "INSERT INTO compare (user_id,trip_id,trip_schedule_id,date_time) VALUES ('".session_id()."','".$_REQUEST['trip_id']."','".$_REQUEST['tripScheduleId']."','".date("Y-m-d H:i:s")."')";
					$this->Query($inQuery);
					$this->Execute();
				}
				
				$query = "SELECT * FROM trips t  JOIN compare c ON c.trip_id = t.id WHERE c.user_id = '".session_id()."'";
				$this->Query($query);
				$results = $this->fetchObject();
				require_once("views/".$this->name."/addcompare.php");
				
			}
				
		}
		
		function display() {
			$query = "SELECT * FROM trips t  JOIN compare c ON c.trip_id = t.id WHERE c.user_id = '".session_id()."'";
			$this->Query($query);
			$results = $this->fetchObject();
			require_once("views/".$this->name."/display.php");
		}
		
		function remove(){
		$query = "DELETE FROM compare WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."' AND trip_schedule_id = '".$_REQUEST['tripScheduleId']."'";
		$this->Query($query);
		$this->Execute();
		$_SESSION['error'] = "You have successfully removed 1 item from your compare.";
		header("location:index.php?control=compare");
		}
		
		function removed(){
		$query = "DELETE FROM compare WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."' AND trip_schedule_id = '".$_REQUEST['tripScheduleId']."'";
		
		$this->Query($query);
		$this->Execute();
		}
		
		
	}