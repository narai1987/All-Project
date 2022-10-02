<?php
	require_once('dbaccess.php');
	require_once('../textconfig/config.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class TopmenuClass extends DbAccess {
		public $view='';
		public $name='topmenu';
		
		
		function show(){	
		$query ="select * from menus";
		$this->Query($query);
		$results = $this->fetchArray();	
		require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
		  function addnew() {	
		   require_once("views/".$this->name."/addnew.php"); 
		 					
		}
		
		
	/*	function savemenu(){
			
			if(empty($_REQUEST['id']) && !empty($_REQUEST['title'])  && !empty($_REQUEST['link']) ){				
					$title = $_REQUEST['title'];		
					$link = $_REQUEST['link'];			
					$type = $_REQUEST['type'];		
				echo	$query = "INSERT INTO menus VALUES('','".$type."','".$title."','".mysql_real_escape_string($link)."','0','0','1')";	
												
					$this->Query($query);
					$this->Execute();
										
			 }
			
			 $this->task="show";
			 $this->view ='show';
			
			 header("location:index.php?control=topmenu");
		}*/
		
			function savemenu() {
			
			$title = $_REQUEST['title'];		
			$link = mysql_real_escape_string($_REQUEST['link']);			
			$type = $_REQUEST['type'];	
			
			if(!$_REQUEST['id'] and $link) {
				
				 $query = "INSERT INTO menus(language_id,menutype,title,link,parent_id,for_auth_user,status) values('1' ,'".$type."' ,'".$title."','".$link."','0','0','1')";
				$this->Query($query);
				$this->Execute();
			
			}
			else {
					$query = "UPDATE menus SET language_id = '1' , menutype = '".$type."', title = '".$title."', link = '".$link."', status = '1' WHERE id = '".$_REQUEST['id']."' ";
				$this->Query($query);
				$this->Execute();
				
			}
			 header("location:index.php?control=topmenu");
		}
		
		
		
		
		
		
		
		 function editmenu() {	
	    $editor="select * from menus where id=".$_REQUEST['id']; 
		$this->Query($editor);
		
		$results['menu'] = $editors = $this->fetchObject();	
		require_once("views/".$this->name."/addnew.php"); 
						
		}
		
		
		
		
		function status(){
		$query="update menus set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=topmenu");	
		}
		
		
		function delete(){
		
		$query="DELETE FROM menus WHERE id in (".$_REQUEST['id'].")";		
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		//$this->show();
		
		header("location:index.php?control=topmenu");
		}
		
		
		
		
	
	}