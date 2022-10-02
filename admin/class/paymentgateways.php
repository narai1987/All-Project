<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	class paymentgatewayClass extends DbAccess {
		public $view='';
		public $name='paymentgateway';
		
		
		function show($view) {	
		session_start();
			 $query_all ="SELECT * FROM paymentgateway where 1";
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
				
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			}	
			//$_REQUEST['task'] = '';
			require_once("views/".$this->name."/show.php");		
		}	
	
		function addnew() {
			if($_REQUEST['id']) {
				
				
					 $query_all ="SELECT * FROM  paymentgateway WHERE id = '".$_REQUEST['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'] = $allcontent;
					
				}
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				
					 $query_all ="SELECT * FROM  paymentgateway WHERE 1";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
					//$results['content'][$lang['id']] = $allcontent;
				
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
				$q_select = "SELECT * FROM paymentgateway WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();
				if($_FILES['logo']['name']) {
					$dest = $this->uploadFile("images/paymentgateway",$_FILES['logo']);
					if($dest)
					unlink($logos[0]['logo']);
					$str = ",image = '".$dest."' ";	
				}
				
			$query = "UPDATE paymentgateway SET gateway = '".$_REQUEST['gateway']."' ".$str." WHERE id = '".$_REQUEST['id']."'";
					$this->Query($query);
					$this->Execute();
						}
				
			
			else {
				
			$dest = $this->uploadFile("images/paymentgateway",$_FILES['logo']);
			
					if($_REQUEST['gateway']){
						$LastId = mysql_insert_id();
					 	$query = "INSERT INTO paymentgateway(id,gateway,image,status) VALUES('".($LastId?$LastId:'')."','".$_REQUEST['gateway']."' ,'".$dest."' ,'1')";
						$this->Query($query);
						$this->Execute();
				
				}
				
				
			}
			$this->show();
		}
		
		
		
   function status(){
		if($_REQUEST['id']!='') {	
		$query = "UPDATE paymentgateway SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->show();
		}else{
			$this->show();
		}
		//header('location:index.php?control=food');
		}
		
		function delete(){
			
				
			$query = "DELETE FROM paymentgateway WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();
				$this->show();
				//header('location:index.php?control=company');
		}
		
		
		
		
	}