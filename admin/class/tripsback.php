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
			echo $query ="SELECT trips.id AS id, trip_specifications.trip_title from trips JOIN trip_specifications ON trips.id = trip_specifications.trip_id  WHERE trip_specifications.language_id = '".$_SESSION['language_id']."'  ";
			$this->Query($query);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 5;//PERPAGE;//$tdata; // 20 by default
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
				
				/*Getting equipments Start*/
				$query_eq ="SELECT * FROM  `equipments`  WHERE  language_id =  '".$_SESSION['language_id']."'";				
				$this->Query($query_eq);
				$equipments = $this->fetchArray();
				
				/*Getting beverages Start*/
				$query_bv ="SELECT * FROM  `beverages`  WHERE  language_id =  '".$_SESSION['language_id']."'";				
				$this->Query($query_bv);
				$beverages = $this->fetchArray();
				
				/*Getting foods Start*/
				$query_fd ="SELECT * FROM  `foods`  WHERE  language_id =  '".$_SESSION['language_id']."'";				
				$this->Query($query_fd);
				$foods = $this->fetchArray();
			
			if($_REQUEST['id']) {
				
				
				$q_schedule_for = "SELECT id FROM  trip_schedules WHERE trip_id = '".$_REQUEST['id']."' ORDER BY id";
				$this->Query($q_schedule_for);
				$scheduleid = $this->fetchArray();
				
				$query_trip_eq ="SELECT * FROM  `trip_equipments` WHERE trip_schedule_id = '".$scheduleid[0]['id']."' AND trip_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_trip_eq);
				$trip_equipments = $this->fetchArray();
				foreach($trip_equipments as $trip_eq) {
					$tripEq[$trip_eq['equipment_id']][] = $trip_eq;
				}
				
				/*Getting equipments Close*/
				
				/*GETTING SELECTED BOAT beverages START*/
				$query_boat_bv ="SELECT * FROM  `trip_beverages` WHERE trip_schedule_id = '".$scheduleid[0]['id']."' AND trip_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_boat_bv);
				$boat_beverages = $this->fetchArray();
				foreach($boat_beverages as $boat_bv) {
					$boatBv[$boat_bv['beverage_id']][] = $boat_bv;
				}
				/*GETTING SELECTED BOAT beverages END*/
				
				/*GETTING SELECTED BOAT foods START*/
				$query_boat_fd ="SELECT * FROM  `trip_foods` WHERE trip_schedule_id = '".$scheduleid[0]['id']."' AND trip_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_boat_fd);
				$boat_foods = $this->fetchArray();
				foreach($boat_foods as $boat_fd) {
					$boatFd[$boat_fd['food_id']][] = $boat_fd;
				}
				/*GETTING SELECTED BOAT foods END*/
				
				
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
				
				/*Getting Fuel Tanks*/
				
				$query_com ="SELECT * FROM  trips WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results['common'] = $ComContents = $this->fetchObject();
					$results['common']->destination_country_id;
				foreach($data as $lang) {
					$query_all ="SELECT * FROM  trip_specifications WHERE trip_id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
						$results['content'][$lang['id']] = $allcontent;
					}
				}
						
				require_once("views/".$this->name."/addnew.php");
			}
			else {				
				
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
			$destination_country_id = $_REQUEST['destination_country_id'];
			$origin_id = $_REQUEST['origin_id'];
			$destination_id = $_REQUEST['destination_id'];  
			$boat_id = $_REQUEST['boat_id'];  
			$trip_type_id = $_REQUEST['trip_type_id'];  
			$start_date = $_REQUEST['start_date'];  
			$end_date = $_REQUEST['end_date'];  
			$no_of_days = $_REQUEST['no_of_days'];  
			$no_of_nights = $_REQUEST['no_of_nights'];  
			$no_of_dives = $_REQUEST['no_of_dives'];  
			$trip_price = $_REQUEST['trip_price'];
			$price_for_diver = $_REQUEST['price_for_diver'];
			$price_for_kids = $_REQUEST['price_for_kids'];
			$create_date = date("Y-m-d H:i:s"); 
			$modified_date = date("Y-m-d H:i:s"); 
			$status = 1; 			
			
			if(!$_REQUEST['id'] and ($boat_id!='')) {	
				
				$query = "INSERT INTO `trips` ( `boat_id`, `trip_type_id`, `country_id`, `destination_country_id`, `origin_id`, `destination_id`, `start_date`, `end_date`, `no_of_days`, `no_of_nights`, `no_of_dives`, `trip_price`, `price_for_diver`, `price_for_kids`, `create_date`, `modified_date`, `status`) VALUES ('".$boat_id."', '".$trip_type_id."', '".$country_id."', '".$destination_country_id."', '".$origin_id."', '".$destination_id."', '".$start_date."', '".$end_date."', '".$no_of_days."', '".$no_of_nights."', '".$no_of_dives."', '".$trip_price."', '".$price_for_diver."', '".$price_for_kids."', '".$create_date."', '".$modified_date."', '".$status."')";
				
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
				
				/* insert trip_schedules module */
				$trip_schedules_query = "INSERT INTO `trip_schedules` (`trip_id`,`start_trip_datetime`,`end_trip_datetime`,`status`) values (".$trip_id.",'".date("Y-m-d H:i:s",strtotime($start_date))."','".date("Y-m-d H:i:s",strtotime($end_date))."',1)";
				$this->Query($trip_schedules_query);
				$this->Execute();
				$trip_schedule_id = mysql_insert_id();
				
				/* insert trip_schedules module */
				
				/* insert equipment module */
				if(count($_REQUEST['equipment'])) {
				$str = '';
					for($eq=0;$eq < count($_REQUEST['equipment']);$eq++){
						$str .= $str?",('".$trip_id."','".$trip_schedule_id."' , '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)":"('".$trip_id."','".$trip_schedule_id."' , '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)";
						
					}
					$equipment_query = "INSERT INTO `trip_equipments` (`trip_id`,`trip_schedule_id`,`equipment_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
					$this->Query($equipment_query);
					$this->Execute();
				}
				/* insert equipment module */
				
				
				/*#############################CODE FOR BOAT BEVERAGES INSERTION BEGIN#################################*/
					if(isset($_REQUEST['beverage'])):
						$str = '';
						for($eq=0;$eq < count($_REQUEST['beverage']);$eq++){
							$str .= $str?",('".$trip_id."','".$trip_schedule_id."', '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)":"('".$trip_id."','".$trip_schedule_id."', '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)";
							
						}
						$beverage_query = "INSERT INTO `trip_beverages` (`trip_id`,`trip_schedule_id`,`beverage_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
						$this->Query($beverage_query);
						$this->Execute();
					endif;
				/*#############################CODE FOR BOAT BEVERAGES INSERTION END#################################*/
				
				/*#############################CODE FOR BOAT FOODS INSERTION BEGIN#################################*/
					if(isset($_REQUEST['food'])):
						$str = '';
						for($eq=0;$eq < count($_REQUEST['food']);$eq++){
							$str .= $str?",('".$trip_id."','".$trip_schedule_id."', '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)":"('".$trip_id."','".$trip_schedule_id."', '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)";
							
						}
						$food_query = "INSERT INTO `trip_foods` (`trip_id`,`trip_schedule_id`,`food_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
						$this->Query($food_query);
						$this->Execute();
					endif;
				/*#############################CODE FOR BOAT FOODS INSERTION END#################################*/
				
				

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
					
					$query = "INSERT INTO `trip_specifications` (`trip_id`, `language_id`, `trip_title`, `specification`) VALUES ('".$trip_id."', '".$language_id."', '".$trip_title."', '".$specification."')";
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
				$query = "UPDATE `trips` SET `boat_id` = '".$boat_id."', `trip_type_id` = '".$trip_type_id."', `country_id` = '".$country_id."', `destination_country_id` = '".$destination_country_id."', `origin_id` = '".$origin_id."', `destination_id` = '".$destination_id."', `start_date` = '".$start_date."', `end_date` = '".$end_date."', `no_of_dives` ='".$no_of_dives."', `no_of_days` = '".$no_of_days."', `no_of_nights` = '".$no_of_nights."', `trip_price` = '".$trip_price."', `price_for_diver` = '".$price_for_diver."', `price_for_kids` = '".$price_for_kids."', `modified_date` = '".$modified_date."' WHERE id = '".$currentID."'";
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
				/*TRIP SCHEDULES UPDATE QUERY START*/
				
				$str = '';
				$q_schedule_for = "SELECT id FROM  trip_schedules WHERE trip_id = '".$trip_id."' ORDER BY id";
				$this->Query($q_schedule_for);
				$scheduleid = $this->fetchArray();
				
				$q_all_equp = "SELECT id FROM  equipments WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_equp);
				$count_equp = $this->fetchArray();
				$qq_del = "DELETE FROM trip_equipments WHERE `trip_id` = '".$trip_id."' and `trip_schedule_id` = '".$scheduleid[0]['id']."'  ";
				$this->Query($qq_del);
				if($this->Execute()) {
					$ii = 0;
					if(count($_REQUEST['equipment'])) {
						foreach($count_equp as $equp){
							if($_REQUEST['equipment'][$equp['id']]==$equp['id']) {
								$str .= $str?",('".$trip_id."','".$scheduleid[0]['id']."' , '".$_REQUEST['equipment'][$equp['id']]."','".$_REQUEST['eqprice'][$equp['id']]."','".$_REQUEST['eqtype'][$equp['id']]."',1)":"('".$trip_id."','".$scheduleid[0]['id']."' , '".$_REQUEST['equipment'][$equp['id']]."','".$_REQUEST['eqprice'][$equp['id']]."','".$_REQUEST['eqtype'][$equp['id']]."',1)";
							}
						}
						$equipment_query = "INSERT INTO `trip_equipments` (`trip_id`,`trip_schedule_id`,`equipment_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
						$this->Query($equipment_query);
						$this->Execute();
					}
				}
				/*TRIP SCHEDULES UPDATE QUERY END*/
				
				
				/*################################UPDATE BOAT BEVERAGE######################################*/
				
				$q_all_equp = "SELECT id FROM  beverages WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_equp);
				$count_equp = $this->fetchArray();
				$qq_del = "DELETE FROM trip_beverages WHERE `trip_id` = '".$trip_id."' and `trip_schedule_id` = '".$scheduleid[0]['id']."'  ";
				$this->Query($qq_del);
				if($this->Execute()) {
					$ii = 0;
					$str = '';
					if(isset($_REQUEST['beverage'])):
						foreach($count_equp as $equp){
							if($_REQUEST['beverage'][$equp['id']]==$equp['id']) {
								$str .= $str?",('".$trip_id."','".$scheduleid[0]['id']."' , '".$_REQUEST['beverage'][$equp['id']]."','".$_REQUEST['bvprice'][$equp['id']]."','".$_REQUEST['bvtype'][$equp['id']]."',1)":"('".$trip_id."','".$scheduleid[0]['id']."' , '".$_REQUEST['beverage'][$equp['id']]."','".$_REQUEST['bvprice'][$equp['id']]."','".$_REQUEST['bvtype'][$equp['id']]."',1)";
							}
						}
					$beverage_query = "INSERT INTO `trip_beverages` (`trip_id`,`trip_schedule_id`,`beverage_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
					$this->Query($beverage_query);
					$this->Execute();
					endif;
				}
				
				/*################################UPDATE BOAT BEVERAGE################################*/
			
			
				
				/*################################UPDATE BOAT FOOD######################################*/
				
				$q_all_equp = "SELECT id FROM  foods WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_equp);
				$count_equp = $this->fetchArray();
				$qq_del = "DELETE FROM trip_foods WHERE `trip_id` = '".$trip_id."' and `trip_schedule_id` = '".$scheduleid[0]['id']."'  ";
				$this->Query($qq_del);
				if($this->Execute()) {
					$ii = 0;
					$str = '';
					if(isset($_REQUEST['food'])):
						foreach($count_equp as $equp){
							if($_REQUEST['food'][$equp['id']]==$equp['id']) {
								$str .= $str?",('".$trip_id."','".$scheduleid[0]['id']."' , '".$_REQUEST['food'][$equp['id']]."','".$_REQUEST['fdprice'][$equp['id']]."','".$_REQUEST['fdtype'][$equp['id']]."',1)":"('".$trip_id."','".$scheduleid[0]['id']."' , '".$_REQUEST['food'][$equp['id']]."','".$_REQUEST['fdprice'][$equp['id']]."','".$_REQUEST['fdtype'][$equp['id']]."',1)";
							}
						}
					$food_query = "INSERT INTO `trip_foods` (`trip_id`,`trip_schedule_id`,`food_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
					$this->Query($food_query);
					$this->Execute();
					endif;
				}
				
				/*################################UPDATE BOAT FOOD################################*/
				
				
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
						}
						else{
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
					
					$query = "UPDATE `trip_specifications` SET `trip_title` = '".$trip_title."', `specification` = '".$specification."' WHERE trip_id = '".$currentID."' AND language_id = '".$lang."'";
					$this->Query($query);
					$this->Execute();							
				}
			}
			$this->show();
		}
		
		function delete(){
			$query_gallery = "SELECT * FROM trip_gallery WHERE trip_id = '".$_REQUEST['id']."'";
			$this->Query($query_gallery);
			$gallery_images = $this->fetchArray();
			foreach($gallery_images as $image) {
				unlink($image['image']);
			}
			rmdir("media/trips/".$_REQUEST['id']);
			$q_galler = "DELETE FROM trip_gallery WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_galler);
			$this->Execute();
			
			$q_equipments = "DELETE FROM trip_equipments WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_equipments);
			$this->Execute();
			
			$q_beverages = "DELETE FROM trip_beverages WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_beverages);
			$this->Execute();
			
			$q_foods = "DELETE FROM trip_foods WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_foods);
			$this->Execute();
			
			$q_specifications = "DELETE FROM trip_specifications WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_specifications);
			$this->Execute();
			
			$q_feul_tank = "DELETE FROM trip_fuel_tank WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_feul_tank);
			$this->Execute();
			
			$q_schedules = "DELETE FROM trip_schedules WHERE trip_id = ".$_REQUEST['id'];
			$this->Query($q_schedules);
			$this->Execute();
			
			$q_trips = "DELETE FROM trips WHERE id = ".$_REQUEST['id'];
			$this->Query($q_trips);
			$this->Execute();
			
			header('location:index.php?control=trip');
		}
		
		
		function schedule() {
			session_start();
			$query_fuel_tank ="SELECT ts.*,tsf.trip_title,bs.boat_name,(select count(ti.id) from trip_itinerary ti where ti.trip_schedule_id = ts.id ) countItinerary FROM trip_schedules ts  JOIN trip_specifications tsf ON ts.trip_id = tsf.trip_id JOIN trips t ON ts.trip_id = t.id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id WHERE ts.trip_id = '".$_REQUEST['trip_id']."' and tsf.language_id = '".$_SESSION['language_id']."' and bs.language_id = '".$_SESSION['language_id']."' ORDER BY last_update";
			$this->Query($query_fuel_tank);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/schedule.php");
			
		}
		
		function addschedule() {
			session_start();
			/*Getting trip Start*/
			$query_trip ="SELECT t.id,tsf.trip_title,bs.boat_name  FROM trips t JOIN trip_specifications tsf ON t.id = tsf.trip_id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id WHERE  tsf.trip_id = '".$_REQUEST['trip_id']."' and tsf.language_id = '".$_SESSION['language_id']."' and bs.language_id = '".$_SESSION['language_id']."'";
			$this->Query($query_trip);
			$trips = $this->fetchArray();
			/*Getting trip Close*/
				/*Getting equipments Start*/
				$query_eq ="SELECT * FROM equipments WHERE language_id = '".$_SESSION['language_id']."' and status = '1'";
				$this->Query($query_eq);
				$equipments = $this->fetchArray();
				/*Getting equipments END*/
				
				/*Getting beverages Start*/
				$query_bv ="SELECT * FROM  `beverages`  WHERE  language_id =  '".$_SESSION['language_id']."' and status = '1'";				
				$this->Query($query_bv);
				$beverages = $this->fetchArray();
				
				/*Getting foods Start*/
				$query_fd ="SELECT * FROM  `foods`  WHERE  language_id =  '".$_SESSION['language_id']."' and status = '1'";				
				$this->Query($query_fd);
				$foods = $this->fetchArray();
				
			
			if($_REQUEST['scheduleId']) {
				
				$query_trip_eq ="SELECT * FROM trip_equipments WHERE trip_id = '".$_REQUEST['trip_id']."' and trip_schedule_id = '".$_REQUEST['scheduleId']."'";
				$this->Query($query_trip_eq);
				$trip_equipments = $this->fetchArray();
				foreach($trip_equipments as $trip_equipment) {
					$arr[$trip_equipment['equipment_id']] = $trip_equipment;
				}
				
				$query_trip_bv ="SELECT * FROM trip_beverages WHERE trip_id = '".$_REQUEST['trip_id']."' and trip_schedule_id = '".$_REQUEST['scheduleId']."'";
				$this->Query($query_trip_bv);
				$trip_beverages = $this->fetchArray();
				foreach($trip_beverages as $trip_beverage) {
					$arrBV[$trip_beverage['beverage_id']] = $trip_beverage;
				}
				
				$query_trip_fd ="SELECT * FROM trip_foods WHERE trip_id = '".$_REQUEST['trip_id']."' and trip_schedule_id = '".$_REQUEST['scheduleId']."'";
				$this->Query($query_trip_fd);
				$trip_foods = $this->fetchArray();
				foreach($trip_foods as $trip_food) {
					$arrFD[$trip_food['food_id']] = $trip_food;
				}
				
				/*Getting equipments Close*/				
				$q_schedule = "SELECT * FROM trip_schedules WHERE id = '".$_REQUEST['scheduleId']."'";
				$this->Query($q_schedule);
				$schedules = $this->fetchArray();
			}
			
			require_once("views/".$this->name."/addschedule.php");
		}
		
		function scheduleSave() {
			session_start();
			
			
				$query_eq = "SELECT * FROM equipments WHERE language_id = '".$_SESSION['language_id']."' and status = '1'";
				$this->Query($query_eq);
				$equipments = $this->fetchArray();
				
				/*Getting beverages Start*/
				$query_bv ="SELECT * FROM  `beverages`  WHERE  language_id =  '".$_SESSION['language_id']."' and status = '1'";				
				$this->Query($query_bv);
				$beverages = $this->fetchArray();
				
				/*Getting foods Start*/
				$query_fd ="SELECT * FROM  `foods`  WHERE  language_id =  '".$_SESSION['language_id']."' and status = '1'";				
				$this->Query($query_fd);
				$foods = $this->fetchArray();
			
			
			
			if($_REQUEST['trip_id']) {
				if($_REQUEST['schedule_id']) {
					$q_schedule_update = "UPDATE trip_schedules SET start_trip_datetime = '".$_REQUEST['start_date']."', end_trip_datetime = '".$_REQUEST['end_date']."', trip_price = '".$_REQUEST['trip_price']."', last_update = '".date("Y-m-d H:i:s")."' WHERE id = '".$_REQUEST['schedule_id']."'";
					$this->Query($q_schedule_update);
					$this->Execute();
					
					/* #################################### *EQUIPMENTS* ######################################## */
					$q_del_equipment = "DELETE FROM trip_equipments WHERE trip_id = '".$_REQUEST['trip_id']."' and trip_schedule_id = '".$_REQUEST['schedule_id']."'";
					$this->Query($q_del_equipment);
					$this->Execute();
					$str = '';
					foreach($_REQUEST['equipment'] AS $eq=>$val){
						$str .= $str?",('".$_REQUEST['trip_id']."','".$_REQUEST['schedule_id']."' , '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)":"('".$_REQUEST['trip_id']."','".$_REQUEST['schedule_id']."' , '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)";
						
					}
					 $query_eq = "INSERT INTO `trip_equipments` (`trip_id`,`trip_schedule_id`,`equipment_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
							$this->Query($query_eq);
							$this->Execute();
					/* #################################### *EQUIPMENTS* ######################################## */
					
					/* #################################### *BEVERAGES* ######################################## */
					$q_del_beverage = "DELETE FROM trip_beverages WHERE trip_id = '".$_REQUEST['trip_id']."' and trip_schedule_id = '".$_REQUEST['schedule_id']."'";
					$this->Query($q_del_beverage);
					$this->Execute();
					$str = '';
					foreach($_REQUEST['beverage'] AS $eq=>$val){
						$str .= $str?",('".$_REQUEST['trip_id']."','".$_REQUEST['schedule_id']."' , '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)":"('".$_REQUEST['trip_id']."','".$_REQUEST['schedule_id']."' , '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)";
						
					}
					 $query_bv = "INSERT INTO `trip_beverages` (`trip_id`,`trip_schedule_id`,`beverage_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
							$this->Query($query_bv);
							$this->Execute();
					/* #################################### *BEVERAGES* ######################################## */
					
					/* #################################### *FOODS* ######################################## */
					$q_del_food = "DELETE FROM trip_foods WHERE trip_id = '".$_REQUEST['trip_id']."' and trip_schedule_id = '".$_REQUEST['schedule_id']."'";
					$this->Query($q_del_food);
					$this->Execute();
					$str = '';
					foreach($_REQUEST['food'] AS $eq=>$val){
						$str .= $str?",('".$_REQUEST['trip_id']."','".$_REQUEST['schedule_id']."' , '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)":"('".$_REQUEST['trip_id']."','".$_REQUEST['schedule_id']."' , '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)";
						
					}
					 $query_fd = "INSERT INTO `trip_foods` (`trip_id`,`trip_schedule_id`,`food_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
							$this->Query($query_fd);
							$this->Execute();
					/* #################################### *FOODS* ######################################## */
					
					
					
					
				}
				else {
					$q_schedule_insert = "INSERT INTO trip_schedules(`trip_id`,`start_trip_datetime`,`end_trip_datetime`,`trip_price`,`last_update`,`status`) VALUES('".$_REQUEST['trip_id']."','".$_REQUEST['start_date']."','".$_REQUEST['end_date']."','".$_REQUEST['trip_price']."','".date("Y-m-d H:i:s")."','1')";
					$this->Query($q_schedule_insert);
					$this->Execute();
					$trip_shedule_id = mysql_insert_id();
					
					/*################################## *EQUIPMENTS* ######################################*/
					if(isset($_REQUEST['equipment'])):
						$str = '';
						foreach($_REQUEST['equipment'] AS $eq=>$val){
							$str .= $str?",('".$_REQUEST['trip_id']."','".$trip_shedule_id."' , '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)":"('".$_REQUEST['trip_id']."','".$trip_shedule_id."' , '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)";
							
						}
						 $query_eq = "INSERT INTO `trip_equipments` (`trip_id`,`trip_schedule_id`,`equipment_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
								$this->Query($query_eq);
								$this->Execute();
					endif;		
					/*################################## *EQUIPMENTS* ######################################*/
					
					/*################################## *BEVERAGES* ######################################*/
					if(isset($_REQUEST['beverage'])):
						$str = '';
						foreach($_REQUEST['beverage'] AS $eq=>$val){
							$str .= $str?",('".$_REQUEST['trip_id']."','".$trip_shedule_id."' , '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)":"('".$_REQUEST['trip_id']."','".$trip_shedule_id."' , '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)";
							
						}
						 $query_bv = "INSERT INTO `trip_beverages` (`trip_id`,`trip_schedule_id`,`beverage_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
								$this->Query($query_bv);
								$this->Execute();
					endif;			
					/*################################## *BEVERAGES* ######################################*/
					
					/*################################## *FOODS* ######################################*/
					if(isset($_REQUEST['food'])):
						$str = '';
						foreach($_REQUEST['food'] AS $eq=>$val){
							$str .= $str?",('".$_REQUEST['trip_id']."','".$trip_shedule_id."' , '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)":"('".$_REQUEST['trip_id']."','".$trip_shedule_id."' , '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)";
							
						}
						 $query_fd = "INSERT INTO `trip_foods` (`trip_id`,`trip_schedule_id`,`food_id`,`eq_value`,`eq_type`,`eq_status`)values ".$str;
								$this->Query($query_fd);
								$this->Execute();
					endif;			
					/*################################## *FOODS* ######################################*/
					
					
					
				}
				//echo "Yes";
			}
			else {
				//echo "No";
			}
			session_start();
			$query_fuel_tank ="SELECT ts.*,tsf.trip_title,bs.boat_name,(select count(ti.id) from trip_itinerary ti where ti.trip_schedule_id = ts.id ) countItinerary FROM trip_schedules ts  JOIN trip_specifications tsf ON ts.trip_id = tsf.trip_id JOIN trips t ON ts.trip_id = t.id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id WHERE ts.trip_id = '".$_REQUEST['trip_id']."' and tsf.language_id = '".$_SESSION['language_id']."' and bs.language_id = '".$_SESSION['language_id']."' ORDER BY last_update";
			$this->Query($query_fuel_tank);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/schedule.php");	
		}
		function scheduleDelete() {
			session_start();
			$tripScheduleID = $_REQUEST['trip_id'];
			$scheduleId = $_REQUEST['scheduleId'];
			if($tripScheduleID) {
				$q_delete_equipment = "DELETE FROM `trip_equipments` WHERE trip_schedule_id = '".$scheduleId."'";
				$this->Query($q_delete_equipment);
				if($this->Execute()) {
					$q_delete_schedules = "DELETE FROM `trip_schedules` WHERE id = '".$scheduleId."'";
					$this->Query($q_delete_schedules);
					$this->Execute();
				}
			}
			$query_fuel_tank ="SELECT ts.*,tsf.trip_title,bs.boat_name,(select count(ti.id) from trip_itinerary ti where ti.trip_schedule_id = ts.id ) countItinerary FROM trip_schedules ts  JOIN trip_specifications tsf ON ts.trip_id = tsf.trip_id JOIN trips t ON ts.trip_id = t.id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id WHERE ts.trip_id = '".$_REQUEST['trip_id']."' and tsf.language_id = '".$_SESSION['language_id']."' and bs.language_id = '".$_SESSION['language_id']."' ORDER BY last_update";
			$this->Query($query_fuel_tank);
			$results = $this->fetchArray();
			require_once("../views/".$this->name."/schedule.php");
		}
		
		
		function scheduleStatus() {
			session_start();
			$tripScheduleID = $_REQUEST['trip_id'];
			$scheduleId = $_REQUEST['scheduleId'];
			if($tripScheduleID) {
				$q = "SELECT status FROM trip_schedules WHERE id = '".$scheduleId."'";
				$this->Query($q);
				$results = $this->fetchArray();
				if(count($results)) {
					$status = $results[0]['status']?"0":"1";
					$tripStatus = "UPDATE `trip_schedules` SET status = '".$status."' WHERE id = '".$scheduleId."'";
					$this->Query($tripStatus);
					$this->Execute();
				}
			}	
				$query_fuel_tank ="SELECT ts.*,tsf.trip_title,bs.boat_name,(select count(ti.id) from trip_itinerary ti where ti.trip_schedule_id = ts.id ) countItinerary FROM trip_schedules ts  JOIN trip_specifications tsf ON ts.trip_id = tsf.trip_id JOIN trips t ON ts.trip_id = t.id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id WHERE ts.trip_id = '".$_REQUEST['trip_id']."' and tsf.language_id = '".$_SESSION['language_id']."' and bs.language_id = '".$_SESSION['language_id']."' ORDER BY last_update";
			$this->Query($query_fuel_tank);
			$results = $this->fetchArray();
			require_once("../views/".$this->name."/schedule.php");			
		}
		function itinerary() {
			$scheduleID = $_REQUEST['scheduleId'];
			$tripID = $_REQUEST['tripId'];
			$tripItineraryID = $_REQUEST['tripItineraryID'];
			$query_lang = "SELECT * FROM languages WHERE 1";
			$this->Query($query_lang);
			$results1 = $data = $this->fetchArray();
			
			
			//SELECT CURRENT COUNTRY
			$q_country = "SELECT * FROM countries WHERE language_id = '1' ORDER BY country ";
			$this->Query($q_country);
			$countrys = $this->fetchArray();
			//END SELECT CURRENT COUNTRY
			
			if($tripItineraryID) {
				//$q = "select * from trip_itinerary  where id = (select max(t.id) from trip_itinerary t where t.trip_id = '".$tripID."' and t.trip_schedule_id = '".$scheduleID."')  ORDER BY id DESC ";
				$q = "select * from trip_itinerary  where id = '".$tripItineraryID."'  ORDER BY id DESC ";
						$this->Query($q);
						$results = $this->fetchArray();
				//if($this->isFirstItinerary($tripItineraryID,$scheduleID,$tripID)) {
					/*################## EDIT VERY VERY FIRST ITINERARY OF THIS SCHEDULE#######################START###########*/							
						//$q = "select * from trip_itinerary  where id = (select max(t.id) from trip_itinerary t where t.trip_id = '".$tripID."' and t.trip_schedule_id = '".$scheduleID."')  ORDER BY id DESC ";
						//$this->Query($q);
						//$results = $this->fetchArray();
					/*################## EDIT VERY VERY FIRST ITINERARY OF THIS SCHEDULE#######################END#############*/
				//}
				//else {					
					/*################## EDIT ITINERARY OF THIS SCHEDULE#######################START###########*/
					
					/*################## EDIT ITINERARY OF THIS SCHEDULE#######################END#############*/
				//}
			}
			else {
				if($this->countItinerary($scheduleID,$tripID)) {
					$this->lastItinerary($scheduleID);
					/*################## ADD ITINERARY OF THIS SCHEDULE#######################START###########*/
					$q = "select * from trip_itinerary ti JOIN trip_schedules ts ON ti.trip_schedule_id = ts.id  where ti.id = (select max(t.id) from trip_itinerary t where t.trip_id = '".$tripID."' and t.trip_schedule_id = '".$scheduleID."')  ORDER BY ti.id DESC ";
					$this->Query($q);
					$max_id = $this->fetchArray();
					print_r();
					
					$q_trip = "SELECT country_id, origin_id, start_date FROM trips WHERE id = '".$tripID."' ";
					$this->Query($q_trip);
					$trips = $this->fetchArray();
					
					$origin_country = $trips[0]['country_id'];
					$origin_city = $trips[0]['origin_id'];
					$start_date = $trips[0]['start_date'];
					/*################## ADD ITINERARY OF THIS SCHEDULE#######################END#############*/
				}
				else {
					/*################## ADD VERY VERY FIRST ITINERARY OF THIS SCHEDULE#######################START###########*/
					$q_trip = "SELECT country_id, origin_id, start_date FROM trips WHERE id = '".$tripID."' ";
					$this->Query($q_trip);
					$trips = $this->fetchArray();
			
					$origin_country = $trips[0]['country_id'];
					$origin_city = $trips[0]['origin_id'];
					$start_date = $trips[0]['start_date'];
					
					/*################## ADD VERY VERY FIRST ITINERARY OF THIS SCHEDULE#######################END#############*/
				}
			}
			
			$q_origin = "SELECT id,city FROM cities  WHERE country_id = '".$results[0]['deprture_country_id']."' and language_id = '1'";
			$this->Query($q_origin);
			$origins = $this->fetchArray();
			
			$q_destination = "SELECT id,city FROM cities  WHERE country_id = '".$results[0]['arrival_country_id']."' and language_id = '1'";
			$this->Query($q_destination);
			$destination = $this->fetchArray();
			
			$query = "SELECT tit.*  FROM trips t  JOIN trip_schedules tsl ON t.id = tsl.trip_id JOIN trip_itinerary tit ON tsl.id = tit.trip_schedule_id  WHERE  tsl.id = '".$scheduleID."' ORDER BY tit.id DESC ";
			$this->Query($query);
			$itinerarys = $this->fetchArray();
			
			$query_itinerary = "SELECT *  FROM trip_itinerary_details WHERE trip_itinerary_id = '".$tripItineraryID."' ORDER BY id DESC ";
			$this->Query($query_itinerary);
			$itinerary_detail = $this->fetchArray();
			
			foreach($itinerary_detail as $detail) {
				$results['content'][$detail['language_id']]['night_schedule'] = $detail['night_schedule'];
				$results['content'][$detail['language_id']]['detail'] = $detail['detail'];
			}
			require_once("views/".$this->name."/itinerary.php");
			
		}
		function firstItineraryID($scheduleID) {
			
		}
		function lastItinerary($scheduleID) {
			$query = "SELECT arrival_country_id, arrival_place, arrival_time, stay_hour, itinerary_date FROM trip_itinerary WHERE trip_schedule_id = '".$scheduleID."'  order by id DESC ";
			$this->Query($query);
			$data = $this->fetchArray(); 
			$dTimes = explode(":",$data[0]['arrival_time']);
			echo $data[0]['arrival_time'];
			print_r($dTimes);
			if($dTimes == "PM") {
				$counter = 12;
			}
			$dTime = $dTimes[0] + $counter + $data[0]['stay_hour'];
			$addOneDay = $dTime>24?86400
			$result['departure_time'] = $dTimes+$data[0]['stay_hour'];
			$result['country_id'] = $data[0]['stay_hour'];
			$result['country_id'] = date("Y-m-d",strtotime($data[0]['itinerary_date']));
			
			$result['country_id'] = $data[0]['arrival_country_id'];
			$result['departure_place'] = $data[0]['arrival_place'];
		}
		function isFirstItinerary($tripItineraryID,$scheduleID,$tripID) {
			$query = "SELECT * FROM trip_itinerary WHERE trip_id = '".$tripID."'and trip_schedule_id = '".$scheduleID."' and id <= '".$tripItineraryID."' order by id asc";
			$this->Query($query);
			$data = $this->fetchArray();
			return ($data[0]['id']==$tripItineraryID)?(1):(0);			
		}
		function countItinerary($scheduleID,$tripID) {
			$query = "SELECT * FROM trip_itinerary WHERE trip_id = '".$tripID."'and trip_schedule_id = '".$scheduleID."'";
			$this->Query($query);
			return $this->rowCount();		
		}
		function itinerary_old() {
			$scheduleID = $_REQUEST['scheduleId'];
			$tripID = $_REQUEST['tripId'];
			$tripItineraryID = $_REQUEST['tripItineraryID'];
			$query_lang = "SELECT * FROM languages WHERE 1";
			$this->Query($query_lang);
			$results1 = $data = $this->fetchArray();
			
			if($tripItineraryID) {
				$q_itinerary = "select tit.*, c.country_id from trip_itinerary tit JOIN cities c ON tit.arrival_place = c.id JOIN countries cntr ON c.country_id = cntr.id where tit.id = '".$tripItineraryID."' ";
				$this->Query($q_itinerary);
				$results = $this->fetchArray();
				
				$q = "select * from trip_itinerary where id = (select max(t.id) from trip_itinerary t where t.trip_id = '".$tripID."' and t.trip_schedule_id = '".$scheduleID."' ".($tripItineraryID?" and id < '".$tripItineraryID."'":"").") ".($tripItineraryID?" and id != '".$tripItineraryID."'":"")."  ORDER BY id DESC ";
				$this->Query($q);
				$max_id = $this->fetchArray();
				if(count($max_id)) {
					//######################################################################################################/////
					//###################      EDIT ENTRY OF ITINERARY FOR THE SCHEDULE ##   START   #######################/////
					//######################################################################################################/////
					$last_itinerary_id = $max_id[0]['id'];
					$last_origin_city_id = $max_id[0]['arrival_place'];			
					$last_destination_city_id = $max_id[0]['departure_place'];	
					
					$last_origin_country_id = $results[0]['arrival_place'];			
					$last_destination_country_id = $results[0]['departure_place'];	
									
					//######################################################################################################/////
					//###################      EDIT ENTRY OF ITINERARY FOR THE SCHEDULE ##    END    #######################/////
					//######################################################################################################/////
					
				}
				else {					
					//######################################################################################################/////
					//###################      EDIT FIRST ENTRY OF ITINERARY FOR THE SCHEDULE ##   START   #################/////
					//######################################################################################################/////
					 $q_no_itinerary = "select tit.*, c.country_id from trip_itinerary tit JOIN cities c ON tit.arrival_place = c.id JOIN countries cntr ON c.country_id = cntr.id where tit.id = '".$tripItineraryID."' ";
					$this->Query($q_no_itinerary);
					$data_itinerary = $this->fetchArray();
					$last_itinerary_id = $data_itinerary[0]['id'];
					$last_origin_city_id = $data_itinerary[0]['arrival_place'];			
					$last_destination_city_id = $data_itinerary[0]['departure_place'];
					//######################################################################################################/////
					//###################      EDIT FIRST ENTRY OF ITINERARY FOR THE SCHEDULE ##    END   ##################/////
					//######################################################################################################/////
					
				}
			}
			else {
				$q = "select * from trip_itinerary  where id = (select max(t.id) from trip_itinerary t where t.trip_id = '".$tripID."' and t.trip_schedule_id = '".$scheduleID."')  ORDER BY id DESC ";
				$this->Query($q);
				$max_id = $this->fetchArray();
				if(count($max_id)) {
					//######################################################################################################/////
					//###################      MORE ENTRY OF ITINERARY FOR THE SCHEDULE START      ########################/////
					//######################################################################################################/////
					$last_itinerary_id = $max_id[0]['id'];
					$last_origin_city_id = $max_id[0]['arrival_place'];			
					$last_destination_city_id = $max_id[0]['departure_place'];					
					//######################################################################################################/////
					//###################      MORE ENTRY OF ITINERARY FOR THE SCHEDULE END      ########################/////
					//######################################################################################################/////
				}
				else {					
					//######################################################################################################/////
					//###################      FIRST ENTRY OF ITINERARY FOR THE SCHEDULE START      ########################/////
					//######################################################################################################/////
					$q_no_itinerary = "SELECT * FROM trips t JOIN trip_schedules ts ON t.id = ts.trip_id WHERE ts.id = '".$scheduleID."'";
					$this->Query($q_no_itinerary);
					$data_itinerary = $this->fetchArray();
					$last_itinerary_id = 0;//$data_itinerary[0]['id'];
					$last_origin_city_id = $data_itinerary[0]['arrival_place'];			
					$last_destination_city_id = $data_itinerary[0]['departure_place'];
					//######################################################################################################/////
					//###################       FIRST ENTRY OF ITINERARY FOR THE SCHEDULE END       ########################/////
					//######################################################################################################/////
				}
			}
			
			
			
			////LAST ITINERARY ORIGIN AND DESTINATION COUNTRY ID//////////////////  QUERY START///////////////////////
			/*echo $q_past_itinerary_origin_country = "SELECT country_id FROM cities where id = '".$last_origin_city_id."'";
			$this->Query($q_past_itinerary_origin_country);
			$past_origin_countrys = $this->fetchArray();
			echo $last_origin_country = $past_origin_countrys[0]['country_id'];
			
			echo $q_past_itinerary_dest_country = "SELECT country_id FROM cities where id = '".$last_destination_city_id."'";
			$this->Query($q_past_itinerary_dest_country);
			$past_destination_countrys = $this->fetchArray();
			echo $last_dest_country = $past_destination_countrys[0]['country_id'];*/
			////LAST ITINERARY ORIGIN AND DESTINATION COUNTRY ID//////////////////  QUERY END///////////////////////
			
			//SELECT CURRENT COUNTRY
			$q_country = "SELECT * FROM countries WHERE language_id = '1' ORDER BY country ";
			$this->Query($q_country);
			$countrys = $this->fetchArray();			
			//END SELECT CURRENT COUNTRY
			
			$q_origin = "SELECT id,city FROM cities  WHERE country_id = '".$last_origin_country."' and language_id = '1'";
			$this->Query($q_origin);
			$origins = $this->fetchArray();
			
			//$query = "SELECT tit.id,ts.trip_title, tit.departure_time,tit.arrival_time  FROM trips t JOIN trip_specifications ts ON t.id = ts.trip_id JOIN trip_schedules tsl ON t.id = tsl.trip_id JOIN trip_itinerary tit ON ts.id = tit.trip_schedule_id  WHERE ts.language_id = '1' and tsl.id = '".$scheduleID."' ";
			$query = "SELECT tit.*  FROM trips t  JOIN trip_schedules tsl ON t.id = tsl.trip_id JOIN trip_itinerary tit ON tsl.id = tit.trip_schedule_id  WHERE  tsl.id = '".$scheduleID."' ORDER BY id DESC ";
			$this->Query($query);
			$itinerarys = $this->fetchArray();
			require_once("views/".$this->name."/itinerary.php");
		}
		function addItinerary() {
			require_once("../views/".$this->name."itinerary.php");
		}
		
		function saveItinerary() {
			
			session_start();
			$scheduleID = $_REQUEST['scheduleId'];
			$tripID = $_REQUEST['tripId'];
			$itineraryId = $_REQUEST['tripItineraryID'];
			
			$deprture_country_id = $_REQUEST['current_country'];
			$arrival_country_id = $_REQUEST['new_country'];			
			$departure_place = $_REQUEST['departure_place'];
			$arrival_place = $_REQUEST['arrival_place'];
			
			$no_of_dive = $_REQUEST['no_of_dive'];
			
			$itinerary_date = $_REQUEST['itinerary_date'];
			
			$departure_hour = $_REQUEST['departure_hour'];
			$departure_min = $_REQUEST['departure_min'];
			$departure_format = $_REQUEST['departure_format'];
			$departure_time = $departure_hour.":".$departure_min.":".$departure_format;
			
			$arrival_hour = $_REQUEST['arrival_hour'];
			$arrival_min = $_REQUEST['arrival_min'];
			$arrival_format = $_REQUEST['arrival_format'];
			$arrival_time = $arrival_hour.":".$arrival_min.":".$arrival_format;

			$stay_hour = $_REQUEST['stay_hour'];
			$detail = $_REQUEST['detail'];
			$detail = $_REQUEST['detail'];
			if($itineraryId) {
			
				$str .= $str?($deprture_country_id?(", deprture_country_id = '".$deprture_country_id."'"):""):($deprture_country_id?("deprture_country_id = '".$deprture_country_id."'"):"");
				$str .= $str?($arrival_country_id?(", arrival_country_id = '".$arrival_country_id."'"):""):($arrival_country_id?("arrival_country_id = '".$arrival_country_id."'"):"");				
				$str .= $str?($departure_place?(", departure_place = '".$departure_place."'"):""):($departure_place?("departure_place = '".$departure_place."'"):"");
				$str .= $str?($arrival_place?(", arrival_place = '".$arrival_place."'"):""):($arrival_place?("arrival_place = '".$arrival_place."'"):"");
				
				$str .= $str?($departure_time?(", departure_time = '".$departure_time."'"):""):($departure_time?("departure_time = '".$departure_time."'"):"");
				$str .= $str?($arrival_time?(", arrival_time = '".$arrival_time."'"):""):($arrival_time?("arrival_time = '".$arrival_time."'"):"");
				
				$str .= $str?($no_of_dive?(", no_of_dive = '".$no_of_dive."'"):""):($no_of_dive?("no_of_dive = '".$no_of_dive."'"):"");
				$str .= $str?($itinerary_date?(", itinerary_date = '".$itinerary_date."'"):""):($itinerary_date?("itinerary_date = '".$itinerary_date."'"):"");
				
				$str .= $str?($stay_hour?(", stay_hour = '".$stay_hour."'"):""):($stay_hour?("stay_hour = '".$stay_hour."'"):"");
				//$str .= $str?($stay_hour?(", detail = '".$detail."'"):""):($detail?("detail = '".$detail."'"):"");
				
				if($str) {
					$query = "UPDATE trip_itinerary SET ".$str." WHERE trip_id = '".$tripID."' and trip_schedule_id = '".$scheduleID."' and id = '".$itineraryId."'";
					$this->Query($query);
					$this->Execute();
					
					$this->Query("SELECT * FROM languages WHERE status = '1'");
					$langs = $this->fetchArray();
					if(count($langs)) {
						foreach($langs as $lang) {
							$this->Query("SELECT * FROM trip_itinerary_details WHERE trip_itinerary_id = '".$itineraryId."' and language_id = '".$lang['id']."' ");
							$chk = $this->fetchArray();
							if(count($chk)) {
								$query = "UPDATE trip_itinerary_details SET night_schedule = '".$_REQUEST["night_schedule".$lang['id']]."', detail = '".$_REQUEST["detail".$lang['id']]."' WHERE  trip_itinerary_id = '".$itineraryId."' and language_id = '".$lang['id']."'";	
							}
							else {
								$query = "INSERT INTO `trip_itinerary_details` (`trip_itinerary_id`, `language_id`, `night_schedule`, `detail`, `status`) VALUES
('".$itineraryId."', '".$lang['id']."', '".$_REQUEST["night_schedule".$lang['id']]."', '".$_REQUEST["detail".$lang['id']]."', 1)";
							}
							$this->Query($query);
							$this->Execute();
						}
						
					}
					
					$this->Query($query);
					$this->Execute();
				}
				
			}
			else {
				
				$query = "INSERT INTO trip_itinerary(trip_id,trip_schedule_id,deprture_country_id,arrival_country_id,departure_place,arrival_place,departure_time,arrival_time, stay_hour,itinerary_date,no_of_dive,status) VALUES('".$tripID."','".$scheduleID."','".$deprture_country_id."','".$arrival_country_id."','".$departure_place."','".$arrival_place."','".$departure_time."','".$arrival_time."','".$stay_hour."','".$itinerary_date."','".$no_of_dive."','1')";
			
				$this->Query($query);
				$this->Execute();
				$insertedID = mysql_insert_id();
				$this->Query("SELECT * FROM languages WHERE status = '1'");
				$langs = $this->fetchArray();
				if(count($langs)) {
					foreach($langs as $lang) {
						echo $querydeatil = "INSERT INTO trip_itinerary_details (trip_itinerary_id,language_id,night_schedule,detail,status) VALUES('".$insertedID."','".$_SESSION['language_id']."','".$_REQUEST["night_schedule".$lang['id']]."','".$_REQUEST["detail".$lang['id']]."','1')";					
						$this->Query($querydeatil);
						$this->Execute();
					}
				}
				
				/*$query = "SELECT ts.trip_title, tit.departure_time,tit.arrival_time  FROM trips t JOIN trip_specifications ts ON t.id = ts.trip_id JOIN trip_schedules tsl ON t.id = tsl.trip_id JOIN trip_itinerary tit ON ts.id = tit.trip_schedule_id  WHERE ts.language_id = '1' and tsl.id = '".$scheduleID."' ";
				$this->Query($query);
				$itinerarys = $this->fetchArray();*/
			
				
			}
			//SELECT CURRENT COUNTRY
			$q_country = "SELECT * FROM countries WHERE language_id = '1' ORDER BY country ";
			$this->Query($q_country);
			$countrys = $this->fetchArray();
			//END SELECT CURRENT COUNTRY
			
			$query_lang = "SELECT * FROM languages WHERE 1";
			$this->Query($query_lang);
			$results1 = $data = $this->fetchArray();
			
			$q_origin = "SELECT id,city FROM cities  WHERE country_id = '".$results[0]['deprture_country_id']."' and language_id = '1'";
			$this->Query($q_origin);
			$origins = $this->fetchArray();
			
			$q_destination = "SELECT id,city FROM cities  WHERE country_id = '".$results[0]['arrival_country_id']."' and language_id = '1'";
			$this->Query($q_destination);
			$destination = $this->fetchArray();
			
			$query = "SELECT distinct(tit.trip_schedule_id), tit.*, tid.night_schedule, tid.detail  FROM trips t  JOIN trip_schedules tsl ON t.id = tsl.trip_id JOIN trip_itinerary tit ON tsl.id = tit.trip_schedule_id JOIN trip_itinerary_details tid ON tit.id = tid.trip_itinerary_id  WHERE  tsl.id = '".$scheduleID."' GROUP BY tit.trip_schedule_id ORDER BY id DESC ";
			$this->Query($query);
			$itinerarys = $this->fetchArray();
			//require_once("views/".$this->name."/itinerary.php");
			
			header("location:index.php?control=trip&task=itinerary&scheduleId=".$scheduleID."&tripId=".$tripID);
		}
		
	
		
		
		function cityByCountryId($id) {
			$q_city = "SELECT id,city FROM cities  WHERE country_id = '".$id."' and status = '1' and language_id = '1'";
			$this->Query($q_city);
			$data = $this->fetchArray();
			return $data;
		}
		function cityById($id) {
			$q_city = "SELECT id,city FROM cities  WHERE id = '".$id."' and language_id = '1'";
			$this->Query($q_city);
			$data = $this->fetchArray();
			return $data[0]['city'];
		}
		function countryByCityId($id) {
			$q_country_by_city = "SELECT cntr.* FROM countries cntr JOIN cities c ON cntr.id = c.country_id  WHERE c.id = '".$id."' and cntr.language_id = '1'";
			$this->Query($q_country_by_city);
			$country_by_city = $this->fetchArray();
			return $country_by_city[0]['id'];
		}
		
		function lastScheduleItinerary() {
			$query = "SELECT ts.id,ts.start_trip_datetime start_date,ts.end_trip_datetime end_date,ts.trip_id FROM trips t JOIN trip_schedules ts ON t.id = ts.trip_id WHERE ts.id != '".$_REQUEST['trip_schedule_id']."' and ts.trip_id = (select distinct(tsl.trip_id) from trip_schedules tsl where tsl.id = '".$_REQUEST['trip_schedule_id']."') and ts.status = '1' ";
			$this->Query($query);
			$results = $this->fetchArray();
			require_once("../views/".$this->name."/lastScheduleItinerary.php");
			die;	
		}
		function saveOldItinerary() {
			
			$chooseScheduleId = $_REQUEST['chooseScheduleId'];
			$tripId = $_REQUEST['tripId'];
			$scheduleId = $_REQUEST['scheduleId'];
			$query = "SELECT * FROM trip_itinerary WHERE trip_schedule_id = '".$chooseScheduleId."' ORDER BY id";
			$this->Query($query);
			$data = $this->fetchArray();
			
			$str = '';
			foreach($data as $result) {
				/*$str .= $str?",( '".$tripId."', '".$scheduleId."', '".$result['deprture_country_id']."', '".$result['arrival_country_id']."', '".$result['departure_place']."', '".$result['arrival_place']."', '".$result['departure_time']."', '".$result['arrival_time']."', '".$result['dive_time']."', '".$result['date_days']."', '".$result['no_of_dive']."', 1)":"( '".$tripId."', '".$scheduleId."', '".$result['deprture_country_id']."', '".$result['arrival_country_id']."', '".$result['departure_place']."', '".$result['arrival_place']."', '".$result['departure_time']."', '".$result['arrival_time']."', '".$result['dive_time']."', '".$result['date_days']."', '".$result['no_of_dive']."', 1)";*/
				
				$query = "INSERT INTO `trip_itinerary` (`trip_id`, `trip_schedule_id`, `deprture_country_id`, `arrival_country_id`, `departure_place`, `arrival_place`, `departure_time`, `arrival_time`, `stay_hour`, `itinerary_date`, `no_of_dive`, `status`) VALUES ( '".$tripId."', '".$scheduleId."', '".$result['deprture_country_id']."', '".$result['arrival_country_id']."', '".$result['departure_place']."', '".$result['arrival_place']."', '".$result['departure_time']."', '".$result['arrival_time']."', '".$result['dive_time']."', '".$result['date_days']."', '".$result['no_of_dive']."', 1)";
				$this->Query($query);
				if($this->Execute()) {
					$itinerary_new_id = mysql_insert_id();
					$query_detail = "SELECT * FROM trip_itinerary_details WHERE trip_itinerary_id = '".$result['id']."' ORDER BY id";
					$this->Query($query_detail);
					$data_old_itinerary_details = $this->fetchArray();
					if(count($data_old_itinerary_details)) {
						foreach($data_old_itinerary_details as $detail) {
							$str = '';
							$str .= $str?",('".$itinerary_new_id."', '".$detail['language_id']."', '".$detail['night_schedule']."', '".$detail['detail']."', '1')":"('".$itinerary_new_id."', '".$detail['language_id']."', '".$detail['night_schedule']."', '".$detail['detail']."', '1')";
						}
						$query_for_itinerary_detail_write = "INSERT INTO `trip_itinerary_details` (`trip_itinerary_id`, `language_id`, `night_schedule`, `detail`, `status`) VALUES ".$str;
						$this->Query($query_for_itinerary_detail_write);
						$this->Execute();
					}
				}
			}
			
			
			
			header("location:index.php?control=trip&task=itinerary&tripId=".$tripId."&scheduleId=".$_REQUEST['scheduleId']);
		}
		function saveNewItinerary() {
			header("location:index.php?control=trip&task=itinerary&tripId=".$_REQUEST['tripId']."&scheduleId=".$_REQUEST['scheduleId']);
		}
		function itinerarySave() {
			echo "test to save itinerary.";
			die;
			header("location:index.php?control=trip&task=itinerary&tripId=".$_REQUEST['tripId']."&scheduleId=".$_REQUEST['scheduleId']);
		}
		function test() {
			echo "test";	
		}
		
	}