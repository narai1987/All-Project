<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class foodClass extends DbAccess {
	public $view='';
	public $name='food';

	function show($view) {	
		
		$query ="select * from foods WHERE language_id = '".$_SESSION['language_id']."'";
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
				
			$query =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
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
				    $query_all ="SELECT * FROM foods WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM foods WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$foods = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM foods WHERE language_id = '".$lang['id']."'";
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
		
		if(!$_REQUEST['id']) {	
			$max_query=	"SELECT MAx(id) mx FROM foods";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;
			$query = "INSERT INTO `foods` (`id`,`language_id` ,`food_type_id`,`food`, `status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
				$query .= $i==0 ? "(".$id." , ".$lang['id']." ,'".$_REQUEST['food_id']."' , '".$_REQUEST['food'.$lang['id']]."' , '".$status."')" : " , (".$id." , ".$lang['id']." ,'".$_REQUEST['food_id']."' , '".$_REQUEST['food'.$lang['id']]."' , '".$status."')";
				$i++;
			}
				
			$this->Query($query);
			$this->Execute();
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `foods` SET `food_type_id` = '".$_REQUEST['food_id']."', `food` = '".$_REQUEST['food'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query);
			$this->Execute();
			}
		}
		$this->show();
		//header('location:index.php?control=food');
	}

   function status(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE foods SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->show();
		}else{
			$this->show();
		}
		//header('location:index.php?control=food');
		}


	function delete(){
			
		$query = "DELETE FROM foods WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		$this->Show();
		//header('location:index.php?control=food');
		
	}


	

		
		function food($view) {	
			session_start();
			$query ="select * from food_types WHERE  language_id = '".$_SESSION['language_id']."'";
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
				
			 $query ="select * from food_types WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			}	 			
			require_once("views/".$this->name."/food.php");		
		}


       function food_addnew() {
			
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$results1 = $this->fetchArray();
		
		if($_REQUEST['id']) {
				
			foreach($results1 as $lang) {
						$query_all ="SELECT * FROM  food_types WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
						$this->Query($query_all);
						$allContents = $this->fetchArray();
						foreach($allContents as $allcontent){
						$results['content'][$lang['id']] = $allcontent;
						}	
			}
		}
		
		require_once("views/".$this->name."/food_addnew.php");
	}
	
	
	function food_save() {	
		
		$status = 1; 
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();		
		
		if(!$_REQUEST['id']) {	
			$max_query=	"SELECT MAx(id) mx FROM food_types";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;
			$query = "INSERT INTO `food_types` (`id`,`language_id` ,`food_type`, `status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
				$query .= $i==0 ? "(".$id." , ".$lang['id']." , '".$_REQUEST['foodname'.$lang['id']]."' , '".$status."')" : " , (".$id." , ".$lang['id']." , '".$_REQUEST['foodname'.$lang['id']]."' , '".$status."')";
				$i++;
			}
				
			$this->Query($query);
			$this->Execute();
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `food_types` SET `food_type` = '".$_REQUEST['foodname'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query);
			$this->Execute();
			}
		}
		$this->food();
		//header('location:index.php?control=food&task=food');
	}

    function food_status(){
		if($_REQUEST['id']!=''){	
		$query = "UPDATE food_types SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->food();
		}else {
			$this->food();
		}
		//header('location:index.php?control=food&task=food');
		}
		
   function food_delete(){
			
		$query = "DELETE FROM food_types WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		$this->food();
		//header('location:index.php?control=food&task=food');
	   }

}