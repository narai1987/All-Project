<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class countrieClass extends DbAccess {
		public $view='';
		public $name='countrie';
				
		function show($view) {	
			session_start();
			$query ="select * from countries WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//print_r($results);
			if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from countries WHERE  language_id = '".$_SESSION['language_id']."'  LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}
			$keyword = $this->siteLanguage();
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/show.php");		
		}
	
		function addnew() {
			//echo $_REQUEST['id']."Nagesh";
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  countries WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
				$query_all ="SELECT * FROM  countries WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			
			}
			else {
				 $query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  countries WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
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
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM countries WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM countries WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['countryname'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE countries SET country = '".$_REQUEST['countryname'.$lang['id']]."' ".$str.", country_code = '".$_REQUEST['countrycode']."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO countries(id,language_id,country,country_code,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['countryname'.$lang['id']]."' ,'".$_REQUEST['countrycode']."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['countryname'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO countries(id,language_id,country,country_code,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".$_REQUEST['countryname'.$lang['id']]."' ,'".$_REQUEST['countrycode']."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->show();
		}
		
		
		
		function delete(){
			
			$query = "DELETE FROM countries WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->show();
				//header('location:index.php?control=countrie');
		 }
		 
		 function unpublish(){
		echo $_REQUEST['id'];	
		            $query = "UPDATE countries SET status = 0 WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
					//$this->show();
				//	header('location:index.php?control=countrie');
		}
		
		function publish(){
		echo	"Hello".	$query = "UPDATE countries SET status = 1 WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
					//$this->show();
					//header('location:index.php?control=countrie');
		}
		
		function active() {
			   if($_REQUEST['status']!='') {
		        	$query = "UPDATE countries SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
					$this->show();
		       }else {
					$this->show();
			   }
					
			
			
		}
		
		
		
		
		
		function state($view) {	
		
			session_start();
			$query ="select * from states WHERE  language_id = '".$_SESSION['language_id']."'";
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
			if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
			}
				$query ="select * from states WHERE  language_id = '".$_SESSION['language_id']."'  LIMIT ".(($page-1)*$tpages).",".$tpages;
				$this->Query($query);
				$results = $this->fetchArray();	
			$keyword = $this->siteLanguage();
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/state.php");		
		}
		
		
		
		function state_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  states WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM  states WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/state_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  states WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/state_addnew.php");
			}
		}
		
		
		function state_save() {
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM states WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM states WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['statename'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE states SET country_id = '".$_REQUEST['country_id']."' ".$str.", state = '".$_REQUEST['statename'.$lang['id']]."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO states(id,language_id,country_id,state,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['country_id']."' ,'".$_REQUEST['statename'.$lang['id']]."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['statename'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO states(id,language_id,country_id,state,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".$_REQUEST['country_id']."' ,'".$_REQUEST['statename'.$lang['id']]."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->state();
		}
		
		
		
		
		
		function state_status(){
			if($_REQUEST['id']!=''){
				
				$query = "UPDATE states SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
				$this->Query($query);
				$this->Execute();	
				$this->state();
			}else {
				$this->state();
			}
		//header('location:index.php?control=countrie&task=state');
		}
		
		
		function states_delete(){
			
			$query = "DELETE FROM states WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->state();
		 }
		
		
				
		function city($view) {	
			session_start();
			$query ="select * from cities WHERE  language_id = '".$_SESSION['language_id']."'";
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
			if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
			}
				$query ="select * from cities WHERE  language_id = '".$_SESSION['language_id']."'  LIMIT ".(($page-1)*$tpages).",".$tpages;
				$this->Query($query);
				$results = $this->fetchArray();	
			
			$keyword = $this->siteLanguage();
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/city.php");		
		}
		
		
		
		
		function city_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM cities WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM cities WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/city_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM cities WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/city_addnew.php");
			}
		}
		
		
		function city_save() {
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM cities WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM cities WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['cityname'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE cities SET country_id = '".$_REQUEST['country_id']."', state_id = '".$_REQUEST['state_id']."', city = '".$_REQUEST['cityname'.$lang['id']]."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO cities(id,language_id,country_id,state_id,city,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['country_id']."' ,'".$_REQUEST['state_id']."' ,'".$_REQUEST['statename'.$lang['id']]."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['cityname'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO cities(id,language_id,country_id,state_id,city,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".$_REQUEST['country_id']."' ,'".$_REQUEST['state_id']."' ,'".$_REQUEST['cityname'.$lang['id']]."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->city();
		}
		
		
		
		
		
		function city_status(){
			if($_REQUEST['id']!=''){
		        $query = "UPDATE cities SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
				$this->Query($query);
				$this->Execute();	
			    $this->city();
			}else{
			    $this->city();
			}
		//header('location:index.php?control=countrie&task=city');
		}
		
		
		function city_delete(){
			
			$query = "DELETE FROM cities WHERE id = ".$_REQUEST['id'];
				$this->Query($query);
				$this->Execute();
				 $this->city();
				//header('location:index.php?control=countrie&task=city');
		 }
		 
		 function selectCity() {
			session_start();			 
			$id = $_REQUEST['countryID'];
			$query = "SELECT * from cities where country_id='".$id."' AND language_id =".$_SESSION['language_id'];
			$this->Query($query);	
			$results = $this->fetchArray();
			require_once("../views/".$this->name."/selectCity.php");
			die;
		 }
		 	
		function ajaxstate(){
			session_start();
			$id=$_REQUEST['country_id'];
			$query="SELECT * from states where country_id='".$id."' AND language_id =".$_SESSION['language_id'];	
			$this->Query($query);		
			return $results = $this->fetchArray();
		}
		
		
		
		
}