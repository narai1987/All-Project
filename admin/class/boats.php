<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class boatClass extends DbAccess {
		public $view='';
		public $name='boat';
		
		
		
		function getAjaxBranch(){
		  $query_compBranch ="SELECT id, branch_name FROM  company_branch_address WHERE language_id = '".$_SESSION['language_id']."' AND company_id = '".$_REQUEST['company_id']."'";
				$this->Query($query_compBranch);
				$branches = $this->fetchArray();
					$optionHtml = '<option value="" >Select Branch</option>';
				foreach($branches AS $branch){
					$optionHtml .= '<option value="'.$branch['id'].'" >'.$branch['branch_name'].'</option>';
				}
				
				echo $optionHtml;
		}
				
		function show($view) {	
			
			$query ="SELECT bs.boat_name,bs.boat_id,b.boat_price,b.established FROM boatspecifications bs JOIN"
			. "\n boats b ON b.id = bs.boat_id WHERE language_id = '".$_SESSION['language_id']."'"
			. "\n ORDER BY b.established DESC";
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
			$boats = $this->fetchArray(); 	
			
		if($boats=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
			$boat ="SELECT bs.boat_name,bs.boat_id,b.boat_price,b.established FROM boatspecifications bs JOIN"
			. "\n boats b ON b.id = bs.boat_id WHERE language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($boat);
			$boats = $this->fetchArray(); 
			}		
			require_once("views/".$this->name."/show.php");		
		}
	
		function addnew() {
			
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results1 = $data = $this->fetchArray();
				
				/*Getting Companies Start*/
				 $query_comp ="SELECT * FROM  companies WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_comp);
				$companies = $this->fetchArray();
				/*Getting Companies Close*/
				/*Getting Operators Start*/
				$query_opr ="SELECT * FROM  operators WHERE 1";
				$this->Query($query_opr);
				$operators = $this->fetchArray();
				/*Getting Operators Close*/
				
				
				/*Getting Countries Start*/
				 $query_con ="SELECT * FROM  countries WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_con);
				$countries = $this->fetchArray();
				/*Getting Countries Close*/
				
				/*Getting Boat Facilities Options*/
				 $query_fltop ="SELECT * FROM  boat_facilities WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_fltop);
				$Facilities = $this->fetchArray();
				/*Getting Boat Facilities Options*/
				
				/*Getting Safety Features Options*/
				 $query_safety ="SELECT * FROM  boat_safety WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_safety);
				$safetyFeatures = $this->fetchArray();
				/*Getting Safety Features Options*/
				
				/*Getting Communication Features Options*/
				 $query_comm ="SELECT * FROM   boat_comunication_and_navigation WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_comm);
				$communications = $this->fetchArray();
				/*Getting Communication Features Options*/
				
				
				
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
				
				/*Getting Cabins Start*/
				$query_cb ="SELECT * FROM  `cabins`  WHERE  language_id =  '".$_SESSION['language_id']."' AND status = 1";				
				$this->Query($query_cb);
				$cabins = $this->fetchArray();
				
				
				
				
				
				
			if($_REQUEST['id']) {
				$query_com ="SELECT * FROM  boats WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
				$results['common'] = $ComContents = $this->fetchObject();
				/*echo '<pre>';
				print_r($results['common']);*/
				
				
				/*GET BOAT POWER AND DIVING FEATURES*/
				$chkPquery = "SELECT * FROM boat_power_diving WHERE boat_id = '".$_REQUEST['id']."'";
					$this->Query($chkPquery);
					$powerAndDivingFeatures = $this->fetchArray();
				
				/*GET BOAT POWER AND DIVING FEATURES*/
				
				
				/*GETTING COMPANY BRANCHES OF COMPANY*/
		    	$query_compBranch ="SELECT id, branch_name FROM  company_branch_address WHERE language_id = '".$_SESSION['language_id']."' AND company_id = '".$ComContents[0]->company_id."'";
				$this->Query($query_compBranch);
				$branches = $this->fetchArray();
				/*echo '<pre>';
				print_r($branches);*/
				/*GETTING COMPANY BRANCHES OF COMPANY*/
				
				/*GETTING SELECTED BOAT EQUIPMENTS START*/
				$query_boat_eq ="SELECT * FROM  `boat_equipments` WHERE boat_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_boat_eq);
				$boat_equipments = $this->fetchArray();
				foreach($boat_equipments as $boat_eq) {
					$boatEq[$boat_eq['equipment_id']][] = $boat_eq;
				}
				/*GETTING SELECTED BOAT EQUIPMENTS END*/
				
				/*GETTING SELECTED BOAT beverages START*/
				$query_boat_bv ="SELECT * FROM  `boat_beverages` WHERE boat_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_boat_bv);
				$boat_beverages = $this->fetchArray();
				foreach($boat_beverages as $boat_bv) {
					$boatBv[$boat_bv['beverage_id']][] = $boat_bv;
				}
				/*GETTING SELECTED BOAT beverages END*/
				
				/*GETTING SELECTED BOAT foods START*/
				$query_boat_fd ="SELECT * FROM  `boat_foods` WHERE boat_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_boat_fd);
				$boat_foods = $this->fetchArray();
				foreach($boat_foods as $boat_fd) {
					$boatFd[$boat_fd['food_id']][] = $boat_fd;
				}
				/*GETTING SELECTED BOAT foods END*/
				
				/*GETTING SELECTED BOAT CABINS START*/
				$query_boat_cabin ="SELECT * FROM  `boat_cabins` WHERE boat_id =  '".$_REQUEST['id']."'";				
				$this->Query($query_boat_cabin);
				$boat_cabins = $this->fetchArray();
				foreach($boat_cabins as $boat_cabin) {
					$boatCabin[$boat_cabin['cabin_id']][] = $boat_cabin;
				}
				/*GETTING SELECTED BOAT CABINS END*/
					
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  boatspecifications WHERE boat_id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
				}
							
				require_once("views/".$this->name."/addnew.php");
			}
			else {				
				
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  boats WHERE 1";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/addnew.php");
			}
		}
		
		
		
		function getCabinOptionByCabinId($cabinId){
			
			$query = "SELECT * FROM cabin_features WHERE cabin_id = '".$cabinId."' AND status = 1";
			$this->Query($query);
			return $this->fetchArray();
		}
		
		
		function save() {
			
			
			/*GET BOAT POWER AND DIVING*/
			
			$tec_dive_friendly = $_REQUEST['tec_dive_friendly'];
			$ccr_friendly = $_REQUEST['ccr_friendly'];
			$dive_course_friendly = $_REQUEST['dive_course_friendly'];
			$dive_platform = $_REQUEST['dive_platform'];
			$nitrox = $_REQUEST['nitrox'];
			$trimix = $_REQUEST['trimix'];
			$compresor_type1 = $_REQUEST['compresor_type1'];
			$no_of_compresor1 = $_REQUEST['no_of_compresor1'];
			$compresor_type2 = $_REQUEST['compresor_type2'];
			$no_of_compresor2 = $_REQUEST['no_of_compresor2'];
			$engine_type1 = $_REQUEST['engine_type1'];
			$no_of_engine1 = $_REQUEST['no_of_engine1'];
			$engine_type2 = $_REQUEST['engine_type2'];
			$no_of_engine2 = $_REQUEST['no_of_engine2'];
			$generator_type1 = $_REQUEST['generator_type1'];
			$no_of_generator1 = $_REQUEST['no_of_generator1'];
			$generator_type2 = $_REQUEST['generator_type2'];
			$no_of_generator2 = $_REQUEST['no_of_generator2'];
			
			/*GET BOAT POWER AND DIVING*/
			
			
			
			
			
			/*BOAT ENGINE & TECHNICAL OPTIONS DATA BEGIN*/
			$Facilitys = $_REQUEST['Facility'];
			$safetys = $_REQUEST['safety'];
			$communications = $_REQUEST['communication'];
			
				if($Facilitys):
					$i = 0;
					foreach($Facilitys AS $key=>$val):
						if($i == 0){
						$FacilityValues .= $val;
						}else{
						$FacilityValues .= ",".$val;
						} 
					$i++;
					endforeach;
				$insertVarBoatFeatureColumn .= "`boat_facilities` ,";
				$insertVarBoatFeatureValues .= "'".$FacilityValues."' ,";
				$updateVarBoatFeatures .= "`boat_facilities` = '".$FacilityValues."' ,";
				endif;
				
				if($safetys):
					$i = 0;
					foreach($safetys AS $key=>$val):
						if($i == 0){
						$safetysValues .= $val;
						}else{
						$safetysValues .= ",".$val;
						} 
					$i++;
					endforeach;
				$insertVarBoatFeatureColumn .= "`boat_safety` ,";
				$insertVarBoatFeatureValues .= "'".$safetysValues."' ,";
				$updateVarBoatFeatures .= "`boat_safety` = '".$safetysValues."' ,";
				endif;
				
				if($communications):
					$i = 0;
					foreach($communications AS $key=>$val):
						if($i == 0){
						$communicationsValues .= $val;
						}else{
						$communicationsValues .= ",".$val;
						} 
					$i++;
					endforeach;
				$insertVarBoatFeatureColumn .= "`boat_comunication_and_navigation` ,";
				$insertVarBoatFeatureValues .= "'".$communicationsValues."' ,";
				$updateVarBoatFeatures .= "`boat_comunication_and_navigation` = '".$communicationsValues."' ,";
				endif;
				
				
			
			/*BOAT ENGINE & TECHNICAL OPTIONS DATA END*/
			
			
			$languages = $this->langAll();
			
			$boatExterior_gallery = $_FILES['boatExterior_gallery'];
			$boatInterior_gallery = $_FILES['boatInterior_gallery'];
			
			$upper_deck = $_FILES['upper_deck']; 
			$main_deck = $_FILES['main_deck']; 
			$lower_deck = $_FILES['lower_deck']; 
			
			$bMainImage = $_FILES['bimage'];
			
			$language_id = $_SESSION['language_id'];  
			$operator_id = $_REQUEST['operator'];   
			$boat_type_id = $_REQUEST['boat_type_id'];  
			$company_id = $_REQUEST['company'];    
			$company_branch_id = $_REQUEST['c_branch']; 
			$country_id = $_REQUEST['country_id'];     
			$boat_price = $_REQUEST['boat_price'];   
			$established = mysql_real_escape_string($_REQUEST['established']);  
			$boat_length = mysql_real_escape_string($_REQUEST['boat_length']);
			    
			$latest_overhall = mysql_real_escape_string($_REQUEST['latest_overhall']);   
			$hull_type = mysql_real_escape_string($_REQUEST['hull_type']);   
			$hull_material = mysql_real_escape_string($_REQUEST['hull_material']);   
			$boat_width = mysql_real_escape_string($_REQUEST['boat_width']);   
			$boat_range = mysql_real_escape_string($_REQUEST['boat_range']);   
			$fresh_water_capacity = mysql_real_escape_string($_REQUEST['fresh_water_capacity']);   
			$gray_water_capacity = mysql_real_escape_string($_REQUEST['gray_water_capacity']);    
			$black_water_capacity = mysql_real_escape_string($_REQUEST['black_water_capacity']); 
			
			$boat_beam = mysql_real_escape_string($_REQUEST['boat_beam']);  
			$fuel_capacity = mysql_real_escape_string($_REQUEST['fuel_capacity']);
			$draft_drive_up_high_trim = mysql_real_escape_string($_REQUEST['draft_drive_up_high_trim']);  
			$draft_drive_down = mysql_real_escape_string($_REQUEST['draft_drive_down']);  
			$deadrise = mysql_real_escape_string($_REQUEST['deadrise']);  
			$approx_dry_weight = mysql_real_escape_string($_REQUEST['approx_dry_weight']);  
			$estimated_height_on_trailer_top_windshield = mysql_real_escape_string($_REQUEST['estimated_height_on_trailer_top_of_windshield']);  
			$boat_height_windshield_to_keel = mysql_real_escape_string($_REQUEST['boat_height_windshield_to_keel']);  
			$bridge_clearance_top_up = mysql_real_escape_string($_REQUEST['bridge_clearance_topup']);  
			$bridge_clearance_top_down = mysql_real_escape_string($_REQUEST['bridge_clearance_topDown']);  
			$cockpit_depth_helm = mysql_real_escape_string($_REQUEST['cockpit_depth_helm']);  
			$cockpit_storage = mysql_real_escape_string($_REQUEST['cockpit_storage']);
			$date_time = date("Y-m-d H:i:s"); 
			
			  
			$child_discount1 = $_REQUEST['child_discount1']; 
			$child_discount2 = $_REQUEST['child_discount2']; 
			  
			$status = 1;
			if(!$_REQUEST['id']) {	
				
				$query = "INSERT INTO `boats` (".$insertVarBoatFeatureColumn."`operator_id`,`boat_type_id`, `company_id`, `country_id`, `company_branch_id`, `established`, `latest_overhall`, `hull_type`, `hull_material`, `boat_width`, `boat_range`, `fresh_water_capacity`, `gray_water_capacity`, `black_water_capacity`, `boat_price`, `boat_length`, `boat_beam`, `fuel_capacity`, `upper_deck`, `main_deck`, `lower_deck`, `child_discount1`, `child_discount2`, `date_time`, `status`) VALUES (".$insertVarBoatFeatureValues."'".$operator_id."','".$boat_type_id."', '".$company_id."', '".$country_id."', '".$company_branch_id."', '".$established."', '".$latest_overhall."', '".$hull_type."', '".$hull_material."', '".$boat_width."', '".$boat_range."', '".$fresh_water_capacity."', '".$gray_water_capacity."', '".$black_water_capacity."', '".$boat_price."', '".$boat_length."', '".$boat_beam."', '".$fuel_capacity."', '".$upper_deck."', '".$main_deck."', '".$lower_deck."', '".$child_discount1."', '".$child_discount2."', '".$date_time."', '".$status."')";
				
				/*, `draft_drive_up_high_trim`, `draft_drive_down`, `deadrise`, `approx_dry_weight`, `estimated_height_on_trailer_top_windshield`, `boat_height_windshield_to_keel`, `bridge_clearance_top_up`, `bridge_clearance_top_down`, `cockpit_depth_helm`, `cockpit_storage`*/
				
				/*, '".$draft_drive_up_high_trim."', '".$draft_drive_down."', '".$deadrise."', '".$approx_dry_weight."', '".$estimated_height_on_trailer_top_windshield."', '".$boat_height_windshield_to_keel."', '".$bridge_clearance_top_up."', '".$bridge_clearance_top_down."', '".$cockpit_depth_helm."', '".$cockpit_storage."'*/
				
				
				
				
				$this->Query($query);
				$this->Execute();
				$currentID = mysql_insert_id();
				$boat_Id = $currentID;	
				$folder_url = "media/boats/".$boat_Id;
					if(!is_dir($folder_url))
						mkdir($folder_url);
				
				$upper_deckFileName = "upper_deck".$boat_Id.str_replace(" ","_",$upper_deck['name']);
				$main_deckFileName = "main_deck".$boat_Id.str_replace(" ","_",$main_deck['name']);
				$lower_deckFileName = "lower_deck".$boat_Id.str_replace(" ","_",$lower_deck['name']);
				
				$mainImageFileName = "main".$boat_Id.str_replace(" ","_",$bMainImage['name']);
				
				$fullUrlUpper = $folder_url."/".$upper_deckFileName;
				$fullUrlMain = $folder_url."/".$main_deckFileName;
				$fullUrlLower = $folder_url."/".$lower_deckFileName;
				
				$fullUrlMainImage = $folder_url."/".$mainImageFileName;
				
				$permitted = array('image/gif','image/jpeg','image/jpg','image/png');
				
				$typeOK = false;

					// check filetype is ok

				foreach($permitted as $type) {
	
					if($type == $upper_deck['type'] || $type == $main_deck['type'] || $type == $lower_deck['type']) {
	
						$typeOK = true;
	
						break;
					}
				}
				
				if($typeOK && ($upper_deck['name'] || $main_deck['name'] || $lower_deck['name'])){
				
				if($upper_deck['name'])
				$success1 = move_uploaded_file($upper_deck['tmp_name'], $fullUrlUpper);
				if($main_deck['name'])
				$success2 = move_uploaded_file($main_deck['tmp_name'], $fullUrlMain);
				if($lower_deck['name'])
				$success3 = move_uploaded_file($lower_deck['tmp_name'], $fullUrlLower);
						
		$queryImgUpdate = "UPDATE `boats` SET `upper_deck` = '".$fullUrlUpper."', `main_deck` = '".$fullUrlMain."', `lower_deck` = '".$fullUrlLower."' WHERE id = '".$currentID."'";
				$this->Query($queryImgUpdate);
				$this->Execute();
				
				}
				
				
				if($bMainImage['name']){
				$successM = move_uploaded_file($bMainImage['tmp_name'], $fullUrlMainImage);
						
				$queryMainImgUpdate = "UPDATE `boats` SET `main_image` = '".$fullUrlMainImage."' WHERE id = '".$currentID."'";
				$this->Query($queryMainImgUpdate);
				$this->Execute();
				
				}
		
				/*CODE FOR EXTERIOR GALLERY START*/
				if(isset($boatExterior_gallery)){
					$galleryUrl = $folder_url."/gallery";
					if(!is_dir($galleryUrl))
						mkdir($galleryUrl);
				
				$typeOK7 = false;
						
					for($i = 0; $i <= count($boatExterior_gallery); $i++) {
						$fileName = rand().str_replace(" ","_",$boatExterior_gallery['name'][$i]);
						$fileTmpName = $boatExterior_gallery['tmp_name'][$i];
						$fileType = $boatExterior_gallery['type'][$i];
						$fullUrl = $galleryUrl."/".$fileName;
						
						
						foreach($permitted as $type) {
			
							if($type == $fileType) {
			
								$typeOK7 = true;
			
								break;
							}
						}		
						if($typeOK7 && $boatExterior_gallery['name'][$i]){
						$success = move_uploaded_file($fileTmpName, $fullUrl);
						$query_Gal = "INSERT INTO `boat_images` (`boat_id`, `images`, `gallery_type_id`, `status`) VALUES ('".$currentID."', '".$fullUrl."', '1', 1)";
						$this->Query($query_Gal);
						$this->Execute();
						
						}
					}	
						
				}
				/*CODE FOR EXTERIOR GALLERY END*/
				
				
				
				/*CODE FOR INTERIOR GALLERY START*/
				if(isset($boatInterior_gallery)){
					$galleryUrl = $folder_url."/gallery";
					if(!is_dir($galleryUrl))
						mkdir($galleryUrl);
				
				$typeOK7 = false;
						
					for($i = 0; $i <= count($boatInterior_gallery); $i++) {
						$fileName = rand().str_replace(" ","_",$boatInterior_gallery['name'][$i]);
						$fileTmpName = $boatInterior_gallery['tmp_name'][$i];
						$fileType = $boatInterior_gallery['type'][$i];
						$fullUrl = $galleryUrl."/".$fileName;
						
						
						foreach($permitted as $type) {
			
							if($type == $fileType) {
			
								$typeOK7 = true;
			
								break;
							}
						}		
						if($typeOK7 && $boatInterior_gallery['name'][$i]){
						$success = move_uploaded_file($fileTmpName, $fullUrl);
						$query_Gal = "INSERT INTO `boat_images` (`boat_id`, `images`, `gallery_type_id`, `status`) VALUES ('".$currentID."', '".$fullUrl."', '2', 1)";
						$this->Query($query_Gal);
						$this->Execute();
						
						}
					}	
						
				}
				/*CODE FOR INTERIOR GALLERY END*/
				
				
				/*#############################CODE FOR BOAT EQUIPMENT INSERTION BEGIN#################################*/
					/*if(isset($_REQUEST['equipment'])):
						$str = '';
						for($eq=0;$eq < count($_REQUEST['equipment']);$eq++){
							$str .= $str?",('".$currentID."', '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)":"('".$currentID."', '".$_REQUEST['equipment'][$eq]."','".$_REQUEST['eqprice'][$eq]."','".$_REQUEST['eqtype'][$eq]."',1)";
							
						}
						$equipment_query = "INSERT INTO `boat_equipments` (`boat_id`,`equipment_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
						$this->Query($equipment_query);
						$this->Execute();
					endif;*/
				/*#############################CODE FOR BOAT EQUIPMENT INSERTION END#################################*/
				
				/*#############################CODE FOR BOAT BEVERAGES INSERTION BEGIN#################################*/
					/*if(isset($_REQUEST['beverage'])):
						$str = '';
						for($eq=0;$eq < count($_REQUEST['beverage']);$eq++){
							$str .= $str?",('".$currentID."', '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)":"('".$currentID."', '".$_REQUEST['beverage'][$eq]."','".$_REQUEST['bvprice'][$eq]."','".$_REQUEST['bvtype'][$eq]."',1)";
							
						}
						$beverage_query = "INSERT INTO `boat_beverages` (`boat_id`,`beverage_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
						$this->Query($beverage_query);
						$this->Execute();
					endif;*/
				/*#############################CODE FOR BOAT BEVERAGES INSERTION END#################################*/
				
				/*#############################CODE FOR BOAT FOODS INSERTION BEGIN#################################*/
					/*if(isset($_REQUEST['food'])):
						$str = '';
						for($eq=0;$eq < count($_REQUEST['food']);$eq++){
							$str .= $str?",('".$currentID."', '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)":"('".$currentID."', '".$_REQUEST['food'][$eq]."','".$_REQUEST['fdprice'][$eq]."','".$_REQUEST['fdtype'][$eq]."',1)";
							
						}
						$food_query = "INSERT INTO `boat_foods` (`boat_id`,`food_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
						$this->Query($food_query);
						$this->Execute();
					endif;*/
				/*#############################CODE FOR BOAT FOODS INSERTION END#################################*/
				
				
				
				/*#############################CODE FOR BOAT CABINS INSERTION BEGIN#################################*/
					
						$q_all_cbn = "SELECT id FROM  cabins WHERE status = '1' and language_id = '1'";
						$this->Query($q_all_cbn);
						$count_cbn = $this->fetchArray();
						
						$str = '';
						
						if(isset($_REQUEST['cabin'])):
							if($count_cbn){
								foreach($count_cbn as $cbn){
									if($_REQUEST['cabin'][$cbn['id']]==$cbn['id']) {
										$cabinOptions = '';
										if(isset($_REQUEST['cboption_'.$cbn['id']])){
											$co = 0;
											foreach($_REQUEST['cboption_'.$cbn['id']] AS $key => $value){
												if($co == 0)
												$cabinOptions = $value;
												else
												$cabinOptions .= ",".$value;
											$co++;
											}
										}
										$str .= $str?",('".$currentID."', '".$_REQUEST['cabin'][$cbn['id']]."','".$_REQUEST['nocabin'][$cbn['id']]."','".$_REQUEST['noperson'][$cbn['id']]."','".$_REQUEST['cbprice'][$cbn['id']]."','".date("Y-m-d H:i:s")."',1,'".$cabinOptions."')":"('".$currentID."', '".$_REQUEST['cabin'][$cbn['id']]."','".$_REQUEST['nocabin'][$cbn['id']]."','".$_REQUEST['noperson'][$cbn['id']]."','".$_REQUEST['cbprice'][$cbn['id']]."','".date("Y-m-d H:i:s")."',1,'".$cabinOptions."')";
								
									$men_capacity += (int)($_REQUEST['nocabin'][$cbn['id']] * $_REQUEST['noperson'][$cbn['id']]);
									
									}
								}
								
									$cbn_query = "INSERT INTO `boat_cabins` (`boat_id`,`cabin_id`,`no_of_cabin`,`no_of_person`,`cabin_price`,`last_update`,`status`,`cabin_options`) VALUES ".$str;
									$this->Query($cbn_query);
									$this->Execute();
							}
						endif;
					
						/*UPDATE MEN CAPACITY OF BOAT BY COUNTING CABINS PERSONS*/
						$queryMenCapacity = "UPDATE `boats` SET `men_capacity` = '".$men_capacity."' WHERE id = '".$currentID."'";
							$this->Query($queryMenCapacity);
							$this->Execute();
						/*UPDATE MEN CAPACITY OF BOAT BY COUNTING CABINS PERSONS*/
					
					
				/*#############################CODE FOR BOAT CABINS INSERTION END#################################*/
				
				
				
				/* #####################################CODE FOR BOAT POWER AND DIVING INFORMATION ######################################*/
					$powerAndDivingQuery = "INSERT INTO boat_power_diving (`boat_id` ,`engine_type1` ,`no_of_engine1` ,`engine_type2` ,
									`no_of_engine2` ,`generator_type1` ,`no_of_generator1` ,`generator_type2` ,`no_of_generator2` ,`tec_dive_friendly` ,
									`ccr_friendly` ,`dive_course_friendly` ,`dive_platform` ,`compresor_type1` ,`no_of_compresor1` ,`compresor_type2` ,
									`no_of_compresor2` ,`nitrox` ,`trimix`) VALUES ( '".$currentID."', '".$engine_type1."' , '".$no_of_engine1."' , '".$engine_type2."' , 
									'".$no_of_engine2."' , '".$generator_type1."' , '".$no_of_generator1."' , '".$generator_type2."' , '".$no_of_generator2."' ,  
									'".$tec_dive_friendly."',  '".$ccr_friendly."',  '".$dive_course_friendly."',  '".$dive_platform."', '".$compresor_type1."' , 
									'".$no_of_compresor1."' , '".$compresor_type2."' , '".$no_of_compresor2."' ,  '".$nitrox."',  '".$trimix."')";
									
									
						$this->Query($powerAndDivingQuery);
						$this->Execute();	
					
				
				/* #####################################CODE FOR BOAT POWER AND DIVING INFORMATION ######################################*/
				
				
				
				
		
				
				foreach($languages as $language) {
					$boat_id = $currentID;
					$lang = $language_id = $language['id'];
					$boat_name = $_REQUEST['boat_name'.$lang]; 
					$description = mysql_real_escape_string($_REQUEST['description'.$lang]);
					$imgdescription = mysql_real_escape_string($_REQUEST['imgdescription'.$lang]);
					$design_hull_detail = mysql_real_escape_string($_REQUEST['design_hull_detail'.$lang]);    
					$safty_detail = mysql_real_escape_string($_REQUEST['safty_detail'.$lang]); 
					if($boat_name!='') { 
					 $query = "INSERT INTO `boatspecifications` (`boat_id`, `language_id`, `boat_name`, `description`, `imgdescription`, `design_hull_detail`, `safty_detail`, `date_time`, `status`) VALUES ('".$boat_id."', '".$language_id."', '".$boat_name."', '".$description."', '".$imgdescription."', '".$design_hull_detail."', '".$safty_detail."', '".$date_time."', '".$status."')";
	
						$this->Query($query);
						$this->Execute();
				  }
				}
			}
			else {
				$currentID = $_REQUEST['id'];
				$boat_Id = $currentID;	
				$folder_url = "media/boats/".$boat_Id;
					if(!is_dir($folder_url))
						mkdir($folder_url);
				
				$upper_deckFileName = "upper_deck".$boat_Id.str_replace(" ","_",$upper_deck['name']);
				$main_deckFileName = "main_deck".$boat_Id.str_replace(" ","_",$main_deck['name']);
				$lower_deckFileName = "lower_deck".$boat_Id.str_replace(" ","_",$lower_deck['name']);
				
				$mainImageFileName = "main".$boat_Id.str_replace(" ","_",$bMainImage['name']);
				
				$fullUrlUpper = $folder_url."/".$upper_deckFileName;
				$fullUrlMain = $folder_url."/".$main_deckFileName;
				$fullUrlLower = $folder_url."/".$lower_deckFileName;
				
				$fullUrlMainImage = $folder_url."/".$mainImageFileName;
				
				$permitted = array('image/gif','image/jpeg','image/jpg','image/png');
				
				$typeOK = false;

					// check filetype is ok

				foreach($permitted as $type) {
	
					if($type == $upper_deck['type'] || $type == $main_deck['type'] || $type == $lower_deck['type']) {
	
						$typeOK = true;
	
						break;
					}
				}
				
				if($typeOK && ($upper_deck['name'] || $main_deck['name'] || $lower_deck['name'])){
				
				if($upper_deck['name'])
				$success1 = move_uploaded_file($upper_deck['tmp_name'], $fullUrlUpper);
				if($main_deck['name'])
				$success2 = move_uploaded_file($main_deck['tmp_name'], $fullUrlMain);
				if($lower_deck['name'])
				$success3 = move_uploaded_file($lower_deck['tmp_name'], $fullUrlLower);
						
		$queryImgUpdate = "UPDATE `boats` SET `upper_deck` = '".$fullUrlUpper."', `main_deck` = '".$fullUrlMain."', `lower_deck` = '".$fullUrlLower."' WHERE id = '".$currentID."'";
				$this->Query($queryImgUpdate);
				$this->Execute();
				
				}
				
				
				if($bMainImage['name']){
				$successM = move_uploaded_file($bMainImage['tmp_name'], $fullUrlMainImage);
						
				$queryMainImgUpdate = "UPDATE `boats` SET `main_image` = '".$fullUrlMainImage."' WHERE id = '".$currentID."'";
				$this->Query($queryMainImgUpdate);
				$this->Execute();
				
				}
				
				$query = "UPDATE `boats` SET ".$updateVarBoatFeatures." `operator_id` = '".$operator_id."',`boat_type_id` = '".$boat_type_id."', `company_id` = '".$company_id."', `country_id` = '".$country_id."', `company_branch_id` = '".$company_branch_id."', `established` = '".$established."', `latest_overhall` = '".$latest_overhall."', `hull_type` = '".$hull_type."', `hull_material` = '".$hull_material."', `boat_width` = '".$boat_width."', `boat_range` = '".$boat_range."', `fresh_water_capacity` = '".$fresh_water_capacity."', `gray_water_capacity` = '".$gray_water_capacity."', `black_water_capacity` = '".$black_water_capacity."', `boat_price` = '".$boat_price."', `boat_length` = '".$boat_length."', `boat_beam` = '".$boat_beam."', `fuel_capacity` = '".$fuel_capacity."', `child_discount1` = '".$child_discount1."', `child_discount2` = '".$child_discount2."', `date_time` = '".$date_time."', `status` = '".$status."'  WHERE id = '".$currentID."'";
				$this->Query($query);
				$this->Execute();
				
				
				/*, `draft_drive_up_high_trim` = '".$draft_drive_up_high_trim."', `draft_drive_down` = '".$draft_drive_down."', `deadrise` = '".$deadrise."', `approx_dry_weight` = '".$approx_dry_weight."', `estimated_height_on_trailer_top_windshield` = '".$estimated_height_on_trailer_top_windshield."', `boat_height_windshield_to_keel` = '".$boat_height_windshield_to_keel."', `bridge_clearance_top_up` = '".$bridge_clearance_top_up."', `bridge_clearance_top_down` = '".$bridge_clearance_top_down."', `cockpit_depth_helm` = '".$cockpit_depth_helm."', `cockpit_storage` = '".$cockpit_storage."'*/
				
				/*UPDATE BOAT POWER AND DIVING OPTIONS*/
					$chkPquery = "SELECT id FROM boat_power_diving WHERE boat_id = '".$currentID."'";
					$this->Query($chkPquery);
					$rows = $this->fetchArray();
					
					if($rows){
						$powerAndDivingQuery = "UPDATE  boat_power_diving SET `engine_type1` =  '".$engine_type1."', `no_of_engine1` =  '".$no_of_engine1."', `engine_type2` =  '".$engine_type2."',
											`no_of_engine2` =  '".$no_of_engine2."', `generator_type1` =  '".$generator_type1."', `no_of_generator1` =  '".$no_of_generator1."',
											 `generator_type2` =  '".$generator_type2."', `no_of_generator2` =  '".$no_of_generator2."', `tec_dive_friendly` =  '".$tec_dive_friendly."', 
											 `ccr_friendly` =  '".$ccr_friendly."', `dive_course_friendly` =  '".$dive_course_friendly."',
											`dive_platform` =  '".$dive_platform."', `compresor_type1` =  '".$compresor_type1."', 
											`no_of_compresor1` =  '".$no_of_compresor1."', `compresor_type2` =  '".$compresor_type2."',
											`no_of_compresor2` =  '".$no_of_compresor2."', `nitrox` =  '".$nitrox."', `trimix` =  '".$trimix."'
											 WHERE  id ='".$rows[0]['id']."'";
					}else{
						$powerAndDivingQuery = "INSERT INTO boat_power_diving (`boat_id` ,`engine_type1` ,`no_of_engine1` ,`engine_type2` ,
									`no_of_engine2` ,`generator_type1` ,`no_of_generator1` ,`generator_type2` ,`no_of_generator2` ,`tec_dive_friendly` ,
									`ccr_friendly` ,`dive_course_friendly` ,`dive_platform` ,`compresor_type1` ,`no_of_compresor1` ,`compresor_type2` ,
									`no_of_compresor2` ,`nitrox` ,`trimix`) VALUES ( '".$currentID."', '".$engine_type1."' , '".$no_of_engine1."' , '".$engine_type2."' , 
									'".$no_of_engine2."' , '".$generator_type1."' , '".$no_of_generator1."' , '".$generator_type2."' , '".$no_of_generator2."' ,  
									'".$tec_dive_friendly."',  '".$ccr_friendly."',  '".$dive_course_friendly."',  '".$dive_platform."', '".$compresor_type1."' , 
									'".$no_of_compresor1."' , '".$compresor_type2."' , '".$no_of_compresor2."' ,  '".$nitrox."',  '".$trimix."')";
									
							
					}
								
						$this->Query($powerAndDivingQuery);
						$this->Execute();
					
				/*UPDATE BOAT POWER AND DIVING OPTIONS*/
				
				
				
				
				/*################################UPDATE BOAT EQUIPMENT######################################*/
				
				/*$q_all_equp = "SELECT id FROM  equipments WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_equp);
				$count_equp = $this->fetchArray();
				$qq_del = "DELETE FROM boat_equipments WHERE `boat_id` = '".$currentID."'";
				$this->Query($qq_del);
				if($this->Execute()) {
					$ii = 0;
					$str = '';
					if(isset($_REQUEST['equipment'])):
						foreach($count_equp as $equp){
							if($_REQUEST['equipment'][$equp['id']]==$equp['id']) {
								$str .= $str?",('".$currentID."', '".$_REQUEST['equipment'][$equp['id']]."','".$_REQUEST['eqprice'][$equp['id']]."','".$_REQUEST['eqtype'][$equp['id']]."',1)":"('".$currentID."', '".$_REQUEST['equipment'][$equp['id']]."','".$_REQUEST['eqprice'][$equp['id']]."','".$_REQUEST['eqtype'][$equp['id']]."',1)";
							}
						}
					$equipment_query = "INSERT INTO `boat_equipments` (`boat_id`,`equipment_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
					$this->Query($equipment_query);
					$this->Execute();
					endif;
				}*/
				
				/*################################UPDATE BOAT EQUIPMENT################################*/
			
				
				/*################################UPDATE BOAT BEVERAGE######################################*/
				
				/*$q_all_equp = "SELECT id FROM  beverages WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_equp);
				$count_equp = $this->fetchArray();
				$qq_del = "DELETE FROM boat_beverages WHERE `boat_id` = '".$currentID."'";
				$this->Query($qq_del);
				if($this->Execute()) {
					$ii = 0;
					$str = '';
					if(isset($_REQUEST['beverage'])):
						foreach($count_equp as $equp){
							if($_REQUEST['beverage'][$equp['id']]==$equp['id']) {
								$str .= $str?",('".$currentID."', '".$_REQUEST['beverage'][$equp['id']]."','".$_REQUEST['bvprice'][$equp['id']]."','".$_REQUEST['bvtype'][$equp['id']]."',1)":"('".$currentID."', '".$_REQUEST['beverage'][$equp['id']]."','".$_REQUEST['bvprice'][$equp['id']]."','".$_REQUEST['bvtype'][$equp['id']]."',1)";
							}
						}
					$beverage_query = "INSERT INTO `boat_beverages` (`boat_id`,`beverage_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
					$this->Query($beverage_query);
					$this->Execute();
					endif;
				}*/
				
				/*################################UPDATE BOAT BEVERAGE################################*/
			
			
				
				/*################################UPDATE BOAT FOOD######################################*/
				
				/*$q_all_equp = "SELECT id FROM  foods WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_equp);
				$count_equp = $this->fetchArray();
				$qq_del = "DELETE FROM boat_foods WHERE `boat_id` = '".$currentID."'";
				$this->Query($qq_del);
				if($this->Execute()) {
					$ii = 0;
					$str = '';
					if(isset($_REQUEST['food'])):
						foreach($count_equp as $equp){
							if($_REQUEST['food'][$equp['id']]==$equp['id']) {
								$str .= $str?",('".$currentID."', '".$_REQUEST['food'][$equp['id']]."','".$_REQUEST['fdprice'][$equp['id']]."','".$_REQUEST['fdtype'][$equp['id']]."',1)":"('".$currentID."', '".$_REQUEST['food'][$equp['id']]."','".$_REQUEST['fdprice'][$equp['id']]."','".$_REQUEST['fdtype'][$equp['id']]."',1)";
							}
						}
					$food_query = "INSERT INTO `boat_foods` (`boat_id`,`food_id`,`eq_value`,`eq_type`,`eq_status`) VALUES ".$str;
					$this->Query($food_query);
					$this->Execute();
					endif;
				}*/
				
				/*################################UPDATE BOAT FOOD################################*/
			
			
				
				/*################################UPDATE BOAT CABIN######################################*/
				
				$q_all_cbn = "SELECT id FROM  cabins WHERE status = '1' and language_id = '1'";
				$this->Query($q_all_cbn);
				$count_cbn = $this->fetchArray();
				$cbn_del = "DELETE FROM boat_cabins WHERE `boat_id` = '".$currentID."'";
				$this->Query($cbn_del);
				if($this->Execute()) {
					$ii = 0;
					$str = '';
					if(isset($_REQUEST['cabin'])):
							if($count_cbn){
								foreach($count_cbn as $cbn){
									if($_REQUEST['cabin'][$cbn['id']]==$cbn['id']) {
										$cabinOptions = '';
										if(isset($_REQUEST['cboption_'.$cbn['id']])){
											$co = 0;
											foreach($_REQUEST['cboption_'.$cbn['id']] AS $key => $value){
												if($co == 0)
												$cabinOptions = $value;
												else
												$cabinOptions .= ",".$value;
											$co++;
											}
										}
										$str .= $str?",('".$currentID."', '".$_REQUEST['cabin'][$cbn['id']]."','".$_REQUEST['nocabin'][$cbn['id']]."','".$_REQUEST['noperson'][$cbn['id']]."','".$_REQUEST['cbprice'][$cbn['id']]."','".date("Y-m-d H:i:s")."',1,'".$cabinOptions."')":"('".$currentID."', '".$_REQUEST['cabin'][$cbn['id']]."','".$_REQUEST['nocabin'][$cbn['id']]."','".$_REQUEST['noperson'][$cbn['id']]."','".$_REQUEST['cbprice'][$cbn['id']]."','".date("Y-m-d H:i:s")."',1,'".$cabinOptions."')";
										
										
										$men_capacity += (int)($_REQUEST['nocabin'][$cbn['id']] * $_REQUEST['noperson'][$cbn['id']]);
										
										
									}
								}
								
									
								
									$cbn_query = "INSERT INTO `boat_cabins` (`boat_id`,`cabin_id`,`no_of_cabin`,`no_of_person`,`cabin_price`,`last_update`,`status`,`cabin_options`) VALUES ".$str;
									$this->Query($cbn_query);
									$this->Execute();
							}
					endif;
				}
				
				
							
						/*UPDATE MEN CAPACITY OF BOAT BY COUNTING CABINS PERSONS*/
						$queryMenCapacity = "UPDATE `boats` SET `men_capacity` = '".$men_capacity."' WHERE id = '".$currentID."'";
							$this->Query($queryMenCapacity);
							$this->Execute();
						/*UPDATE MEN CAPACITY OF BOAT BY COUNTING CABINS PERSONS*/
				
				
				
				/*################################UPDATE BOAT CABIN################################*/
			
				
				
				
				/*CODE FOR EXTERIOR GALLERY START*/
				if(isset($boatExterior_gallery)){
					$galleryUrl = $folder_url."/gallery";
					if(!is_dir($galleryUrl))
						mkdir($galleryUrl);
				
				$typeOK7 = false;
						
					for($i = 0; $i <= count($boatExterior_gallery); $i++) {
						$fileName = rand().str_replace(" ","_",$boatExterior_gallery['name'][$i]);
						$fileTmpName = $boatExterior_gallery['tmp_name'][$i];
						$fileType = $boatExterior_gallery['type'][$i];
						$fullUrl = $galleryUrl."/".$fileName;
						
						
						foreach($permitted as $type) {
			
							if($type == $fileType) {
			
								$typeOK7 = true;
			
								break;
							}
						}		
						if($typeOK7 && $boatExterior_gallery['name'][$i]){
						$success = move_uploaded_file($fileTmpName, $fullUrl);
						$query_Gal = "INSERT INTO `boat_images` (`boat_id`, `images`, `gallery_type_id`, `status`) VALUES ('".$currentID."', '".$fullUrl."', 1, 1)";
						$this->Query($query_Gal);
						$this->Execute();
						
						}
					}	
						
				}
				/*CODE FOR EXTERIOR GALLERY END*/
				/*CODE FOR INTERIOR GALLERY START*/
				if(isset($boatInterior_gallery)){
					$galleryUrl = $folder_url."/gallery";
					if(!is_dir($galleryUrl))
						mkdir($galleryUrl);
				
				$typeOK7 = false;
						
					for($i = 0; $i <= count($boatInterior_gallery); $i++) {
						$fileName = rand().str_replace(" ","_",$boatInterior_gallery['name'][$i]);
						$fileTmpName = $boatInterior_gallery['tmp_name'][$i];
						$fileType = $boatInterior_gallery['type'][$i];
						$fullUrl = $galleryUrl."/".$fileName;
						
						
						foreach($permitted as $type) {
			
							if($type == $fileType) {
			
								$typeOK7 = true;
			
								break;
							}
						}		
						if($typeOK7 && $boatInterior_gallery['name'][$i]){
						$success = move_uploaded_file($fileTmpName, $fullUrl);
						$query_Gal = "INSERT INTO `boat_images` (`boat_id`, `images`, `gallery_type_id`, `status`) VALUES ('".$currentID."', '".$fullUrl."', 2, 1)";
						$this->Query($query_Gal);
						$this->Execute();
						
						}
					}	
						
				}
				/*CODE FOR INTERIOR GALLERY END*/
				
				
				foreach($languages as $language) {
					$boat_id = $currentID;
					$lang = $language_id = $language['id'];
					$boat_name = $_REQUEST['boat_name'.$lang]; 
					$description = mysql_real_escape_string($_REQUEST['description'.$lang]);
					$imgdescription = mysql_real_escape_string($_REQUEST['imgdescription'.$lang]);
					$design_hull_detail = mysql_real_escape_string($_REQUEST['design_hull_detail'.$lang]);    
					$safty_detail = mysql_real_escape_string($_REQUEST['safty_detail'.$lang]);
					 $query = "UPDATE `boatspecifications` SET `boat_name` = '".$boat_name."', `description` = '".$description."', `imgdescription` = '".$imgdescription."', `design_hull_detail` = '".$design_hull_detail."', `safty_detail` = '".$safty_detail."', `date_time` = '".$date_time."', `status` = '".$status."' WHERE boat_id = '".$currentID."' AND language_id = '".$lang."'";
							
							$this->Query($query);
							$this->Execute();
							
				}
			}
		
		$this->show();
		}
		
		
		
		function delete(){
			
			$query = "DELETE FROM boat_images WHERE boat_id = ".$_REQUEST['id'];
			$this->Query($query);
			$this->Execute();
			
			$query = "DELETE FROM boatspecifications WHERE boat_id = ".$_REQUEST['id'];
			$this->Query($query);
			$this->Execute();
			
			$query = "DELETE FROM boats WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
			
				$this->show();	
				//header('location:index.php?control=boat');
		}
		
		
		function boatGallery($view) {
			session_start();	
			$query_all ="SELECT * FROM  boat_images  WHERE boat_id = '".$_REQUEST['bid']."'";
			
			$this->Query($query_all);
			$galls = $this->fetchArray();	
			$query_main ="SELECT boat_name FROM  boatspecifications  WHERE boat_id = '".$_REQUEST['bid']."' AND language_id = 1";
			
			$this->Query($query_main);
			$mains = $this->fetchObject();
				
			if(file_exists("../views/".$this->name."/gallery.php"))
			require_once("../views/".$this->name."/gallery.php");
			else
			require_once("views/".$this->name."/gallery.php");
					
		}	
		
			
		
		
	}