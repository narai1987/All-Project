<?php
require_once('dbaccess.php');
class apiClass extends DbAccess {
    public $view='';
	public $name='api';
	
	
	
	
	
	
	
	function signUp(){
		if($_REQUEST['username'] && $_REQUEST['email'] && $_REQUEST['password']){
			
			$chk = "SELECT * FROM users WHERE email = '".$_REQUEST['email']."'";
			$this->Query($chk);
			$rows = $this->rowCount();
			
			$chk2 = "SELECT * FROM users WHERE username = '".$_REQUEST['username']."'";
			$this->Query($chk2);
			$rows2 = $this->rowCount();
			
			if(!$rows && !$rows2){
				$query = "INSERT INTO users (username,email,password,mobile,date_time,status) VALUES ('".$_REQUEST['username']."','".$_REQUEST['email']."','".md5($_REQUEST['password'])."','".$_REQUEST['mobile']."','".date("Y-m-d H:i:s")."','1')";
				$this->Query($query);
				if($this->Execute()){
					$lastInsertID = mysql_insert_id();
					$str['result']['status'] = "Yes";
					$fetch = "SELECT * FROM users WHERE email = '".$_REQUEST['email']."'";
					$this->Query($fetch);
					$results = $this->fetchObject();
					$str['result']['userID'] = $results[0]->id;
					$this->getUserPoints('join_point',$results[0]->id);
				}
				else{
					$str['result']['status'] = "No";
				}
			}else{
				$msg = '';
				if($rows && $rows2) {
					$msg = "Email ID and Username already exist";
				}
				else if($rows) {
					$msg = "Email ID already exist";
				}
				else if($rows2) {
					$msg = "Username already exist";
				}
			$str['result']['status'] = "Exist";
			$str['result']['msg'] = $msg;
			}
		}else{
		$str['result']['status'] = "No";
		}
		
		echo json_encode($str);
		die;
	}
	
	
	
	function signIn(){
		if($_REQUEST['username'] && $_REQUEST['password']){
			
			$chk = "SELECT * FROM users WHERE (email = '".$_REQUEST['username']."' OR username = '".$_REQUEST['username']."') AND password = '".md5($_REQUEST['password'])."'";
			$this->Query($chk);
			$rows = $this->rowCount();
			$results = $this->fetchObject();
			if($rows){
				$str['result']['status'] = "Yes";
				$str['result']['userID'] = $results[0]->id;
				//$this->getUserPoints('login_point',$results[0]->id);
			}else{
			$str['result']['status'] = "No";
			}
		}else{
		$str['result']['status'] = "No";
		}
		
		echo json_encode($str);
		die;
	}
	
	
	function lostPassword() {
		session_start();
		 $email = $_REQUEST['email'];
	    $chQuery = "SELECT * FROM users WHERE email = '".$_REQUEST['email']."'";
		$this->Query($chQuery);
	   // $num = $this->rowCount();
	    $results = $this->fetchArray();
		//echo '<pre>';
		//print_r($results);
		$token = strtotime(date("Y-m-d H:i:s")).rand();
		if($results){ 
			//echo $results[0]['username'];
			$qr = "update users set token = '".$token."',exp_date_time = '".date("Y-m-d H:i:s",mktime(date('H')+24,date('i'),date('s'),date('m'),date('d'),date('Y')))."' ,exp_status = '0'  where id = '".$results[0]['id']."'";
			$this->Query($qr);
			$this->Execute();
			
			
			 $query = "SELECT * FROM email_templates WHERE  status ='1' and type = 'Forget Password' and language_id='".$_SESSION['language_id']."'";
			$this->Query($query);
			$emails = $this->fetchArray();
			
			//echo $emails[0]['subject'];
			
			$url = "http://".$_SERVER['HTTP_HOST']."/idive/index.php?control=user&task=changemypass";
			$url .= "&token=".base64_encode($token)."&id=".$results[0]['id'];	
			
			
		    $to = $email;
			$from = "idive@gmail.com"; //$fromMail;//
			$subject = $emails[0]['subject'];//"Info: idive Forget Password";
			//$message = "Please click on the link and change your password. <a href=".$url.">Click Here</a>";
			$message = $emails[0]['title']." ". $emails[0]['content']." <a href=".$url.">Click Here</a>";  //////////////////////////////////////////////////
			
			if($this->mailsends($to,$from,$subject,$message)) {
				$str['result']['status'] = "Yes";
			}
			else {
				$str['result']['status'] = "No";
			}	
		}
		else { 
			$str['result']['status'] = "No";
		}
		
		echo json_encode($str);
		//echo "LOST PASSWORD CODE WRITE HERE..";
		die;
	}
	function changePassword() {
		$userID = $_REQUEST['userID'];
		$oldPassword = $_REQUEST['oldPassword'];
		$newPassword = $_REQUEST['newPassword'];
		if($userID) {
			$query = "SELECT * FROM users WHERE id = '".$userID."' and password = '".md5($oldPassword)."'";
			$this->Query($query);
			if($this->rowCount()) {
				if($newPassword) {
					$q_update = "UPDATE users SET password = '".md5($newPassword)."' WHERE id = '".$userID."'";
					$this->Query($q_update);
					if($this->Execute()) {
						$str['result']['status'] = "Yes";						
					}
					else {
						$str['result']['status'] = "No";	
					}
				}
				else {
					$str['result']['status'] = "Fill new password.";
				}
			}
			else {
				$str['result']['status'] = "Mismatch.";	
				$str['result']['msg'] = "Old password is wrong.";							
			}
		}
		else {
			$str['result']['status'] = "No";
		}
		echo json_encode($str);
		die;
	}
	
	
	
	
	function userProfile(){
		if($_REQUEST['userID']) {
			
			$chk = "SELECT * FROM users WHERE id = '".$_REQUEST['userID']."'";
			$this->Query($chk);
			$rows = $this->rowCount();
			$results = $this->fetchObject();
			if($rows) {
				$str['result']['userID'] = $results[0]->id;
				$str['result']['firstName'] = $results[0]->fname?$results[0]->fname:'';
				$str['result']['lastName'] = $results[0]->lname?$results[0]->lname:'';
				$str['result']['profileImageURL'] = "http://".$_SERVER['HTTP_HOST']."/idive/".$results[0]->image;
				$str['result']['email'] = $results[0]->email;
				$str['result']['contactNo'] = $results[0]->mobile;
				$str['result']['dob'] = (($results[0]->dob!='0000-00-00') && ($results[0]->dob != ''))?date("m/d/Y",strtotime($results[0]->dob)):'';
				$str['result']['language'] = $results[0]->language?$results[0]->language:'';
				$str['result']['address'] = $results[0]->address?$results[0]->address:'';
				$str['result']['divingCertification'] = '';
				$str['result']['noOfDiveDone'] = '';
			}
			else {
				$str['result']['status'] = "No";
			}
		}
		else {
			$str['result']['status'] = "No";
		}
		
		echo json_encode($str);
		die;
	}
	
	function updateUserProfile() {
		ini_set("upload_max_filesize","128M");
		$userID = $_REQUEST['userID'];
		$firstName = $_REQUEST['firstName'];
		$lastName = $_REQUEST['lastName'];
		$email = $_REQUEST['email'];
		$contactNo = $_REQUEST['contactNo'];
		//$dob = $_REQUEST['dob'];
		$dob = date("Y-m-d",strtotime($_REQUEST['dob']));
		$language = $_REQUEST['language'];
		$address = $_REQUEST['address'];
		$divingCertification = $_REQUEST['divingCertification'];
		$noOfDiveDone = $_REQUEST['noOfDiveDone'];
		$profileImage = $_FILES['profileImage'];
		
		
		///////////////FILE UPLOAD CODE START///////////////////////
		if(isset($profileImage['name'])):
			$createFolder = 'images/user';
			$ext=pathinfo($profileImage['name']);
			if($ext['extension']==''){
				$ext['extension'] = 'jpg';
			}
			$FileName='User_'.rand().".".$ext['extension'];
				if(!is_dir($createFolder))      
				mkdir($createFolder);
			if(move_uploaded_file($profileImage['tmp_name'],$createFolder."/".$FileName)){
			$profile_imagePath = $createFolder."/".$FileName;
			}
		endif;
		///////////////FILE UPLOAD CODE END/////////////////////////
		
		$string .= $string?($firstName?", fname = '".$firstName."'":""):($firstName?" fname = '".$firstName."'":"");
		$string .= $string?($lastName?", lname = '".$lastName."'":""):($lastName?" lname = '".$lastName."'":"");
		$string .= $string?($profileImage['name']?", image = '".$profile_imagePath."'":""):($profileImage['name']?" image = '".$profile_imagePath."'":"");
		$string .= $string?($email?", email = '".$email."'":""):($email?" email = '".$email."'":"");
		$string .= $string?($contactNo?", mobile = '".$contactNo."'":""):($contactNo?" mobile = '".$contactNo."'":"");
		$string .= $string?($dob?", dob = '".$dob."'":""):($dob?" dob = '".$dob."'":"");
		$string .= $string?($language?", language = '".$language."'":""):($language?" language = '".$language."'":"");
		$string .= $string?($address?", address = '".$address."'":""):($address?" address = '".$address."'":"");
		/*$string .= $string?($divingCertification?", fname5 = '".$divingCertification."'":""):($divingCertification?" fname5 = '".$divingCertification."'":"");
		$string .= $string?($noOfDiveDone?", fname5 = '".$noOfDiveDone."'":""):($noOfDiveDone?" fname5 = '".$noOfDiveDone."'":"");*/
		
		if($userID && $string) {
			$query_update = "UPDATE users SET ".$string." WHERE id = '".$userID."'";
			$this->Query($query_update);
			if($this->Execute()) {
				$str['result']['status'] = "Yes";
			}
			else {
				$str['result']['status'] = "No";
			}
		}
		else {
			$str['result']['status'] = "No";
		}
		echo json_encode($str);
		die;
		
	}
	
	
	
