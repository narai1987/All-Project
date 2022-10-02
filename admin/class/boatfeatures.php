<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class boatfeatureClass extends DbAccess {
		public $view='';
		public $name='boatfeature';
				
		function show($view) {	
			session_start();
			$query ="select * from boat_technical WHERE language_id = '".$_SESSION['language_id']."'";
			$this->Query($query);
			$tresult = $this->fetchArray();
			$tdata = count($tresult);
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
				
			 $query ="select * from boat_technical WHERE language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
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
				    $query_all ="SELECT * FROM  boat_technical WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
				$query_all ="SELECT * FROM  boat_technical WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			
			}
			else {
				 $query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  boat_technical WHERE language_id = '".$lang['id']."'";
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
			if($_REQUEST['id'] && $_REQUEST['title1']!='') {
				$q_select = "SELECT * FROM boat_technical WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_technical WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
		  	$query = "UPDATE boat_technical SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_technical(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_technical(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->show();
		}
		
		
		
		function delete(){
			
			$query = "DELETE FROM boat_technical WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->show();
				//header('location:index.php?control=boatfeature');
		 }
		 
	
		
		
   function status(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE boat_technical SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->show();
		}else{
			$this->show();
		}
		//header('location:index.php?control=food');
		}
		
		
		
		
		function boat_cockpit_feature($view) {	
			session_start();
			$query ="select * from boat_cockpit WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//require_once("views/".$this->name."/".$this->task.".php"); 
			
			
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from boat_cockpit WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/boat_cockpit_feature.php");		
		}
		
		
		
		function boat_cockpit_feature_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_cockpit WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_cockpit WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_cockpit_feature_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_cockpit WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_cockpit_feature_addnew.php");
			}
		}
		
		
		function boat_cockpit_feature_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_cockpit WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_cockpit WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_cockpit SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_cockpit(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_cockpit(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_cockpit_feature();
			//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		}
		
		
		
		
		
		function boat_cockpit_feature_status(){
			
		
			
		if($_REQUEST['id']!='') {	
		$query = "UPDATE boat_cockpit SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
		$this->boat_cockpit_feature();
		}else{
			$this->boat_cockpit_feature();
		}
		//header('location:index.php?control=food');
		}
		
		
		function boat_cockpit_feature_delete(){
			
			$query = "DELETE FROM boat_cockpit WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_cockpit_feature();
				//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		 }
		
		
			
		
		
		function boat_helm_feature($view) {	
			session_start();
			$query ="select * from boat_helm WHERE  language_id = '".$_SESSION['language_id']."'";
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
				
			$query ="select * from boat_helm WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/boat_helm_feature.php");		
		}
		
		
		
		function boat_helm_feature_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_helm WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_helm WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_helm_feature_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_helm WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_helm_feature_addnew.php");
			}
		}
		
		
		function boat_helm_feature_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_helm WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_helm WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_helm SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_helm(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_helm(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_helm_feature();
			//header('location:index.php?control=boatfeature&task=boat_helm_feature');
		}
		
		
		
		
		
		function boat_helm_feature_status(){
		
					
		if($_REQUEST['id']!='') {	
		$query = "UPDATE boat_helm SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->boat_helm_feature();
		}else{
				$this->boat_helm_feature();
		}
			
		//header('location:index.php?control=boatfeature&task=boat_helm_feature');
		}
		
		
		function boat_helm_feature_delete(){
			
			$query = "DELETE FROM boat_helm WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_helm_feature();
			//	header('location:index.php?control=boatfeature&task=boat_helm_feature');
		 }
		
				
		
		
		function boat_hulldeck_feature($view) {	
			session_start();
			$query ="select * from boat_hulldeck WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//require_once("views/".$this->name."/".$this->task.".php");
			
				
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from boat_hulldeck WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}	 			
			require_once("views/".$this->name."/boat_hulldeck_feature.php");		
		}
		
		
		
		function boat_hulldeck_feature_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_hulldeck WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_hulldeck WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_hulldeck_feature_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_hulldeck WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_hulldeck_feature_addnew.php");
			}
		}
		
		
		function boat_hulldeck_feature_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_hulldeck WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_hulldeck WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_hulldeck SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_hulldeck(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_hulldeck(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_hulldeck_feature();
			
			//header('location:index.php?control=boatfeature&task=boat_hulldeck_feature');
		}
		
		
		
		
		
		function boat_hulldeck_feature_status(){
			if($_REQUEST['id']!='') {
		$query = "UPDATE boat_hulldeck SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
				     $this->Execute();
				  $this->boat_hulldeck_feature();	
			}else {
				$this->boat_hulldeck_feature();	
			}
		//header('location:index.php?control=boatfeature&task=boat_hulldeck_feature');
		}
		
		
		function boat_hulldeck_feature_delete(){
			
			$query = "DELETE FROM boat_hulldeck WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_hulldeck_feature();	
			//	header('location:index.php?control=boatfeature&task=boat_hulldeck_feature');
		 }
		
		 
		
			
				
		
		
		function engine_power_option($view) {	
			session_start();
			$query ="select * from boat_enginepower WHERE  language_id = '".$_SESSION['language_id']."'";
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
				
			$query ="select * from boat_enginepower WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/engine_power_option.php");		
		}
		
		
		
		function engine_power_option_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_enginepower WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_enginepower WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/engine_power_option_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_enginepower WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/engine_power_option_addnew.php");
			}
		}
		
		
		function engine_power_option_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_enginepower WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_enginepower WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			 $query = "UPDATE boat_enginepower SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."',name = '".mysql_real_escape_string($_REQUEST['name'.$lang['id']])."',power = '".mysql_real_escape_string($_REQUEST['power'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_enginepower(id,language_id,name,title,power,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['name'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['power'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_enginepower(id,language_id,name,title,power,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['name'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['power'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
				$this->engine_power_option();
			//header('location:index.php?control=boatfeature&task=engine_power_option');
		}
		
		
		
		
		
		function engine_power_option_status(){
			if($_REQUEST['id']!='') {
		$query = "UPDATE boat_enginepower SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
					$this->engine_power_option();
			}else {
			$this->engine_power_option();	
			}
		//header('location:index.php?control=boatfeature&task=engine_power_option');
		}
		
		
		function engine_power_option_delete(){
			
			$query = "DELETE FROM boat_enginepower WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->engine_power_option();	
				//header('location:index.php?control=boatfeature&task=engine_power_option');
		 }
		 
		
		
		
		
		function boat_engineTechnical_feature($view) {	
			session_start();
			$query ="select * from boat_engine WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//require_once("views/".$this->name."/".$this->task.".php"); 
			
					
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from boat_engine WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}			
			require_once("views/".$this->name."/boat_engineTechnical_feature.php");		
		}
		
		
		
		function boat_engineTechnical_feature_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_engine WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_engine WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_engineTechnical_feature_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_engine WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_engineTechnical_feature_addnew.php");
			}
		}
		
		
		function boat_engineTechnical_feature_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_engine WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_engine WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_engine SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_engine(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_engine(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_engineTechnical_feature();
			//header('location:index.php?control=boatfeature&task=boat_engineTechnical_feature');
		}
		
		
		
		
		
		function boat_engineTechnical_feature_status(){
			if($_REQUEST['id']!="") {
		$query = "UPDATE boat_engine SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->boat_engineTechnical_feature();
			}else {
			$this->boat_engineTechnical_feature();	
			}
		//header('location:index.php?control=boatfeature&task=boat_engineTechnical_feature');
		}
		
		
		function boat_engineTechnical_feature_delete(){
			
			$query = "DELETE FROM boat_engine WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_engineTechnical_feature();
				//header('location:index.php?control=boatfeature&task=boat_engineTechnical_feature');
		 }
		
		
		
		
		
		
		
		
		
		
		
		
		
		/* ########################################BOAT NEW FEATURES ADDED HERE ABOVE CODE IS IDLE FOR CLIENT REVIEW###############################
			#######################################  __________________***********************_____________________#############################                                               
		*/
		
		
		
		function boat_safety($view) {	
			session_start();
			$query ="select * from boat_safety WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//require_once("views/".$this->name."/".$this->task.".php"); 
			
			
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from boat_safety WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/boat_safety.php");		
		}
		
		
		
		function boat_safety_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_safety WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_safety WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_safety_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_safety WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_safety_addnew.php");
			}
		}
		
		
		function boat_safety_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_safety WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_safety WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_safety SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_safety(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_safety(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_safety();
			//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		}
		
		
		
		
		
		function boat_safety_status(){
			
		
			
		if($_REQUEST['id']!='') {	
		$query = "UPDATE boat_safety SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
		$this->boat_safety();
		}else{
			$this->boat_safety();
		}
		//header('location:index.php?control=food');
		}
		
		
		function boat_safety_delete(){
			
			$query = "DELETE FROM boat_safety WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_safety();
				//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		 }
		
		
		
		
		
		
		
		function boat_facility($view) {	
			session_start();
			$query ="select * from boat_facilities WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//require_once("views/".$this->name."/".$this->task.".php"); 
			
			
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from boat_facilities WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/boat_facility.php");		
		}
		
		
		
		function boat_facility_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_facilities WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_facilities WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_facility_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_facilities WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_facility_addnew.php");
			}
		}
		
		
		function boat_facility_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_facilities WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_facilities WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_facilities SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_facilities(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_facilities(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_facility();
			//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		}
		
		
		
		
		
		function boat_facility_status(){
			
		
			
		if($_REQUEST['id']!='') {	
		$query = "UPDATE boat_facilities SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
		$this->boat_facility();
		}else{
			$this->boat_facility();
		}
		//header('location:index.php?control=food');
		}
		
		
		function boat_facility_delete(){
			
			$query = "DELETE FROM boat_facilities WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_facility();
				//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		 }
		
		
		
		
		
		
		/*###################################################################################################*/
		
		
		function boat_communication($view) {	
			session_start();
			$query ="select * from boat_comunication_and_navigation WHERE  language_id = '".$_SESSION['language_id']."'";
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
			//require_once("views/".$this->name."/".$this->task.".php"); 
			
			
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query ="select * from boat_comunication_and_navigation WHERE  language_id = '".$_SESSION['language_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/boat_communication.php");		
		}
		
		
		
		function boat_communication_addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
				    $query_all ="SELECT * FROM  boat_comunication_and_navigation WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
					
				}
			    $query_all ="SELECT * FROM boat_comunication_and_navigation WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$countrycode = $this->fetchArray();
				require_once("views/".$this->name."/boat_communication_addnew.php");
			
			}
			else {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM boat_comunication_and_navigation WHERE language_id = '".$lang['id']."'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				}
				require_once("views/".$this->name."/boat_communication_addnew.php");
			}
		}
		
		
		function boat_communication_save() {
		
		
		/*GET ALL LANGUAGE FROM TABLE START*/	
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();
		/*GET ALL LANGUAGE FROM TABLE FINISH*/	
			if($_REQUEST['id']) {
				$q_select = "SELECT * FROM boat_comunication_and_navigation WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
		
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM boat_comunication_and_navigation WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['title'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE boat_comunication_and_navigation SET title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."', description = '".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."', date='".date("Y:m:d")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO boat_comunication_and_navigation(id,language_id,title,description,date,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
					
					
					$this->Query($query);
					$this->Execute();
						}
					}
				  }
				}
			else {
				
				
				foreach($languages as $lang) {
					if($_REQUEST['title'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO boat_comunication_and_navigation(id,language_id,title,description,date,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y:m:d")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->boat_communication();
			//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		}
		
		
		
		
		
		function boat_communication_status(){
			
		
			
		if($_REQUEST['id']!='') {	
		$query = "UPDATE boat_comunication_and_navigation SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
		$this->boat_communication();
		}else{
			$this->boat_communication();
		}
		//header('location:index.php?control=food');
		}
		
		
		function boat_communication_delete(){
			
			$query = "DELETE FROM boat_comunication_and_navigation WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->boat_communication();
				//header('location:index.php?control=boatfeature&task=boat_cockpit_feature');
		 }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
}