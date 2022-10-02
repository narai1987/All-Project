<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class equipmentClass extends DbAccess {
	public $view='';
	public $name='equipment';

	function show($view) {	
		
		$query ="select * from equipments WHERE language_id = '".$_SESSION['language_id']."'";
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
		$equipments = $this->fetchArray();	
		if($equipments=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$boat =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
		    $this->Query($boat);
		    $equipments = $this->fetchArray();
			}	
				
		require_once("views/".$this->name."/show.php");	
		
	}






	function addnew() {
			
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$results1 = $this->fetchArray();
		
		if($_REQUEST['id']) {
				
			foreach($results1 as $lang) {
						$query_all ="SELECT * FROM  equipments WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
						$this->Query($query_all);
						$allContents = $this->fetchArray();
						foreach($allContents as $allcontent){
						$results['content'][$lang['id']] = $allcontent;
						}	
			}
		}
		
		require_once("views/".$this->name."/addnew.php");
	}






	function save() {	
		
		$status = 1; 
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();		
		
		if(!$_REQUEST['id']) {	
			$max_query=	"SELECT MAx(id) mx FROM equipments";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;
			$query = "INSERT INTO `equipments` (`id`,`language_id` ,`equipment`, `status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
				$query .= $i==0 ? "(".$id." , ".$lang['id']." , '".$_REQUEST['name_'.$lang['id']]."' , '".$status."')" : " , (".$id." , ".$lang['id']." , '".$_REQUEST['name_'.$lang['id']]."' , '".$status."')";
				$i++;
			}
				
			$this->Query($query);
			$this->Execute();
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `equipments` SET `equipment` = '".$_REQUEST['name_'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query);
			$this->Execute();
			}
		}
		$this->show();
		//header('location:index.php?control=equipment');
	}




	function delete(){
			
		$query = "DELETE FROM equipments WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		$this->show();
		//header('location:index.php?control=equipment');
		
	}


	
	  function status(){
	   
			if($_REQUEST['id']!=''){
		    $query = "UPDATE equipments SET status = '".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
		    $this->Query($query);
		    $this->Execute();	
			    $this->show();
			}else{
			    $this->show();
			}
		//header('location:index.php?control=countrie&task=city');
		}



}