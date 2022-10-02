<?php
	require_once('dbaccess.php');		
	
	
	class searchClass extends DbAccess {
		public $view='';
		public $name='search';
		
		function origin() {
			session_start();
			
			$language_id = $_SESSION['language_id']?$_SESSION['language_id']:'1';
			$q_states = "SELECT distinct(t.origin_id),cn.city FROM trips t JOIN"
		          . " \n cities cn ON cn.id = t.origin_id JOIN trip_schedules sch ON "
		          . " \n sch.trip_id = t.id WHERE t.status = '1' and cn.language_id = '1'"
		          . " \n AND sch.start_trip_datetime > '".date("Y-m-d H:i:s")."' AND t.country_id = '".$_REQUEST['id']."'";
				  
			$this->Query($q_states);
			$origins = $this->fetchArray();
			
			require_once("views/".$this->name."/origin.php"); 
		}
		
		function destination() {
			session_start();
			
			$language_id = $_SESSION['language_id']?$_SESSION['language_id']:'1';
			$q_destinations = "SELECT distinct(t.destination_id),cn.city FROM trips t JOIN"
		          . " \n cities cn ON cn.id = t.destination_id JOIN trip_schedules sch ON "
		          . " \n sch.trip_id = t.id WHERE t.status = '1' and cn.language_id = '1'"
		          . " \n AND sch.start_trip_datetime > '".date("Y-m-d H:i:s")."' AND t.country_id = '".$_REQUEST['id']."'";
			$this->Query($q_destinations);
			$destinations = $this->fetchArray();
			
			require_once("views/".$this->name."/destination.php"); 
		}
		
		function OrgDestination() {
			session_start();
			
			$language_id = $_SESSION['language_id']?$_SESSION['language_id']:'1';
			$q_destinations = "SELECT distinct(t.destination_id),cn.city FROM trips t JOIN"
		          . " \n cities cn ON cn.id = t.destination_id JOIN trip_schedules sch ON "
		          . " \n sch.trip_id = t.id WHERE t.status = '1' and cn.language_id = '1'"
		          . " \n AND sch.start_trip_datetime > '".date("Y-m-d H:i:s")."' AND t.origin_id = '".$_REQUEST['id']."'";
			$this->Query($q_destinations);
			$destinations = $this->fetchArray();
			
			require_once("views/".$this->name."/destination.php"); 
		}
		
		function endDate() {
			session_start();
			
			$language_id = $_SESSION['language_id']?$_SESSION['language_id']:'1';
			$q_returns = "SELECT sc.* FROM trips t JOIN"
		          . " \n trip_schedules sc ON "
		          . " \n sc.trip_id = t.id WHERE t.status = '1'"
		          . " \n AND sc.start_trip_datetime > '".date("Y-m-d H:i:s")."' AND sc.start_trip_datetime >= '".$_REQUEST['id']."'";
			$this->Query($q_returns);
			$returns = $this->fetchArray();
			
			require_once("views/".$this->name."/endDate.php"); 
		}
		
	}