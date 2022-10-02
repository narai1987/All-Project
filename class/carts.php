<?php
	require_once('dbaccess.php');
	
	
	class cartClass extends DbAccess {
		public $view='';
		public $name='cart';
		
		
		function show(){
			
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			
			$Squery = "SELECT * FROM trips t JOIN addtocart ct ON ct.trip_id = t.id JOIN boats b ON t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = 1 AND  ct.user_id = '".session_id()."'";
	$this->Query($Squery);
	$Shcarts = $this->fetchObject();
			
			require_once("views/".$this->name."/show.php");
		}
		
		
		function addToCart(){
			$qTemp = "SELECT * FROM templates WHERE default_temp = 1 AND tmp_type = 1";
			$this->Query($qTemp);
			$templs = $this->fetchArray();
			$tmp = $templs[0]['name'];
			if(!$_REQUEST['trip_id'] && !$_REQUEST['fillPopup']){
				/*QUERY FOR addtocart COUNT START*/
		 		//$queryW = "SELECT * FROM addtocart  WHERE user_id = '".$_SESSION['userid']."'";
		 		$queryW = "SELECT * FROM addtocart  WHERE user_id = '".session_id()."'";
				$this->Query($queryW);
				echo $Wtotal = $this->rowCount();
		 		/*QUERY FOR addtocart COUNT CLOSE*/
			}else if($_REQUEST['fillPopup']){
				/*TOP HEADER SHOPPING CART SECTION HERE*/
				$Squery = "SELECT * FROM trips t JOIN addtocart ct ON ct.trip_id = t.id JOIN boats b ON t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = 1 AND  ct.user_id = '".session_id()."'";
				$this->Query($Squery);
				$Shcarts = $this->fetchObject();
				/*TOP HEADER SHOPPING CART SECTION HERE*/
				require_once("views/".$this->name."/fillheader.php");
			}
			else{
				$this->Query("SELECT * FROM addtocart WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."'");
				 $num = $this->rowCount();
				
				if($num){
					$output = 'already';
				}
				else{
					$output = 'insert';
					$inQuery = "INSERT INTO addtocart (user_id,trip_id,date_time) VALUES ('".session_id()."','".$_REQUEST['trip_id']."','".date("Y-m-d H:i:s")."')";
					$this->Query($inQuery);
					$this->Execute();
				}
				
				$query = "SELECT * FROM trips t JOIN boats b ON t.boat_id=b.id JOIN boatspecifications bs ON bs.boat_id = b.id JOIN trip_specifications ts ON ts.trip_id = t.id WHERE bs.language_id = 1 AND ts.language_id = 1 AND  t.id = '".$_REQUEST['trip_id']."'";
				$this->Query($query);
				$results = $this->fetchObject();
				require_once("views/".$this->name."/addtocart.php");
				
			}
				
		}
		
		function display() {
			$query = "SELECT * FROM trips t  JOIN addtocart c ON c.trip_id = t.id WHERE c.user_id = '".session_id()."'";
			$this->Query($query);
			$results = $this->fetchObject();
			require_once("views/".$this->name."/display.php");
		}
		
		function remove(){
		$query = "DELETE FROM addtocart WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."'";
		$this->Query($query);
		$this->Execute();
		$_SESSION['error'] = "You have successfully removed 1 item from your addtocart.";
		header("location:index.php?control=cart");
		}
		
		function Ajaxremove(){
		$query = "DELETE FROM addtocart WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."'";
		$this->Query($query);
		$this->Execute();
		}
		
		function cartUpdate(){
			$person = $_REQUEST['person']?$_REQUEST['person']:1;
		$query = "UPDATE addtocart SET person = '".$person."', children = '".$_REQUEST['children']."'  WHERE user_id = '".session_id()."' AND trip_id = '".$_REQUEST['trip_id']."'";
		
		$this->Query($query);
		$this->Execute();
		$_SESSION['error'] = "You have successfully updated 1 item.";
		header("location:index.php?control=cart");
		}
		
		
		
	}