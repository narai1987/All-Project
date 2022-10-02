<?php
require_once('dbaccess.php');
class checkoutClass extends DbAccess {
    public $view='';
	public $name='checkout';
	
	
	function divPersonweb() {
		$person = $_REQUEST['person'];
		$q_certificate = "SELECT * FROM dive_certificates WHERE status = '1' and language_id = '1'";
		$this->Query($q_certificate);
		$certificates = $this->fetchArray();
		require_once("views/".$this->name."/ajaxmemberForm.php"); 
		die;
	}
	
	function show(){
		$tripId = $_REQUEST['trip_id'];
		$userId = $_SESSION['userid'];
		if($this->findById($userId,'users')){
			$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules  WHERE trip_id = '".$tripId."' and status = '1' and start_trip_datetime >'".date("Y-m-d H:i:s")."'";
			$this->Query($q_schedule);
			$results = $this->fetchArray();
		
			$q_book_schedule = "SELECT * FROM bookings WHERE user_id = '".$userId."' and trip_id = '".$tripId."'";
			$this->Query($q_book_schedule);
			$schedules = $this->fetchArray();
		
			foreach($schedules as $schedule) {
				$data[$schedule['trip_schedule_id']]['status'] = ($schedule['trip_status']==1)?("Pending"):(($schedule['trip_status']==2)?("Running"):(($schedule['trip_status']==3)?("Cancelled"):(($schedule['trip_status']==4)?("completed"):("incomplete"))));  
			}	
		
				if($_REQUEST['ajaxRequest'] == '1')
				require_once 'views/'.$this->name.'/ajaxscheduleForm.php';
				else
				require_once 'views/'.$this->name.'/show.php';
	   
	   }else{
		   	session_start();
			$_SESSION['error']="You are not authorized to view that page.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php");
	   
	   }
			
			
	}
	
	
	function memberStep(){
		$tripId = $_REQUEST['tripId'];
		$userId = $_REQUEST['userId'];
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
		
		
		$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules  WHERE id = '".$scheduleId."' ";
		
		$this->Query($q_schedule);
		$schedules = $this->fetchArray();
		require_once("views/".$this->name."/ajaxmember.php");
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
	
	
	function saveTripMembers() {
		
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
			require_once("views/".$this->name."/ajaxbooking.php"); 
		}
		else {
			echo "No";	
		}
		die;
	}
	
	
	function tripCart() {
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
		
		
		$q_booking = "UPDATE `bookings` SET `no_of_person` = '".$persons[0]['no_of_person']."', `no_of_child` = '".$totalChildren."' WHERE `trip_id` = '".$tripId."' and  `user_id` = '".$userId."' and `id` = '".$bookingId."'";
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
		require_once("views/".$this->name."/ajaxTripCart.php"); 
	}
	
	
	function updatePayment(){
		$booking_id = $_REQUEST['booking_id'];
		$coupon_id = $_REQUEST['coupon_id'];
		$coupon_code = $_REQUEST['coupon_code'];
		$serviceTax = $_REQUEST['tax'];
		$totalPrice = $_REQUEST['totalPrice'];
		$discount = $_REQUEST['discount'];
		$calculationType = $_REQUEST['perform'];
		
		$tripId = $_REQUEST['tripId'];
		$scheduleId = $_REQUEST['scheduleId'];
		
		$this->Query("SELECT trip_type_id FROM trips WHERE id = '".$tripId."'");
		$tripTypeID = $this->fetchObject();
		
		
		/*GET USERS ALL COUPONS LIST WHICH HE ALREADY REDEEMED TO GET UPDATED AMOUNT*/
			$cQuery = "SELECT c.discount FROM coupons c JOIN coupon_users cu ON "
				. " cu.coupon_id = c.id JOIN coupon_attached_to ca ON ca.coupon_id = c.id "
				. " WHERE cu.user_id = '".$_SESSION['userid']."' AND ca.attached_id  = '".$scheduleId."' "
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
				$this->Query("SELECT point FROM user_point_logs WHERE type = 'used' AND user_id = '".$_SESSION['userid']."' AND product_id = '".$scheduleId."' AND point_from = 'use_point_on_purchase_product' AND product_type = 'trip'");
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
			$this->Query("UPDATE coupon_users SET coupon_status = '3', product_id = '".$scheduleId."' WHERE coupon_id = '".$coupon_id."' AND user_id = '".$_SESSION['userid']."' AND coupon_code = '".$coupon_code."'");
			$this->Execute();
			$this->Query("INSERT INTO coupon_redeems (`coupon_id`,`user_id`,`product_id`,`product_type_id`,`coupon_code`,`date_redeem`,`redeem_status`) "
			. " VALUES('".$coupon_id."','".$_SESSION['userid']."','".$scheduleId."','".$tripTypeID[0]->trip_type_id."','".$coupon_code."','".date("Y-m-d H:i:s")."','0')");
			$this->Execute();
		}else{
			$available = ($updateAmount) + ($discount);
			$this->Query("UPDATE coupon_users SET coupon_status = '1', product_id = '0' WHERE coupon_id = '".$coupon_id."' AND user_id = '".$_SESSION['userid']."' AND coupon_code = '".$coupon_code."'");
			$this->Execute();
			$this->Query("DELETE FROM coupon_redeems WHERE coupon_id = '".$coupon_id."' AND user_id = '".$_SESSION['userid']."' AND product_id = '".$scheduleId."' AND coupon_code = '".$coupon_code."'");
			$this->Execute();
			
		}
		 
		 $grandTotal = $available + (($available * $serviceTax)/100);
		 $this->Query("UPDATE bookings SET grand_total = '".$grandTotal."' WHERE id = '".$booking_id."'");
    	 $this->Execute();
		 echo $available;
		
	}
	
	
	function getUserAvailPointAndChkValidation(){
		/*GET USER TOTAL POINTS START*/
		$this->Query("SELECT point FROM user_points WHERE user_id ='".$_SESSION['userid']."'");
		$points = $this->fetchObject();
		echo $points[0]->point;
		/*GET USER TOTAL POINTS END*/
	
	}
	
	function updateUserPoints(){
		
		$booking_id = $_REQUEST['booking_id'];
	
		$serviceTax = $_REQUEST['tax'];
		$totalPrice = $_REQUEST['totalPrice'];
		$discount = $_REQUEST['discount'];
		$calculationType = $_REQUEST['perform'];
		$scheduleId = $_REQUEST['scheduleId'];
		
		
		/*GET USERS ALL COUPONS LIST WHICH HE ALREADY REDEEMED TO GET UPDATED AMOUNT*/
			$cQuery = "SELECT c.discount FROM coupons c JOIN coupon_users cu ON "
				. " cu.coupon_id = c.id JOIN coupon_attached_to ca ON ca.coupon_id = c.id "
				. " WHERE cu.user_id = '".$_SESSION['userid']."' AND ca.attached_id  = '".$scheduleId."' "
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
				$this->Query("SELECT point FROM user_point_logs WHERE type = 'used' AND user_id = '".$_SESSION['userid']."' AND product_id = '".$scheduleId."' AND point_from = 'use_point_on_purchase_product' AND product_type = 'trip'");
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
		$this->Query("SELECT point FROM user_points WHERE user_id ='".$_SESSION['userid']."'");
		$points = $this->fetchObject();
		/*GET USER TOTAL POINTS END*/
		
		if($calculationType == 'sub'){
			
			$available = ($updateAmount) - ($discount * $this->getConfic('price_per_100_point') / 100);
			$userRemainingPoints = $points[0]->point - $discount;
			$this->Query("UPDATE user_points SET point = '".$userRemainingPoints."' WHERE user_id = '".$_SESSION['userid']."'");
			$this->Execute();
			$this->Query("INSERT INTO user_point_logs (`user_id`,`point`,`point_from`,`type`,`date_time`,`product_id`,`product_type`) "
			. " VALUES('".$_SESSION['userid']."','".$discount."','use_point_on_purchase_product','used','".date("Y-m-d H:i:s")."','".$scheduleId."','trip')");
			$this->Execute();
		}else{
			$available = ($updateAmount) + ($discount * $this->getConfic('price_per_100_point') / 100);
			$userRemainingPoints = $points[0]->point + $discount;
			$this->Query("UPDATE user_points SET point = '".$userRemainingPoints."' WHERE user_id = '".$_SESSION['userid']."'");
			$this->Execute();
			$this->Query("DELETE FROM user_point_logs WHERE type = 'used' AND user_id = '".$_SESSION['userid']."' AND product_id = '".$scheduleId."' AND point_from = 'use_point_on_purchase_product' AND product_type = 'trip'");
			$this->Execute();
			
		}
		 
		 $grandTotal = $available + (($available * $serviceTax)/100);
		 $this->Query("UPDATE bookings SET grand_total = '".$grandTotal."' WHERE id = '".$booking_id."'");
    	 $this->Execute();
		 echo $available;
	}
	
	
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
	
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       MY BOOKING START                                  ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////
	
	///////////////////choose schedule for trip/////////////////
	
	///////////////////end choose schedule for trip/////////////////
	
		
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       MY BOOKING END                                  ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////


		function paypalAbandon(){
			$_SESSION['error']="Payment not completed.";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php?control=checkout&trip_id=".$_REQUEST['trip_id']."&schId=".$_REQUEST['scheduleId']);
		}
		
		
		function successCheckout(){
		$bookingId = $_REQUEST['item_number'];
		$userId = $_SESSION['userid'];
		$fQ = "SELECT ts.trip_title,t.image,sc.start_trip_datetime,sc.end_trip_datetime,tr.txn_paypal_txn_id FROM bookings b JOIN trips t ON t.id = b.trip_id JOIN"
		. " trip_specifications ts ON ts.trip_id = b.trip_id JOIN trip_schedules sc ON sc.id = b.trip_schedule_id LEFT JOIN trip_transactions"
		. "  tr ON tr.booking_id = b.id WHERE b.id = '".$bookingId."' AND ts.language_id = 1";
		$this->Query($fQ);
		$rows = $this->fetchObject();
		require_once 'views/'.$this->name.'/successpayment.php';
			
			
	}
		
		function paypalComplete(){
			
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
			if($this->Execute()){
				if($post_data['payment_status'] == 'Pending')
				$updateBookingTable = "UPDATE bookings SET trip_status = '1' WHERE id = '".$post_data['item_number']."'";
				else
				$updateBookingTable = "UPDATE bookings SET trip_status = '4' WHERE id = '".$post_data['item_number']."'";
				$this->Query($updateBookingTable);	
				$this->Execute();
				$_SESSION['error']="Payment successfully completed. See your Order History from Myaccount Section for payment status. Thanks.";
				$_SESSION['errorclass'] = "";
				header("location:index.php?control=checkout&task=successCheckout&item_number=".$post_data['item_number']);
			}else{
			$_SESSION['error']="Payment not completed yet Please contact to site administrator. OR try after some time";
			$_SESSION['errorclass'] = "warn_red";
			header("location:index.php?control=checkout&trip_id=".$_REQUEST['trip_id']."&schId=".$_REQUEST['scheduleId']);
			}
			
			
			
		}
		
		
		function paypalNotify(){
			$ipn_data = $_POST; 
			  $userId = $_SESSION['userid'];
			  $query = "INSERT INTO trip_transactions (`txn_amount`,`txn_currency`,`txn_status`,`txn_paypal_txn_id`,`txn_service_provider`,`booking_id`)"
			  . " \n VALUES ('".$ipn_data['mc_gross']."','".$ipn_data['mc_currency']."','".$ipn_data['payment_status']."','".$ipn_data['txn_id']."','PayPal','".$ipn_data['item_number']."')";
					$this->Query($query);
					$this->Execute();
					
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
						$this->getUserPoints('get_point_on_purchase_product_per_1000_THB',$userId,'get',$productId,'trip',$totalPrice);
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
							$this->getUserPoints('point_per_eqipment',$userId,'get',$productId,'equipment',$totalEquips);
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
							$this->getUserPoints('point_per_beverage',$userId,'get',$productId,'beverage',$totalBv);
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
							$this->getUserPoints('point_per_food',$userId,'get',$productId,'food',$totalFds);
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
							$this->getUserPoints('point_per_cabin',$userId,'get',$productId,'cabin',$totalCabins);
						endif;
						/*############################## *SETTING USER POINT ON PURCHASING CABIN* ###################################*/
						
					}
					
					
			 
		 }



}