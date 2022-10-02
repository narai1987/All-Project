<?php
	require_once('dbaccess.php');
	
	
	class wishlistClass extends DbAccess {
		public $view='';
		public $name='wishlist';
		
		
		function show(){
			
			if($this->findById($_SESSION['userid'],'users')){
				$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
				$this->Query($qTemp);
				$templs = $this->fetchArray();
				$tmp = $templs[0]['name'];
				
				 $query = "SELECT ts.trip_title,sch.trip_price,t.image,t.id AS trip_id,sch.id AS scheduleId FROM trips t JOIN"
				 		 . " wishlist w ON w.trip_id = t.id JOIN trip_schedules sch "
			             . " ON sch.id = w.trip_schedule_id JOIN boats b ON t.boat_id=b.id JOIN "
						 . " boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id"
						 . " WHERE bs.language_id = 1 AND ts.language_id = 1 AND  w.user_id = '".$_SESSION['userid']."'";
				$this->Query($query);
				$results = $this->fetchObject();
				require_once("views/".$this->name."/show.php");
			}else{
			session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
		   
		   }
	}
		
		
		function addWishList(){
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			if(!$_REQUEST['trip_id']){
				/*QUERY FOR WISHLIST COUNT START*/
		 		$queryW = "SELECT * FROM wishlist  WHERE user_id = '".$_SESSION['userid']."'";
				$this->Query($queryW);
				echo $Wtotal = $this->rowCount();
		 		/*QUERY FOR WISHLIST COUNT CLOSE*/
			}else{
				$this->Query("SELECT * FROM wishlist WHERE user_id = '".$_SESSION['userid']."' AND trip_id = '".$_REQUEST['trip_id']."' AND trip_schedule_id = '".$_REQUEST['tripScheduleId']."'");
				$num = $this->rowCount();
				
				$query = "SELECT * FROM trips t JOIN boats b ON t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = 1 AND  t.id = '".$_REQUEST['trip_id']."'";
				$this->Query($query);
				$results = $this->fetchArray();
				
				if($num){
				$output = 'already';
				}else{
				$output = 'insert';
				$inQuery = "INSERT INTO wishlist (user_id,trip_id,trip_schedule_id,date_time) VALUES ('".$_SESSION['userid']."','".$_REQUEST['trip_id']."','".$_REQUEST['tripScheduleId']."','".date("Y-m-d H:is")."')";
				$this->Query($inQuery);
				$this->Execute();
				}
				require_once("views/".$this->name."/addwishlist.php");
			}
		}
		
		
		function remove(){
			$query = "DELETE FROM wishlist WHERE user_id = '".$_SESSION['userid']."' AND trip_id = '".$_REQUEST['trip_id']."' AND trip_schedule_id = '".$_REQUEST['tripScheduleId']."'";
			$this->Query($query);
			$this->Execute();
			$_SESSION['error'] = "You have successfully removed 1 item from your wishlist.";
			header("location:index.php?control=wishlist");
		}
		
		
	}