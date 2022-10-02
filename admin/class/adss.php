<?php
	require_once('dbaccess.php');
	require_once('../textconfig/config.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class AdsClass extends DbAccess {
		public $view='';
		public $name='ads';
		
		
		
		
		function save(){
			
			if(empty($_REQUEST['id']) && !empty($_REQUEST['content']) && !empty($_REQUEST['title'])  && !empty($_REQUEST['category']) ){				
					$title = $_REQUEST['title'];		
					$content = $_REQUEST['content'];			
					$category = $_REQUEST['category'];	
					$query = "INSERT INTO ads VALUES('','".$title."','".mysql_real_escape_string($content)."','".$category."','1','0')";									
					$this->Query($query);
					$this->Execute();
										
			 }else if(!empty($_REQUEST['id'])){
				 
				$title = $_REQUEST['title'];		
				$content = $_REQUEST['content'];			
				$category = $_REQUEST['category'];	
				
				$query="update ads set status=1 ";
				
				if(!empty($title)){
				$query.=",title='".$title."'"	;
				}
				
				if(!empty($content)){
				$query.=",content='".mysql_real_escape_string($content)."'"	;
				}
				
				if(!empty($category)){
				$query.=",category='".$category."'"	;
				}

				
													
				 $query.=" where id=".$_REQUEST['id'];
				
				 $this->Query($query);
				$this->Execute();	 
				 
			 }
			 $this->task="show";
			 $this->view ='show';
			 //$this->show();	
			 header("location:index.php?control=ads");
		}
		
		
		
		function show(){	
		$query ="select * from ads";
		$this->Query($query);
		$results = $this->fetchArray();	
		require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
				
		function search(){	
						 	
			if($_REQUEST['search']){
			$query="SELECT * from ads where title LIKE '%".$_REQUEST['search']."%'";
			}else{
			$query="SELECT * from ads"  ;	
			}		
			$this->Query($query);
			$results = $this->fetchArray();
			$this->task="show";
			header("location:index.php?control=ads");	
		
		}
		
		
		function status(){
		$query="update ads set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=ads");	
		}
		
		function d_active(){
		$query="update ads set defalut=1,status=1 WHERE id='".$_REQUEST['id']."' and category='".$_REQUEST['catid']."'";	
		$this->Query($query);	
		$this->Execute();
		$c_query="update ads set defalut=0 WHERE id!='".$_REQUEST['id']."' and category='".$_REQUEST['catid']."'";	
		$this->Query($c_query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();	
		header("location:index.php?control=ads");	
		}
		
		function delete(){
		
		$query="DELETE FROM ads WHERE id in (".$_REQUEST['id'].")";		
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		//$this->show();
		
		header("location:index.php?control=ads");
		}
	
	}