	function tripsByType($view) {
		$tripType = $_REQUEST['tripType'];
		$sql="select t.id, t.image, t.origin_id origin,t.destination_id,bs.boat_name,c.city,ts.trip_title from trips t JOIN trip_types tt ON t.trip_type_id = tt.id JOIN trip_specifications ts ON t.id = ts.trip_id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id JOIN cities c ON t.origin_id = c.id  WHERE t.status = '1' and ts.language_id = '1' and c.language_id = '1' and bs.language_id = '1' and t.trip_type_id = '".$tripType."'";
		$this->Query($sql);
		if(!$this->rowCount()) {
			$str['result'] = array();
		}
        else {
    		$i=0;
    		$str = '';
    		$results = $this->fetchArray();
    		foreach($results as $result) {	
    			
    			$url = "http://".$_SERVER['HTTP_HOST']."/idive/admin/".$result['image'];
    			$str['result'][$i]['tripID'] = $result['id']; 
    			$str['result'][$i]['tripTitle'] = $result['trip_title']." By ".$result['boat_name']; 
    			$str['result'][$i]['tripPlace'] = $result['city']?$result['city']:'';			
    			$str['result'][$i]['tripImageURL'] = $url; 
    			
    			$i++;
    		}
        }
		echo json_encode($str);
		die; 
	}
	
	function tripsByCategory() {
		if($_REQUEST['categoryType']=='1' or $_REQUEST['categoryType']=='2' or $_REQUEST['categoryType']=='3') {
			$categoryType = " and ".($this->tripCategory($_REQUEST['categoryType']));		
			
            $sql="select t.id, t.image, t.origin_id origin,t.destination_id,bs.boat_name,c.city,ts.trip_title  from trips t JOIN trip_types tt ON t.trip_type_id = tt.id JOIN trip_specifications ts ON t.id = ts.trip_id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id JOIN cities c ON t.origin_id = c.id WHERE t.status = '1' and ts.language_id = '1' and c.language_id = '1' and bs.language_id = '1' ".$categoryType;
			$this->Query($sql);            
    		$str = '';
			if(!$this->rowCount()) {
				$str['result'] = array();
			}
            else {
    			$i=0;
    			$results = $this->fetchArray();
    			foreach($results as $result) {	
    				$url = "http://".$_SERVER['HTTP_HOST']."/idive/admin/".$result['image'];
    				$str['result'][$i]['tripID'] = $result['id']; 
    			$str['result'][$i]['tripTitle'] = $result['trip_title']." By ".$result['boat_name']; 
    				$str['result'][$i]['tripPlace'] = $result['origin']?$this->cityById($result['origin']):'';			
    				$str['result'][$i]['tripImageURL'] = $url; 
    				
    				$i++;
    			}
            }
		}
		else {
			$str['result'] = array();	
		}
		echo json_encode($str);
		die; 
	}
	function tripGallery() {
		
		$id = $_REQUEST['tripID'];
		$q_gallery = "SELECT * FROM   trip_gallery WHERE trip_id = '".$id."' "; 
		$this->Query($q_gallery);
		
		if(!$this->rowCount())
			$str['result'] = array();
		$i=0;
		$str = '';
		$results = $this->fetchArray();
		if(count($results)) { 
			foreach($results as $result) {	
				$url = $result['image']?("http://".$_SERVER['HTTP_HOST']."/idive/admin/media/trips/".$result['trip_id']."/".$result['image']):("http://".$_SERVER['HTTP_HOST']."idive/admin/media/trips/trip.jpg");
				$str['result'][$i]['tripImageURL'] = $url; 
				$i++;
			}
		}
		else {
			$str['result'] = array();
		}
		echo json_encode($str);
		die; 	
	}
     function tripDetail() {
		$tripID = $_REQUEST['tripID'];
		$userID = $_REQUEST['userID'];
		$query = "SELECT * FROM wishlist WHERE user_id = '".$_REQUEST['userID']."' AND trip_id = '".$_REQUEST['tripID']."'";
		$this->Query($query);
		if($this->rowCount()) {
			$wishlist = 1;
		}
		$sql = "SELECT t.id,t.trip_price,ts.specification, t.image, ct.city origin,t.destination_id,bs.boat_name,c.country,ts.trip_title from trips t 
		JOIN trip_types tt ON t.trip_type_id = tt.id 
		JOIN trip_specifications ts ON t.id = ts.trip_id 
		JOIN boats b ON t.boat_id = b.id 
		JOIN boatspecifications bs ON b.id = bs.boat_id 
		JOIN countries c ON t.country_id = c.id 
		JOIN cities ct ON t.origin_id = ct.id 
		WHERE t.status = '1' and ts.language_id = '1' and bs.language_id = '1' and c.language_id = '1' and t.id = '".$tripID."'";
		$this->Query($sql); 
        if(!$this->rowCount())
			$str['result'] = array();
		$i=0;
		$str = '';
		$results = $this->fetchArray();
		require_once("views/".$this->name."/tripDetail.php"); 
    }
	function tripCategory($type) {
		switch($type) {
			case "1":
			return "lastminut = '1'";
			break;
			case "2":
			return "upcoming = '1'";
			break;
			case "3":
			return "popular = '1'";
			break;
		}		
		
	}
	
	/*SEARCH API START*/
	function searchCriteria() {
		$languageid = 1;
		$q_country = "SELECT * FROM countries WHERE status = '1' and language_id = '".$languageid."' ORDER BY country";
		$this->Query($q_country);
		$countrys = $this->fetchArray();
		$q_origin = "SELECT * FROM cities WHERE status = '1' and language_id = '".$languageid."' ORDER BY city";
		$this->Query($q_origin);
		$origins = $this->fetchArray();
		$q_destination = "SELECT * FROM cities WHERE status = '1' and language_id = '".$languageid."' ORDER BY city";
		$this->Query($q_destination);
		$destinations = $this->fetchArray();
		$str = '';
		$i1=0;
		foreach($countrys as $country) {
			$str['result']['country'][$i1]['countryID'] = (string)$country['id'];
			$str['result']['country'][$i1]['name'] = $country['country'];
			$i1++;
		}
		$i2=0;
		if(!count($origins)) {
			$str['result']['origin'][] = "";
		}
		foreach($origins as $origin) {
			$str['result']['origin'][$i2]['originID'] = (string)$origin['id'];
			$str['result']['origin'][$i2]['countryID'] = $origin['country_id'];
			$str['result']['origin'][$i2]['name'] = $origin['city'];
			////////////////////////////////////START COUNT DESTINATION FOR THE ORIGIN RELATED TO TRIP///////////////////////////////
			$q = "SELECT ct.id, ct.city FROM trips t JOIN trip_specifications ts ON t.id = ts.trip_id JOIN cities ct ON t.destination_id = ct.city WHERE ts.language_id = '1' and ct.language_id = '1' and  ct.id = '".$origin['id']."'  ";
			$this->Query($q);
			if($this->rowCount()) {
				$destinations = $this->fetchArray();
				$i3 = 0;
				foreach($destinations as $destination) {
					$str['result']['origin'][$i2]['destination'][$i3]['destinationID'] = (string)$destination['id'];
					$str['result']['origin'][$i2]['destination'][$i3]['name'] = $destination['city'];
					$i3++;
				}
			}
			else {
				$str['result']['origin'][$i2]['destination'] = array();
			}
			////////////////////////////////////END COUNT DESTINATION FOR THE ORIGIN RELATED TO TRIP///////////////////////////////
			$i2++;
		}		
		for($i=0; $i<=5; $i++) {
			$str['result']['price'][$i] = (($i)*1000)."-".(($i+1)*1000)." $";
		}
		$str['result']['price'][$i] = (($i)*1000)."-above $";
		for($i=0; $i<=9; $i++) {
			$str['result']['days'][$i] = (string)($i+1);
		}
		echo json_encode($str);
		die;
	}
	
