<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	class cabinClass extends DbAccess {
		public $view='';
		public $name='cabin';
		
		
		function show($view) {	
				session_start();
			 $query_all ="SELECT * FROM  cabins WHERE  language_id = '".$_SESSION['language_id']."'";
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
			$cabins = $this->fetchArray();
			$keyword = $this->siteLanguage();
			
		    if($cabins=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$cabins = $this->fetchArray();
			}	
			require_once("views/".$this->name."/show.php");		
		}	
			
	
		function addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  cabins WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
				}
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				 $query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  cabins WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
				}
				require_once("views/".$this->name."/addnew.php");
			}
		}
		function save() {
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			
			if($_REQUEST['id'] && $_REQUEST['cabin1']!='') {
				
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM cabins WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['cabin'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE cabins SET cabin = '".$_REQUEST['cabin'.$lang['id']]."' ".$str." ,detail = '".$_REQUEST['detail'.$lang['id']]."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO cabins(id,language_id,cabin,detail,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['cabin'.$lang['id']]."' ,'".$_REQUEST['detail'.$lang['id']]."','1')";
					$this->Query($query);
					$this->Execute();
						}
					}
				
				}
				
			}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['cabin'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO cabins(id,language_id,cabin,detail,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".$_REQUEST['cabin'.$lang['id']]."' ,'".mysql_real_escape_string($_REQUEST['detail'.$lang['id']])."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
				
				
			}
			$this->show();
		}
		
		
		
		
		function status(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE cabins SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->show();
		}else{
			$this->show();
		}
		//header('location:index.php?control=food');
		}
		
		function delete(){
			
			
			$query = "DELETE FROM cabins WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->show();
				//header('location:index.php?control=cabin');
		}
		
		
		
		
		
		/*CABIN OPTIONS START HERE*/
		
		function showoption($view) {
			
			 $query_all ="SELECT cf.*,c.cabin FROM  cabin_features cf JOIN cabins c ON cf.cabin_id = c.id WHERE 1";
			$this->Query($query_all);
			$cabins = $this->fetchArray();
			$tdata=count($cabins);
			
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
			$cabins = $this->fetchArray();
			$keyword = $this->siteLanguage();
			
		    if($cabins==''  and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$cabins = $this->fetchArray();
			}	
			require_once("views/".$this->name."/showoption.php");		
		}	
			
	
		function addnewoption() {
			
			
			$cabinsQ = "SELECT * FROM cabins WHERE language_id = '1'";
			$this->Query($cabinsQ);
			$cabins = $this->fetchArray();
			
			if($_REQUEST['id']) {
					 $query_all ="SELECT * FROM  cabin_features WHERE id = '".$_REQUEST['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
				require_once("views/".$this->name."/addnewoption.php");
			}
			else {
				
				require_once("views/".$this->name."/addnewoption.php");
			}
		}
		function saveoption() {
			if($_REQUEST['id']) {
				if($_REQUEST['option'] && $_REQUEST['cabin']){	
			
			$query = "UPDATE `cabin_features` SET `cabin_id` = '".$_REQUEST['cabin']."' , `option` = '".mysql_real_escape_string($_REQUEST['option'])."' WHERE id = '".$_REQUEST['id']."'";
					$this->Query($query);
					$this->Execute();
				}
			}
			else {
				
				if($_REQUEST['option'] && $_REQUEST['cabin']){	
				
					$query = "INSERT INTO `cabin_features` (`cabin_id`,`option`) VALUES ('".$_REQUEST['cabin']."','".mysql_real_escape_string($_REQUEST['option'])."')";
						$this->Query($query);
						$this->Execute();
						
				}
			}
			
			$this->showoption();
		}
		
		
		
		
		function statusoption(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE cabin_features SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->showoption();
		}else{
			$this->showoption();
		}
		
		}
		
		function deleteoption(){
			
			
			$query = "DELETE FROM cabin_features WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->showoption();
		}
		
		
		
		
		/*CABIN OPTIONS START HERE*/
		
		
		
		
	}