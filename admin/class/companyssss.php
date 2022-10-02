<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	echo "sssssssssssssssssssssN";
	class companyClass extends DbAccess {
		public $view='';
		public $name='company';
		public $taxonomy_cont;
		function show($view) {	
			$query_all ="select * from  companies where status = '1'";
			$this->Query($query_all);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
			
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" .$tpages. "&amp;adjacents=" . $adjacents;	
			/* Paging end here */
			
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$companys = $this->fetchArray();
			$content = $this->taxolist5();
			print_r($content);
			require_once("views/".$this->name."/show.php");		
		}		
		
		function addnew() {
			if($_REQUEST['id']) {
				$query_all ="select * from  companies where id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$results = $this->fetchArray();
				foreach($results as $data) {}
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				require_once("views/".$this->name."/addnew.php");
			}
		}
		function save() {
			if($_REQUEST['id']) {
				$q_select = "select * from companies where id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
				if($_FILES['logo']['name']) {
					$dest = $this->uploadFile("images/company",$_FILES['logo']);
					if($dest)
					unlink($logos[0]['logo']);
					$str = ",logo = '".$dest."' ";	
				}
				
				$query = "update companies SET company = '".$_REQUEST['company']."' ".$str." ,description = '".$_REQUEST['description']."' where id = '".$_REQUEST['id']."' ";
				$this->Query($query);
				$this->Execute();
			}
			else {
				$dest = $this->uploadFile("images/company",$_FILES['logo']);
				$query = "insert into companies(company,logo,description,date_time,status) values('".$_REQUEST['company']."' ,'".$dest."' ,'".$_REQUEST['description']."','".date("Y-m-d H:i:s")."','1') ";
				$this->Query($query);
				$this->Execute();
			}
			$this->show();
		}
		/*COMPANY BRANCH DATA START HERE*/
		function branch($view) {	
			$query_all ="select c.company,cba.*,ct.city,cont.country from  companies c JOIN company_branch_address cba ON c.id = cba.company_id JOIN countries cont ON cba.country_id = cont.id JOIN cities ct ON cba.city_id = ct.id where cba.company_id = '".$_REQUEST['cid']."' ORDER BY id desc";
			
			$this->Query($query_all);
			$branchs = $this->fetchArray();	
			if(file_exists("../views/".$this->name."/branch.php"))
			require_once("../views/".$this->name."/branch.php");
			else
			require_once("views/".$this->name."/branch.php");
					
		}		
		function addbranch() {

			if($_REQUEST['id']) {
				$query_all ="select * from  company_branch_address where company_id = '".$_REQUEST['cid']."' and id = '".$_REQUEST['id']."' ";
				$this->Query($query_all);
				$results = $this->fetchArray();
				foreach($results as $data) {}
				
				$q_country ="select * from  countries where 1 ";
				$this->Query($q_country);
				$countrys = $this->fetchArray();
				
				$q_state ="select * from  states where 1 ";
				$this->Query($q_state);
				$states = $this->fetchArray();
				
				$q_city ="select * from  cities where state_id = '".$data['state_id']."' ";
				$this->Query($q_city);
				$citys = $this->fetchArray();
				
				
				if(file_exists("../views/".$this->name."/addbranch.php"))
				require_once("../views/".$this->name."/addbranch.php");
				else
				require_once("views/".$this->name."/addbranch.php");
				
			}
			else  {
				$com = $_REQUEST['cid'];
				$q_country ="select * from  countries where 1 ";
				$this->Query($q_country);
				$countrys = $this->fetchArray();
				
				if(file_exists("../views/".$this->name."/addbranch.php"))
				require_once("../views/".$this->name."/addbranch.php");
				else
				require_once("views/".$this->name."/addbranch.php");
			}
			
		}
		function savebranch() {
			$branch_email = $_REQUEST['branch_email'];
			$mobile = $_REQUEST['mobile'];
			$phone = $_REQUEST['phone'];
			$fax = $_REQUEST['fax'];
			$country = $_REQUEST['country'];
			$province = $_REQUEST['province'];
			$city = $_REQUEST['city'];
			$street = $_REQUEST['street'];
			$location = $_REQUEST['location'];
			$address = $_REQUEST['address'];
			$id = $_REQUEST['id'];
			$company_id = $_REQUEST['cid'];

			if($id) {				
				$query = "update company_branch_address SET 				
				branch_email = '".$branch_email."',
				mobile = '".$mobile."',
				phone = '".$phone."',
				fax = '".$fax."',
				country_id = '".$country."',
				state_id = '".$province."',
				city_id = '".$city."',
				street = '".$street."',
				location = '".$location."',
				address = '".$address."'
				where id = '".$id."' ";
				
				$this->Query($query);
				$this->Execute();
			}
			else {
				$query = "insert into company_branch_address(company_id,branch_email,mobile,phone,fax,country_id,state_id,city_id,street,location,address,status) values('".$company_id."','".$branch_email."','".$mobile."','".$phone."','".$fax."','".$country."','".$province."','".$city."','".$street."','".$location."','".$address."','1') ";				
				$this->Query($query);
				$this->Execute();
			}
			$this->branch();
		}
		function fillstate() {
			$query_all ="select * from states where country_id = '".$_REQUEST['country_id']."'";
			
			$this->Query($query_all);
			$results = $this->fetchArray();	
			if(file_exists("../views/".$this->name."/fillstate.php"))
				require_once("../views/".$this->name."/fillstate.php");
			else
				require_once("views/".$this->name."/fillstate.php");
		}
		function fillcity() {
			$query_all ="select * from cities where state_id = '".$_REQUEST['state_id']."'";
			
			$this->Query($query_all);
			$results = $this->fetchArray();	
			if(file_exists("../views/".$this->name."/fillcity.php"))
				require_once("../views/".$this->name."/fillcity.php");
			else
				require_once("views/".$this->name."/fillcity.php");
		}
		
	}