	function search() {
		$countryID = $_REQUEST['countryID'];
		$originID = $_REQUEST['originID'];
		$destinationID = $_REQUEST['destinationID'];
		$price = $_REQUEST['price'];
		$days = $_REQUEST['days'];
		$str1 = '';
		$str1 .= $countryID?" and t.country_id='".$countryID."'":"";
		$str1 .= $originID?" and t.origin_id='".$originID."'":"";
		$str1 .= $destinationID?" and t.destination_id='".$destinationID."'":"";
		$price1 = explode("-",$price);
		$price2 = explode(" ",$price1['1']);
		$str1 .= $price?" and (t.trip_price>='".$price1[0]."' and t.trip_price<='".$price2[0]."')":"";
		$str1 .= $days?" and t.no_of_days='".$days."'":"";
		
		$sql="select distinct(t.id), t.image, bs.boat_name,ts.trip_title,c.country from trips t JOIN trip_specifications ts ON t.id = ts.trip_id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id JOIN countries c ON t.country_id = c.id WHERE t.status = '1' and ts.language_id = '1' and bs.language_id = '1' and c.language_id = '1' ".$str1;
		$this->Query($sql);            
		$str = '';
		if(!$this->rowCount()) {
			$str['result'] = array();
		}
		else {
			$i=0;
			$results = $this->fetchArray();
			foreach($results as $result) {	
				$url = "http://".$_SERVER['HTTP_HOST']."/idive/admin/".$result['image'];
				$str['result'][$i]['tripID'] = (string)$result['id']; 
			$str['result'][$i]['tripTitle'] = $result['trip_title']." By ".$result['boat_name']; 
				$str['result'][$i]['tripPlace'] = $result['origin']?$result['origin']:'';			
				$str['result'][$i]['tripImageURL'] = $url; 
				
				$i++;
			}
		}
		//echo "<pre>";
		echo json_encode($str);
		die;
	}
	
	/*SEARCH API END*/
	
	
	function mailsends($to,$from=NULL,$subject=NULL,$message=NULL) {
			
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
	function test() {
		echo date("Y-m-d",strtotime("4/13/1922"));
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       WISH LIST START                                ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////
	function addWishlist() {
		$query = "SELECT * FROM wishlist WHERE user_id = '".$_REQUEST['userID']."' AND trip_id = '".$_REQUEST['tripID']."'";
		$this->Query($query);
		if($this->rowCount()) {
			$query_del = "DELETE FROM wishlist WHERE user_id = '".$_REQUEST['userID']."' AND trip_id = '".$_REQUEST['tripID']."'";
			$this->Query($query_del);
			if($this->Execute()) {
				echo "images/add_wish.png";
			}
			else {
				echo false;
			}
		}
		else{
			$inQuery = "INSERT INTO wishlist (user_id,trip_id,date_time) VALUES ('".$_REQUEST['userID']."','".$_REQUEST['tripID']."','".date("Y-m-d H:is")."')";
			$this->Query($inQuery);
			if($this->Execute()) {
				echo "images/rm_wish.png";
			}
			else {
				echo false;
			}
		}
	}
	function wishlist() {
		$query="SELECT t.id, t.image, bs.boat_name,c.country from trips t JOIN wishlist ws ON t.id = ws.trip_id JOIN trip_specifications ts ON t.id = ts.trip_id JOIN boats b ON t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id JOIN countries c ON t.country_id = c.id WHERE t.status = '1' and ts.language_id = '1' and c.language_id = '1' and bs.language_id = '1' and  ws.user_id = '".$_REQUEST['userID']."' ";
		
		
		$this->Query($query);
		$str = '';
		if(!$this->rowCount()) {
			$str['result'] = array();
		}
		else {
			$i=0;
			$results = $this->fetchArray();
			foreach($results as $result) {	
				$url = "http://".$_SERVER['HTTP_HOST']."/idive/admin/".$result['image'];
				$str['result'][$i]['tripID'] = $result['id']; 
				$str['result'][$i]['tripTitle'] = $result['trip_title']." By ".$result['boat_name']; 
				$str['result'][$i]['tripPlace'] = $result['origin']?$result['origin']:'';			
				$str['result'][$i]['tripImageURL'] = $url; 
				
				$i++;
			}
		}
		
		echo json_encode($str);
		die;
	}
	function removeWishlist() {
		$query = "SELECT * FROM wishlist WHERE user_id = '".$_REQUEST['userID']."' AND trip_id = '".$_REQUEST['tripID']."'";
		$this->Query($query);
		if($this->rowCount()) {
			$query_del = "DELETE FROM wishlist WHERE user_id = '".$_REQUEST['userID']."' AND trip_id = '".$_REQUEST['tripID']."'";
			$this->Query($query_del);
			if($this->Execute()) {
				$str['result']['status'] = "Yes";
				$str['result']['msg'] = "Trip removed from wishlist.";
			}
			else {
				$str['result']['status'] = "No";
			}
		}
		else {
			$str['result']['status'] = "No";
		}
		echo json_encode($str);
		die;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       WISH LIST END                                  ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       MY BOOKING START                                  ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////
	
	///////////////////choose schedule for trip/////////////////
	function bookingMember() {
		$tripId = $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];
		$userId = $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];
		if($this->findById($userId,"users")){
			$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules  WHERE trip_id = '".$tripId."' and status = '1' and start_trip_datetime >'".date("Y-m-d H:i:s")."'";
			$this->Query($q_schedule);
			$results = $this->fetchArray();
			
			$q_book_schedule = "SELECT * FROM bookings WHERE user_id = '".$userId."' and trip_id = '".$tripId."'";
			$this->Query($q_book_schedule);
			$schedules = $this->fetchArray();
			
			foreach($schedules as $schedule) {
				$data[$schedule['trip_schedule_id']]['status'] = ($schedule['trip_status']==1)?("Pending"):(($schedule['trip_status']==2)?("Running"):(($schedule['trip_status']==3)?("Cancelled"):(($schedule['trip_status']==4)?("completed"):("uncomplete"))));  
			}
			require_once("views/".$this->name."/".$this->task.".php"); 
		}
	}
	///////////////////end choose schedule for trip/////////////////
	function scheduleTrip() {
		
		$tripId = $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];
		$userId = $_REQUEST['userId']?$_REQUEST['userId']:($_REQUEST['userID']?$_REQUEST['userID']:'');
		$scheduleId = $_REQUEST['scheduleId']?$_REQUEST['scheduleId']:0;
		$q_booking = "SELECT * FROM bookings WHERE trip_id = '".$tripId."' and trip_schedule_id = '".$scheduleId."' and user_id = '".$userId."'";
		$this->Query($q_booking);
		$bookkid = $this->fetchArray();
		
		$bookingId = $_REQUEST['bookingId']?$_REQUEST['bookingId']:($bookkid[0]['id']);
		if($bookingId) {
			$q_person = "SELECT * FROM booking_persons WHERE booking_id = '".$bookingId."' ";
			$this->Query($q_person);
			$persons = $this->fetchArray();
			
			$q_booking = "SELECT * FROM bookings WHERE id = '".$bookingId."' ";
			$this->Query($q_booking);
			$bookings = $this->fetchArray();
			$q_certificate = "SELECT * FROM dive_certificates WHERE status = '1' and language_id = '1'";
			$this->Query($q_certificate);
			$certificates = $this->fetchArray();
		}
		
		/*$q_userSchedule = "SELECT trip_schedule_id FROM bookings WHERE user_id = '".$userId."' and trip_id = '".$tripId."' AND trip_status = 1 AND pay_status = 1";
		$this->Query($q_userSchedule);
		$userbookSchedules = $this->fetchArray();
		foreach($userbookSchedules as $val) {
			$userbookSchedule .= $userbookSchedule?",".$val['trip_schedule_id']:$val['trip_schedule_id'];
		}
		
		if($userbookSchedule) $newQuery = " AND id not in (".$userbookSchedule.")";
		
		$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules  WHERE trip_id = '".$tripId."' ".$newQuery." and status = '1' and start_trip_datetime >'".date("Y-m-d H:i:s")."'";
		
		$this->Query($q_schedule);
		$schedules = $this->fetchArray();*/
		$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules  WHERE id = '".$scheduleId."' ";
		
		$this->Query($q_schedule);
		$schedules = $this->fetchArray();
		require_once("views/".$this->name."/scheduleTrip.php"); 
	}
	function divPerson() {
		$person = $_REQUEST['person'];
		$q_certificate = "SELECT * FROM dive_certificates WHERE status = '1' and language_id = '1'";
		$this->Query($q_certificate);
		$certificates = $this->fetchArray();
		
		
		require_once("../views/".$this->name."/member.php"); 
		die;
	}
	
