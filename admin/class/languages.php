<?php
	require_once('dbaccess.php');		
	
	
	
	class LanguageClass extends DbAccess {
		public $view='';
		public $task='';
		public $old_task='';
		public $name='language';
		
		function show() {
			$where=" 1 ";			
			if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $where =" content LIKE '".$string."%'";	
			}
            $q_show = "SELECT count(id) numrow from languages WHERE ".$where;	
			$this->Query($q_show);
			$total_data = $this->fetchArray();
			$total_data[0]['numrow'] ;
			
			/* Paging start here */
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : $this->defaultPageData();
			$adjacents  = intval($_REQUEST['adjacents']);
			
			$tdata = ($total_data[0]['numrow']%$tpages)?(floor($total_data[0]['numrow']/$tpages)+1):round($total_data[0]['numrow']/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			$page   = intval($_REQUEST['page']) > $tdata ? 1 :intval($_REQUEST['page']) ;
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
		
		  $query = "select * from languages WHERE 1 LIMIT ".(($page-1)*$tpages).",".$tpages;
		    if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $query = "select * from languages where content LIKE '".$string."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}
		   
			$this->Query($query);
			$results = $this->fetchArray();	
			$content = $this->siteLanguage();
			
					
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query = "select * from languages WHERE 1 LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}	
			//require_once("views/".$this->name."/".$this->task.".php"); 
			require_once("views/".$this->name."/show.php");	
		}
		
		
		
			function addnew() {
			if($_REQUEST['id']) {
				$query_com ="SELECT * FROM  languages WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results['common'] = $ComContents = $this->fetchObject();
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				
				require_once("views/".$this->name."/addnew.php");
			}
		}
		
		function save() {
			
			$content = $_REQUEST['content'];
			$status = 1;
			
			if(!$_REQUEST['id'] and $content) {
				
				 $query = "INSERT INTO languages(content,date_time,status) values('".$content."','".date("Y-m-d")."','".$status."') ";
				$this->Query($query);
				$this->Execute();
			
			}
			else {
				$query = "UPDATE languages SET content = '".$content."', date_time = '".date("Y-m-d")."' WHERE id = '".$_REQUEST['id']."' ";
				$this->Query($query);
				$this->Execute();
				
			}
			$this->task="show";
		    $this->view ='show';
			$this->show();
		}
		
		function delete(){
			
						
			$query = "DELETE FROM languages WHERE id = ".$_REQUEST['id'];
			$this->Query($query);
			$this->Execute();
			$this->task="show";
		    $this->view ='show';
		    $this->show();
				
				//header('location:index.php?control=language');
		}
		
		
		
			function status(){
		

			$query="UPDATE languages set status='".$_REQUEST['status']."' WHERE id='".$_REQUEST['id']."'";					
			$this->Query($query);	
			$this->Execute();
			$this->task="show";
		    $this->view ='show';
		    $this->show();
			//header("Location:index.php?control=language");
		
		}
		
		
	
		
		
	}