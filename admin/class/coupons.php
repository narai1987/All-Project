<?php
	require_once('dbaccess.php');	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	class CouponClass extends DbAccess {
		public $view='';
		public $name='coupon';

		
		function show(){
			session_start();
			$search = $_REQUEST['search'];
			if($search) {
				$str = 	" and cd.title LIKE '%".$search."%' ";
			}
			$uquery ="select c.id,c.start_date,c.end_date,c.last_update, cd.title, c.status, ct.coupon_type, ct.detail from coupons c JOIN coupon_details cd ON c.id = cd.coupon_id JOIN coupon_types ct ON c.coupon_type_id = ct.id where cd.language_id = '".$_SESSION['language_id']."'".$str;
			$this->Query($uquery);
			$uresults = $this->fetchArray();	
			$tdata=count($uresults);
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : $this->defaultPageData();
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
			/* Paging end here */	
			$query = $uquery." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query = $uquery." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}		
		    require_once("views/".$this->name."/show.php");	
			//require_once("views/".$this->name."/".$this->task.".php"); 
		}
		
		function addcoupon() {
			$query_lang = "SELECT * FROM languages WHERE 1";
			$this->Query($query_lang);
			$results['language'] = $this->fetchArray();
			$q_coupon_type = "SELECT * FROM coupon_types WHERE status = '1'";
			$this->Query($q_coupon_type);
			$results['coupon_type'] = $this->fetchArray();
			$coupon_id = $_REQUEST['id'];
			if($coupon_id ) {
				$this->Query("SELECT * FROM coupons WHERE id = '".$coupon_id."'");	
				$coupons = $this->fetchArray();
				$this->Query("SELECT * FROM coupon_details WHERE coupon_id = '".$coupon_id."'");	
				$details = $this->fetchArray();
				foreach($details as $detail) {
					$det[$detail['language_id']]['title'] = $detail['title']; 
					$det[$detail['language_id']]['description'] = $detail['description']; 
				}
				$this->Query("SELECT * FROM coupon_attached_to WHERE coupon_id = '".$coupon_id."'");	
				$attached = $this->fetchArray();
				foreach($attached as $att) {
					$schedule .= $schedule?",".$att['attached_id']:$att['attached_id'];
				}
				/*echo "<pre>";
				print_r($coupons);
				echo "<br>";
				print_r($det);
				echo "<br>";
				print_r($attached);
				echo "</pre>";*/
			}
				
			require_once("views/".$this->name."/".$this->task.".php"); 	
		}
		function scheduleForCoupon() {
			$trip_type_id = $_REQUEST['type_id'];
			file_put_contents("count.txt",$trip_type_id);
			$query = "SELECT ts.id, ts.start_trip_datetime start_date, tsp.trip_title,boat_name FROM trips t JOIN trip_schedules ts ON t.id = ts.trip_id JOIN trip_specifications tsp ON t.id = tsp.trip_id JOIN boats b On t.boat_id = b.id JOIN boatspecifications bs ON b.id = bs.boat_id WHERE t.trip_type_id = '".$trip_type_id."' and ts.start_trip_datetime > '".date("Y-m-d H:i:s")."' and tsp.language_id = '1' and bs.language_id = '1'";	
			$this->Query($query);
			$results = $this->fetchArray();
			require_once("../views/".$this->name."/scheduleForCoupon.php"); 
			
		}
		function save() {
			$schedule = $_REQUEST['schedule'];
			$start_date = $_REQUEST['start_date'];
			$end_date = $_REQUEST['end_date'];
			$discount = $_REQUEST['discount'];
			$coupon_image = $_FILES['coupon_image'];
			$no_of_coupon = $_REQUEST['no_of_coupon'];
			$coupon_type_id = $_REQUEST['coupon_type'];
			$coupon_category_id = $_REQUEST['category'];
			$coupon_id = $_REQUEST['id'];
			/* UPLOAD COUPON IMAGE IN COUPON DIRECTORY START*/
			if($coupon_image['name']) {
				$imageUrl = $this->uploadFile('media/coupons',$coupon_image);
				$str1 = $imageUrl?", `image` = '".$imageUrl."'":"";		
			}
			/* UPLOAD COUPON IMAGE IN COUPON DIRECTORY END*/
			if($coupon_id) {
				/* COUPON DATA ADD TO COUPON TABLE(coupons) START */
				$query = "UPDATE `coupons` SET `coupon_category_id` = '".$coupon_category_id."',`coupon_type_id` = '".$coupon_type_id."', `discount` = '".$discount."', `start_date` = '".$start_date."', `end_date` = '".$end_date."', `no_of_coupon` = '".$no_of_coupon."' ".$str1.", `last_update` = '".date("Y-m-d H:i:s")."' WHERE id = '".$coupon_id."'";
				$this->Query($query);
				$this->Execute();
				/* COUPON DATA ADD TO COUPON TABLE(coupons) END */
				
				
				/* COUPON DATA ADD TO coupon_details TABLE(coupon_details) START */
				$lang = $this->langAll();
				foreach($lang as $language) {
					$title = $_REQUEST["title".$language['id']];
					$description = $_REQUEST["description".$language['id']];	
					$q_details = "UPDATE coupon_details SET `title` = '".$title."', `description` = '".$description."'  WHERE `coupon_id` = '".$coupon_id."' and `language_id` = '".$language['id']."'";
					
					$this->Query($q_details);
					$this->Execute();
				}
				/* COUPON DATA ADD TO coupon_details TABLE(coupon_details) END */
				
				/*####################################################################################################################*/
				/* COUPON DATA ADD TO coupon_attached_to TABLE(coupon_attached_to) START 
				THIS TABLE RESPONSIBLE FOR THE COOUPON ATTACHED TO WHICH PRODUCT OR TRIPS*/
				$this->Query("DELETE FROM  coupon_attached_to WHERE coupon_id = '".$coupon_id."'");
				$this->Execute();
				$scheduleArr = explode(",",$_REQUEST['schedule']);
				
				if($_REQUEST['schedule']) {
					foreach($scheduleArr as $schedule_id) {
						$str .= $str?","." ('".$coupon_id."', '".$schedule_id."')":"('".$coupon_id."', '".$schedule_id."')";
					}
					$q_attached_to = "INSERT INTO `coupon_attached_to` (`coupon_id`, `attached_id`) VALUES ".$str;
					$this->Query($q_attached_to);
					$this->Execute();
				}
				/* COUPON DATA ADD TO coupon_attached_to TABLE(coupon_attached_to) END*/
				
			}
			else {
				/* COUPON DATA ADD TO COUPON TABLE(coupons) START */
				$query = "INSERT INTO `coupons` (`coupon_category_id`, `coupon_type_id`, `discount`, `start_date`, `end_date`, `no_of_coupon`, `image`, `create_date`, `last_update`, `status`) VALUES
	('".$coupon_category_id."', '".$coupon_type_id."', '".$discount."', '".$start_date."', '".$end_date."', '".$no_of_coupon."', '".$imageUrl."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', 1)";
				$this->Query($query);
				$this->Execute();
				$coupon_id = mysql_insert_id();
				/* COUPON DATA ADD TO COUPON TABLE(coupons) END */
				
				
				/* COUPON DATA ADD TO coupon_details TABLE(coupon_details) START */
				$lang = $this->langAll();
				foreach($lang as $language) {
					$title = $_REQUEST["title".$language['id']];
					$description = $_REQUEST["description".$language['id']];	
					$str_detail .= $str_detail?","."('".$coupon_id."', '".$language['id']."', '".mysql_real_escape_string($title)."', '".mysql_real_escape_string($description)."', 1)":"('".$coupon_id."', '".$language['id']."', '".mysql_real_escape_string($title)."', '".mysql_real_escape_string($description)."', 1)";
				}
				 $q_details = "INSERT INTO `coupon_details` (`coupon_id`, `language_id`, `title`, `description`, `status`) VALUES ".$str_detail;
				$this->Query($q_details);
				$this->Execute();
				/* COUPON DATA ADD TO coupon_details TABLE(coupon_details) END */
				
				/*####################################################################################################################*/
				/* COUPON DATA ADD TO coupon_attached_to TABLE(coupon_attached_to) START 
				THIS TABLE RESPONSIBLE FOR THE COOUPON ATTACHED TO WHICH PRODUCT OR TRIPS*/
				$scheduleArr = explode(",",$_REQUEST['schedule']);
				if($_REQUEST['schedule']) {
					foreach($scheduleArr as $schedule_id) {
						$str .= $str?","." ('".$coupon_id."', '".$schedule_id."')":"('".$coupon_id."', '".$schedule_id."')";
					}
				
					$q_attached_to = "INSERT INTO `coupon_attached_to` (`coupon_id`, `attached_id`) VALUES ".$str;
					$this->Query($q_attached_to);
					$this->Execute();
				}
				/* COUPON DATA ADD TO coupon_attached_to TABLE(coupon_attached_to) END*/ 
			}
			$this->show();
			//header('location:index.php?control=coupon');
		}
		function shareCoupon() {
			$coupon_id = $_REQUEST['id'];
			$this->Query("SELECT coupon_type_id, coupon_send_status FROM coupons WHERE id = '".$coupon_id."'");
			$coupons = $this->fetchArray();
			//echo "<pre>";
			//print_r($coupons);
			$coupon_type_id = $coupons[0]['coupon_type_id'];
			if(!$coupons[0]['coupon_send_status']) {
				if($coupon_type_id == '1') {
					$this->Query("SELECT id user_id FROM users WHERE status = '1'");
					$userIds = $this->fetchArray();
					foreach($userIds as $user) {
						$str .= $str?","."('".$coupon_id."', '".$user['user_id']."', 0, '0', 'Coupon from site admin', '".$this->couponCode(12)."', '1')":"('".$coupon_id."', '".$user['user_id']."', 0, '0', 'Coupon from site admin', '".$this->couponCode(12)."', '1')";
					}	
					$query = "INSERT INTO `coupon_users` (`coupon_id`, `user_id`, `coupon_gift_by_user_id`, `coupon_gift_to_user_id`, `description`, `coupon_code`, `coupon_status`) VALUES ".$str;			
				}
				else {
				$this->Query("SELECT distinct(user_id) FROM bookings WHERE status = '1' and pay_status	= '1' GROUP BY user_id");
					$userIds = $this->fetchArray();
					//echo "<pre>";
			        // print_r($userIds);
					if(count($userIds)) {
						foreach($userIds as $user) {
							$str .= $str?","."('".$coupon_id."', '".$user['user_id']."', 0, '0', 'Coupon from site admin', '".$this->couponCode(12)."', '1')":"('".$coupon_id."', '".$user['user_id']."', 0, '0', 'Coupon from site admin', '".$this->couponCode(12)."', '1')";
						}	
					}
					$query = "INSERT INTO `coupon_users` (`coupon_id`, `user_id`, `coupon_gift_by_user_id`, `coupon_gift_to_user_id`, `description`, `coupon_code`, `coupon_status`) VALUES ".$str;
				}
				if(count($userIds)) {
					$this->Query($query);
					if($this->Execute()) {
						$this->Query("UPDATE coupons SET coupon_send_status = '1' WHERE id = '".$coupon_id."'");
						$this->Execute();
						$_SESSION['message'] = "Coupon send successfully to users";
					}
				}
				else {
					$_SESSION['message'] = "Users not found";
				}
			}
			else {
				echo "jhgjhjh";
				session_start();
				$_SESSION['message'] = "Coupon already send to users";
			}
			$this->show();
			//header('location:index.php?control=coupon');	
		}
		function couponCode($str){ 
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
		
		//Here you specify how many characters the returning string must have 
		
		
		
		function delete(){
		
		$query="DELETE FROM coupons WHERE id in (".$_REQUEST['id'].")";	
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		$this->show();
		//header("location:index.php?control=coupon");
		
		}



     function status(){
			if($_REQUEST['id']!=''){
		 $query = "UPDATE coupons SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();
					    $this->show();
			}else{
			    $this->show();
			}	
			
		//header("location:index.php?control=coupon");
		}

	}