	function tripDateTime() {
		$tripId = $_REQUEST['tripId'];
		$userId = $_REQUEST['userId'];
		$scheduleId = $_REQUEST['scheduleId'];
		$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules WHERE trip_id = '".$tripId."' and status = '1' and start_trip_datetime>'".date("Y-m-d H:i:s")."'";
		$this->Query($q_schedule);
		$schedules = $this->fetchArray();
		$q_query = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules WHERE id = '".$scheduleId."'";
		$this->Query($q_query);
		$dateTime = $this->fetchArray();
		require_once("../views/".$this->name."/tripDateTime.php"); 
		die;
	}
	
	
	
	
	function getAvailableCabin($scheduleId, $userId, $cabinId){
			$query = "SELECT id AS bookingId FROM bookings WHERE trip_schedule_id = '".$scheduleId."' AND user_id != '".$userId."'";
			$this->Query($query);
			$rows = $this->fetchArray();
			foreach($rows AS $row):
				$this->Query("SELECT no_of_cabin FROM booking_cabins WHERE booking_id = '".$row['bookingId']."' AND boat_cabin_id = '".$cabinId."'");
				$data = $this->fetchArray();
				if($data)
				$bookedCabin = $bookedCabin + $data[0]['no_of_cabin'];
				else
				$bookedCabin = $bookedCabin + 0;
			endforeach;
			
			return $bookedCabin;
			
	}
	
	
	
	function saveMember() {
		//$scheduleId = ($_REQUEST['start_date']==$_REQUEST['end_date'])?$_REQUEST['start_date']:(($bookings[0]['schedule_id'])?($bookings[0]['schedule_id']):(''));
		$scheduleId = $_REQUEST['scheduleId'];
		if($_REQUEST['bookingId']) {
			$q_booking = "SELECT * FROM bookings  WHERE id = '".$_REQUEST['bookingId']."'";
			$this->Query($q_booking);
			$bookings = $this->fetchArray();
		}
		
		$tripId = $_REQUEST['tripId'];
		$userId = $_REQUEST['userId']; 
		
		
		$maxChildAge = 12;
		
		
		
		if($scheduleId) {
			if(count($bookings)) {
				$q_booking = "UPDATE `bookings` SET `trip_schedule_id` = '".$scheduleId."' ,`trip_status` = '0', `pay_status` = '0', `booking_date` = '".date("Y-m-d H:i:s")."',  `no_of_person` = '".$_REQUEST['adult']."', `no_of_child` = '".$_REQUEST['child']."', `status` = '0' WHERE `trip_id` = '".$tripId."' and  `user_id` = '".$userId."' and `id` = '".$_REQUEST['bookingId']."'";
				$this->Query($q_booking);
				$this->Execute();
				$booking_id = $_REQUEST['bookingId'];
				$q_delete = "delete from `booking_persons` where booking_id = '".$booking_id."'";
				$this->Query($q_delete);
				$this->Execute();
				$query = "INSERT INTO `booking_persons` (`id`, `booking_id`, `user_id`, `relation_id`, `p_name`, `p_gender`, `p_age`, `dive_certificate_id`) VALUES";
				if(isset($_REQUEST['person'])){
					for($i=0;$i<count($_REQUEST['person']);$i++) {
						$str .= $str?(",('', '".$booking_id."', '".$userId."', 0, '".$_REQUEST['person'][$i]."', '".$_REQUEST['gender'][$i]."', '".$_REQUEST['age'][$i]."', '".$_REQUEST['certificate'][$i]."')"):("('', '".$booking_id."', '".$userId."', 0, '".$_REQUEST['person'][$i]."', '".$_REQUEST['gender'][$i]."', '".$_REQUEST['age'][$i]."', '".$_REQUEST['certificate'][$i]."')");
					}
				$query .= $str;
				$this->Query($query);
				$this->Execute();
				}
				
				$q_person = "SELECT count(*) no_of_person  FROM booking_persons bp
				JOIN bookings b ON bp.booking_id = b.id
				JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
				WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age > '".$maxChildAge."' ";
				$this->Query($q_person);
				$persons = $this->fetchArray();
		
				$q_child = "SELECT count(*) no_of_child FROM booking_persons bp
				JOIN bookings b ON bp.booking_id = b.id
				JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
				WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age <= '".$maxChildAge."' ";
				$this->Query($q_child);
				$childs = $this->fetchArray();
		
				$q_booking = "UPDATE `bookings` SET `no_of_person` = '".$persons[0]['no_of_person']."', `no_of_child` = '".$childs[0]['no_of_child']."' WHERE `trip_id` = '".$tripId."' and  `user_id` = '".$userId."' and `id` = '".$booking_id."'";
				$this->Query($q_booking);
				$this->Execute();
				
				
				
				
			}
			else {
				$q_booking = "INSERT INTO `bookings` (`id`, `trip_id`, `trip_schedule_id`, `user_id`, `trip_status`, `pay_status`, `booking_date`, `cancel_status`, `no_of_person`, `no_of_child`, `status`) VALUES('', '".$tripId."', '".$scheduleId."', '".$userId."', 0, 0, '".date("Y-m-d H:i:s")."', 0, '".$_REQUEST['adult']."', '".$_REQUEST['child']."', 0)";
				$this->Query($q_booking);
				$this->Execute();
				$booking_id = mysql_insert_id();
				$query = "INSERT INTO `booking_persons` (`id`, `booking_id`, `user_id`, `relation_id`, `p_name`, `p_gender`, `p_age`, `dive_certificate_id`) VALUES";
				if(isset($_REQUEST['person'])){
					for($i=0;$i<count($_REQUEST['person']);$i++) {
						$str .= $str?(",('', '".$booking_id."', '".$userId."', 0, '".$_REQUEST['person'][$i]."', '".$_REQUEST['gender'][$i]."', '".$_REQUEST['age'][$i]."', '".$_REQUEST['certificate'][$i]."')"):("('', '".$booking_id."', '".$userId."', 0, '".$_REQUEST['person'][$i]."', '".$_REQUEST['gender'][$i]."', '".$_REQUEST['age'][$i]."', '".$_REQUEST['certificate'][$i]."')");
					}
				$query .= $str;
				$this->Query($query);
				$this->Execute();
				}
				
				$q_person = "SELECT count(*) no_of_person  FROM booking_persons bp
				JOIN bookings b ON bp.booking_id = b.id
				JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
				WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age > '".$maxChildAge."' ";
				$this->Query($q_person);
				$persons = $this->fetchArray();
		
				$q_child = "SELECT count(*) no_of_child FROM booking_persons bp
				JOIN bookings b ON bp.booking_id = b.id
				JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
				WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age <= '".$maxChildAge."' ";
				$this->Query($q_child);
				$childs = $this->fetchArray();
		
				$q_booking = "UPDATE `bookings` SET `no_of_person` = '".$persons[0]['no_of_person']."', `no_of_child` = '".$childs[0]['no_of_child']."' WHERE `trip_id` = '".$tripId."' and  `user_id` = '".$userId."' and `id` = '".$booking_id."'";
				$this->Query($q_booking);
				$this->Execute();
				
				
			}
			
			$q_book_equipment = "SELECT * FROM booking_equipments WHERE booking_id = '".$booking_id."'";
			$this->Query($q_book_equipment);
			$book_equipments = $this->fetchArray();
			foreach($book_equipments as $book_equipment) {
				$bookEquipment[$book_equipment['equipment_id']] = $book_equipment;
			}
			
			$q_equipment = "SELECT eqp.*, e.equipment FROM trip_schedules ts JOIN trip_equipments eqp ON ts.id = eqp.trip_schedule_id JOIN equipments e ON eqp.equipment_id = e.id WHERE ts.id = '".$scheduleId."' and eqp.eq_type = 'paid' and e.language_id = '1'";
			$this->Query($q_equipment);
			$equipments = $this->fetchArray();
			
			
			
			$q_book_cabin = "SELECT * FROM booking_cabins WHERE booking_id = '".$booking_id."'";
			$this->Query($q_book_cabin);
			$book_cabins = $this->fetchArray();
			foreach($book_cabins as $book_cabin) {
				$bookCabin[$book_cabin['boat_cabin_id']] = $book_cabin;
			}
			$q_cabin = "SELECT c.cabin,bc.id, bc.no_of_cabin, bc.no_of_person, bc.cabin_price FROM cabins c JOIN boat_cabins bc ON c.id = bc.cabin_id JOIN trips t ON bc.boat_id = t.boat_id WHERE t.id = '".$tripId."' and c.language_id = '1'";
			$this->Query($q_cabin);
			$cabins = $this->fetchArray();
			
			
			
			$q_book_beverage = "SELECT * FROM booking_beverages WHERE booking_id = '".$booking_id."'";
			$this->Query($q_book_beverage);
			$book_beverages = $this->fetchArray();
			foreach($book_beverages as $book_beverage) {
				$bookBeverage[$book_beverage['trip_beverage_id']] = $book_beverage;
			}
			$q_beverage = "SELECT b.beverage, tb.* FROM beverages b JOIN trip_beverages tb ON b.id = tb.beverage_id JOIN trips t ON tb.trip_id = t.id WHERE t.id = '".$tripId."' and trip_schedule_id = '".$scheduleId."' and tb.eq_type = 'paid' and b.language_id = '1'";
			$this->Query($q_beverage);
			$beverages = $this->fetchArray();
			
			
			
			$q_book_food = "SELECT * FROM booking_foods WHERE booking_id = '".$booking_id."'";
			$this->Query($q_book_food);
			$book_foods = $this->fetchArray();
			foreach($book_foods as $book_food) {
				$bookFood[$book_food['trip_food_id']] = $book_food;
			}
			//print_r($bookCabin);
			$q_food = "SELECT f.food, tf.* FROM foods f JOIN trip_foods tf ON f.id = tf.food_id JOIN trips t ON tf.trip_id = t.id WHERE t.id = '".$tripId."' and tf.trip_schedule_id = '".$scheduleId."' and tf.eq_type = 'paid' and f.language_id = '1'";
			$this->Query($q_food);
			$foods = $this->fetchArray();
			require_once("views/".$this->name."/booking.php"); 
		}
		else {
			echo "No";	
		}
		die;
	}
	
