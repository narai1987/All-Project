<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	class companyClass extends DbAccess {
		public $view='';
		public $name='company';
		
		
		function show($view) {	
		session_start();
			 $query_all ="SELECT * FROM  companies WHERE  language_id = '".$_SESSION['language_id']."'";
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
			$companys = $this->fetchArray();
			$keyword = $this->siteLanguage();
				
		if($companys=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$companys = $this->fetchArray();
			}	
			require_once("views/".$this->name."/show.php");		
		}	
			
	function iframeBranch($view=NULL) {	
		session_start();
			
			 $query_all ="SELECT * from companies c JOIN company_branch_address cba ON c.id = cba.company_id WHERE c.id = '".$_REQUEST['cid']."' and c.language_id = '".$_SESSION['language_id']."' ORDER BY cba.id DESC";
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
			require_once("views/".$this->name."/iframeBranch.php");		
		}	
		function addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  companies WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
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
					 $query_all ="SELECT * FROM  companies WHERE language_id = '".$lang['id']."'";
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
			
			if($_REQUEST['id'] && $_REQUEST['company1']!='') {
				$q_select = "SELECT * FROM companies WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
				if($_FILES['logo']['name']) {
					$dest = $this->uploadFile("images/company",$_FILES['logo']);
					if($dest)
					unlink($logos[0]['logo']);
					$str = ",logo = '".$dest."' ";	
				}
				
				
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM companies WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['company'.$lang['id']]){
						if($rowsL){
			
			$query = "UPDATE companies SET company = '".$_REQUEST['company'.$lang['id']]."' ".$str." ,description = '".$_REQUEST['description'.$lang['id']]."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO companies(id,language_id,company,logo,description,date_time,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['company'.$lang['id']]."' ,'".$dest."' ,'".$_REQUEST['description'.$lang['id']]."','".date("Y-m-d H:i:s")."','1')";
					$this->Query($query);
					$this->Execute();
						}
					}
				
				}
				
			}
			else {
				
				$dest = $this->uploadFile("images/company",$_FILES['logo']);
				foreach($languages as $lang) {
					if($_REQUEST['company'.$lang['id']]){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO companies(id,language_id,company,logo,description,date_time,status) VALUES('".($LastId?$LastId:'')."',".$lang['id'].",'".$_REQUEST['company'.$lang['id']]."' ,'".$dest."' ,'".mysql_real_escape_string($_REQUEST['description'.$lang['id']])."','".date("Y-m-d H:i:s")."','1')";
						$this->Query($query);
						$this->Execute();
					}
				}
				
				
			}
			$this->show();
		}
		/*COMPANY BRANCH DATA START HERE*/
		function branch($view) {
			session_start();	
			 $query ="SELECT distinct(id) from companies where id='".$_REQUEST['cid']."'";
		      $this->Query($query);
		      return $results = $this->fetchArray();	
			
					
		}	
		
		function editbranch($view) {
			session_start();	
			$bquery ="SELECT * from company_branch_address where id='".$_REQUEST['id']."'";
			
			$this->Query($bquery);
			return $results = $this->fetchArray();	
		}	
		
		
		
		function addbranch() {

			if($_REQUEST['id']) {
				$query_all ="SELECT * FROM  company_branch_address WHERE company_id = '".$_REQUEST['cid']."' AND id = '".$_REQUEST['id']."' ";
				$this->Query($query_all);
				//$results = $this->fetchArray();
				return $results = $this->fetchArray();	
				foreach($results as $data) {}
				
				$q_country ="SELECT * FROM  countries WHERE 1 ";
				$this->Query($q_country);
				//$countrys = $this->fetchArray();
				return $countrys = $this->fetchArray();	
				
				$q_state ="SELECT * FROM  states WHERE 1 ";
				$this->Query($q_state);
				//$states = $this->fetchArray();
				return $states = $this->fetchArray();	
				
				$q_city ="SELECT * FROM cities WHERE state_id = '".$data['state_id']."' ";
				$this->Query($q_city);
				//$citys = $this->fetchArray();
				return $citys = $this->fetchArray();
				
				
			}
			else  {
				$com = $_REQUEST['cid'];
				$q_country ="SELECT * from  countries WHERE 1 ";
				$this->Query($q_country);
				$countrys = $this->fetchArray();
				return $countrys = $this->fetchArray();
				
				
			}
			
		}
		function savebranch() {
			$language_id = $_REQUEST['langId'];
			$company_id = $_REQUEST['compId'];
			$branch_name = $_REQUEST['branch_name'];
			$branch_email = $_REQUEST['branch_email'];
			$mobile = $_REQUEST['mobile'];
			$phone = $_REQUEST['phone'];
			$fax = $_REQUEST['fax'];
			$country_id = $_REQUEST['country_id'];
				$state_id = $_REQUEST['state_id'];
				$city_id = $_REQUEST['city_id'];
			$street = $_REQUEST['street'];
			$location = $_REQUEST['location'];
			$address = $_REQUEST['address'];
			$id =  $_REQUEST['id'];

			if($id) {				
				$query = "UPDATE company_branch_address SET 				
				branch_name = '".$branch_name."', 				
				branch_email = '".$branch_email."',
				mobile = '".$mobile."',
				phone = '".$phone."',
				fax = '".$fax."',
				country_id = '".$country_id."',
				state_id = '".$state_id."',
				city_id = '".$city_id."',
				street = '".$street."',
				location = '".$location."',
				address = '".$address."'
				WHERE id = '".$id."' ";
				
				$this->Query($query);
				$this->Execute();
				header('location:iframe.php?control=company&task=iframeBranch&cid='.$company_id);
			}
			else {
				$query = "INSERT INTO company_branch_address(language_id,company_id,branch_name,branch_email,mobile,phone,fax,country_id,state_id,city_id,street,location,address,status) VALUES('".$language_id."','".$company_id."','".$branch_name."','".$branch_email."','".$mobile."','".$phone."','".$fax."','".$country_id."','".$state_id."','".$city_id."','".$street."','".$location."','".$address."','1') ";				
				$this->Query($query);
				$this->Execute();
				header('location:iframe.php?control=company&task=iframeBranch&cid='.$company_id);
			}
			$this->branch();
		}
		function fillstate() {
			$query_all ="SELECT * FROM states WHERE country_id = '".$_REQUEST['country_id']."'";
			
			$this->Query($query_all);
			$results = $this->fetchArray();	
			if(file_exists("../views/".$this->name."/fillstate.php"))
				require_once("../views/".$this->name."/fillstate.php");
			else
				require_once("views/".$this->name."/fillstate.php");
		}
		function fillcity() {
			$query_all ="SELECT * FROM cities WHERE state_id = '".$_REQUEST['state_id']."'";
			
			$this->Query($query_all);
			$results = $this->fetchArray();	
			if(file_exists("../views/".$this->name."/fillcity.php"))
				require_once("../views/".$this->name."/fillcity.php");
			else
				require_once("views/".$this->name."/fillcity.php");
		}
		
		
		
   function status(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE companies SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->show();
		}else{
			$this->show();
		}
		//header('location:index.php?control=food');
		}
		
		function delete(){
			
			$query = "DELETE FROM company_branch_address WHERE company_id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();	
			$query = "DELETE FROM companies WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();	
				$this->show();
				//header('location:index.php?control=company');
		}
		
		function branch_delete(){
			$company_id = $_REQUEST['company_id'];
			   $query = "DELETE FROM company_branch_address WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();	
			header('location:iframe.php?control=company&task=iframeBranch&cid='.$company_id);
				//header('location:index.php?control=company&task=iframeBranch&cid='.$company_id);
		}
		
		
		
	}