<?php
	require_once('dbaccess.php');	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class ReviewClass extends DbAccess {
		public $view='';
		public $name='review';

		
		function show(){	
		$uquery ="select AVG(tra.rating), tr.* from trip_rating tra JOIN  trip_reviews tr ON tra.user_id = tr.user_id and tra.trip_id = tr.trip_id where 1 group by tra.user_id and tra.trip_id and tra.trip_schedule_id";
		$this->Query($uquery);
		$uresults = $this->fetchArray();
		/*echo "<pre>";
		print_r($uresults);*/
		$tdata=count($uresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 5;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */	
		$query ="select AVG(tra.rating), tr.* from trip_rating tra JOIN  trip_reviews tr ON tra.user_id = tr.user_id and tra.trip_id = tr.trip_id where 1 group by tra.user_id and tra.trip_id and tra.trip_schedule_id LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($query);
		$results = $this->fetchArray();		
		
		require_once("views/".$this->name."/show.php"); 
		}
		
		
		
		function active() {
			   if($_REQUEST['status']!='') {
		        	$query = "UPDATE trip_reviews SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
					$this->show();
					//header("location:index.php?control=review");
		       }else {
				  // header("location:index.php?control=review");
					$this->show();
			   }
				
		 }
		 
		 function delete(){
			
			$query = "DELETE FROM trip_reviews WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->show();
				//header('location:index.php?control=countrie');
		 }
		 
		 function review_detail($view=NULL) {	
			
			$query_all ="select tra.*, tr.* from trip_rating tra JOIN  trip_reviews tr ON tra.user_id = tr.user_id and tra.trip_id = tr.trip_id where tra.user_id and tra.trip_id and tra.trip_schedule_id";
			$this->Query($query_all);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
			
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : $this->defaultPageData();
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */			
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			$keyword = $this->siteLanguage();
			//print_r($keyword);
			require_once("views/".$this->name."/review_detail.php");		
		}	
		
		
	
  }