	function addToCart() {
		$userId = $_REQUEST['userId'];
		$tripId = $_REQUEST['tripId'];
		$scheduleId = $_REQUEST['scheduleId'];
		$bookingId = $_REQUEST['bookingId'];
		
		
		/*COUPON LISTING OF USER ON A PARTICULAR TRIP*/
		
		$cQuery = "SELECT c.id AS coupon_id,c.discount,cd.title,cu.coupon_code,cu.coupon_status,cu.user_id,ca.attached_id AS tripSchid FROM coupons c "
				. " JOIN coupon_users cu ON cu.coupon_id = c.id JOIN coupon_attached_to ca ON ca.coupon_id = c.id JOIN coupon_details cd ON "
				. " cd.coupon_id = c.id WHERE cu.user_id = '".$userId."' AND ca.attached_id  = '".$scheduleId."' "
				. " AND (cu.coupon_status = 1 OR cu.coupon_status = 3) AND cd.language_id = 1 AND (cu.product_id = 0 OR cu.product_id = '".$scheduleId."')";
			$this->Query($cQuery);
			$couponLists = $this->fetchObject();
		
		
		/*COUPON LISTING OF USER ON A PARTICULAR TRIP END*/
		
		/*GET USER TOTAL POINTS START*/
		$this->Query("SELECT point FROM user_points WHERE user_id ='".$userId."'");
		$points = $this->fetchObject();
			/*GET USER POINTS WHICH HE USED ON PURCHASING A TRIP IF */
			$this->Query("SELECT point FROM user_point_logs WHERE user_id ='".$userId."' AND point_from = 'use_point_on_purchase_product' AND type = 'used' AND product_id = '".$scheduleId."' AND product_type = 'trip'");
			$usedPoints = $this->fetchObject();
			/*GET USER POINTS WHICH HE USED ON PURCHASING A TRIP IF */
		
		/*GET USER TOTAL POINTS END*/
		
		
		$q_delete_booking_equipment = "DELETE FROM `booking_equipments` WHERE booking_id = '".$bookingId."'";
		$q_delete_booking_food = "DELETE FROM `booking_foods` WHERE booking_id = '".$bookingId."'";
		$q_delete_booking_beverage = "DELETE FROM `booking_beverages` WHERE booking_id = '".$bookingId."'";
		$q_delete_booking_cabin = "DELETE FROM `booking_cabins` WHERE booking_id = '".$bookingId."'";
		
		$this->Query($q_delete_booking_equipment);
		$this->Execute();
		$this->Query($q_delete_booking_food);
		$this->Execute();
		$this->Query($q_delete_booking_beverage);
		$this->Execute();
		$this->Query($q_delete_booking_cabin);
		$this->Execute();
		
		/*save data for cabin into booking_cabins table start*/
		$cabinbox = $_REQUEST['cabinbox'];
		if(count($cabinbox)) {
			for($i=0;$i<count($cabinbox);$i++) {
				$cabinId = $cabinbox[$i];
				$choose_no_cabin = $_REQUEST['choose_no_cabin'.$cabinId];
				$cabinprice = $_REQUEST['cabinprice'.$cabinId];
				$str_cabin .= $str_cabin?", ('', '".$bookingId."', '".$cabinId."', '".$choose_no_cabin."', '".($choose_no_cabin)*($cabinprice)."')":"('', '".$bookingId."', '".$cabinId."', '".$choose_no_cabin."', '".($choose_no_cabin)*($cabinprice)."')";
			}
			$q_booking_cabin = "INSERT INTO `booking_cabins` (`id`, `booking_id`, `boat_cabin_id`, `no_of_cabin`, `cabin_price`) VALUES ".$str_cabin;
			$this->Query($q_booking_cabin);
			$this->Execute();
		}
		/*save data for cabin into booking_cabins table end*/
		
		/*save data for options into booking_equipments table start*/
		$equipmentbox = $_REQUEST['equipmentbox'];
		if(count($equipmentbox)) {
			for($i=0;$i<count($equipmentbox);$i++) {
				$equipmentId = $equipmentbox[$i];
				$choose_no_eqipment = $_REQUEST['choose_no_eqipment'.$equipmentId];
				$eq_value = $_REQUEST['eq_value'.$equipmentId];
				$str_eqipment .= $str_eqipment?", ('', '".$bookingId."', '".$equipmentId."', '".$choose_no_eqipment."', '".($choose_no_eqipment)*($eq_value)."')":"('', '".$bookingId."', '".$equipmentId."', '".$choose_no_eqipment."', '".($choose_no_eqipment)*($eq_value)."')";
			}
			$q_booking_equipment = "INSERT INTO `booking_equipments` (`id`, `booking_id`, `equipment_id`, `no_of_equipment`, `eq_prices`) VALUES ".$str_eqipment;
			$this->Query($q_booking_equipment);
			$this->Execute();
		}
		/*save data for options into booking_equipments table end*/
		
		/*save data for Beverage into booking_beverages table start*/
		$beveragebox = $_REQUEST['beveragebox'];
		if(count($beveragebox)) {
		
			for($i=0;$i<count($beveragebox);$i++) {
				$beveragetId = $beveragebox[$i];
				$choose_no_beverage = $_REQUEST['choose_no_beverage'.$beveragetId];
				$beverage_price = $_REQUEST['beverage_price'.$beveragetId];
				$str_beverage .= $str_beverage?", ('', '".$bookingId."', '".$beveragetId."', '".$choose_no_beverage."', '".($choose_no_beverage)*($beverage_price)."')":"('', '".$bookingId."', '".$beveragetId."', '".$choose_no_beverage."', '".($choose_no_beverage)*($beverage_price)."')";
			}
			$q_booking_beverage = "INSERT INTO `booking_beverages` (`id`, `booking_id`, `trip_beverage_id`, `no_of_qty`, `beverage_price`) VALUES ".$str_beverage;
			$this->Query($q_booking_beverage);
			$this->Execute();
		}
		/*save data for Beverage into booking_beverages table end*/
		
		/*save data for Foods into booking_foods table start*/
		$foodbox = $_REQUEST['foodbox'];
		if(count($foodbox)) {
			for($i=0;$i<count($foodbox);$i++) {
				$foodId = $foodbox[$i];
				$choose_no_food = $_REQUEST['choose_no_food'.$foodId];
				$food_eq_value = $_REQUEST['food_eq_value'.$foodId];
				$str_food .= $str_food?", ('', '".$bookingId."', '".$foodId."', '".$choose_no_food."', '".($choose_no_food)*($food_eq_value)."')":"('', '".$bookingId."', '".$foodId."', '".$choose_no_food."', '".($choose_no_food)*($food_eq_value)."')";
			}
			$q_booking_food = "INSERT INTO `booking_foods` (`id`, `booking_id`, `trip_food_id`, `no_of_qty`, `food_price`) VALUES ".$str_food;
			$this->Query($q_booking_food);
			$this->Execute();  
		}
		/*save data for Foods into booking_foods table end*/
		
		
		
		$q_tax = "SELECT * FROM confic WHERE title = 'service tax'";
		$this->Query($q_tax);
		$serviceTax = $this->fetchArray();
		$tax = $serviceTax[0]['value'];
		/*GET DATA FOR THE CART PAGE "CABIN","BEVERAGE","OPTION","FOOD" START*/
		
		$q_equipment = "SELECT e.equipment,eqp.eq_value,be.*, e.equipment FROM trip_schedules ts JOIN trip_equipments eqp ON ts.id = eqp.trip_schedule_id JOIN equipments e ON eqp.equipment_id = e.id join booking_equipments be ON eqp.id = be.equipment_id JOIN bookings b ON be.booking_id = b.id WHERE ts.id = '".$scheduleId."' and be.booking_id = '".$bookingId."' and e.language_id = '1' and b.user_id = '".$userId."'";
		$this->Query($q_equipment);
		$equipments = $this->fetchArray();
		
		$q_cabin = "SELECT * FROM cabins c 
		JOIN boat_cabins bc ON c.id = bc.cabin_id 
		JOIN booking_cabins bkc ON bc.id = bkc.boat_cabin_id 
		JOIN bookings b ON b.id = bkc.booking_id 
		JOIN trip_schedules ts ON b.trip_schedule_id = ts.id 
		WHERE ts.id = '".$scheduleId."' and b.user_id = '".$userId."' and c.language_id = '1'";
		
		$this->Query($q_cabin);
		$cabins = $this->fetchArray();
		//print_r($cabins);
		$q_food = "SELECT f.food, bf.* FROM foods f 
		JOIN trip_foods tf ON f.id = tf.food_id 
		JOIN booking_foods bf ON tf.id = bf.trip_food_id 
		JOIN bookings b ON b.id = bf.booking_id 
		JOIN trip_schedules ts ON b.trip_schedule_id = ts.id 
		WHERE tf.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and f.language_id = '1'";
		$this->Query($q_food);
		$foods = $this->fetchArray();
		
		$q_beverage = "SELECT bv.beverage, bb.* FROM beverages bv 
		JOIN trip_beverages tb ON bv.id = tb.beverage_id 
		JOIN booking_beverages bb ON tb.id = bb.trip_beverage_id 
		JOIN bookings b ON b.id = bb.booking_id 
		JOIN trip_schedules ts ON b.trip_schedule_id = ts.id 
		WHERE  b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and bv.language_id = '1'";
		$this->Query($q_beverage);
		$beverages = $this->fetchArray();
						
		$q_service_tax = "SELECT value FROM confic WHERE confic_type_id = '1' AND title = 'service_tax' ";
		$this->Query($q_service_tax);
		$service_tax = $this->fetchArray();
		$serviceTax = $service_tax[0]['value'];
		
		$maxChildAge = 12;
		
		
		$q_person = "SELECT count(*) no_of_person  FROM booking_persons bp
		JOIN bookings b ON bp.booking_id = b.id
		JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
		WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age > '".$maxChildAge."' ";
		$this->Query($q_person);
		$persons = $this->fetchArray();
		
		/*GET NO OF CHILD BELOW 6 YEARS*/
		$q_child6 = "SELECT count(*) no_of_child FROM booking_persons bp
		JOIN bookings b ON bp.booking_id = b.id
		JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
		WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age < '6' ";
		$this->Query($q_child6);
		$child6s = $this->fetchArray();
		/*GET NO OF CHILD BELOW 6 YEARS*/
		
		/*GET NO OF CHILD BETWEEN 6-12 YEARS*/
		$q_child12 = "SELECT count(*) no_of_child FROM booking_persons bp
		JOIN bookings b ON bp.booking_id = b.id
		JOIN trip_schedules ts ON b.trip_schedule_id = ts.id
		WHERE b.trip_schedule_id = '".$scheduleId."' and b.user_id = '".$userId."' and p_age >= '6' and p_age <= '".$maxChildAge."' ";
		$this->Query($q_child12);
		$child12s = $this->fetchArray();
		/*GET NO OF CHILD BETWEEN 6-12 YEARS*/
		
		$totalChildren = $child12s[0]['no_of_child'] + $child6s[0]['no_of_child'];
		
		
		$q_booking = "UPDATE `bookings` SET `no_of_person` = '".$persons[0]['no_of_person']."', `no_of_child` = '".$childs[0]['no_of_child']."' WHERE `trip_id` = '".$tripId."' and  `user_id` = '".$userId."' and `id` = '".$bookingId."'";
		$this->Query($q_booking);
		$this->Execute();
		
		$q_schedule_price = "SELECT trip_price FROM trip_schedules WHERE id = '".$scheduleId."'";
		$this->Query($q_schedule_price);
		$tripPrices = $this->fetchArray();
		$tripPrice = $tripPrices[0]['trip_price'];
		
		
		/*GET CHILD TRIP DISCOUNT BELOW 6 YEARS AND BETWEEN 6-12 YEARS*/
			$getChildDiscountPercentQuery = "SELECT b.child_discount1 AS discountBelow6 , b.child_discount2 AS discountSixTo12 "
											. " FROM trips t JOIN boats b ON b.id = t.boat_id WHERE t.id = '".$tripId."'";
			$this->Query($getChildDiscountPercentQuery);
			$childDiscounts = $this->fetchArray();
			
			$discountBelow6 = ($child6s[0]['no_of_child']*($tripPrice*$childDiscounts[0]['discountBelow6'])/100);
			$discountSixTo12 = ($child12s[0]['no_of_child']*($tripPrice*$childDiscounts[0]['discountSixTo12'])/100);					
		
		$childPriceAfterDiscount = $discountBelow6 + $discountSixTo12;
		/*GET CHILD TRIP DISCOUNT BELOW 6 YEARS AND BETWEEN 6-12 YEARS*/
		
		
		/*GET DATA FOR THE CART PAGE "CABIN","BEVERAGE","OPTION","FOOD" END*/
		require_once("views/".$this->name."/addToCart.php"); 
	}
	
	
	
