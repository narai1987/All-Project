<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class tripClass extends DbAccess {
		public $view='';
		public $name='trip';
				
		function show($view) {	
			/*$query ="select b.* from boats b JOIN operators o ON b.operator_id=o.id JOIN companies c ON b.company_id=c.id WHERE c.language_id = '".$_SESSION['language_id']."' and  b.language_id = '".$_SESSION['language_id']."'  ";*/
			$query ="SELECT trips.id AS id, trip_specifications.trip_title from trips JOIN trip_specifications ON trips.id = trip_specifications.trip_id  WHERE trip_specifications.language_id = '".$_SESSION['language_id']."'  ";
			$this->Query($query);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
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
			/*echo '<pre>';
			print_r($trips);*/
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/show.php");		
		}
	
		function addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results1 = $data = $this->fetchArray();
				
				/*Getting Companies Start*/
				$query_comp ="SELECT * FROM  boatspecifications WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_comp);
				$boats = $this->fetchArray();
				/*Getting Companies Close*/
				/*Getting Operators Start*/
				$query_ttype ="SELECT * FROM  trip_types WHERE 1";
				$this->Query($query_ttype);
				$types = $this->fetchArray();
				/*Getting Operators Close*/
				
				/*Getting countries Start*/
				$query_con ="SELECT * FROM  countries WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_con);
				$countries = $this->fetchArray();
				/*Getting countries Close*/
				
				/*Getting Fuel Tanks*/
				$query_fuel_tank ="SELECT * FROM  fuel_tank WHERE 1";
				$this->Query($query_fuel_tank);
				$fuel_tanks = $dataTank = $this->fetchArray();
				
				foreach($dataTank as $dataval) {
					 $Tquery_all ="SELECT * FROM  `trip_fuel_tank` WHERE fuel_tank_id = '".$dataval['id']."' AND `trip_id` = '".$_REQUEST['id']."'";
					$this->Query($Tquery_all);
					$TallContents = $this->fetchArray();
					foreach($TallContents as $Tallcontent){
					$results['tankdata'][$dataval['id']] = $Tallcontent;
					}
				}
				/*echo '<pre>';
				print_r($results['tankdata']);*/
				
				/*Getting Fuel Tanks*/
				
				$query_com ="SELECT * FROM  trips WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results['common'] = $ComContents = $this->fetchObject();
					
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  trip_specifications WHERE trip_id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
				}
				/*echo '<pre>';
				print_r($results['common']);*/			
				require_once("views/".$this->name."/addnew.php");
			}
			else {				
				/*Getting Companies Start*/
				$query_comp ="SELECT * FROM  boatspecifications WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_comp);
				$boats = $this->fetchArray();
				/*Getting Companies Close*/
				/*Getting Operators Start*/
				$query_ttype ="SELECT * FROM  trip_types WHERE 1";
				$this->Query($query_ttype);
				$types = $this->fetchArray();
				/*Getting Operators Close*/
				
				/*Getting countries Start*/
				$query_con ="SELECT * FROM  countries WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_con);
				$countries = $this->fetchArray();
				/*Getting countries Close*/
				
				/*Getting Fuel Tanks*/
				$query_fuel_tank ="SELECT * FROM  fuel_tank WHERE 1";
				$this->Query($query_fuel_tank);
				$fuel_tanks = $this->fetchArray();
				/*Getting Fuel Tanks*/
				
				 $query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results1 = $data = $this->fetchArray();
				
				require_once("views/".$this->name."/addnew.php");
			}
		}
		
		function save() {
			
			$languages = $this->langAll();
			
			$trip_gallery = $_FILES['trip_gallery'];
			
			$image = $_FILES['image']; 
						
			$language_id = $_SESSION['language_id'];
			$country_id = $_REQUEST['country_id'];  
			$boat_id = $_REQUEST['boat_id'];  
			$trip_type_id = $_REQUEST['trip_type_id'];  
			$start_date = $_REQUEST['start_date'];  
			$end_date = $_REQUEST['end_date'];  
			$no_of_days = $_REQUEST['no_of_days'];  
			$no_of_nights = $_REQUEST['no_of_nights'];  
			$no_of_dives = $_REQUEST['no_of_dives'];  
			$trip_price = $_REQUEST['trip_price'];
			$price_for_kids = $_REQUEST['price_for_kids'];
			$create_date = date("Y-m-d H:i:s"); 
			$modified_date = date("Y-m-d H:i:s"); 
			$status = 1; 
			
			if(!$_REQUEST['id'] and ($boat_id!='')) {	
				
				$query = "INSERT INTO `trips` ( `boat_id`, `trip_type_id`, `country_id`, `start_date`, `end_date`, `no_of_days`, `no_of_nights`, `no_of_dives`, `trip_price`, `price_for_kids`, `create_date`, `modified_date`, `status`) VALUES ('".$boat_id."', '".$trip_type_id."', '".$country_id."', '".$start_date."', '".$end_date."', '".$no_of_days."', '".$no_of_nights."', '".$no_of_dives."', '".$trip_price."', '".$price_for_kids."', '".$create_date."', '".$modified_date."', '".$status."')";
				$this->Query($query);
				$this->Execute();
				$currentID = mysql_insert_id();
				$trip_id = $currentID;	
				
				$folder_url = "media/trips/".$trip_id;
					if(!is_dir($folder_url))
						mkdir($folder_url);
				
				$imageFileName = "main_".$trip_id.str_replace(" ","_",$image['name']);
				
				$fullUrlImage = $folder_url."/".$imageFileName;
				
				$permitted = array('image/gif','image/jpeg','image/jpg','image/png');
				
				$typeOK = false;

					// check filetype is ok

				foreach($permitted as $type) {
	
					if($type == $image['type']) {
	
						$typeOK = true;
	
						break;
					}
				}
				
				if($typeOK && $image['name']){
				$success1 = move_uploaded_file($image['tmp_name'], $fullUrlImage);
						
				$queryImgUpdate = "UPDATE `trips` SET `image` = '".$fullUrlImage."' WHERE id = '".$currentID."'";
				$this->Query($queryImgUpdate);
				$this->Execute();
				
				}
		
				/*CODE FOR GALLERY START*/
				if(isset($trip_gallery)){
					$galleryUrl = $folder_url;
					if(!is_dir($galleryUrl))
						mkdir($galleryUrl);
				
				$typeOK7 = false;
						
					for($i = 0; $i <= count($trip_gallery); $i++) {
						$fileName = rand().str_replace(" ","_",$trip_gallery['name'][$i]);
						$fileTmpName = $trip_gallery['tmp_name'][$i];
						$fileType = $trip_gallery['type'][$i];
						$fullUrl = $galleryUrl."/".$fileName;
						
						
						foreach($permitted as $type) {
			
							if($type == $fileType) {
			
								$typeOK7 = true;
			
								break;
							}
						}		
						if($typeOK7 && $trip_gallery['name'][$i]){
						$success = move_uploaded_file($fileTmpName, $fullUrl);
						$query_Gal = "INSERT INTO `trip_gallery` (`trip_id`, `image`, `status`) VALUES ('".$currentID."', '".$fullUrl."', 1)";
						$this->Query($query_Gal);
						$this->Execute();
						
						}
					}	
						
				}
				/*CODE FOR GALLERY END*/
				
				
				
				/*Getting Fuel Tanks*/
				$query_fuel_tank ="SELECT * FROM  fuel_tank WHERE 1";
				$this->Query($query_fuel_tank);
				$fuel_tanks = $this->fetchArray();
				foreach($fuel_tanks as $tank){
					$fuel_tankId = $_REQUEST['fuel_tank'.$tank['id']];
					$ptype = $_REQUEST['ptype'.$tank['id']];
					if($ptype == 'paid')
					$fuelprice = $_REQUEST['fuelprice'.$tank['id']];
					else
					$fuelprice = 0;
					if($fuel_tankId){
					$query = "INSERT INTO `trip_fuel_tank` ( `trip_id`, `fuel_tank_id`, `tank_price`, `status`) VALUES ('".$trip_id."', '".$fuel_tankId."', '".$fuelprice."', '1')";
						$this->Query($query);
						$this->Execute();
					
					}
				}
				/*Getting Fuel Tanks*/
				
				
				foreach($languages as $language) {
					$trip_id = $currentID;
					$lang = $language_id = $language['id'];
					$trip_title = $_REQUEST['trip_title'.$lang]; 
					$specification = mysql_real_escape_string($_REQUEST['specification'.$lang]);
					$origin = $_REQUEST['origin'.$lang]; 
					$destination = $_REQUEST['destination'.$lang]; 
					
					$query = "INSERT INTO `trip_specifications` (`trip_id`, `language_id`, `trip_title`, `origin`, `destination`, `specification`) VALUES ('".$trip_id."', '".$language_id."', '".$trip_title."', '".$origin."', '".$destination."', '".$specification."')";
	
					$this->Query($query);
					$this->Execute();

				}
			}
			else {
				$currentID = $_REQUEST['id'];
				$trip_id = $currentID;	
				
					$folder_url = "media/trips/".$trip_id;
					if(!is_dir($folder_url))
						mkdir($folder_url);
				
				$imageFileName = "main_".$trip_id.str_replace(" ","_",$image['name']);
				
				$fullUrlimage = $folder_url."/".$imageFileName;
				
				$permitted = array('image/gif','image/jpeg','image/jpg','image/png');
				
				$typeOK = false;

					// check filetype is ok

				foreach($permitted as $type) {
	
					if($type == $image['type']) {
	
						$typeOK = true;
	
						break;
					}
				}
				
				if($typeOK && $image['name']){
				$success1 = move_uploaded_file($image['tmp_name'], $fullUrlimage);
						
		$queryImgUpdate = "UPDATE `trips` SET `image` = '".$fullUrlimage."' WHERE id = '".$currentID."'";
				$this->Query($queryImgUpdate);
				$this->Execute();
				
				}
			
				$query = "UPDATE `trips` SET `boat_id` = '".$boat_id."', `trip_type_id` = '".$trip_type_id."', `country_id` = '".$country_id."', `start_date` = '".$start_date."', `end_date` = '".$end_date."', `no_of_days` = '".$no_of_days."', `no_of_nights` = '".$no_of_nights."', `trip_price` = '".$trip_price."', `price_for_kids` = '".$price_for_kids."', `modified_date` = '".$modified_date."' WHERE id = '".$currentID."'";
				$this->Query($query);
				$this->Execute();
				
				
				/*CODE FOR GALLERY START*/
				if(isset($trip_gallery)){
					$galleryUrl = $folder_url;
					if(!is_dir($galleryUrl))
						mkdir($galleryUrl);
				
				$typeOK7 = false;
						
					for($i = 0; $i <= count($trip_gallery); $i++) {
						$fileName = rand().str_replace(" ","_",$trip_gallery['name'][$i]);
						$fileTmpName = $trip_gallery['tmp_name'][$i];
						$fileType = $trip_gallery['type'][$i];
						$fullUrl = $galleryUrl."/".$fileName;
						
						
						foreach($permitted as $type) {
			
							if($type == $fileType) {
			
								$typeOK7 = true;
			
								break;
							}
						}		
						if($typeOK7 && $trip_gallery['name'][$i]){
						$success = move_uploaded_file($fileTmpName, $fullUrl);
						$query_Gal = "INSERT INTO `trip_gallery` (`trip_id`, `image`, `status`) VALUES ('".$currentID."', '".$fullUrl."', 1)";
						$this->Query($query_Gal);
						$this->Execute();
						
						}
					}	
						
				}
				/*CODE FOR GALLERY END*/
				
				
				/*Getting Fuel Tanks*/
				$query_fuel_tank ="SELECT * FROM  fuel_tank WHERE 1";
				$this->Query($query_fuel_tank);
				$fuel_tanks = $this->fetchArray();
				foreach($fuel_tanks as $tank){
					$fuel_tankId = $_REQUEST['fuel_tank'.$tank['id']];
					$ptype = $_REQUEST['ptype'.$tank['id']];
					if($ptype == 'paid')
					$fuelprice = $_REQUEST['fuelprice'.$tank['id']];
					else
					$fuelprice = '';
					if($fuel_tankId){
						$fetch = "SELECT * FROM  `trip_fuel_tank` WHERE fuel_tank_id = '".$tank['id']."' AND `trip_id` = '".$trip_id."'";
						$this->Query($fetch);
						$Rsfuel_tanks = $this->fetchArray();
						if(!isset($Rsfuel_tanks)){
					$query = "INSERT INTO `trip_fuel_tank` ( `trip_id`, `fuel_tank_id`, `tank_price`, `status`) VALUES ('".$trip_id."', '".$fuel_tankId."', '".$fuelprice."', '1')";
						$this->Query($query);
						$this->Execute();
						}else{
					$query = "UPDATE `trip_fuel_tank` SET `tank_price` = '".$fuelprice."', `status` = 1 WHERE `fuel_tank_id` = '".$fuel_tankId."' AND `trip_id` = '".$trip_id."'";
						$this->Query($query);
						$this->Execute();
						}
					
					}
				}
				/*Getting Fuel Tanks*/
				
				
				foreach($languages as $language) {
					$trip_id = $currentID;
					$lang = $language_id = $language['id'];
					$trip_title = $_REQUEST['trip_title'.$lang]; 
					$specification = mysql_real_escape_string($_REQUEST['specification'.$lang]);
					$origin = $_REQUEST['origin'.$lang]; 
					$destination = $_REQUEST['destination'.$lang]; 
					
					 $query = "UPDATE `trip_specifications` SET `trip_title` = '".$trip_title."', `specification` = '".$specification."', `origin` = '".$origin."',`destination` = '".$destination."' WHERE trip_id = '".$currentID."' AND language_id = '".$lang."'";
							$this->Query($query);
							$this->Execute();
							
				}
			}
		
		$this->show();
		}
		
		
		
		function delete(){
			
						
			$query = "DELETE FROM trip_specifications WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($query);
			$this->Execute();
			
			$query = "DELETE FROM trips WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				//$this->show();
				header('location:index.php?control=trip');
		}
		
		
		
	}