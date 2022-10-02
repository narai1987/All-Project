<?php
	require_once('dbaccess.php');		
	
	
	class popularTripClass extends DbAccess {
		public $view='';
		public $name='popularTrip';
		
		
		
		
		
		
		function show($view) {
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			
				/*GET BOOKING TRIP SCHEDULE*/
				$this->Query("SELECT DISTINCT(trip_schedule_id) FROM bookings WHERE 1");
				$scheduleIds = $this->fetchArray();
				if($scheduleIds):
					$s = 0;
					foreach($scheduleIds AS $scheduleId):
						if($s == 0)
						$allSchedules = $scheduleId['trip_schedule_id'];
						else
						$allSchedules .= ",".$scheduleId['trip_schedule_id'];
					$s++;
					endforeach;
				endif;	
				
				if($allSchedules)
				$popularSearchKey = " AND sc.id IN (".$allSchedules.")";
				
				/*GET BOOKING TRIP SCHEDULE*/
			
					 $query =  "SELECT ts.trip_title,ts.specification,t.id AS trip_id,t.image,t.no_of_dives"
					. " \n ,bs.boat_name,b.id AS boat_id,cn.country,sc.start_trip_datetime,sc.end_trip_datetime"
					. " \n ,sc.id AS schedule_id,t.origin_id,t.destination_id FROM trips t JOIN boats b ON"
					. " \n t.boat_id = b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN "
					. " \n trip_specifications ts ON ts.trip_id = t.id JOIN countries cn ON cn.id = t.country_id"
					. " \n JOIN trip_schedules sc ON sc.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = 1"
					. " \n AND cn.language_id = 1 AND trip_type_id = 1 AND "
					. " \n sc.start_trip_datetime >'".date("Y-m-d")."' ".$popularSearchKey." GROUP BY sc.trip_id ORDER BY sc.start_trip_datetime";
					
							
						$this->Query($query);
						$tresult1 = $this->fetchArray();
						$tdata = count($tresult1);
				
					
				$query2 = "SELECT ts.trip_title,ts.specification,t.id AS trip_id,t.image,t.no_of_dives,bs.boat_name,b.id AS"
					. " \n boat_id,cn.country,sc.start_trip_datetime,sc.end_trip_datetime,sc.id AS schedule_id,t.origin_id,"
					. " \n t.destination_id FROM trips t JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON"
					. " \n bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id JOIN countries cn ON"
					. " \n cn.id = t.country_id JOIN trip_schedules sc ON sc.trip_id = t.id WHERE bs.language_id = 1"
					. " \n AND ts.language_id = 1 AND cn.language_id = 1  AND trip_type_id = 2"
					. " \n AND sc.start_trip_datetime >'".date("Y-m-d")."' ".$popularSearchKey."  GROUP BY sc.trip_id ORDER BY sc.start_trip_datetime ";
					
					
						$this->Query($query2);
						$tresult2 = $this->fetchArray();
						$tdata2 = count($tresult2);
				
				/* Paging start here for liveaboard */
				 $page   = ($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
				 $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 2;
				 $adjacents  = intval($_REQUEST['adjacents']);
				 $tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages); 
				 $tdata = floor($tdata);
					if($page<=0)  $page  = 1;
					if($adjacents<=0) $adjacents = 4;
					$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
				/* Paging end here for liveaboard */			
			
			    $queryPaging = $query." LIMIT ".(($page-1)*$tpages).",".$tpages;
				$this->Query($queryPaging);
				$results1 = $this->fetchArray();
				
				
			
				/* Paging start here for DayTrips */
				 $page2   = ($_REQUEST['page2']) ? intval($_REQUEST['page2']) : 1;
				 $tpages2 = ($_REQUEST['tpages2']) ? intval($_REQUEST['tpages2']) : 3;
				 $adjacents2  = intval($_REQUEST['adjacents2']);
				 $tdata2 = ($tdata2%$tpages2)?(($tdata2/$tpages2)+1):round($tdata2/$tpages2); 
				 $tdata2 = floor($tdata2);
					if($page2<=0)  $page2  = 1;
					if($adjacents2<=0) $adjacents2 = 4;
					$reload2 = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages2=" . $tpages2 . "&amp;adjacents2=" . $adjacents2;	
				/* Paging end here for DayTrips */
				
				$queryPaging2 = $query2." LIMIT ".(($page2-1)*$tpages2).",".$tpages2;
				$this->Query($queryPaging2);
				$results2 = $this->fetchArray();
			
			require_once("views/".$this->name."/show.php"); 
		}
		
		
		
		
		function ajaxShow($view) {
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
				
				/*GET BOOKING TRIP SCHEDULE*/
				$this->Query("SELECT DISTINCT(trip_schedule_id) FROM bookings WHERE 1");
				$scheduleIds = $this->fetchArray();
				if($scheduleIds):
					$s = 0;
					foreach($scheduleIds AS $scheduleId):
						if($s == 0)
						$allSchedules = $scheduleId['trip_schedule_id'];
						else
						$allSchedules .= ",".$scheduleId['trip_schedule_id'];
					$s++;
					endforeach;
				endif;	
				
				if($allSchedules)
				$popularSearchKey = " AND sc.id IN (".$allSchedules.")";
				
				/*GET BOOKING TRIP SCHEDULE*/
				
			
				$query =  "SELECT ts.trip_title,ts.specification,t.id AS trip_id,t.image,t.no_of_dives"
					. " \n ,bs.boat_name,b.id AS boat_id,cn.country,sc.start_trip_datetime,sc.end_trip_datetime"
					. " \n ,sc.id AS schedule_id,t.origin_id,t.destination_id FROM trips t JOIN boats b ON"
					. " \n t.boat_id = b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN "
					. " \n trip_specifications ts ON ts.trip_id = t.id JOIN countries cn ON cn.id = t.country_id"
					. " \n JOIN trip_schedules sc ON sc.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = 1"
					. " \n AND cn.language_id = 1 AND trip_type_id = 1 AND "
					. " \n sc.start_trip_datetime >'".date("Y-m-d")."' ".$popularSearchKey." GROUP BY sc.trip_id ORDER BY sc.start_trip_datetime ";
					
							
						$this->Query($query);
						$tresult1 = $this->fetchArray();
						$tdata=count($tresult1);
				
					
			
				/* Paging start here */
				 $page   = ($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
				 $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 2;
				 $adjacents  = intval($_REQUEST['adjacents']);
				 $tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages); 
				 $tdata = floor($tdata);
					if($page<=0)  $page  = 1;
					if($adjacents<=0) $adjacents = 4;
					$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
				/* Paging end here */			
			
			    $queryPaging = $query." LIMIT ".(($page-1)*$tpages).",".$tpages;
				$this->Query($queryPaging);
				$results1 = $this->fetchArray();
				
			
			require_once("views/".$this->name."/ajaxpageshow.php"); 
		}
		
		
		
		
		function ajaxDayShow($view) {
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			
				/*GET BOOKING TRIP SCHEDULE*/
				$this->Query("SELECT DISTINCT(trip_schedule_id) FROM bookings WHERE 1");
				$scheduleIds = $this->fetchArray();
				if($scheduleIds):
					$s = 0;
					foreach($scheduleIds AS $scheduleId):
						if($s == 0)
						$allSchedules = $scheduleId['trip_schedule_id'];
						else
						$allSchedules .= ",".$scheduleId['trip_schedule_id'];
					$s++;
					endforeach;
				endif;	
				
				if($allSchedules)
				$popularSearchKey = " AND sc.id IN (".$allSchedules.")";
				
				/*GET BOOKING TRIP SCHEDULE*/
					
			
			
				$query2 = "SELECT ts.trip_title,ts.specification,t.id AS trip_id,t.image,t.no_of_dives,bs.boat_name,b.id AS"
					. " \n boat_id,cn.country,sc.start_trip_datetime,sc.end_trip_datetime,sc.id AS schedule_id,t.origin_id,"
					. " \n t.destination_id FROM trips t JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON"
					. " \n bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id JOIN countries cn ON"
					. " \n cn.id = t.country_id JOIN trip_schedules sc ON sc.trip_id = t.id WHERE bs.language_id = 1"
					. " \n AND ts.language_id = 1 AND cn.language_id = 1  AND trip_type_id = 2"
					. " \n AND sc.start_trip_datetime >'".date("Y-m-d")."' ".$popularSearchKey." GROUP BY sc.trip_id ORDER BY sc.start_trip_datetime ";
					
					
						$this->Query($query2);
						$tresult2 = $this->fetchArray();
						$tdata2=count($tresult2);
				
			
				/* Paging start here */
				 $page2   = ($_REQUEST['page2']) ? intval($_REQUEST['page2']) : 1;
				 $tpages2 = ($_REQUEST['tpages2']) ? intval($_REQUEST['tpages2']) : 2;
				 $adjacents2  = intval($_REQUEST['adjacents2']);
				 $tdata2 = ($tdata2%$tpages2)?(($tdata2/$tpages2)+1):round($tdata2/$tpages2); 
				 $tdata2 = floor($tdata2);
					if($page2<=0)  $page2  = 1;
					if($adjacents2<=0) $adjacents2 = 4;
					$reload2 = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages2=" . $tpages2 . "&amp;adjacents2=" . $adjacents2;	
				/* Paging end here */			
			
			    $queryPaging = $query2." LIMIT ".(($page2-1)*$tpages2).",".$tpages2;
				$this->Query($queryPaging);
				$results2 = $this->fetchArray();
				
			
			require_once("views/".$this->name."/ajaxpageshow.php"); 
		}
		
		
		
		
	}