<?php
	require_once('dbaccess.php');
	
	
	class myaccountClass extends DbAccess {
		public $view='';
		public $name='myaccount';
		
		
		function show(){
		$userId = $_SESSION['userid'];
		if($this->findById($userId,'users')){
			require_once("views/".$this->name."/show.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		
		
		function editAccount(){
		$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			$this->Query("SELECT * FROM users WHERE id = '".$_SESSION['userid']."' ");
			$results = $this->fetchArray();
			require_once("views/".$this->name."/editaccount.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		
		
		function updateAccount(){
			$this->Query("UPDATE users SET fname = '".$_REQUEST['fname']."',lname = '".$_REQUEST['lname']."',email = '".$_REQUEST['email']."',mobile = '".$_REQUEST['mobile']."' WHERE id = '".$_SESSION['userid']."' ");
			$this->Execute();
			if(isset($_FILES['avatar']['name'])){
				$uploadUrl = 'images/user';
				$imageFileName = "user_".$_SESSION['userid'].str_replace(" ","_",$_FILES['avatar']['name']);
				
				$fullUrlImage = $uploadUrl."/".$imageFileName;
				move_uploaded_file($_FILES['avatar']['tmp_name'], $fullUrlImage);
					$queryImgUpdate = "UPDATE `users` SET `image` = '".$imageFileName."' WHERE id = '".$_SESSION['userid']."'";
					$this->Query($queryImgUpdate);
					$this->Execute();	
			}
			header("location:index.php?control=myaccount&task=editAccount");
		}
		
		function changePass(){
		$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			require_once("views/".$this->name."/changepass.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		
		
		function updatePass(){
			
			$this->Query("SELECT * FROM users WHERE id = '".$_SESSION['userid']."' AND password = '".md5($_REQUEST['oldpass'])."'");
			$num = $this->rowCount();
			$results = $this->fetchArray();
		
			if($num){	
			$this->Query("UPDATE users SET password = '".md5($_REQUEST['newpass'])."' WHERE id = '".$_SESSION['userid']."' ");
			$this->Execute();
			header("location:index.php?control=myaccount&task=changePass&msg=correct");
			}else{
			header("location:index.php?control=myaccount&task=changePass&msg=incorrect");
			}
		}
		
		function addressBook(){
		$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			$this->Query("SELECT * FROM user_addressbook WHERE user_id = '".$_SESSION['userid']."' ");
			$results = $this->fetchArray();
			
			require_once("views/".$this->name."/addressbook.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		
		function addNewAddress(){
		$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			if($_REQUEST['id']){
			$this->Query("SELECT * FROM user_addressbook WHERE id = '".$_REQUEST['id']."' ");
			$results = $this->fetchArray();
			}else{
			$this->Query("SELECT * FROM user_addressbook WHERE id = '".$_REQUEST['id']."' ");
			$results = $this->fetchArray();
			}
			require_once("views/".$this->name."/addnewaddressbook.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		
		function saveAddress(){
					
			if(!$_REQUEST['id']){
			$query = "INSERT INTO user_addressbook (user_id,fname,lname,addressone,addresstwo,city,postalcode,country,state,date_time) VALUES ('".$_SESSION['userid']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".mysql_real_escape_string($_REQUEST['addressone'])."','".mysql_real_escape_string($_REQUEST['addresstwo'])."','".$_REQUEST['city']."','".$_REQUEST['pcode']."','".$_REQUEST['country']."','".$_REQUEST['state']."','".date("Y-m-d H:i:s")."')";
			$this->Query($query);
			$this->Execute();
			}else{
			$query = "UPDATE user_addressbook SET fname = '".$_REQUEST['fname']."', lname = '".$_REQUEST['lname']."', addressone = '".mysql_real_escape_string($_REQUEST['addressone'])."', addresstwo = '".mysql_real_escape_string($_REQUEST['addresstwo'])."', city = '".$_REQUEST['city']."', postalcode = '".$_REQUEST['pcode']."', country = '".$_REQUEST['country']."', state = '".$_REQUEST['state']."' WHERE id = '".$_REQUEST['id']."'";
			$this->Query($query);
			$this->Execute();
			}
		
			header("location:index.php?control=myaccount&task=addressBook");
		}
		
		function delBook(){
			if($_REQUEST['id']){
				$query = "DELETE FROM user_addressbook WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query);
				$this->Execute();
				header("location:index.php?control=myaccount&task=addressBook");
			}else{
			
				header("location:index.php?control=myaccount&task=addressBook");
			}
		}
		
		
		function newsletter(){
			
			if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i",$_REQUEST['email']) || empty($_REQUEST['email']))           
			 $flag = -1;
			 
			
			if($flag!=-1){	
				$this->Query("SELECT id,subscription FROM users WHERE email = '".$_REQUEST['email']."'");
				$rows = $this->fetchObject();
				if(!$this->rowCount()){
				$flag = -2;
				}else if($rows[0]->subscription == 1){
					$flag=1;
				}
				else{
						$this->Query("UPDATE users SET subscription=1 WHERE email = '".$_REQUEST['email']."'");
						$this->Execute();
						$flag=0;
				    }
			}
			
			require_once("views/".$this->name."/newsletter.php");
		}
		
		function newssubscribe(){
			if(!empty($_REQUEST['email'])){
				if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i",$_REQUEST['email']) || empty($_REQUEST['email']))           
				 $flag = -1;
			 
			
				if($flag!=-1){	
					$this->Query("SELECT id,subscription FROM users WHERE email = '".$_REQUEST['email']."'");
					$rows = $this->fetchObject();
					if(!$this->rowCount()){
					$flag = -2;
					}else if($rows[0]->subscription == 1){
						$flag=1;
					}
					else{
						$this->Query("UPDATE users SET subscription=1 WHERE email = '".$_REQUEST['email']."'");
						$this->Execute();
						$flag=200;
					}
				}
			}
				
			require_once("views/".$this->name."/newslettersubscribe.php");
		}
		
		function myTrip() {
			session_start();
			$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			$query = "SELECT b.pay_status,b.booking_date,b.no_of_person,b.no_of_child,b.grand_total,b.trip_schedule_id,"
			. " \n t.origin_id,t.destination_id,t.image,ts.start_trip_datetime,ts.end_trip_datetime,"
			. " \n ts.trip_price,ts.trip_id,tsp.trip_title,bs.boat_name,ts.id AS tripSchId FROM bookings b JOIN"
			. " \n trips t ON b.trip_id = t.id JOIN boatspecifications bs ON bs.boat_id = t.boat_id "
			. " \n JOIN trip_schedules ts ON b.trip_schedule_id = ts.id JOIN trip_specifications tsp ON"
			. " \n t.id = tsp.trip_id WHERE b.user_id = '".$userId."' AND tsp.language_id = '1' AND bs.language_id = '1'";
			$this->Query($query);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/myTrip.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		function myReward() {
			session_start();
			$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			$query_point = "SELECT * FROM user_points WHERE user_id = '".$userId."'";
			$this->Query($query_point);
			$points = $this->fetchArray();
			$query_point_logs = "SELECT * FROM user_point_logs WHERE user_id = '".$userId."' ORDER BY id DESC";
			$this->Query($query_point_logs);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/myReward.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
			
		}
		function myCoupon() {
			session_start();
			$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			$query_coupon = "SELECT cd.title,cd.description,c.id,c.image,c.discount,c.end_date,(select redeem_status  from coupon_redeems cr where cr.user_id = '".$userId."' and cr.coupon_id = c.id) redeem_status, cu.coupon_status FROM coupons c JOIN coupon_details cd ON c.id = cd.coupon_id RIGHT JOIN coupon_users cu ON c.id = cu.coupon_id WHERE cu.user_id = '".$userId."' and cd.language_id = '".$_SESSION['language_id']."'";
			$this->Query($query_coupon);
			$coupons = $this->fetchArray();
			foreach($coupons as $coupon) {
				if($coupon['redeem_status']) {
					$results['redeem'][] = $coupon;
				}
				else {
					$results['unused'][] = $coupon;
				}
			}
			
			require_once("views/".$this->name."/myCoupon.php");
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
			
		}
		
		
		function getRateForm(){
			session_start();
			$userId = $_SESSION['userid'];
			if($this->findById($userId,'users')){
			$tripScheduleId = $_GET['schId'];
			$query = "SELECT trip_id FROM  trip_schedules WHERE id = '".$tripScheduleId."'";
			$this->Query($query);
			$rows = $this->fetchObject();
			$tripId = $rows[0]->trip_id;
			
			
			$queryReview = "SELECT review FROM trip_reviews WHERE user_id = '".$userId."' AND trip_id = '".$tripId."' AND trip_schedule_id = '".$tripScheduleId."'";
				$this->Query($queryReview);
				$reviews = $this->fetchArray();
			
			$getRate = "SELECT * FROM trip_rating WHERE user_id = '".$userId."' AND trip_id = '".$tripId."' AND trip_schedule_id = '".$tripScheduleId."'";
			$this->Query($getRate);
			$rates = $this->fetchObject();
			if($rates){
				foreach($rates AS $rate):
				$rateAr[$rate->rating_type] = $rate->rating;
				endforeach;
			}
			require_once "views/".$this->name."/ratingForm.php";
			}else{
				session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
			}
		}
		
		function share() {
			require_once("views/".$this->name."/share.php");
			die;	
		}
		function shareCoupon() {
			$email = $_REQUEST['email'];
			$coupon_id = $_REQUEST['coupon_id'];
			$user_id = $_SESSION['userid'];
			
			$this->Query("SELECT cu.coupon_code, u.email FROM users u JOIN coupon_users cu ON u.id = cu.user_id WHERE cu.user_id = '".$user_id."' and cu.coupon_id = '".$coupon_id."'");
			$coupon_data = $this->fetchArray();
			$this->Query("SELECT id FROM users WHERE email = '".$email."'");
			$email_data = $this->fetchArray();	
			
			if($email_data[0]['id']) {
				"UPDATE `coupon_users` SET `coupon_gift_to_user_id` = '".$email_data[0]['id']."', `coupon_status` = '2',  `description` = 'You Gifted Coupon To Your Friend' WHERE `coupon_id` = '".$coupon_id."' , `user_id` = '".$user_id."' ";
				
				$this->Query("INSERT INTO `coupon_users` (`coupon_id`, `user_id`, `coupon_gift_by_user_id`, `coupon_gift_to_user_id`, `description`, `coupon_code`, `coupon_status`) VALUES ('".$coupon_id."', '".$email_data[0]['id']."', '".$user_id."', 0, 'Coupon from your friend', '".$coupon_data[0]['coupon_code']."', '4')");
				$this->Execute();
				
				$this->Query("UPDATE `coupon_users` SET `coupon_gift_to_user_id` = '".$email_data[0]['id']."', `coupon_status` = '2',  `description` = 'You Gifted Coupon To Your Friend' WHERE `coupon_id` = '".$coupon_id."' and `user_id` = '".$user_id."' ");
				$this->Execute();

			}
			else {
				
				$this->Query("INSERT INTO `users` (`email`, `token`, `date_time`, `subscription`, `utype`, `exp_status`, `status`) VALUES ('".$email."', '".$this->createtoken(12)."', '".date("Y-m-d H:m:s")."', '1', '0', '0', '0')");
				if($this->Execute()) {
					$this->Query("SELECT cd.title, cd.description, c.discount, c.end_date, c.image FROM coupons c JOIN coupon_details cd ON c.id = cd.coupon_id WHERE c.id = '".$coupon_id."' and cd.language_id = '".$_SESSION['language_id']."'");
					$couponDetail = $this->fetchArray();
					$email_user_id = mysql_insert_id();
					$subject = "Congratulation You got a coupon";
					$message = "<table class='cart_table cart_table_inner' width='100%' border='0' cellspacing='0' cellpadding='0'>            
					<tbody><tr>
						<th width='300'colspan='2'></th>              
					</tr>           
					<tr>
						<td width='120' >
							<img src='http://192.168.0.26/idive/admin/".$couponDetail[0]['image']."' width='120' height='80'>
						</td>
						<td align='left'>
							<div class='couponDetail'>
							<b><span>".$couponDetail[0]['title']."</span></b><br>
							<b>Discount : ".$couponDetail[0]['discount']."%</b><br>
							<b>Last Date : ".$couponDetail[0]['end_date']."</b><br>
							<p>".$couponDetail[0]['description']."</p>
							</div>
						</td>              
					</tr>
					<tr>
						<td>
						
						</td>
						<td>
							Dear Friend 
							<br> Your friend send to you a coupon from idivetrips.com
							<br> and you are automatically subscribed and registered. 
							<br> If you want to use this coupon then approve your profile by CLICK on  bellow approve link.
							<br> If you do not want subscribe and register on the idivetrips.com then CLICK on bellow unsubscribe link . 
							<br>
							<br>
							<a href='http://192.168.0.26/idive/admin/index.php?control=myaccount&task=approveCoupon'>APPROVE SUBSCRIBE</a>
							<a href='http://192.168.0.26/idive/admin/index.php?control=myaccount&task=cancelCoupon'>UNSUBCRIBE</a>
						</td>
					</tr>
					</tbody></table>";
					echo $message;
					$this->mailsend($email,$coupon_data[0]['email'],$subject,$message);
					
					
				}
			}
			
		}
		function saveRating(){
			session_start();
			$userId = $_SESSION['userid'];
			$foodRate = $_POST['rfood'];
			$equipmentRate = $_POST['requip'];
			$beverageRate = $_POST['rbv'];
			$cabinRate = $_POST['rcb'];
			$serviceRate = $_POST['rserv'];
			$crewRate = $_POST['rcrew'];
			$diverRate = $_POST['rdiver'];
			$tripId = $_POST['trip_id'];
			$tripSchId = $_POST['trip_sch_id'];
			
			if($_POST['review']){
				$queryChk = "SELECT id FROM trip_reviews WHERE user_id = '".$userId."' AND trip_id = '".$tripId."' AND trip_schedule_id = '".$tripSchId."'";
				$this->Query($queryChk);
				$rows = $this->fetchArray();
				if($rows){
					$qreview = "UPDATE trip_reviews SET review = '".mysql_real_escape_string($_POST['review'])."', date_time = '".date("Y-m-d H:i:s")."'"
					." \n WHERE id = '".$rows[0]['id']."'";
				}else{
				$qreview = "INSERT INTO trip_reviews (`user_id`,`trip_id`,`trip_schedule_id`,`review`,`date_time`)"
				. " \n VALUES ('".$userId."','".$tripId."','".$tripSchId."','".mysql_real_escape_string($_POST['review'])."','".date("Y-m-d H:i:s")."')";
				}
				$this->Query($qreview);
				$this->Execute();
			}
			
			if(($foodRate or $equipmentRate or $beverageRate or $cabinRate or $serviceRate or $crewRate or $diverRate)){
			
			$qCheck = "DELETE FROM trip_rating WHERE user_id = '".$userId."' AND trip_id = '".$tripId."' AND trip_schedule_id = '".$tripSchId."'";
			$this->Query($qCheck);
			$this->Execute();
			
			$query = "INSERT INTO trip_rating (`user_id`,`trip_id`,`trip_schedule_id`,`rating_type`,`rating`)"
			. " \n VALUES ('".$userId."','".$tripId."','".$tripSchId."','food',".$foodRate."),"
			. " \n ('".$userId."','".$tripId."','".$tripSchId."','equipment',".$equipmentRate."),"
			. " \n ('".$userId."','".$tripId."','".$tripSchId."','beverage',".$beverageRate."),"
			. " \n ('".$userId."','".$tripId."','".$tripSchId."','cabin',".$cabinRate."),"
			. " \n ('".$userId."','".$tripId."','".$tripSchId."','service',".$serviceRate."),"
			. " \n ('".$userId."','".$tripId."','".$tripSchId."','crew',".$crewRate."),"
			. " \n ('".$userId."','".$tripId."','".$tripSchId."','diver',".$diverRate.")";
			$this->Query($query);
			$this->Execute();
			}
			header('location:index.php?control=myaccount&task=myTrip');
			
		}	
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		function createtoken($str) {
			//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
			$string = 'ABCDEFGHJKLMNPQRSTUVXWYZ0123456789'; 
			$length = strlen($string); 
			$length--; 
			
			$code=NULL; 
			for($i=1;$i<=$str;$i++){ 
				$posision = rand(0,$length); 
				$code .= substr($string,$posision,1); 
			} 
			
			return $code; 
		}
		function createpassword($pwd,$name) {
			$pwd = date("i:s").$pwd;
			return substr(strtolower(md5($pwd)),0,6);
		}	
	}