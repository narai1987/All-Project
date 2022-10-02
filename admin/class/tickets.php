<?php
	require_once('dbaccess.php');	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	class ticketClass extends DbAccess {
		public $view='';
		public $name='ticket';
		
		function show(){
			$query ="SELECT bt.id,bt.booking_id,bt.ticket_no FROM booking_tickets bt JOIN"			
			. "\n bookings b ON b.id = bt.booking_id ";
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
			$boats = $this->fetchArray(); 
			require_once("views/".$this->name."/show.php");	
		}
		
	}