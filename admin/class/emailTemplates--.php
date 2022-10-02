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
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 5;//$tdata; // 20 by default
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
			require_once("views/".$this->name."/show.php");		
		}	
	
	function addnew() {
			if($_REQUEST['id']) {
				$query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
					 $query_all ="SELECT * FROM  email_templates WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
				}
				
			    $query_all ="SELECT * FROM email_templates WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query_all);
				$emailtypes = $this->fetchArray();
				/*echo '<pre>';
				print_r($emailtypes);*/
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				 $query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
			    	 $query_all ="SELECT * FROM  email_templates WHERE language_id = '".$lang['id']."'";
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
				/*$q_select = "SELECT * FROM menus WHERE id = '".$_REQUEST['id']."'";
				$this->Query($q_select);
				$logos = $this->fetchArray();*/
				
				
				
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM email_templates WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['content'.$lang['id']]){
						if($rowsL){
			
			      $query = "UPDATE email_templates SET type='".$_REQUEST['type']."', title = '".$_REQUEST['title'.$lang['id']]."', subject = '".$_REQUEST['subject'.$lang['id']]."', content = '".$_REQUEST['content'.$lang['id']]."', last_update = '".date("Y-m-d H:i:s")."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
						$query = "INSERT INTO email_templates(id,language_id,type,title,subject,content,create_date,last_update,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['type']."','".$_REQUEST['title'.$lang['id']]."' , '".$_REQUEST['subject'.$lang['id']]."','".$_REQUEST['content'.$lang['id']]."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','0')";
					$this->Query($query);
					$this->Execute();
					
				
						}
					}
				
				}
				
			}
			if(!$_REQUEST['id'] and $_REQUEST['type']!='') {
				
						$max = "SELECT max(id) as lastid FROM email_templates";
						$this->Query($max);
						$maxdata = $this->fetchArray();	
						
						$query = "INSERT INTO email_templates(id,language_id,type,title,subject,content,create_date,last_update,status) VALUES ";
						$i=0;
						foreach($languages as $lang){
						
						$query .= $i==0 ? "('".($maxdata[0]['lastid']+1)."',".$lang['id'].",'".$_REQUEST['type']."','".$_REQUEST['title'.$lang['id']]."','".$_REQUEST['subject'.$lang['id']]."','".$_REQUEST['content'.$lang['id']]."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','1')" : " , ('".($maxdata[0]['lastid']+1)."',".$lang['id'].",'".$_REQUEST['type']."','".$_REQUEST['title'.$lang['id']]."','".$_REQUEST['subject'.$lang['id']]."','".$_REQUEST['content'.$lang['id']]."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','0')";
						$i++;
						}
						
					
						$this->Query($query);
						$this->Execute();
				  }
			$this->show();
		}
		
		
		
		function editbranch($view) {
			session_start();	
			$bquery ="SELECT * from email_templates where id='".$_REQUEST['id']."'";
			
			$this->Query($bquery);
			return $results = $this->fetchArray();	
		}	
		
	
		
		function status(){
			
		
			$query = "UPDATE email_templates SET status ='0' WHERE type = '".$_REQUEST['type']."'";
					$this->Query($query);
					$this->Execute();	
			$query = "UPDATE email_templates SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			
		header('location:index.php?control=emailTemplate');
		}
		
	
		
		function delete(){
			
			$query = "DELETE FROM email_templates WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();	
		
				header('location:index.php?control=emailTemplate');
		}
		
		
		
		
		
	}