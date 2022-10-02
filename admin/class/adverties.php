<?php
	require_once('dbaccess.php');	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class AdvertieClass extends DbAccess {
		public $view='';
		public $name='advertie';
		
		
		
		
		function save(){
			
			if(!empty($_FILES['banner']) && empty($_REQUEST['id']) && !empty($_REQUEST['link'])  && !empty($_REQUEST['category']) ){				
				$link = $_REQUEST['link'];		
				$banner = $_FILES['banner'];			
				$category = $_REQUEST['category'];	
				
				if(move_uploaded_file($banner['tmp_name'],"images/banner/".$banner['name'])) {
					$query = "INSERT INTO adverties VALUES('','".$category."','".$banner['name']."','".$link."','0')";									
					$this->Query($query);
					$this->Execute();
				}
									
			}
			else if(!empty($_REQUEST['id'])){
				 
				$link = $_REQUEST['link'];		
				$banner = $_FILES['banner'];			
				$category = $_REQUEST['category'];	
				
				$query="update adverties set status=1 ";
				
				if(!empty($link)){
					$query.=",link='".$link."'"	;
				}
				
				if(!empty($banner['name'])){
					move_uploaded_file($banner['tmp_name'],"images/banner/".$banner['name']);
					$query.=",banner='".mysql_real_escape_string($banner['name'])."'"	;
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
			 header("location:index.php?control=advertie");
		}
		
		
		
		function show(){	
			$query ="select * from adverties ";
			$this->Query($query);
			$results = $this->fetchArray();	
			require_once("views/".$this->name."/".$this->task.".php"); 	
		
		}
		
		
		
		function ajaxadvertie() {
		$query="SELECT * from adverties where id='".$_REQUEST['id']."'";
		$this->Query($query);
		return $results = $this->fetchArray();	
			
		}
		
		
		
		
		
		function status(){
		$query="update adverties set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=advertie");	
		}
		
		function d_active(){
		$query="update adverties set defalut=1,status=1 WHERE id='".$_REQUEST['id']."' and category='".$_REQUEST['catid']."'";	
		$this->Query($query);	
		$this->Execute();
		$c_query="update adverties set defalut=0 WHERE id!='".$_REQUEST['id']."' and category='".$_REQUEST['catid']."'";	
		$this->Query($c_query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		header("location:index.php?control=advertie");	
		}
		
		function delete(){
		
		$query="DELETE FROM adverties WHERE id in (".$_REQUEST['id'].")";		
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';		
		header("location:index.php?control=advertie");
		}
	
	}