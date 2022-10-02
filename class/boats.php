<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class boatClass extends DbAccess {
		public $view='';
		public $name='boat';
		
		function show($view) {
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			 $query = "SELECT * FROM boats b JOIN boatspecifications bs ON bs.boat_id = b.id WHERE bs.language_id = ".$_SESSION['language_id']." AND  b.id = '".$_REQUEST['boat_id']."'";
			$this->Query($query);
			$results1 = $this->fetchArray();
			
			/*ALL BOATS GRID START*/
			$queryallBoats = "SELECT b.id AS boat_id,bs.boat_name FROM boats b JOIN boatspecifications bs ON bs.boat_id = b.id WHERE b.status = 1 AND bs.language_id = ".$_SESSION['language_id']."";
			$this->Query($queryallBoats);
			$allBoats = $this->fetchObject();
			/*ALL BOATS GRID START*/
			
			/*BOAT GALLERY QUERY START*/
			$queryGal = "SELECT * FROM boat_images WHERE boat_id = '".$_REQUEST['boat_id']."'";
			$this->Query($queryGal);
			$boatGallerys = $this->fetchArray();
			
			/*BOAT GALLERY QUERY END*/
			
			
			
			
			
				/*BOAT ENGINE & TECHNICAL FEATURES START*/
				if($results1[0]['boat_safety']):
				$queryEngineTech ="select * from  boat_safety WHERE id IN(".$results1[0]['boat_safety'].") AND  language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryEngineTech);
				$boatSafetys = $this->fetchArray();
				endif;
				/*BOAT ENGINE POWER OPTIONS START*/
				if($results1[0]['boat_facilities']):
				$queryEngineTech = "SELECT * FROM  boat_facilities WHERE id IN(".$results1[0]['boat_facilities'].") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryEngineTech);
				$boatFacilities = $this->fetchArray();
				endif;
				/*BOAT TECHNICAL OPTIONS START*/
				if($results1[0]['boat_comunication_and_navigation']):
				$queryEngineTech = "SELECT * FROM boat_comunication_and_navigation WHERE id IN(".$results1[0]['boat_comunication_and_navigation'].") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryEngineTech);
				$boatComunications = $this->fetchArray();
				endif;
				
				$queryEngineTech = "SELECT * FROM boat_power_diving WHERE boat_id = '".$_REQUEST['boat_id']."'";
				$this->Query($queryEngineTech);
				$divingOptions = $this->fetchArray();
				
				/*BOAT COCKET FEATURES START*/
				if($results1[0]['boat_cockpit']):
				$queryboat_cockpit = "SELECT * FROM  boat_cockpit WHERE id IN(".$results1[0]['boat_cockpit'].") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryboat_cockpit);
				$boat_cockpits = $this->fetchArray();
				endif;
				/*BOAT COCKET FEATURES START*/
				if($results1[0]['boat_helm']):
				$queryboat_helm = "SELECT * FROM  boat_helm WHERE id IN(".$results1[0]['boat_helm'].") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryboat_helm);
				$boat_helms = $this->fetchArray();
				endif;
				/*BOAT COCKET FEATURES START*/
				if($results1[0]['boat_hulldeck']):
				$queryboat_hulldeck = "SELECT * FROM  boat_hulldeck WHERE id IN(".$results1[0]['boat_hulldeck'].") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryboat_hulldeck);
				$boat_hulldecks = $this->fetchArray();
				endif;
			/*BOAT ENGINE & TECHNICAL FEATURES END*/
			
			
			require_once("views/".$this->name."/show.php"); 
		}
		
		function news() {
			$this->Query("select * from news where status = '1' ");
			$newss = $this->fetchArray();			
			
			require_once("views/".$this->name."/news.php"); 
		}
	}