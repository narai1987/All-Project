<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	class menuClass extends DbAccess {
		public $view='';
		public $name='menu';
		
		
		function show($view) {	
		
		session_start();
			 $query_all ="SELECT * FROM  menus WHERE  language_id = '".$_SESSION['language_id']."' order by id DESC";
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
			if($contents=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
			}
				$query ="SELECT * FROM  menus WHERE  language_id = '".$_SESSION['language_id']."' order by id DESC  LIMIT ".(($page-1)*$tpages).",".$tpages;
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
					 $query_all ="SELECT * FROM  menus WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
					$this->Query($query_all);
					$allContents = $this->fetchArray();
					foreach($allContents as $allcontent){
					$results['content'][$lang['id']] = $allcontent;
					}
				}
				
				 $query_all ="SELECT * FROM menus WHERE id = '".$_REQUEST['id']."' and language_id = '".$_SESSION['language_id']."'";
				$this->Query($query_all);
				$menutypes = $this->fetchArray();
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				 $query_lang = "SELECT * FROM languages WHERE 1";
				$this->Query($query_lang);
				$results['language'] = $data = $this->fetchArray();
				foreach($data as $lang) {
			    	 $query_all ="SELECT * FROM  menus WHERE language_id = '".$lang['id']."'";
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
				
				foreach($languages as $lang) {
					$q_selectData = "SELECT * FROM menus WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($q_selectData);
					$rowsL = $this->fetchArray();
					if($_REQUEST['content'.$lang['id']]){
						if($rowsL){
			
			      $query = "UPDATE menus SET menutype='".$_REQUEST['type']."', title = '".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."',content = '".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."' WHERE id = '".$_REQUEST['id']."' AND language_id = '".$lang['id']."'";
					$this->Query($query);
					$this->Execute();
						}else{
							if($_REQUEST['type']=='terms conditions'){
								$query = "INSERT INTO menus(id,language_id,menutype,title,content,date_time,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['type']."','".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."','".date("Y-m-d H:i:s")."','0')";
					$this->Query($query);
					$this->Execute();
								
							}else {
						$query = "INSERT INTO menus(id,language_id,menutype,title,content,date_time,status) VALUES('".$_REQUEST['id']."',".$lang['id'].",'".$_REQUEST['type']."','".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."' ,'".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."','".date("Y-m-d H:i:s")."','1')";
					$this->Query($query);
					$this->Execute();
							}
				
						}
					}
				
				}
				
			}
			if(!$_REQUEST['id'] and $_REQUEST['type']!='') {
				
						$max = "SELECT max(id) as lastid FROM menus";
						$this->Query($max);
						$maxdata = $this->fetchArray();	
						
						if($_REQUEST['type']=='terms conditions')
						{
						$query = "INSERT INTO menus(id,language_id,menutype,title,link,content,date_time,status) VALUES ";
						$i=0;
						foreach($languages as $lang){
						
						$query .= $i==0 ? "('".($maxdata[0]['lastid']+1)."',".$lang['id'].",'".$_REQUEST['type']."','".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."','index.php?control=menu&id=".($maxdata[0]['lastid']+1)."','".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."','".date("Y-m-d H:i:s")."','0')" : " , ('".($maxdata[0]['lastid']+1)."',".$lang['id'].",'".$_REQUEST['type']."','".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."','index.php?control=menu&id=".($maxdata[0]['lastid']+1)."','".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."','".date("Y-m-d H:i:s")."','0')";
						$i++;
						}
							
						}
						else 
						{
						$query = "INSERT INTO menus(id,language_id,menutype,title,link,content,date_time,status) VALUES ";
						$i=0;
						foreach($languages as $lang){
						
						$query .= $i==0 ? "('".($maxdata[0]['lastid']+1)."',".$lang['id'].",'".$_REQUEST['type']."','".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."','index.php?control=menu&id=".($maxdata[0]['lastid']+1)."','".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."','".date("Y-m-d H:i:s")."','1')" : " , ('".($maxdata[0]['lastid']+1)."',".$lang['id'].",'".$_REQUEST['type']."','".mysql_real_escape_string($_REQUEST['title'.$lang['id']])."','index.php?control=menu&id=".($maxdata[0]['lastid']+1)."','".mysql_real_escape_string($_REQUEST['content'.$lang['id']])."','".date("Y-m-d H:i:s")."','1')";
						$i++;
						}
						}
					
						$this->Query($query);
						$this->Execute();
				  }
			$this->show();
		}
		
		
		
		function editbranch($view) {
			session_start();	
			$bquery ="SELECT * from menus where id='".$_REQUEST['id']."'";
			
			$this->Query($bquery);
			return $results = $this->fetchArray();	
		}	
		
	
	   function menustatus(){
			
			if($_REQUEST['type']=='terms conditions')
			{
				$query = "UPDATE menus SET status ='0' WHERE menutype = '".$_REQUEST['type']."'";
						$this->Query($query);
						$this->Execute();
						
				 $query = "UPDATE menus SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
						$this->Query($query);
						$this->Execute();	
			}
			else 
			{
				$query = "UPDATE menus SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
						$this->Query($query);
						$this->Execute();	
			}
		    $this->show();
		   	//header('location:index.php?control=menu');
		}
		
		function delete(){
			
			$query = "DELETE FROM menus WHERE id = ".$_REQUEST['id'];
			
				$this->Query($query);
				$this->Execute();	
		
				header('location:index.php?control=menu');
		}
		
		
		
		
		
	}