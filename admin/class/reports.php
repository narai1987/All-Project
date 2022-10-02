<?php
	require_once('dbaccess.php');		
	
	
	
	class ReportClass extends DbAccess {
		public $view='';
		public $task=' ';
		public $old_task='';
		public $name='report';
		
		function show() {
				 if($_REQUEST['filter1']==''){
					if($_REQUEST['start_date'] and $_REQUEST['end_date']){
					$where .= "AND b.booking_date BETWEEN '".$_REQUEST['start_date']."' AND '".$_REQUEST['end_date']."'";
					}elseif($_REQUEST['start_date']){
					$where .= "AND b.booking_date = '".$_REQUEST['start_date']."'";
					}elseif($_REQUEST['end_date']){
					$where .= "AND b.booking_date = '".$_REQUEST['end_date']."'";
					
					}
				 }
				
				if($_REQUEST['filter1']=='day'){
				  $where .= "AND b.booking_date = '".date('Y-m-d')."'";
				  unset($_REQUEST['start_date']);
				  unset($_REQUEST['end_date']);
				   
				}else if($_REQUEST['filter1']=='week'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-7 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);
					
				}else if($_REQUEST['filter1']=='month'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-30 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";	
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);			
					
				}else if($_REQUEST['filter1']=='half_year'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-180 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";	
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);			
					
				}
				if($_REQUEST['filter1']=='year'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-365 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";	
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);	
				}
				
		    $query="SELECT distinct(b.id), ts.trip_title,t.trip_type_id, b.*, u.fname,u.lname,u.email,u.mobile,t.start_date,t.end_date FROM `bookings` b JOIN trip_specifications ts ON b.trip_id = ts.trip_id JOIN users u ON b.user_id = u.id JOIN trips t ON t.id = b.trip_id WHERE ts.language_id = '1' ".$where."";	
			$this->Query($query);
			$results = $this->fetchArray();
			
			$tdata=count($results);
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
			$report =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($report);
			$results = $this->fetchArray(); 
			
			require_once("views/".$this->name."/".$this->task.".php"); 
			
		}
		
		
		function ajaxReport() {
			
			$query="SELECT distinct(b.id), ts.trip_title,t.trip_type_id, b.*, u.fname,u.lname,u.email,u.mobile,t.start_date,t.end_date FROM `bookings` b JOIN trip_specifications ts ON b.trip_id = ts.trip_id JOIN users u ON b.user_id = u.id JOIN trips t ON t.id = b.trip_id WHERE ts.language_id = '1'";
			$this->Query($query);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/report.php"); 
			
		}
		
		function export(){
			
			if($_REQUEST['filter1']==''){
					if($_REQUEST['start_date'] and $_REQUEST['end_date']){
					$where .= "AND b.booking_date BETWEEN '".$_REQUEST['start_date']."' AND '".$_REQUEST['end_date']."'";
					}elseif($_REQUEST['start_date']){
					$where .= "AND b.booking_date = '".$_REQUEST['start_date']."'";
					}elseif($_REQUEST['end_date']){
					$where .= "AND b.booking_date = '".$_REQUEST['end_date']."'";
					
					}
				 }
				
				if($_REQUEST['filter1']=='day'){
				  $where .= "AND b.booking_date = '".date('Y-m-d')."'";
				  unset($_REQUEST['start_date']);
				  unset($_REQUEST['end_date']);
				   
				}else if($_REQUEST['filter1']=='week'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-7 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);
					
				}else if($_REQUEST['filter1']=='month'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-30 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";	
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);			
					
				}else if($_REQUEST['filter1']=='half_year'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-180 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";	
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);			
					
				}
				if($_REQUEST['filter1']=='year'){
					$date=date('Y-m-d');
				    $week=date('Y-m-d', strtotime('-365 days', strtotime($date))); 
					$where .= "AND b.booking_date BETWEEN '".$week."' AND '".date('Y-m-d')."'";	
					unset($_REQUEST['start_date']);
				    unset($_REQUEST['end_date']);	
				}
			
		 $query="SELECT distinct(b.id), ts.trip_title,t.trip_type_id, b.*, u.fname,u.lname,u.email,u.mobile,t.start_date,t.end_date FROM `bookings` b JOIN trip_specifications ts ON b.trip_id = ts.trip_id JOIN users u ON b.user_id = u.id JOIN trips t ON t.id = b.trip_id WHERE ts.language_id = '1' ".$where."";  
			$this->Query($query);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/".$this->task.".php"); 	
			
		}
		
	//////////////////////Trip Cancel Report////////////////////////////////	
		
	function trip_cancel_report() {
				 
					if($_REQUEST['cancel_date']){
					$where .= "AND b.cancel_date = '".$_REQUEST['cancel_date']."'";
					}
				   
				 
				 if($_REQUEST['search']) {
				 $string = trim($_REQUEST['search']);
		     	 $arr = explode(" ",$string,2);
			
		    	 $where .=" and ((u.fname LIKE '".$arr[0]."' and u.lname LIKE '".$arr[1]."') or (u.fname LIKE '%".$string."%' or u.lname LIKE '%".$string."%') or  u.email LIKE '%".$string."%')";	
			}
				
				
		    $query="SELECT b.id, ts.trip_title,t.trip_type_id, b.*, u.fname,u.lname,u.email,u.mobile,t.start_date,t.end_date FROM `bookings` b JOIN trip_specifications ts ON b.trip_id = ts.trip_id JOIN users u ON b.user_id = u.id JOIN trips t ON t.id = b.trip_id WHERE b.cancel_status != '0' and ts.language_id = '1' ".$where."";	
			$this->Query($query);
			$results = $this->fetchArray();
			
			$tdata=count($results);
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
			$report =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($report);
			$results = $this->fetchArray(); 
			
			require_once("views/".$this->name."/trip_cancel_report.php"); 
			
		}
		
			
		
		
		
		function export_cancel(){
			  $query="SELECT b.id, ts.trip_title,t.trip_type_id, b.*, u.fname,u.lname,u.email,u.mobile,t.start_date,t.end_date,tt.trip_type FROM `bookings` b JOIN trip_specifications ts ON b.trip_id = ts.trip_id JOIN users u ON b.user_id = u.id JOIN trips t ON t.id = b.trip_id JOIN trip_types tt ON t.trip_type_id = tt.id WHERE b.cancel_status != '0' and ts.language_id = '1'";
			$this->Query($query);
			$results = $this->fetchArray();
			require_once("views/".$this->name."/export_cancel.php"); 
			//require_once("views/".$this->name."/".$this->task.".php"); 	
			
		}
		
	function refund() {
		           $query="SELECT b.id, txn.id as txnid, ts.trip_title,t.trip_type_id, b.*, u.fname,u.lname,u.email,u.mobile,t.start_date,t.end_date,tt.trip_type FROM `bookings` b JOIN trip_specifications ts ON b.trip_id = ts.trip_id JOIN users u ON b.user_id = u.id JOIN trips t ON t.id = b.trip_id JOIN trip_types tt ON t.trip_type_id = tt.id JOIN trip_transactions txn ON b.id = txn.booking_id WHERE b.cancel_status != '0' and ts.language_id = '1'";
			$this->Query($query);
			$results = $this->fetchArray();
			
			
				/*Getting Companies Start*/
				 $query_comp ="SELECT * FROM  paymentgateway";
				$this->Query($query_comp);
				$paymentgateways = $this->fetchArray();
				/*Getting Companies Close*/
			require_once("views/".$this->name."/refund.php"); 
		    }	
		
    function save_refund_amount() {
		
		if($_REQUEST['amount']!='' && $_REQUEST['refund_transaction_id']!='') {
			    $booking = "UPDATE bookings SET cancel_status = '2' WHERE id = '".$_REQUEST['booking_id']."' ";
				$this->Query($booking);
				$this->Execute();
			
				
				 $query = "INSERT INTO trip_refund_transaction (transaction_id,booking_id,refund_amount,refund_transaction_id,refund_date,status) values ('".$_REQUEST['txnid']."','".$_REQUEST['booking_id']."','".$_REQUEST['amount']."','".$_REQUEST['refund_transaction_id']."','".date("Y-m-d")."',1) ";
				$this->Query($query);
				$this->Execute();
			
			}
		//require_once("views/".$this->name."/trip_cancel_report.php"); 
		header('location:index.php?control=report&task=trip_cancel_report');
		    }
	}
	
	