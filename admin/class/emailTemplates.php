<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	class emailTemplateClass extends DbAccess {
		public $view='';
		public $name='emailTemplate';
		
		
		function show($view) {	
		
		session_start();
			 $query_all ="SELECT * FROM  email_templates WHERE  language_id = '".$_SESSION['language_id']."' order by id DESC";
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
			$contents = $this->fetchArray();
			$keyword = $this->siteLanguage();
			//print_r($keyword);
			if($contents=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query =$query_all." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$contents = $this->fetchArray();
			$keyword = $this->siteLanguage();
			}	
			require_once("views/".$this->name."/show.php");		
		}	
	
	function addnew() {
			if($_REQUEST['id']) {
					 $query_all ="SELECT * FROM  email_templates WHERE id = '".$_REQUEST['id']."' AND  language_id = '1'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][1] = $allcontent;
					}
				
			    $query_all ="SELECT * FROM email_templates WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$emailtypes = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			}
			else {
			    	 $query_all ="SELECT * FROM  email_templates WHERE language_id = '1'";
					$this->Query($query_all);
					foreach($this->fetchArray() as $allcontent){}
				require_once("views/".$this->name."/addnew.php");
			}
		}
	
	
		
		function save() {
		
			if($_REQUEST['id']) {
				
				
					$q_selectData = "SELECT * FROM email_templates WHERE id = '".$_REQUEST['id']."' AND language_id = '1'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['content']){
						if($rowsL){
			
			      $query = "UPDATE email_templates SET type='".$_REQUEST['type']."', title = '".$_REQUEST['title']."', subject = '".$_REQUEST['subject']."', content = '".$_REQUEST['content']."', last_update = '".date("Y-m-d H:i:s")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '1'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO email_templates(id,language_id,type,title,subject,content,create_date,last_update,status) VALUES('".$_REQUEST['id']."','1','".$_REQUEST['type']."','".$_REQUEST['title']."' , '".$_REQUEST['subject']."','".$_REQUEST['content']."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','0')";
					$this->Query($query);
					$this->Execute();
					
				
						}
					}
				
				
			}
			if(!$_REQUEST['id'] and $_REQUEST['type']!='') {
				
						$max = "SELECT max(id) as lastid FROM email_templates";
						$this->Query($max);
						$maxdata = $this->fetchArray();	
						
						$query = "INSERT INTO email_templates(id,language_id,type,title,subject,content,create_date,last_update,status) VALUES ";
						$query .= $i==0 ? "('".($maxdata[0]['lastid']+1)."','1','".$_REQUEST['type']."','".$_REQUEST['title']."','".$_REQUEST['subject']."','".$_REQUEST['content']."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','1')" : " , ('".($maxdata[0]['lastid']+1)."','1','".$_REQUEST['type']."','".$_REQUEST['title']."','".$_REQUEST['subject']."','".$_REQUEST['content']."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','0')";
						
					
						$this->Query($query);
						$this->Execute();
				  }
				 $this->show(); 
			//header('location:index.php?control=emailTemplate');
		}
		
		
		
		function editbranch($view) {
			session_start();	
			$bquery ="SELECT * from email_templates where id='".$_REQUEST['id']."'";
			
			$this->Query($bquery);
			return $results = $this->fetchArray();	
		}	
		
	
		
		function status(){
			
		if($_REQUEST['id']!='') {
			$query = "UPDATE email_templates SET status ='0' WHERE type = '".$_REQUEST['type']."'";
					$this->Query($query);
					$this->Execute();	
			$query = "UPDATE email_templates SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			$this->show();
		}
		else {
			$this->show();
		}
		//header('location:index.php?control=emailTemplate');
		}
		
	
		
		function delete(){
			
			$query = "DELETE FROM email_templates WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();	
		$this->show();
				//header('location:index.php?control=emailTemplate');
		}
		
		
		function templateajax(){
			$q_selectData = "SELECT * FROM email_templates WHERE id = '".$_REQUEST['id']."' AND language_id = '1'";
					$this->Query($q_selectData);
					$templ = $this->fetchArray();
					require_once("views/".$this->name."/templateajax.php");	
			
			}
		
		
	}