<?php
	require_once('dbaccess.php');
	require_once('../textconfig/config.php');
	if(file_exists('../configuration.php')){
		require_once('../configuration.php');
	}
	
	class pageClass extends DbAccess {
		public $view='';
		public $name='page';
		
		
		
		function show() {	
		$query ="select * from pages";
		$this->Query($query);
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
			$cate ="select * from pages LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($cate);
			$cates = $this->fetchArray();	
			require_once("views/".$this->name."/".$this->task.".php"); 
								
		}
		
	
		function addnew() {		
			
			if($_REQUEST['id']){
				$query="select * from pages where id=".$_REQUEST['id'];
				$this->Query($query);
				$dates=$this->fetchArray();
				foreach($dates as $data){}
			}
			$cate ="select * from categories";
			$this->Query($cate);
			$results=$this->fetchArray();
			
			require_once("views/".$this->name."/".$this->task.".php"); 
			
									
		}
		
		
		
		
		function save(){
			
			if(empty($_REQUEST['id'])  && !empty($_REQUEST['name']) && !empty($_REQUEST['category_id'])){				
				$name = $_REQUEST['name'];		
				$description = $_REQUEST['description'];
				$category_id = $_REQUEST['category_id'];
				$link = $_REQUEST['link'];
				$type = $_REQUEST['chkp'];
				$query = "INSERT INTO pages(`category_id`,`page`,`link`,`content`,`type`,`date_time`,`status`) VALUES('".$category_id."','".$name ."','".$link."','".mysql_real_escape_string($description)."','".$type."','".date("Y-m-d H:i:s")."','1')";	
								
				if($description) {					
					$this->Query($query);
					$this->Execute();
				
					header("location:index.php?control=page");
				}
				else {
					if($_REQUEST['id']){
						$query="select * from pages where id=".$_REQUEST['id'];
						$this->Query($query);
						$dates=$this->fetchArray();
						foreach($dates as $data){}
					}
					$cate ="select * from categories";
					$this->Query($cate);
					$results=$this->fetchArray();			
					$errmsg = "*Required Field.";
					require_once("views/".$this->name."/addnew.php"); 
				}
				if($description) {
					$link_page = SUBDOMAIN."/index.php?control=page&id=".mysql_insert_id()."&tmpid=6";
				}
				else {
					$link_page = $link;
				}
				$pagins ="UPDATE pages SET `link`='".$link_page."',`date_time`='".date("Y-m-d H:i:s")."' WHERE id='".mysql_insert_id()."'";        
				if($description) {					
					$this->Query($pagins);
					$this->Execute();
					$this->task="show";
					$this->view ='show';
				
					header("location:index.php?control=page");
				}
				else {
					
					require_once("views/".$this->name."/addnew.php"); 
				}
									
			}
			else if(!empty($_REQUEST['id'])){
				 
				$name = $_REQUEST['name'];		
				$description = $_REQUEST['description'];
				$category_id = $_REQUEST['category_id'];
				$link = $_REQUEST['link'];
				$type = $_REQUEST['chkp'];
				$query="update pages set status=1 ";
				
				if(!empty($name)){
					$query.=",page='".$name."'"	;
				}
				
				if(!empty($category_id)){
					$query.=",category_id='".$category_id."'";
				}
				
				$query.=",type='".$type."'";
				
				if(!empty($link)){
					$query.=",link='".mysql_real_escape_string($link)."'";
				}
				
				if(!empty($description)){
					$query.=",content='".mysql_real_escape_string($description)."'"	;
				}
				
				
				$query.=" where id=".$_REQUEST['id'];
				
				if($description) {					
					$this->Query($query);
					$this->Execute();
					$this->task="show";
					$this->view ='show';
				
					header("location:index.php?control=page");
				}
				else {
					if($_REQUEST['id']){
						$query="select * from pages where id=".$_REQUEST['id'];
						$this->Query($query);
						$dates=$this->fetchArray();
						foreach($dates as $data){}
					}
					$cate ="select * from categories";
					$this->Query($cate);
					$results=$this->fetchArray();			
					$errmsg = "*Required Field.";
					require_once("views/".$this->name."/addnew.php"); 
				}
				 
			 }	
		
		}
		
		
		
		
	
		
		function delete() { 
		
			$s_delete ="DELETE FROM pages WHERE id=".$_REQUEST['id'];
			$this->Query($s_delete); 
			$this->Execute(); 
			header("location:index.php?control=page&views=page"); 
		
		}
		
		function publish(){
			
			$query="update pages set `status`=1 WHERE id='".$_REQUEST['id']."'";	
			$this->Query($query);	
			$this->Execute();
			$this->task="show";
			$this->view ='page';
			$this->show();	
		
		}
		
		function unpublish(){			
		$query="update pages set `status`=0 WHERE id='".$_REQUEST['id']."'";
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='page';
		$this->show();	
		
		}
		
		
		
	
	
	}