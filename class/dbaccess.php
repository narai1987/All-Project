<?php 
	//require_once('dbaccess.php');
	if(file_exists('admin/configuration.php')){
		require_once('admin/configuration.php');
	}
	else if(file_exists('../admin/configuration.php')){
		require_once('../admin/configuration.php');
		
	}
	class DbAccess {
		public $result;
		public $query;
		public $num_row;
		public $title;
		public $ctitle;
		
		public function DbAccess(){
			$this->setCTitle($_REQUEST['control'],$_REQUEST['task'],$this->ctitle);
		}
		
		
		
		function getNoOfDive($trip_schedule_id){
		
		$query = "SELECT sum(no_of_dive) as divecount FROM `trip_itinerary` WHERE trip_schedule_id = '".$trip_schedule_id."' group by trip_schedule_id";
		$this->Query($query);
		$rows = $this->fetchArray();
		return $rows[0]['divecount'];
		
		}
		
		function getSpaceLeft($trip_schedule_id, $boat_id){
				
				/*Get Boat Men Capacity To Calculate Space Left*/
				$this->Query("SELECT men_capacity FROM boats WHERE id = '".$boat_id."'");
				$results = $this->fetchArray();
				$menCapacity = $results[0]['men_capacity'];
				/*Get Boat Men Capacity To Calculate Space Left*/
				
				
				$spaceLeftQuery = "SELECT id AS bookingIds FROM bookings WHERE trip_schedule_id = '".$trip_schedule_id."'";
				$this->Query($spaceLeftQuery);
				$srows = $this->fetchArray();
				foreach($srows AS $srow):
					$this->Query("SELECT b.no_of_cabin AS noOfBookedCabin, 
					bt.no_of_person AS personPerCabin FROM booking_cabins b 
					JOIN boat_cabins bt ON bt.id = b.boat_cabin_id WHERE 
					b.booking_id = '".$srow['bookingIds']."'");
					$persons = $this->fetchArray();
					foreach($persons AS $person):
						$bookedMembers = (int)($bookedMembers + ($person['noOfBookedCabin'] * $person['personPerCabin']));
					endforeach;
				endforeach;
			
			$spaceLeft = (int)($menCapacity - $bookedMembers);
			
			return $spaceLeft;
		
		}
		
		function getTripRating($tripId){
			$getRate = "SELECT AVG(rating) rate FROM trip_rating WHERE trip_id = '".$tripId."' group by trip_id";
			$this->Query($getRate);
			return $this->fetchArray();
		}
		
		function getTripReviews($tripId){
			$queryReview = "SELECT r.review,r.date_time,u.fname,u.lname,u.username,u.id AS userID FROM trip_reviews r "
			. " \n JOIN users u ON u.id = r.user_id WHERE r.trip_id = '".$tripId."'";
			$this->Query($queryReview);
			return $this->fetchArray();
		}
				
		function getBoatTechnicalFeatures($boatEngine){
				/*BOAT ENGINE & TECHNICAL FEATURES START*/
				if($boatEngine):
				$queryEngineTech = "SELECT * FROM  boat_engine WHERE id IN(".$boatEngine.") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryEngineTech);
				return $this->fetchArray();
				endif;
		}
		
		
		function getBoatPowers($boatEnginePower){
				/*BOAT ENGINE POWER OPTIONS START*/
				if($boatEnginePower):
				$queryEngineTech = "SELECT * FROM  boat_enginepower WHERE id IN(".$boatEnginePower.") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryEngineTech);
				return $this->fetchArray();
				endif;
		}
		
		
		function getBoatTechnicalOptions($boatTechnical){
				/*BOAT TECHNICAL OPTIONS START*/
				if($boatTechnical):
				$queryEngineTech = "SELECT * FROM  boat_technical WHERE id IN(".$boatTechnical.") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryEngineTech);
				return $this->fetchArray();
				endif;
		}
		
		
////////////////////////////////////////////////////////////////////////////////Boat safety/////////////////////////////////////////////////////////////////////////////////////
function boatsafety($safety){
				/*BOAT ENGINE & TECHNICAL FEATURES START*/
				if($safety):
				$queryBoatsafety = "SELECT * FROM  boat_safety WHERE id IN(".$safety.") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryBoatsafety);
				return $this->fetchArray();
				endif;
		}
		
		
function boatfacilities($facilities){
				/*BOAT ENGINE & TECHNICAL FEATURES START*/
				if($facilities):
				$queryBoatfacilities = "SELECT * FROM  boat_facilities WHERE id IN(".$facilities.") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($queryBoatfacilities);
				return $this->fetchArray();
				endif;
		}
		
function boatComunications($Comunication){
				/*BOAT ENGINE & TECHNICAL FEATURES START*/
				if($Comunication):
				$boatComunications = "SELECT * FROM   boat_comunication_and_navigation WHERE id IN(".$Comunication.") AND language_id = '".$_SESSION['language_id']."'";
				$this->Query($boatComunications);
				return $this->fetchArray();
				endif;
		}		
		
//////////////////////////////////////////////////////////////////////////////////Boat safety///////////////////////////////////////////////////////////////////////////////////		
		
		
		function getTripPackages($tripId,$scheduleId){
				/*###################### *QUERY OF EXLUDE PACKAGES START* #######################*/
				$queryEqPaid = "SELECT t.*, eq.equipment FROM trip_equipments t"
				. " \n JOIN equipments eq ON eq.id = t.equipment_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'paid'";
				$this->Query($queryEqPaid);
				$Exeqs = $this->fetchObject();
				$excludes = '';
					$eq = 0;
					foreach($Exeqs AS $Exeq):
						if($eq == 0 and empty($excludes)) $excludes .= $Exeq->equipment;
						else $excludes .= ", ".$Exeq->equipment;
					$eq++;
					endforeach;
				
				$queryBvPaid = "SELECT t.*, eq.beverage FROM trip_beverages t"
				. " \n JOIN beverages eq ON eq.id = t.beverage_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'paid'";
				$this->Query($queryBvPaid);
				$Exbvs = $this->fetchObject();
					$bv = 0;
					foreach($Exbvs AS $Exbv):
						if($bv == 0 and empty($excludes)) $excludes .= $Exbv->beverage;
						else $excludes .= ", ".$Exbv->beverage;
					$bv++;
					endforeach;
				
				$queryFdPaid = "SELECT t.*, eq.food FROM trip_foods t"
				. " \n JOIN foods eq ON eq.id = t.food_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'paid'";
				$this->Query($queryFdPaid);
				$Exfds = $this->fetchObject();
					$fd = 0;
					foreach($Exfds AS $Exfd):
						if($eq == 0 and empty($excludes)) $excludes .= $Exfd->food;
						else $excludes .= ", ".$Exfd->food;
					$fd++;
					endforeach;
				/*###################### *QUERY OF EXLUDE PACKAGES END* #######################*/
				
				/*----------------------------** II **---------------------------------*/
				
				/*###################### *QUERY OF INCLUDE PACKAGES START* #######################*/
				$queryEqFree = "SELECT t.*, eq.equipment FROM trip_equipments t"
				. " \n JOIN equipments eq ON eq.id = t.equipment_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'free'";
				$this->Query($queryEqFree);
				$Inbvs = $this->fetchObject();
				$includes = '';
					$eq = 0;
					foreach($Ineqs AS $Ineq):
						if($eq == 0 and empty($includes)) $includes .= $Ineq->equipment;
						else $includes .= ", ".$Ineq->equipment;
					$eq++;
					endforeach;
				
				$queryBvFree = "SELECT t.*, eq.beverage FROM trip_beverages t"
				. " \n JOIN beverages eq ON eq.id = t.beverage_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'free'";
				$this->Query($queryBvFree);
				$Inbvs = $this->fetchObject();
					$bv = 0;
					foreach($Inbvs AS $Inbv):
						if($bv == 0 and empty($includes)) $includes .= $Inbv->beverage;
						else $includes .= ", ".$Inbv->beverage;
					$bv++;
					endforeach;
				
				$queryFdFree = "SELECT t.*, eq.food FROM trip_foods t"
				. " \n JOIN foods eq ON eq.id = t.food_id WHERE"
				. " \n t.trip_id = '".$tripId."' AND t.trip_schedule_id = '".$scheduleId."'"
				. " \n AND eq.language_id = 1 AND t.eq_type = 'free'";
				$this->Query($queryFdFree);
				$Inbvs = $this->fetchObject();
					$fd = 0;
					foreach($Infds AS $Infd):
						if($eq == 0 and empty($includes)) $includes .= $Infd->food;
						else $includes .= ", ".$Infd->food;
					$fd++;
					endforeach;
				/*###################### *QUERY OF INCLUDE PACKAGES END* #######################*/
				
				
				/*-------------------------*MAKE AN ARRAY OF PACKAGES---------------------------*/
				$packageOptions[Excludes] = $excludes;
				$packageOptions[Includes] = $includes;
				
				return $packageOptions;
				
			
			}
		
		
		 function findById($Id, $tableName){
			$query = "SELECT * FROM ".$tableName." WHERE id = '".$Id."' AND status = 1";
			$this->Query($query);
			return $this->fetchArray();
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
		
		function getCountry($id) {
			$q_country = "SELECT * FROM countries WHERE id = '".$id."'  AND language_id = '1'";
			$this->Query($q_country);
			$country = $this->fetchArray();
			return $country[0]['country'];
		}
		
		
		function setTitle($cTitlt=NULL) {
			$this->ctitle = $cTitlt; 
		}
		function setCTitle($control=NULL,$task=NULL,$cTitlt=NULL) {
			$this->title = $control?($control."|".($task?$task:($cTitlt?$cTitlt:''))):($task?($task."|".($cTitlt?$cTitlt:'')):($cTitlt?$cTitlt:($_SERVER['HTTP_HOST']))); 
		}		
		function getTitle() {
			
			return $this->title;
		}
		function Auth($auth) {
			$authCls = $auth."class";
			$check = new $authCls();
			$check->login();
		}
		
		function Query($str) {
			$this->query = $str;
			return true;	
		}
		
		function Execute() {
			$this->result = mysql_query($this->query) or die(mysql_error());
			return $this->result;
		}
		
		function isExecute() {
			return  mysql_query($this->query);
		}
		
		function fetchArray() {
			$this->Execute();
			$this->NumRow();
			for($i=0; $i<$this->num_row; $i++){
				$fetch_result[$i] = mysql_fetch_array($this->result);
			}
			return $fetch_result;
		}
		function lastInsertId() {
			return mysql_insert_id();	
		}
		
		function fetchObject() {
			$this->Execute();
			$this->NumRow();
			for($i=0; $i<$this->num_row; $i++){
				$fetch_result[$i] = mysql_fetch_object($this->result);
			}
			return $fetch_result;
		}
		
		function numRow() {
			$this->num_row = mysql_num_rows($this->result);	
			return $this->num_row;
		}
		//function getContent($id){
			//$q = "SELECT * FROM ch_contents WHERE id = '".$id."' AND status = '1' ";	
			//$this->Query($q);
			//return $this->fetchArray();
		//}
		/*CHECK USERS LOGIN*/
		/*FOR THIS USE USERNAME AND PASSWRD */
		
		function rowCount(){
			$this->result = mysql_query($this->query) or die(mysql_error());
			$this->num_row = mysql_num_rows($this->result);	
			return $this->num_row;				
		}
		
		function getTemplate($tmpid) {
			$query = $tmpid?"SELECT * FROM templates WHERE id = '".$tmpid."' and tmp_type = 1 and  status = '1'":"SELECT * FROM templates WHERE status = '1' and tmp_type = 1 and default_temp='1'";
			$this->Query($query);
			return $this->fetchArray();
			
		}
		
		function getMenuTop() {
			session_start();
			$query = "SELECT * FROM menus WHERE status = '1' and menutype = 'top' and language_id='".$_SESSION['language_id']."'";
			$this->Query($query);
			return $menus = $this->fetchArray();
		}
		
		
		function getMenuFooter() {
			session_start();
		    $footer = "SELECT * FROM menus WHERE status = '1' and menutype = 'footer' and language_id='".$_SESSION['language_id']."'";
			$this->Query($footer);
			return $footermenus = $this->fetchArray();
		}
		
		function getMenuBottomFooter() {
			session_start();
		    $bottomfooter = "SELECT * FROM menus WHERE status = '1' and menutype = 'bottom footer' and language_id='".$_SESSION['language_id']."'";
			$this->Query($bottomfooter);
			return $bottomfootermenus = $this->fetchArray();
		}
		
		function getTermsCondition() {
			session_start();
		    $termsCondition = "SELECT * FROM menus WHERE status = '1' and menutype = 'terms conditions' and language_id='".$_SESSION['language_id']."'";
			$this->Query($termsCondition);
			return $termsConditionMenus = $this->fetchArray();
			
		}
		
		
		function textMessage($msg,$type) {
			if($type=="login") {
				return ($msg=="LOGINSUCC"?LOGINSUCC:($msg=="LOGINSFAIL"?LOGINSFAIL:('test')));
			}
		}
		function subscribeUser() {
			$this->Query("select * from users  WHERE email = '".$_REQUEST['subscribe']."' ");
			$this->Execute();
			$user = $this->fetchArray();
			if(count($user)) {
				if(!$user[0]['subscription']) {
					$query = "UPDATE users SET subscription = '1' WHERE email = '".$_REQUEST['subscribe']."'";
					$this->Query($query);
					$this->isExecute();
					$subject = "Tradeallstar Subscribe Info ";
					$message .= "Sir/Mam ".$_REQUEST['ufname']." ".$_REQUEST['ulname']."<br><br><br>";
					$message .= "Your email id ".$_REQUEST['subscribe']."<br><br><br>";
					$message .= "Successfully subscribe <a href='#'>".SUBDOMAIN."</a>. <br><br><br>";
					$message .= "<a href=".SUBDOMAIN." ><img src=".SUBDOMAIN."/images/logo.png /></a><br><br><br>";
					$message .= "For unsubscribe to ".SUBJECTMAIL." <a href=".SUBDOMAIN."/index.php?control=provider&task=unsubscribe&id=".$user[0]['id'].">click here</a>.";
					
					$this->mailsend($_REQUEST['email'], SITEADMIN, $subject, $message);
					return 1;					
				}
				else {
					return 2;
				}
			}
			else {
				return false;
			}
		}
		function subscribeProvider() {
			$this->Query("select * from providers  WHERE email = '".$_REQUEST['subscribe']."' ");
			$this->Execute();
			$provider = $this->fetchArray();
			if(count($provider)) {
				if(!$provider[0]['subscription']) {
					
					$query = "UPDATE providers SET subscription = '1' WHERE email = '".$_REQUEST['subscribe']."'";
					$this->Query($query);
					$this->isExecute();
					
					$subject = "Tradeallstar Subscribe Info ";
					$message .= "Sir/Mam ".$_REQUEST['ufname']." ".$_REQUEST['ulname']."<br><br><br>";
					$message .= "Successfully subscribe <a href='#'>".SUBDOMAIN."</a>. <br><br><br>";
					$message .= "<a href=".SUBDOMAIN." ><img src=".SUBDOMAIN."/images/logo.png /></a><br><br><br>";
					$message .= "For unsubscribe to ".SUBJECTMAIL." <a href=".SUBDOMAIN."/index.php?control=provider&task=unsubscribe&id=".$user[0]['id'].">click here</a>.";
					//echo $message;
					$this->mailsend($_REQUEST['email'], SITEADMIN, $subject, $message);
					return 1;						
				}
				else {
					return 2;
				}
			}
			else {
				return false;
			}
		}
		function subscribe($view) {
			$result = $this->subscribeUser();
			$resultp = $this->subscribeProvider();
			if($result) {
				echo ($result==1?SUBSCRIBE:($result==2?ALREADYSUBSCRIBE:NOSUBSCRIBE));
			}
			else if($resultp){
				echo ($resultp==1?SUBSCRIBE:($resultp==2?ALREADYSUBSCRIBE:NOSUBSCRIBE));
			}
			else {
				echo NOSUBSCRIBE;
			}
			/////////////////////////////////////////////////////////////////////////////
			/*$this->Query("select * from users p WHERE email = '".$_REQUEST['subscribe']."' ");
			$this->Execute();
			$user = $this->fetchArray();
			
			$query = "UPDATE users SET subscription = '1' WHERE email = '".$_REQUEST['subscribe']."'";
			$this->Query($query);
			$this->isExecute();
			if($this->numRow()) {
				$subject = "Tradeallstar Subscribe Info ";
				$message .= "Sir/Mam ".$_REQUEST['ufname']." ".$_REQUEST['ulname']."<br><br><br>";
				$message .= "Your email id ".$_REQUEST['subscribe']."<br><br><br>";
				$message .= "Successfully subscribe <a href='#'>".SUBDOMAIN."</a>. <br><br><br>";
				$message .= "<a href=".SUBDOMAIN." ><img src=".SUBDOMAIN."/images/logo.png /></a><br><br><br>";
				$message .= "For unsubscribe to ".SUBDOMAIN.". Click here <a href=".SUBDOMAIN."/index.php?control=user&task=unsubscribe&id=".$user[0]['id'].">click here.</a>.";
				//echo $message;
				$this->mailsend($_REQUEST['email'], SITEADMIN, $subject, $message);
				echo true;
			}
			else {
				$this->Query("select * from providers p WHERE email = '".$_REQUEST['subscribe']."' ");
				$this->Execute();				
				$user = $this->fetchArray();
				
				$query = "UPDATE providers SET subscription = '1' WHERE email = '".$_REQUEST['subscribe']."'";
				$this->Query($query);
				$this->isExecute();
				
				if($this->numRow()) {
					$subject = "Tradeallstar Subscribe Info ";
					$message .= "Sir/Mam ".$_REQUEST['ufname']." ".$_REQUEST['ulname']."<br><br><br>";
					$message .= "Successfully subscribe <a href='#'>".SUBDOMAIN."</a>. <br><br><br>";
					$message .= "<a href=".SUBDOMAIN." ><img src=".SUBDOMAIN."/images/logo.png /></a><br><br><br>";
					$message .= "For unsubscribe to ".SUBDOMAIN.". Click here <a href=".SUBDOMAIN."/index.php?control=provider&task=unsubscribe&id=".$user[0]['id'].">click here</a>.";
					//echo $message;
					$this->mailsend($_REQUEST['email'], SITEADMIN, $subject, $message);
					echo true;
				}
				else {
					echo false;
				}
			}*/
			
		}
		
		function login($view=NULL) {
			 $q = "SELECT * FROM users WHERE username = '".$_REQUEST['username']."' AND password = '".md5($_REQUEST['password'])."' AND status = '1' AND utype = 0";
			
			$redirectUrl = $_REQUEST['redirectUri'];
			if($q) {
				$this->Query($q);
				
				$this->Execute();
				$num = $this->rowCount();
				$user = $this->fetchArray();
				
				if($num) {
					if($user[0]['status']) {
						session_start();
						$_SESSION['skip'] = $_SESSION['skip']?$_SESSION['skip']:0;
						$_SESSION['login'] = 1;
						$_SESSION['user'] = $user[0]['fname']." ".$user[0]['lname'];
						$_SESSION['username'] = $user[0]['username'];
						$_SESSION['userid'] = $user[0]['id'];
						$_SESSION['usertype'] = $_REQUEST['usertype'];
						
						$_SESSION['error']="Login successfull!";
						$_SESSION['errorclass'] = "";
						$_SESSION['alert'] = $alert = 1;
						$_SESSION['msgtype']='login';
						//$this->getUserPoints('login_point',$user[0]['id']);
						header("location:index.php?".$redirectUrl);
					}
					else {
						header("location:index.php?".$redirectUrl);
					}
				}
				else {
					session_start();
					$_SESSION['error']="Invalid username or password.";
					$_SESSION['errorclass'] = "warn_red";
					header("location:index.php?".$redirectUrl);
				}
			}
		}
		
		function checkImageType($type) {
			if($type){
				switch($type) {
					case'image/jpeg':
					return "jpg";	
					case'image/jpg':
					return "jpg";	
					case'image/png':
					return "png";	
					case'image/gif':
					return "gif";	
					default:
					return false;
				}
			}
			else {
				return false;
			}
		}
		
		function ads($category) {
			$query = "SELECT * FROM ads WHERE category = '".$category."' AND status = '1'";
			$this->Query($query);
		 	return $this->fetchArray();
		}
		function mailsend($to,$from=NULL,$subject=NULL,$message=NULL) {
			
			$from = $from?$from:EMAILFROM; //$fromMail;//
			$subject = $subject?$subject:SUBJECTMAIL; 
			$message = $message?$message:"";
			//////////////////////////////////////////////////
			
			 
			 
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'To: '. $from. "\r\n";
			$headers .= 'From: '.$subject.' <'.$to.'>' . "\r\n";
			 
			$ok = @mail($to, $subject, $message, $headers); 
			if ($ok) { 
				return true;
			} else { 
				return false;
			} 	
		}
		
		function feed() {
				session_start();
			$query = "INSERT INTO feeds VALUES('','".$_REQUEST['title']."','".$_SESSION['userid']."','".$_SESSION['usertype']."','".$_REQUEST['feed']."','".date("Y-m-d H:i:s")."','0')";
		
			$this->Query($query);
			
			if($this->Execute()) {		
				$_SESSION['message']=WHATYOUTHINK;
				$_SESSION['alert']=1;
				echo true;
			}
			else {
				$_SESSION['message']=WHATYOUTHINKFAIL;
				$_SESSION['alert']=3;
				echo false;
			}
		}
		//////////////////////////////login feed///////////////////////////////
		function loginfeed($view=NULL) {
			$q1 = "select * from providers WHERE email = '".$_REQUEST['email']."' and password = '".md5($_REQUEST['password'])."' and status = '1' ";
			$q2 = "select * from users WHERE email = '".$_REQUEST['email']."' and password = '".md5($_REQUEST['password'])."' and status = '1' ";
			//$q = $_REQUEST['usertype']==1?$q1:($_REQUEST['usertype']==2?$q2:"");
			
			
			
			
			$this->Query($q1);				
			$this->Execute();
			$num = $this->rowCount();
			
			if($num){
				$usertype = 1;
			}
			else {
				$this->Query($q2);				
				$this->Execute();
				$num = $this->rowCount();
				if($num){
					$usertype = 2;
				}
			}
			$user = $this->fetchArray();
			
			if($num) {
				if($user[0]['status']) {
					session_start();
					$_SESSION['login'] = 1;
						$_SESSION['skip'] = $_SESSION['skip']?$_SESSION['skip']:0;
					$_SESSION['user'] = $user[0]['fname']." ".$user[0]['lname'];
					$_SESSION['username'] = $user[0]['username'];
					$_SESSION['userid'] = $user[0]['id'];
					$_SESSION['usertype'] = $usertype;
					
					$_SESSION['message']=LOGINSUCC;
					$_SESSION['alert']=1;
					$_SESSION['msgtype']='login';
					echo $_SESSION['userid'];
				}
				else {
					header("location:index.php?control=user&view=user&task=verify&tmpid=3&id=".$user[0]['id']);
				}
			}
			else {
				session_start();
				$_SESSION['message']=LOGINSFAIL;
				$_SESSION['alert']=3;
				$_SESSION['msgtype']='login';
				echo false;
			}
			
		}
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//                                  file upload function
		//////////////////////////////////////uploadFile function////////////////////////////////////////////
		/*
		######    $file= data should with name ie. $file = $_FILES['IMAGE']
		######    $directoryUrl should String
		######    $fileName should String without extension
		######    $allowExtension should in string
		######    $directory for create a new directory within within given $directoryUrl
		*/
		//////////////////////////////////////////////////////////////////////////////////
		function fileUpload($file,$directoryUrl=NULL,$fileName=NULL,$allowExtension=NULL,$directory=NULL) {
			if($directory) {
				if(!is_dir($directoryUrl."/".$directory)) {
					if(mkdir($directoryUrl."/".$directory,"0755")) {
						$directoryUrl = $directoryUrl."/".$directory;
					}
				}
				else {
					$directoryUrl = $directoryUrl."/".$directory;
				}
			}
			$arr = array("png","jpg","gif","jpeg");
			if($allowExtension) {
				$arr[] = $allowExtension;
			}
			$ex = $this->fileExtension($file['type']);
			$directoryUrl = $directoryUrl?$directoryUrl:"images";
			$fileName = $fileName?($fileName.".".$ex):$file['name'];
			if(in_array($ex,$arr)) {
				$src = $file['tmp_name'];
				$des = $directoryUrl."/".$fileName;
				if(move_uploaded_file($src,$des)) {
					return $directory?$directory."/".$fileName:$fileName;
				}
				else {
					return "Something wrong";
				}
			}
			else {
				return "Wrong";
			}
			
		}
		function fileExtension($ex) {
			switch($ex) {
				case "image/jpg":
				$str = "jpg";
				break;
				
				case "image/jpeg":
				$str = "jpg";
				break;
				
				case "image/png":
				$str = "png";
				break;
				
				case "image/gif":
				$str = "gif";
				break;		
				
				case "text/plain":
				$str = "txt";
				break;		
			}
			return $str;
		}
		
		
		
		
		/*######################## *PAGING FUNCTIONALITY FUNCTIONS START* #######################################*/
		function paginateHTML($reload, $page, $tpages, $adjacents,$maxpage=NULL) {
			//echo $page;
			$prevlabel = "Prev";
			$nextlabel = "Next";
			
			$out = "<ul>\n";
			
			// previous
			if($page==1) {
				$out.= "<li class='pagination-prev'><span class='pagenav'>" . $prevlabel . "</span></li>\n";
			}
			elseif($page==2) {
				$out.= "<li class='pagination-prev'><a href='#' style='cursor:pointer;' onclick=paging('1') class='pagenav'>" . $prevlabel . "</a></li>\n";
				//$out.= "<a onclick='paging(".$reload.")' href=\"" . $reload . "\">" . $prevlabel . "</a>\n";
			}
			else {
				//$out.= "<a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
				$out.= "<li class='pagination-prev'><a href='#' style='cursor:pointer;' onclick=paging('". ($page-1) ."')   class='pagenav'>" . $prevlabel . "</a></li>\n";
			}
			
			// first
			if($page>($adjacents+1)) {
				$out.= "<li><a  href='#' style='cursor:pointer;' onclick=paging('') class='pagenav'>1</a></li>\n";
				//$out.= "<a href=\"" . $reload . "\">1</a>\n";
			}
			
			// interval
			if($page>($adjacents+2)) {
				//$out.= "...\n";
				$out .= '';//"...\n";
			}
			
			// pages
			//echo $page;
			$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
			$pmax = $maxpage?$maxpage:(($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages);
			for($i=$pmin; $i<=$pmax; $i++) {
				if($i==$page) {
					$out.= "<li><span class=\"pagenav\">" . $i . "</span></li>\n";
				}
				elseif($i==1) {
					$out.= "<li><a href='#' class='pagenav' style='cursor:pointer;' onclick=paging('" . $i . "')>" . $i . "</a></li>\n";
				}
				else {
					if(($i>$page-4) and ($i<$page+4) and ($i!=$pmax)) {
						$out.= "<li><a href='#' class='pagenav' style='cursor:pointer;' onclick=paging('".$i."')>" . $i . "</a></li>\n";
					}
					if(($i==$pmax)) {
						$out.= "<li><a href='#' class='pagenav' style='cursor:pointer;' onclick=paging('".$i."')>" . $i . "</a></li>\n";
					}
				}
			}
			
			// interval
			if($page <($tpages-$adjacents-1)) {
				//$out.= "...";
				//$out .= '';//"...\n";
			}
			
			// last
			if($page<($tpages-$adjacents)) {
				//$out .= "<a onclick=paging('". $tpages."')></a>\n";
			}
			
			// next
			//echo $maxpage; 
			if($page<$maxpage) {
				$out .= "<li class='pagination-next'><a href='#' style='cursor:pointer;' onclick=paging('".($page+1)."')>" . $nextlabel . "</a></li>\n";
			}
			else {
				$out .= "<li class='pagination-next'><span class='pagenav'>" . $nextlabel . "</span></li>\n";
			}
			
			$out .= "</ul>";
	
			return $out;
		}
		function paginateHTML2($reload, $page, $tpages, $adjacents,$maxpage=NULL) {
			//echo $page;
			$prevlabel = "Prev";
			$nextlabel = "Next";
			
			$out = "<ul>\n";
			
			// previous
			if($page==1) {
				$out.= "<li class='pagination-prev'><span class='pagenav'>" . $prevlabel . "</span></li>\n";
			}
			elseif($page==2) {
				$out.= "<li class='pagination-prev'><a  href='#' style='cursor:pointer;' onclick=paging2('1') class='pagenav'>" . $prevlabel . "</a></li>\n";
				//$out.= "<a onclick='paging(".$reload.")' href=\"" . $reload . "\">" . $prevlabel . "</a>\n";
			}
			else {
				//$out.= "<a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
				$out.= "<li class='pagination-prev'><a href='#' style='cursor:pointer;' onclick=paging2('". ($page-1) ."')   class='pagenav'>" . $prevlabel . "</a></li>\n";
			}
			
			// first
			if($page>($adjacents+1)) {
				$out.= "<li><a  href='#' style='cursor:pointer;' onclick=paging2('') class='pagenav'>1</a></li>\n";
				//$out.= "<a href=\"" . $reload . "\">1</a>\n";
			}
			
			// interval
			if($page>($adjacents+2)) {
				//$out.= "...\n";
				$out .= '';//"...\n";
			}
			
			// pages
			//echo $page;
			$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
			$pmax = $maxpage?$maxpage:(($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages);
			for($i=$pmin; $i<=$pmax; $i++) {
				if($i==$page) {
					$out.= "<li><span class=\"pagenav\">" . $i . "</span></li>\n";
				}
				elseif($i==1) {
					$out.= "<li><a href='#' class='pagenav' style='cursor:pointer;' onclick=paging2('" . $i . "')>" . $i . "</a></li>\n";
				}
				else {
					if(($i>$page-4) and ($i<$page+4) and ($i!=$pmax)) {
						$out.= "<li><a href='#' class='pagenav' style='cursor:pointer;' onclick=paging2('".$i."')>" . $i . "</a></li>\n";
					}
					if(($i==$pmax)) {
						$out.= "<li><a href='#' class='pagenav' style='cursor:pointer;' onclick=paging2('".$i."')>" . $i . "</a></li>\n";
					}
				}
			}
			
			// interval
			if($page <($tpages-$adjacents-1)) {
				//$out.= "...";
				//$out .= '';//"...\n";
			}
			
			// last
			if($page<($tpages-$adjacents)) {
				//$out .= "<a onclick=paging('". $tpages."')></a>\n";
			}
			
			// next
			//echo $maxpage; 
			if($page<$maxpage) {
				$out .= "<li class='pagination-next'><a href='#' style='cursor:pointer;' onclick=paging2('".($page+1)."')>" . $nextlabel . "</a></li>\n";
			}
			else {
				$out .= "<li class='pagination-next'><span class='pagenav'>" . $nextlabel . "</span></li>\n";
			}
			
			$out .= "</ul>";
	
			return $out;
		}
		/*######################## *PAGING FUNCTIONALITY FUNCTIONS END* #######################################*/
		
		function getUserPoints($pointFrom,$userid=NULL,$type=NULL,$productId=NULL,$productType=NULL,$calculateValue=NULL) {
			session_start();
			$user_id = $userid?$userid:$_SESSION['userid'];
			$query_point_config = "SELECT * FROM confic WHERE 1";
			$this->Query($query_point_config);
			$confics = $this->fetchArray();
			foreach($confics as $v) {
				$confic[$v['title']] = $v['value'];
			}
			$query_check_user = "SELECT * FROM user_points WHERE user_id = '".$user_id."'";
			$this->Query($query_check_user);
			
			
			if($productType){
					switch($productType){
						case 'trip' :
						$totalUserPoints = ($calculateValue * $confic[$pointFrom] / 1000);
						break;
						case 'equipment' :
						$totalUserPoints = ($calculateValue * $confic[$pointFrom]);
						break;
						case 'food' :
						$totalUserPoints = ($calculateValue * $confic[$pointFrom]);
						break;
						case 'beverage' :
						$totalUserPoints = ($calculateValue * $confic[$pointFrom]);
						break;
						case 'cabin' :
						$totalUserPoints = ($calculateValue * $confic[$pointFrom]);
						break;
						default:
						$totalUserPoints =0;
					}
				
				}else{
				$totalUserPoints = $confic[$pointFrom];
				}
				
					
				
			
			
			if($this->rowCount()) {
				
				if($type=="used") 
				$query = "UPDATE user_points SET  point = (point -'".$totalUserPoints."') WHERE user_id = '".$user_id."'";
				else
				$query = "UPDATE user_points SET  point = (point +'".$totalUserPoints."') WHERE user_id = '".$user_id."'";
				
			}
			else {			
				$query = "INSERT INTO user_points (user_id,point,status) values('".$user_id."','".$totalUserPoints."','1')";
			}
			$this->Query($query);
			$this->Execute();
			
			$query_log = "INSERT INTO user_point_logs (user_id,point,point_from,type,date_time,product_id,product_type) values('".$user_id."','".$totalUserPoints."','".$pointFrom."','".($type?$type:"get")."','".date("Y-m-d H:i:s")."','".$productId."','".$productType."')";			
			$this->Query($query_log);
			$this->Execute();
			
			
		}
		function getLanguage() {
			$this->Query("SELECT * FROM languages WHERE status = '1'");
			$langResults = $this->fetchArray();
			return $langResults;	
		}
		
		function setLanguage() {
			file_put_contents("lang.txt",$_REQUEST['language_id']);
			if($_REQUEST['language_id']) {
				session_start();
				$_SESSION['language_id'] = $_REQUEST['language_id'];
				return "Yes";
			}			
			else {
				return "No";
			}
		die;
		}
		
		////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		######################  CURRENCY CODE START ################################
		////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		function getCurrency() {
			
			$this->Query("SELECT * FROM currencys WHERE status = '1'");
			$currResults = $this->fetchArray();
			return $currResults;	
		}
		function setCurrency() {
			session_start();
			if($_REQUEST['currency_id']) {
				$str = "SELECT * FROM currencys WHERE id = '".$_REQUEST['currency_id']."' and  status = '1'";
				file_put_contents("curr.txt",$str);
				
				$this->Query("SELECT * FROM currencys WHERE id = '".$_REQUEST['currency_id']."' and  status = '1'");
				$currResults = $this->fetchArray();
				$_SESSION['currency_id'] = $_REQUEST['currency_id'];
				$_SESSION['currency'] = $currResults[0]['currency'];
				$_SESSION['symbol'] = $currResults[0]['sign_code'];
				$_SESSION['value'] = $currResults[0]['value'];
				
				return "Yes";
			}			
				else {
				$this->Query("SELECT * FROM currencys WHERE default_cur = 1 and status = 1");
				$currResults = $this->fetchArray();
				$_SESSION['currency_id'] = $_REQUEST['currency_id'];
				$_SESSION['currency'] = $currResults[0]['currency'];
				$_SESSION['symbol'] = $currResults[0]['sign_code'];
				$_SESSION['value'] = $currResults[0]['value'];
				return "No";
			}
			die;	
		}
		////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		######################  CURRENCY CODE END   ################################
		////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		function taxolist() {
			session_start();
			$this->Query("select id from languages where deff = '1'");
			$def = $this->fetchArray(); 
			
			$q_show = "SELECT t.id,tc.content,t.keyword from taxonomy t JOIN taxonomy_content tc ON t.id = tc.taxonomy_id  WHERE t.status = '1' AND (tc.language_id = '".$_SESSION['language_id']."' or tc.language_id = '".$def[0]['id']."') order by tc.language_id  ";
			//$q_show = "SELECT t.id,tc.content,t.keyword from taxonomy t JOIN taxonomy_content tc ON t.id = tc.taxonomy_id  WHERE t.status = '1' AND (tc.language_id = '".$_SESSION['language_id']."' ) order by tc.taxonomy_id ";
			
			$this->Query($q_show);
			$data = $this->fetchArray();
			if($data) {
				foreach($data as $dt) {
					$arr[$dt['keyword']] = $dt['content'];
				}
			}
			return $arr;
		}
		function getConfic($title=NULL) {
			$str = $title?" title = '".$title."'":"1";
			$this->Query("select * from confic where $str");
			if($title) {
				$result = $this->fetchArray(); 
				return $result[0]['value'];
			}
			else {
				return $this->fetchArray();
			}
		}
	}
?>