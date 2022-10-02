<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class operatorClass extends DbAccess {
		public $view='';
		public $name='operator';
				
		function show($view) {	
			$query_all ="select * from operators where status = '1'";
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
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" .$tpages. "&amp;adjacents=" . $adjacents;	
			/* Paging end here */
			
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$companys = $this->fetchArray();
			
		if($companys=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$companys = $this->fetchArray();
			}	
					
			require_once("views/".$this->name."/show.php");		
		}		
		
		function addnew() {
			if($_REQUEST['id']) {
				/*Getting Companies Start*/
				 $query_comp ="SELECT * FROM  companies WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_comp);
				$companies = $this->fetchArray();
				/*Getting Companies Close*/
				$query_com ="SELECT * FROM  operators WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results['common'] = $ComContents = $this->fetchObject();
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				/*Getting Companies Start*/
				 $query_comp ="SELECT * FROM  companies WHERE language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_comp);
				$companies = $this->fetchArray();
				/*Getting Companies Close*/
				require_once("views/".$this->name."/addnew.php");
			}
		}
		
		function save() {
			
			$first_name = $_REQUEST['first_name'];
			$last_name = $_REQUEST['last_name'];
			$email = $_REQUEST['email'];
			$company_id = $_REQUEST['company_id'];
			$email_trip_manager = $_REQUEST['email_trip_manager'];
			$manager_name = $_REQUEST['manager_name'];
			$email_trip_branch = $_REQUEST['email_trip_branch'];
			$branch_name = $_REQUEST['branch_name'];
			$join_date = $_REQUEST['join_date'];
			$description = mysql_real_escape_string($_REQUEST['description']);
			$status = 1;
			
			if(!$_REQUEST['id'] and $first_name) {
				
				 $query = "INSERT INTO operators(language_id,company_id,first_name,last_name,email,description,email_trip_manager,manager_name,email_trip_branch,branch_name,join_date,status) values('1' ,'".$company_id."' ,'".$first_name."','".$last_name."','".$email."','".$description."','".$email_trip_manager."','".$manager_name."','".$email_trip_branch."','".$branch_name."','".$join_date."','".$status."') ";
				$this->Query($query);
				$this->Execute();
			
			}
			else {
					$query = "UPDATE operators SET language_id = '1' , first_name = '".$first_name."', last_name = '".$last_name."', email = '".$email."', description = '".$description."' , company_id = '".$company_id."', email_trip_manager = '".$email_trip_manager."', manager_name = '".$manager_name."', email_trip_branch = '".$email_trip_branch."', branch_name = '".$branch_name."', join_date = '".$join_date."', status = '".$status."' WHERE id = '".$_REQUEST['id']."' ";
				$this->Query($query);
				$this->Execute();
				
			}
			$this->show();
		}
		
		function delete(){
			
						
			$query = "DELETE FROM operators WHERE id = ".$_REQUEST['id'];
			$this->Query($query);
			$this->Execute();
				$this->show();
				//header('location:index.php?control=operator');
		}
		
		
	}