<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class certificateClass extends DbAccess {
	public $view='';
	public $name='certificate';

	function show($view) {	
		
		$query ="select * from dive_certificates WHERE language_id = '".$_SESSION['language_id']."'";
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
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
		
		 $certificate =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($certificate);
		$results = $this->fetchArray();	
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from dive_certificates WHERE  language_id = '".$_SESSION['language_id']."'  LIMIT ".(($page-1)*$tpages).",".$tpages;
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
				    $query_all ="SELECT * FROM dive_certificates WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM dive_certificates WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$foods = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM dive_certificates WHERE language_id = '".$lang['id']."'";
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
			 $max_query = "SELECT max(id) mx FROM dive_certificates";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
		    $id='';
			
			$query1 = "INSERT INTO `dive_certificates` (`id`,`language_id` ,`certificate`,`description`,`status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				$id = $id?$id:mysql_insert_id();
				$str = "(".$id." , ".$lang['id']." ,'".$_REQUEST['certificate'.$lang['id']]."' ,'".$_REQUEST['description'.$lang['id']]."' , '".$status."')" ;
				$this->Query($query1.$str);
				$this->Execute();
				$i++;
			}
			
			
		}
		else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			
				$query1 = "UPDATE `dive_certificates` SET `certificate` = '".$_REQUEST['certificate'.$lang['id']]."',`description` = '".$_REQUEST['description'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
				$this->Query($query1);
				$this->Execute();
			}
		}
		 $this->show();
		//header('location:index.php?control=certificate');
	}

   function status(){
		if($_REQUEST['id']!=''){	
		$query = "UPDATE dive_certificates SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
	
		$this->show();
		}else{
			    $this->show();
			}	
		//header('location:index.php?control=certificate');
		}


	function delete(){
		
		$query = "DELETE FROM dive_certificates WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		 $this->show();
		//header('location:index.php?control=certificate');
	}


}