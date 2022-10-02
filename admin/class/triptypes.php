<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class triptypeClass extends DbAccess {
		public $view='';
		public $name='triptype';
				
		function show($view) {	
			/*$query ="select b.* from boats b JOIN operators o ON b.operator_id=o.id JOIN companies c ON b.company_id=c.id WHERE c.language_id = '".$_SESSION['language_id']."' and  b.language_id = '".$_SESSION['language_id']."'  ";*/
			$query ="select * from trip_types WHERE 1 ";
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
			$trips = $this->fetchArray();
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/show.php");		
		}
	
		function addnew() {
			if($_REQUEST['id']) {
				
				
				$query_com ="SELECT * FROM  trip_types WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results = $this->fetchObject();
					
				require_once("views/".$this->name."/addnew.php");
			}
			else {				
				$results = '';
				require_once("views/".$this->name."/addnew.php");
			}
		}
		
		function save() {
			
			$trip_type = $_REQUEST['trip_type'];
			$status = 1; 
			
			if(!$_REQUEST['id'] and ($trip_type!='')) {	
				$query = "INSERT INTO `trip_types` ( `trip_type`, `status`) VALUES ('".$trip_type."', '".$status."')";
				$this->Query($query);
				$this->Execute();
			}
			else {
				$currentID = $_REQUEST['id'];
				$query = "UPDATE `trip_types` SET `trip_type` = '".$trip_type."' WHERE id = '".$currentID."'";
				$this->Query($query);
				$this->Execute();
				
				}
		$this->show();
		}
		
		
		
		function delete(){
			
			$query = "DELETE FROM trip_types WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				header('location:index.php?control=triptype');
		 }
		 
		 
		 
		 
		 
		 
		 
		 function showgas($view) {
			$query ="select * from gas_type WHERE 1 ";
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
			$gases = $this->fetchArray();
			if($gases=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			 $query =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$gases = $this->fetchArray();	
			}
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/gasshow.php");		
		}
	
		function addnewgas() {
			if($_REQUEST['id']) {
				
				
				$query_com ="SELECT * FROM  gas_type WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results = $this->fetchObject();
					
				require_once("views/".$this->name."/addnewgas.php");
			}
			else {				
				$results = '';
				require_once("views/".$this->name."/addnewgas.php");
			}
		}
		
		function savegas() {
			
			$gas_type = $_REQUEST['gas_type'];
			$status = 1; 
			
			if(!$_REQUEST['id'] and ($gas_type!='')) {	
				$query = "INSERT INTO `gas_type` ( `gastype`, `status`) VALUES ('".$gas_type."', '".$status."')";
				$this->Query($query);
				$this->Execute();
			}
			else {
				$currentID = $_REQUEST['id'];
				$query = "UPDATE `gas_type` SET `gastype` = '".$gas_type."' WHERE id = '".$currentID."'";
				$this->Query($query);
				$this->Execute();
				
				}
				$this->showgas();
		//header('location:index.php?control=triptype&task=showgas');
		}
		
		
		
		function deletegas(){
			
			$query = "DELETE FROM gas_type WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->showgas();
				//header('location:index.php?control=triptype&task=showgas');
		 }
		 
		 
		  
		 
		 
		 
		 function showtank($view) {
			$query ="select * from fuel_tank WHERE 1 ";
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
			$tanks = $this->fetchArray();
			
			if($tanks=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			 $query =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$tanks = $this->fetchArray();	
			}
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/tankshow.php");		
		}
	
		function addnewtank() {
			if($_REQUEST['id']) {
				
				
				$query_com ="SELECT * FROM  fuel_tank WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results = $this->fetchObject();
					
				require_once("views/".$this->name."/addnewtank.php");
			}
			else {				
				$results = '';
				require_once("views/".$this->name."/addnewtank.php");
			}
		}
		
		function savetank() {
			
			$fuel_tank = $_REQUEST['fuel_tank'];
			$status = 1; 
			
			if(!$_REQUEST['id'] and ($fuel_tank!='')) {	
			    $query = "INSERT INTO `fuel_tank` ( `fuel_tank`, `status`) VALUES ('".$fuel_tank."', '".$status."')";
				$this->Query($query);
				$this->Execute();
			}
			else {
				$currentID = $_REQUEST['id'];
				$query = "UPDATE `fuel_tank` SET `fuel_tank` = '".$fuel_tank."' WHERE id = '".$currentID."'";
				$this->Query($query);
				$this->Execute();
				
				}
				$this->showtank();
		//header('location:index.php?control=triptype&task=showtank');
		}
		
		
		
		function deletetank(){
			
			$query = "DELETE FROM fuel_tank WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->showtank();
				//header('location:index.php?control=triptype&task=showtank');
		 }
		 
		
		
	}