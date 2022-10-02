<?php
require_once('dbaccess.php');
class bookingApiClass extends DbAccess {
    public $view='';
	public $name='bookingApi';
	
	function show() {
		require_once("views/".$this->name."/show.php"); 	
	}
	
	function bookingMember() {
		$tripId = $_REQUEST['tripId'];
		$userId = $_REQUEST['userId'];
		$q_schedule = "SELECT id,start_trip_datetime start_date,end_trip_datetime end_date FROM trip_schedules WHERE trip_id = '".$tripId."' and status = '1' and start_trip_datetime>'".date("Y-m-d H:i:s")."'";
		$this->Query($q_schedule);
		$schedules = $this->fetchArray();
		
		
		
		require_once("views/".$this->name."/bookingMember.php"); 
	}
	function divPerson() {
		$person = $_REQUEST['person'];
		$q_certificate = "SELECT * FROM dive_certificates WHERE status = '1' and language_id = '1'";
		$this->Query($q_certificate);
		$certificates = $this->fetchArray();
		
		
		require_once("../views/".$this->name."/member.php"); 
		die;
	}
	
	///////////////////not use right now
	function booking() {
		$tripId = $_REQUEST['tripId'];
		$userId = $_REQUEST['userId'];
		die;
		require_once("views/".$this->name."/booking.php"); 
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
	function saveMember() {
		$scheduleId = ($_REQUEST['start_date']==$_REQUEST['end_date'])?$_REQUEST['start_date']:'';
		$tripId = $_REQUEST['tripId'];
		$userId = $_REQUEST['userId'];
		if($scheduleId) {
			$q_booking = "INSERT INTO `bookings` (`id`, `trip_id`, `trip_schedule_id`, `user_id`, `trip_status`, `pay_status`, `booking_date`, `cancel_date`, `cancel_status`, `no_of_person`, `no_of_child`, `status`) VALUES('', '".$tripId."', '".$scheduleId."', '".$userId."', 1, 0, '".date("Y-m-d H:i:s")."', '', 0, '".$_REQUEST['adult']."', '".$_REQUEST['child']."', 0)";
			$this->Query($q_booking);
			if($this->Execute()) {
				$booking_id = mysql_insert_id();
				$query = "INSERT INTO `booking_persons` (`id`, `booking_id`, `user_id`, `relation_id`, `p_name`, `p_gender`, `p_age`, `dive_certificate_id`) VALUES";
				for($i=0;$i<count($_REQUEST['person']);$i++) {
					$str .= $str?(",('', '".$booking_id."', '".$userId."', 0, '".$_REQUEST['person'][$i]."', '".$_REQUEST['gender'][$i]."', '".$_REQUEST['age'][$i]."', '".$_REQUEST['certificate'][$i]."')"):("('', '".$booking_id."', '".$userId."', 0, '".$_REQUEST['person'][$i]."', '".$_REQUEST['gender'][$i]."', '".$_REQUEST['age'][$i]."', '".$_REQUEST['certificate'][$i]."')");
				}
				$query .= $str;
				$this->Query($query);
				if($this->Execute()) {
					$q_equipment = "SELECT eqp.*, e.equipment FROM trip_schedules ts JOIN trip_equipments eqp ON ts.id = eqp.trip_schedule_id JOIN equipments e ON eqp.equipment_id = e.id WHERE ts.id = '".$scheduleId."' and eqp.eq_type = 'paid' and e.language_id = '1'";
					$this->Query($q_equipment);
					$equipments = $this->fetchArray();
					$q_cabin = "SELECT c.cabin,bc.id, bc.no_of_cabin, bc.no_of_person, bc.cabin_price FROM cabins c JOIN boat_cabins bc ON c.id = bc.cabin_id JOIN trips t ON bc.boat_id = t.boat_id WHERE t.id = '".$tripId."' and c.language_id = '1'";
					$this->Query($q_cabin);
					$cabins = $this->fetchArray();
					$q_beverage = "SELECT b.beverage, tb.* FROM beverages b JOIN trip_beverages tb ON b.id = tb.beverage_id JOIN trips t ON tb.trip_id = t.id WHERE t.id = '".$tripId."' and trip_schedule_id = '".$scheduleId."' and tb.eq_type = 'paid' and b.language_id = '1'";
					$this->Query($q_beverage);
					$beverages = $this->fetchArray();
					$q_food = "SELECT f.food, tf.* FROM foods f JOIN trip_foods tf ON f.id = tf.food_id JOIN trips t ON tf.trip_id = t.id WHERE t.id = '".$tripId."' and tf.trip_schedule_id = '".$scheduleId."' and tf.eq_type = 'paid' and f.language_id = '1'";
					$this->Query($q_food);
					$foods = $this->fetchArray();
					require_once("views/".$this->name."/booking.php"); 
				}
				else {
					echo "Failed";
				}
			}
			else {
				echo "Failed";
			}
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
		
		$q_min_child_age = "SELECT value FROM confic WHERE confic_type_id = '1' AND title = 'min_child_age' ";
		$this->Query($q_min_child_age);
		$min_child_age = $this->fetchArray();
		$minChildAge = $min_child_age[0]['value'];
		
		$q_max_child_age = "SELECT value FROM confic WHERE confic_type_id = '1' AND title = 'max_child_age' ";
		$this->Query($q_max_child_age);
		$max_child_age = $this->fetchArray();
		$maxChildAge = $max_child_age[0]['value'];
		
		$q_child_persant = "SELECT value FROM confic WHERE confic_type_id = '1' AND title = 'child_trip_discount' ";
		$this->Query($q_child_persant);
		$child_persant = $this->fetchArray();
		$priceChildPersant = $child_persant[0]['value'];
		
		$q_service_tax = "SELECT value FROM confic WHERE confic_type_id = '1' AND title = 'service_tax' ";
		$this->Query($q_service_tax);
		$service_tax = $this->fetchArray();
		$serviceTax = $service_tax[0]['value'];
		
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
		
		$q_schedule_price = "SELECT trip_price FROM trip_schedules WHERE id = '".$scheduleId."'";
		$this->Query($q_schedule_price);
		$tripPrices = $this->fetchArray();
		$tripPrice = $tripPrices[0]['trip_price'];
		/*GET DATA FOR THE CART PAGE "CABIN","BEVERAGE","OPTION","FOOD" END*/
		require_once("views/".$this->name."/addToCart.php"); 
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////
	###########                       MY BOOKING END                                  ##########
	//////////////////////////////////////////////////////////////////////////////////////////////////
}