<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class relationClass extends DbAccess {
	public $view='';
	public $name='relation';

	function show($view) {	
		session_start();
		$query ="select * from relation_lang WHERE language_id = '".$_SESSION['language_id']."'";
		$this->Query($query);
		$tresult = $this->fetchArray();
		$tdata=count($tresult);
				
		/* Paging start here */
		$page   = intval($_REQUEST['page']);
		$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 5;//PERPAGE;
		$adjacents  = intval($_REQUEST['adjacents']);
		$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages); 
		$tdata = floor($tdata);
		if($page<=0)  $page  = 1 ;
		//if($adjacents<=0) $tdata?($adjacents = 4) : 0 ;	
		if($adjacents<=0) $adjacents = 4;	
		$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" .$tpages. "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
		
		$boat =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($boat);
		$results = $this->fetchArray();	
		if($results==''){
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
				    $query_all ="SELECT * FROM relation_lang WHERE relation_id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM relation_lang WHERE relation_id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$foods = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM relation_lang WHERE language_id = '".$lang['id']."'";
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
			/*$max_query=	"SELECT MAx(id) mx FROM relations";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;*/
			
			$max_query_relation =	"SELECT MAx(id) mx FROM relation_lang";
			$this->Query($max_query_relation);
			$relation_max_id = $this->fetchArray();
			$relation_id = $relation_max_id[0][0]['mx']+1;
			
			 $query = "INSERT INTO `relations` (`relation`, `status`) VALUES ('".strtolower(str_replace(" ","_",$_REQUEST['relation1']))."' , '".$status."')";
			$this->Query($query);
			$this->Execute();
			
			$query1 = "INSERT INTO `relation_lang` (`id`,`relation_id` ,`language_id` ,`content`,`status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
			$query1 .= $i==0 ? "(".$relation_id." , ".mysql_insert_id()." , ".$lang['id']." ,'".$_REQUEST['relation'.$lang['id']]."' , '".$status."')" : " , (".$relation_id." , ".mysql_insert_id()." ,".$lang['id']." , '".$_REQUEST['relation'.$lang['id']]."' , '".$status."')";
				$i++;
			}
			$this->Query($query1);
			$this->Execute();
			
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `relations` SET `relation` ='".strtolower(str_replace(" ","_",$_REQUEST['relation1']))."' WHERE id = ".$currentID;			
			$this->Query($query);
			$this->Execute();
			
			$query1 = "UPDATE `relation_lang` SET `content` = '".$_REQUEST['relation'.$lang['id']]."' WHERE relation_id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query1);
			$this->Execute();}
		}
		$this->show();
		//header('location:index.php?control=relation');
	}

   function status(){
		
		$query = "UPDATE relations SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
		$query = "UPDATE relation_lang SET status ='".$_REQUEST['status']."' WHERE relation_id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			
		header('location:index.php?control=relation');
		}
		
   function relation_status(){
	   
			if($_REQUEST['id']!=''){
		     $query = "UPDATE relations SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
		    $query = "UPDATE relation_lang SET status ='".$_REQUEST['status']."' WHERE relation_id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			    $this->show();
			}else{
			    $this->show();
			}
		//header('location:index.php?control=countrie&task=city');
		}


	function delete(){
			
		$query = "DELETE FROM relations WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		//header('location:index.php?control=relation');
			
		$query = "DELETE FROM relation_lang WHERE relation_id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		$this->show();
		//header('location:index.php?control=relation');
	}


}