	function updatePaymentWebview(){
		$booking_id = $_REQUEST['booking_id'];
		$coupon_id = $_REQUEST['coupon_id'];
		$coupon_code = $_REQUEST['coupon_code'];
		$serviceTax = $_REQUEST['tax'];
		$totalPrice = $_REQUEST['totalPrice'];
		$discount = $_REQUEST['discount'];
		$calculationType = $_REQUEST['perform'];
		$userId = $_REQUEST['user_id'];
		
		$tripId = $_REQUEST['tripId'];
		$scheduleId = $_REQUEST['scheduleId'];
		
		$this->Query("SELECT trip_type_id FROM trips WHERE id = '".$tripId."'");
		$tripTypeID = $this->fetchObject();
		
		
		/*GET USERS ALL COUPONS LIST WHICH HE ALREADY REDEEMED TO GET UPDATED AMOUNT*/
			$cQuery = "SELECT c.discount FROM coupons c JOIN coupon_users cu ON "
				. " cu.coupon_id = c.id JOIN coupon_attached_to ca ON ca.coupon_id = c.id "
				. " WHERE cu.user_id = '".$userId."' AND ca.attached_id  = '".$scheduleId."' "
				. " AND cu.coupon_status = 3 AND cu.product_id = '".$scheduleId."'";
			$this->Query($cQuery);
			$couponLists = $this->fetchObject();
			$discountUserHave = 0;
			if($couponLists){
				foreach($couponLists AS $clist):
					$discountUserHave += $clist->discount;
				endforeach;
			}
			
			/*GET UPDATE TOTAL AMOUNT START*/
			$updateAmount = $totalPrice - (($totalPrice * $discountUserHave) / 100);
			/*GET UPDATE TOTAL AMOUNT END*/
			
			/*GET USERS POINT WHICH HE ALREADY USED ON PURCHASING TRIP*/
				$this->Query("SELECT point FROM user_point_logs WHERE type = 'used' AND user_id = '".$userId."' AND product_id = '".$scheduleId."' AND point_from = 'use_point_on_purchase_product' AND product_type = 'trip'");
				$rows = $this->fetchObject();
				$alreadyUsedPoints = 0;
				if($rows){
					foreach($rows AS $row):
						$alreadyUsedPoints += $row->point;
					endforeach;
				}
				
				$updateAmount = $updateAmount - ($alreadyUsedPoints * $this->getConfic('price_per_100_point') / 100);
			/*GET USERS POINT WHICH HE ALREADY USED ON PURCHASING TRIP*/
			
		/*GET USERS ALL COUPONS LIST WHICH HE ALREADY REDEEMED TO GET UPDATED AMOUNT*/
		
		
		
		if($calculationType == 'sub'){
			$available = ($updateAmount) - ($discount);
			$this->Query("UPDATE coupon_users SET coupon_status = '3', product_id = '".$scheduleId."' WHERE coupon_id = '".$coupon_id."' AND user_id = '".$userId."' AND coupon_code = '".$coupon_code."'");
			$this->Execute();
			$this->Query("INSERT INTO coupon_redeems (`coupon_id`,`user_id`,`product_id`,`product_type_id`,`coupon_code`,`date_redeem`,`redeem_status`) "
			. " VALUES('".$coupon_id."','".$userId."','".$scheduleId."','".$tripTypeID[0]->trip_type_id."','".$coupon_code."','".date("Y-m-d H:i:s")."','0')");
			$this->Execute();
		}else{
			$available = ($updateAmount) + ($discount);
			$this->Query("UPDATE coupon_users SET coupon_status = '1', product_id = '0' WHERE coupon_id = '".$coupon_id."' AND user_id = '".$userId."' AND coupon_code = '".$coupon_code."'");
			$this->Execute();
			$this->Query("DELETE FROM coupon_redeems WHERE coupon_id = '".$coupon_id."' AND user_id = '".$userId."' AND product_id = '".$scheduleId."' AND coupon_code = '".$coupon_code."'");
			$this->Execute();
			
		}
		 
		 $grandTotal = $available + (($available * $serviceTax)/100);
		 $this->Query("UPDATE bookings SET grand_total = '".$grandTotal."' WHERE id = '".$booking_id."'");
    	 $this->Execute();
		 echo $available;
		
	}
	
	
	function getUserAvailPointAndChkValidationWebview(){
		/*GET USER TOTAL POINTS START*/
		
		$userId = $_REQUEST['user_id'];
		$this->Query("SELECT point FROM user_points WHERE user_id ='".$userId."'");
		$points = $this->fetchObject();
		echo $points[0]->point;
		/*GET USER TOTAL POINTS END*/
	
	}
	
