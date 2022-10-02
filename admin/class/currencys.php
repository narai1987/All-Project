<?php
	require_once('dbaccess.php');		
	
	
	
	class CurrencyClass extends DbAccess {
		public $view='';
		public $task=' ';
		public $old_task='';
		public $name='currency';
		
		function show() {
			$where=" 1 ";			
			if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $where =" content LIKE '".$string."%'";	
			}
            $q_show = "SELECT count(id) numrow from currencys WHERE ".$where;	
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
		
		  $query = "select * from currencys WHERE 1 LIMIT ".(($page-1)*$tpages).",".$tpages;
		    if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $query = "select * from currencys where content LIKE '".$string."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}
		   
			$this->Query($query);
			$results = $this->fetchArray();
			$content = $this->siteLanguage();
					
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			$query = "select * from currencys WHERE 1 LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/show.php");	
			
			//require_once("views/".$this->name."/".$this->task.".php"); 
		}
		
		
		
			function addnew() {
			if($_REQUEST['id']) {
				$query_com ="SELECT * FROM  currencys WHERE id = ".$_REQUEST['id'];
					$this->Query($query_com);
					$results['common'] = $ComContents = $this->fetchObject();
					
				require_once("views/".$this->name."/addnew.php");
			}
			else {
				
				require_once("views/".$this->name."/addnew.php");
			}
		}
		
		function save() {
			
			$currency = strtoupper($_REQUEST['currency']);
			$sign_code = $_REQUEST['sign_code'];
			$status = 1;
			
			if(!$_REQUEST['id'] and $currency) {
				
				$query = "INSERT INTO currencys(currency,sign_code,status) values('".$currency."','".$sign_code."','".$status."') ";
				$this->Query($query);
				$this->Execute();
			
			}
			else {
				$query = "UPDATE currencys SET currency = '".$currency."',sign_code = '".$sign_code."' WHERE id = '".$_REQUEST['id']."' ";
				$this->Query($query);
				$this->Execute();
				
			}
			/*$this->task="show";
		    $this->view ='show';*/
			$this->show();
			//header("location:index.php?control=currency");
		}
		
		function delete(){
			
						
			$query = "DELETE FROM currencys WHERE id = ".$_REQUEST['id'];
			$this->Query($query);
			$this->Execute();
				$this->show();
				//header('location:index.php?control=currency');
		}
		
		
		
			function status(){
		

			$query="UPDATE currencys set status='".$_REQUEST['status']."' WHERE id='".$_REQUEST['id']."'";					
			$this->Query($query);	
			$this->Execute();
			$this->task="show";
		    $this->view ='show';
		    $this->show();
			//header("Location:index.php?control=currency");
		
		}
		
		
	
		
		
	}