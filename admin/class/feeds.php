<?php
	require_once('dbaccess.php');
	//require_once('../textconfig/config.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class FeedClass extends DbAccess {
		public $view='';
		public $name='feed';	
		
		function show(){
			$cquery ="select * from feeds where 1 ";
			$this->Query($cquery);
			$cresults = $this->fetchArray();	
			$tdata=count($cresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */		
			$query ="select * from feeds where 1 ORDER BY  date_time DESC  LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
		function feedshow() {
			
			$query =$_REQUEST['usertype']==1?"select * from feeds f JOIN providers p ON f.user_id = p.id  where f.id = '".$_REQUEST['id']."'":"select * from feeds f JOIN users u ON f.user_id = u.id  where f.id = '".$_REQUEST['id']."' ";
			$this->Query($query);
		
			return 	$this->fetchArray();	
		}
		function status() {
			
			$query =$_REQUEST['status']?"update feeds set status = '0'  where id = '".$_REQUEST['id']."'":"update feeds set status = '1'  where id = '".$_REQUEST['id']."'";
			$this->Query($query);		
			$this->fetchArray();
			$cquery ="select * from feeds where 1";
			$this->Query($cquery);
			$cresults = $this->fetchArray();	
			$tdata=count($cresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */		
			$query ="select * from feeds where 1  ORDER BY  date_time DESC  LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			//echo "views/".$this->name."/".$this->task.".php";
			require_once("views/".$this->name."/show.php"); 	
		}
		function delete() {
			
			$query = "delete from feeds   where id = '".$_REQUEST['id']."'";
			$this->Query($query);		
			$this->fetchArray();
			$cquery ="select * from feeds where 1";
			$this->Query($cquery);
			$cresults = $this->fetchArray();	
			$tdata=count($cresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */		
			$query ="select * from feeds where 1  ORDER BY  date_time DESC  LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			//echo "views/".$this->name."/".$this->task.".php";
			require_once("views/".$this->name."/show.php"); 	
		}
	}