	function updateUserPointsWebview(){
		
		$booking_id = $_REQUEST['booking_id'];
		
		$userId = $_REQUEST['user_id'];
		
		$serviceTax = $_REQUEST['tax'];
		$totalPrice = $_REQUEST['totalPrice'];
		$discount = $_REQUEST['discount'];
		$calculationType = $_REQUEST['perform'];
		$scheduleId = $_REQUEST['scheduleId'];
		
		
		/*GET USERS ALL COUPONS LIST WHICH HE ALREADY REDEEMED TO GET UPDATED AMOUNT*/
			$cQuery = "SELECT c.discount FROM coupons c JOIN coupon_users cu ON "
				. " cu.coupon_id = c.id JOIN coupon_attached_to ca ON ca.coupon_id = c.id "
				. " WHERE cu.user_id = '".$userId."' AND ca.attached_id  = '".$scheduleId."' "
				. " AND cu.coupon_status = 3 AND cu.product_id = '".$scheduleId."'";
			$this->Query($cQuery);
			$couponLists = $this->fetchObject();
			$discountUserHave = 0;
			if($couponLists){
				foreach($couponLists AS $clist):
					$discountUserHave += $clist->discount;
				endforeach;
			}
			
			/*GET UPDATE TOTAL AMOUNT START*/
			$updateAmount = $totalPrice - (($totalPrice * $discountUserHave) / 100);
			/*GET UPDATE TOTAL AMOUNT END*/
			
			/*GET USERS POINT WHICH HE ALREADY USED ON PURCHASING TRIP*/
				$this->Query("SELECT point FROM user_point_logs WHERE type = 'used' AND user_id = '".$userId."' AND product_id = '".$scheduleId."' AND point_from = 'use_point_on_purchase_product' AND product_type = 'trip'");
				$rows = $this->fetchObject();
				$alreadyUsedPoints = 0;
				if($rows){
					foreach($rows AS $row):
						$alreadyUsedPoints += $row->point;
					endforeach;
				}
				
				$updateAmount = $updateAmount - ($alreadyUsedPoints * $this->getConfic('price_per_100_point') / 100);
			/*GET USERS POINT WHICH HE ALREADY USED ON PURCHASING TRIP*/
			
		/*GET USERS ALL COUPONS LIST WHICH HE ALREADY REDEEMED TO GET UPDATED AMOUNT*/
		
		
		/*GET USER TOTAL POINTS START*/
		$this->Query("SELECT point FROM user_points WHERE user_id ='".$userId."'");
		$points = $this->fetchObject();
		/*GET USER TOTAL POINTS END*/
		
		if($calculationType == 'sub'){
			
			$available = ($updateAmount) - ($discount * $this->getConfic('price_per_100_point') / 100);
			$userRemainingPoints = $points[0]->point - $discount;
			$this->Query("UPDATE user_points SET point = '".$userRemainingPoints."' WHERE user_id = '".$userId."'");
			$this->Execute();
			$this->Query("INSERT INTO user_point_logs (`user_id`,`point`,`point_from`,`type`,`date_time`,`product_id`,`product_type`) "
			. " VALUES('".$userId."','".$discount."','use_point_on_purchase_product','used','".date("Y-m-d H:i:s")."','".$scheduleId."','trip')");
			$this->Execute();
		}else{
			$available = ($updateAmount) + ($discount * $this->getConfic('price_per_100_point') / 100);
			$userRemainingPoints = $points[0]->point + $discount;
			$this->Query("UPDATE user_points SET point = '".$userRemainingPoints."' WHERE user_id = '".$userId."'");
			$this->Execute();
			$this->Query("DELETE FROM user_point_logs WHERE type = 'used' AND user_id = '".$userId."' AND product_id = '".$scheduleId."' AND point_from = 'use_point_on_purchase_product' AND product_type = 'trip'");
			$this->Execute();
			
		}
		 
		 $grandTotal = $available + (($available * $serviceTax)/100);
		 $this->Query("UPDATE bookings SET grand_total = '".$grandTotal."' WHERE id = '".$booking_id."'");
    	 $this->Execute();
		 echo $available;
	}
	
	
	
	function myTrips() {
		$str = '';
		$userID = $_REQUEST['userID'];
		$query = "SELECT t.id, bs.boat_name,c.city, b.booking_date,b.trip_status,t.image FROM trips t JOIN trip_schedules ts ON t.id = ts.trip_id JOIN bookings b ON ts.id = b.trip_schedule_id JOIN boats bt ON t.boat_id = bt.id JOIN boatspecifications bs ON bs.boat_id = bt.id  JOIN cities c ON t.origin_id = c.id   JOIN users u ON b.user_id = u.id WHERE u.id = '".$userID."' and bs.language_id = '1'";
		$this->Query($query);
		if($this->rowCount()) {
			$results = $this->fetchArray();
			$i = 0;
			foreach($results as $result) {
				$url = "http://".$_SERVER['HTTP_HOST']."/idive/admin/".$result['image'];
				$str['result'][$i]['tripID'] = $result['id']; 
				$str['result'][$i]['tripTitle'] = $result['city']." By ".$result['boat_name'];
				$str['result'][$i]['bookingDate'] = $result['booking_date'];
				$str['result'][$i]['tripImageURL'] = $url; 
				$str['result'][$i]['tripStatus'] = ($result['trip_status']==1)?("Pending"):(($result['trip_status']==2)?("Running"):(($result['trip_status']==3)?("Cancelled"):(($result['trip_status']==4)?("completed"):("")))); 
				$i++;
			}
		}
		else {
			$str['result'] = array();
		}
		echo (json_encode($str));
	}
	
