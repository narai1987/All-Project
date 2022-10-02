<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class beverageClass extends DbAccess {
	public $view='';
	public $name='beverage';

	function show($view) {	
		
		$query ="SELECT * from beverages WHERE language_id = '".$_SESSION['language_id']."'";
		$this->Query($query);
		$tresult = $this->fetchArray();
		$tdata=count($tresult);
				
		/* Paging start here */
		$page   = intval($_REQUEST['page']);
		$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : $this->defaultPageData();
		$adjacents  = intval($_REQUEST['adjacents']);
		$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages); 
		$tdata = floor($tdata);
		if($page<=0)  $page  = 1 ;
		if($adjacents<=0) $tdata?($adjacents = 4) : 0 ;		
		$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" .$tpages. "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
		
		$boat =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($boat);
		$results = $this->fetchArray();	
		if($results=='' and $tdata > 0){
			$page   = $_REQUEST['page'] - 1;
				
			 $query ="select * from beverages WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			}		
		require_once("views/".$this->name."/show.php");	
		
	}





		function addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM beverages WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM beverages WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$beverages = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM beverages WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/addnew.php");
			}
		}






	function save() {	
		
		$status = 1; 
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();		
		
		if(!$_REQUEST['id'] && $_REQUEST['beverage1']!='') {	
			$max_query=	"SELECT MAx(id) mx FROM beverages";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;
			$query = "INSERT INTO `beverages` (`id`,`language_id` ,`beverage_type_id`,`beverage`, `status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
				$query .= $i==0 ? "(".$id." , ".$lang['id']." ,'".$_REQUEST['beverage_id']."' , '".$_REQUEST['beverage'.$lang['id']]."' , '".$status."')" : " , (".$id." , ".$lang['id']." ,'".$_REQUEST['beverage_id']."' , '".$_REQUEST['beverage'.$lang['id']]."' , '".$status."')";
				$i++;
			}
				
			$this->Query($query);
			$this->Execute();
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `beverages` SET `beverage_type_id` = '".$_REQUEST['beverage_id']."', `beverage` = '".$_REQUEST['beverage'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query);
			$this->Execute();
			}
		}
		$this->show();
		//header('location:index.php?control=beverage');
	}

   function status(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE beverages SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
					$this->show();	
		}
		else {
			$this->show();	
		}
			
		//header('location:index.php?control=beverage');
		}


	function delete(){
			
		$query = "DELETE FROM beverages WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		$this->show();	
		//header('location:index.php?control=beverage');
		
	}


	

		
		function beverage($view) {	
			session_start();
			$query ="select * from beverage_types WHERE  language_id = '".$_SESSION['language_id']."'";
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
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */	
			 $query =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			$keyword = $this->siteLanguage();
			
			if($results=='' and $tdata > 0){
			$page   = $_REQUEST['page'] - 1;
				
			 $query ="select * from beverage_types WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			}				
			require_once("views/".$this->name."/beverage.php");		
		}


       function beverage_addnew() {
			
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$results1 = $this->fetchArray();
		
		if($_REQUEST['id']) {
				
			foreach($results1 as $lang) {
						$query_all ="SELECT * FROM  beverage_types WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
						$this->Query($query_all);
						$allContents = $this->fetchArray();
						foreach($allContents as $allcontent){
						$results['content'][$lang['id']] = $allcontent;
						}	
			}
		}
		
		require_once("views/".$this->name."/beverage_addnew.php");
	}
	
	
	function beverage_save() {	
		
		$status = 1; 
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();		
		
		if(!$_REQUEST['id'] && $_REQUEST['beveragename1']!='') {	
			$max_query=	"SELECT MAx(id) mx FROM beverage_types";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;
			$query = "INSERT INTO `beverage_types` (`id`,`language_id` ,`beverage_type`, `status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
				$query .= $i==0 ? "(".$id." , ".$lang['id']." , '".$_REQUEST['beveragename'.$lang['id']]."' , '".$status."')" : " , (".$id." , ".$lang['id']." , '".$_REQUEST['beveragename'.$lang['id']]."' , '".$status."')";
				$i++;
			}
				
			$this->Query($query);
			$this->Execute();
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `beverage_types` SET `beverage_type` = '".$_REQUEST['beveragename'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query);
			$this->Execute();
			}
		}
		$this->beverage();
		//header('location:index.php?control=beverage&task=beverage');
	}

    function beverage_status(){
		if($_REQUEST['id']!='') { 	
		$query = "UPDATE beverage_types SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->beverage();
		}else {
			$this->beverage();	
		}
		//header('location:index.php?control=beverage&task=beverage');
		}
		
   function beverage_delete(){
			
		$query = "DELETE FROM beverage_types WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		$this->beverage();
	//	header('location:index.php?control=beverage&task=beverage');
	   }

}