	function myBookingList() {
		session_start();
		$userId = $_REQUEST['userID'];
		$query = "SELECT b.pay_status,b.booking_date,b.no_of_person,b.no_of_child,b.grand_total,"
		. " \n t.origin_id,t.destination_id,t.image,ts.start_trip_datetime,ts.end_trip_datetime,"
		. " \n ts.trip_price,ts.trip_id,tsp.trip_title,bs.boat_name FROM bookings b JOIN"
		. " \n trips t ON b.trip_id = t.id JOIN boatspecifications bs ON bs.boat_id = t.boat_id "
		. " \n JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN trip_specifications tsp ON"
		. " \n t.id = tsp.trip_id WHERE b.user_id = '".$userId."' AND tsp.language_id = '1' AND bs.language_id = '1'";
		$this->Query($query);
		
		if($this->rowCount()) {
			$results = $this->fetchArray();
			$i = 0;
			foreach($results as $result) {
				$url = "http://".$_SERVER['HTTP_HOST']."/idive/admin/".$result['image'];
				$str['result'][$i]['tripID'] = $result['trip_id']; 
				$str['result'][$i]['tripTitle'] = $result['trip_title']." By ".$result['boat_name'];
				$str['result'][$i]['noOfPerson'] = $result['no_of_person']?$result['no_of_person']:"";
				$str['result'][$i]['noOfChild'] = $result['no_of_child']?$result['no_of_child']:"";
				$str['result'][$i]['origin'] = $this->cityById($result['origin_id']);
				$str['result'][$i]['destination'] = $this->cityById($result['destination_id']);
				$str['result'][$i]['tripImageURL'] = $url;
				$str['result'][$i]['startDate'] = $result['start_trip_datetime']?$result['start_trip_datetime']:"";
				$str['result'][$i]['endDate'] = $result['end_trip_datetime']?$result['start_trip_datetime']:"";
				$str['result'][$i]['tripPrice'] = $result['trip_price']?$result['trip_price']:"";
				$str['result'][$i]['bookingDate'] = $result['booking_date']?$result['booking_date']:"";
				$str['result'][$i]['tripStatus'] = ($result['pay_status']==1)?("Pending"):(($result['pay_status']==2)?("Running"):(($result['pay_status']==3)?("Cancelled"):(($result['pay_status']==4)?("completed"):("Waiting")))); 
				$i++;
			}
		}
		else {
			$str['result'] = array();
		}
		echo (json_encode($str));
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       MY BOOKING END                                  ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////


		function paypalCancel(){
			header("location:webview.php?control=api&task=tripDetail&tripID=".$_REQUEST['tripId']."&userID=".$_REQUEST['userId']."&payment=failed");
			die;
		}
		
		function paypalSuccess(){
			
			$post_data = $_POST; 
			$queyFetch = "Select * FROM trip_transactions WHERE txn_paypal_txn_id = '".$post_data['txn_id']."' AND booking_id = '".$post_data['item_number']."'";
			$this->Query($queyFetch);
			$rows = $this->fetchArray();
			if($rows){
				$query = "UPDATE trip_transactions SET `txn_amount` = '".$post_data['mc_gross']."', `txn_currency` = '".$post_data['mc_currency']."',`txn_status` = '".$post_data['payment_status']."' WHERE id = '".$rows[0]['id']."'";  
			}else{
				$query = "INSERT INTO trip_transactions (`txn_amount`,`txn_currency`,`txn_status`,`txn_paypal_txn_id`,`txn_service_provider`,`booking_id`)"
			. " \n VALUES ('".$post_data['mc_gross']."','".$post_data['mc_currency']."','".$post_data['payment_status']."','".$post_data['txn_id']."','PayPal','".$post_data['item_number']."')";
			}
			
			$this->Query($query);
			$this->Execute();
			
			header("location:webview.php?control=api&task=tripDetail&tripID=".$_REQUEST['tripId']."&userID=".$_REQUEST['userId']."&payment=success");
			die;
			
		}
		
		
		function ipnNotify(){
			$ipn_data = $_POST; 
			  
			  $query = "INSERT INTO trip_transactions (`txn_amount`,`txn_currency`,`txn_status`,`txn_paypal_txn_id`,`txn_service_provider`,`booking_id`)"
			  . " \n VALUES ('".$ipn_data['mc_gross']."','".$ipn_data['mc_currency']."','".$ipn_data['payment_status']."','".$ipn_data['txn_id']."','PayPal','".$ipn_data['item_number']."')";
					//$this->Query($query);
					//$this->Execute();
					
					if($ipn_data['item_number']){
						
						/*############################## *SETTING USER POINT ON PURCHASING TRIP* ###################################*/
						$getBookingQuery = "SELECT b.no_of_person,b.no_of_child,b.user_id,sc.trip_price,sc.id AS trip_schId FROM bookings b "
						. " \n  JOIN trip_schedules sc ON sc.id = b.trip_schedule_id WHERE b.id = '".$ipn_data['item_number']."'";
						$this->Query($getBookingQuery);
						$data = $this->fetchObject();
						$tripPrice = $data[0]->trip_price;
						$noOfPerson = $data[0]->no_of_person;
						$noOfChild = $data[0]->no_of_child;
						$productId = $data[0]->trip_schId;
						
						$getChildDiscount = "SELECT value FROM confic WHERE title = 'child_trip_discount'";
						$this->Query($getChildDiscount);
						$childDiscount = $this->fetchArray();
						
						$totalPrice = ($noOfPerson * $tripPrice) + (($noOfChild * $tripPrice * $childDiscount[0]['value']) / 100);
						$this->getUserPoints('get_point_on_purchase_product_per_1000_THB',7,'get',$productId,'trip',$totalPrice);
						/*############################## *SETTING USER POINT ON PURCHASING TRIP* ###################################*/
						
						/*############################## *SETTING USER POINT ON PURCHASING EQUIPMENT* ###################################*/
						$getQuantityOfEquip = "SELECT no_of_equipment FROM  booking_equipments WHERE booking_id = '".$ipn_data['item_number']."'";
						$this->Query($getQuantityOfEquip);
						$userEquipCounts = $this->fetchObject();
						$totalEquips = 0;
						if($userEquipCounts):
							foreach($userEquipCounts AS $eq){
								$totalEquips = $eq->no_of_equipment + $totalEquips;
							}
							$this->getUserPoints('point_per_eqipment',7,'get',$productId,'equipment',$totalEquips);
						endif;
						/*############################## *SETTING USER POINT ON PURCHASING EQUIPMENT* ###################################*/
						
						/*############################## *SETTING USER POINT ON PURCHASING BEVERAGE* ###################################*/
						$getQuantityOfBv = "SELECT no_of_qty FROM  booking_beverages WHERE booking_id = '".$ipn_data['item_number']."'";
						$this->Query($getQuantityOfBv);
						$userBvCounts = $this->fetchObject();
						$totalBv = 0;
						if($userBvCounts):
							foreach($userBvCounts AS $bv){
								$totalBv = $bv->no_of_qty + $totalBv;
							}
							$this->getUserPoints('point_per_beverage',7,'get',$productId,'beverage',$totalBv);
						endif;
						/*############################## *SETTING USER POINT ON PURCHASING BEVERAGE* ###################################*/
						
						/*############################## *SETTING USER POINT ON PURCHASING FOOD* ###################################*/
						$getQuantityOfFd = "SELECT no_of_qty FROM  booking_foods WHERE booking_id = '".$ipn_data['item_number']."'";
						$this->Query($getQuantityOfFd);
						$userFdCounts = $this->fetchObject();
						$totalFds = 0;
							if($userFdCounts):
							foreach($userFdCounts AS $fd){
								$totalFds = $fd->no_of_qty + $totalFds;
							}
							$this->getUserPoints('point_per_food',7,'get',$productId,'food',$totalFds);
						endif;
						/*############################## *SETTING USER POINT ON PURCHASING FOOD* ###################################*/
						
						/*############################## *SETTING USER POINT ON PURCHASING CABIN* ###################################*/
						$getQuantityOfCabin = "SELECT no_of_cabin FROM  booking_cabins WHERE booking_id = '".$ipn_data['item_number']."'";
						$this->Query($getQuantityOfCabin);
						$userCabinCounts = $this->fetchObject();
						$totalCabins = 0;
						if($userCabinCounts):
							foreach($userCabinCounts AS $cb){
								$totalCabins = $cb->no_of_cabin + $totalCabins;
							}
							$this->getUserPoints('point_per_cabin',7,'get',$productId,'cabin',$totalCabins);
						endif;
						/*############################## *SETTING USER POINT ON PURCHASING CABIN* ###################################*/
						
					}
					
					
			 
		 }



}