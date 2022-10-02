<?php
	require_once('dbaccess.php');
	if(file_exists('../textconfig/config.php')) {
		require_once('../textconfig/config.php');
	}
	else {
		require_once('../../textconfig/config.php');
	}
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class NewslatterClass extends DbAccess {
		public $view='';
		public $name='newslatter';
		
		
		function show(){	
		$query ="select * from newslwtters ";
		$this->Query($query);
		$results = $this->fetchArray();	
		require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
		  function addnew() {	
		   require_once("views/".$this->name."/addnew.php"); 
		 					
		}
		
		
		function savelatter(){
			
			if(empty($_REQUEST['id']) && !empty($_REQUEST['sub'])  ){				
					$subject = $_REQUEST['sub'];		
					$message = $_REQUEST['message'];	
							
					if($message)	{
					$query = "INSERT INTO newslwtters VALUES('','".mysql_real_escape_string($subject)."','".mysql_real_escape_string($message)."','".date("Y-m-d H:i:s")."','','','0','1')";	
											
					$this->Query($query);
					$this->Execute();
					$this->task="show";
			 $this->view ='show';
			
			 header("location:index.php?control=newslatter");
			 }
					else {
					 $msg ="Please type any text";
					 require_once("views/".$this->name."/addnew.php"); 
					}
			 }
			
			 
		}
		
		 function editLatter() {	
	    $editor="select * from newslwtters where id=".$_REQUEST['id']; 
		$this->Query($editor);
		
		$editors=$this->fetchArray();	
		require_once("views/".$this->name."/editlatter.php"); 
						
		}
		
		function updatelatter() { 
		$p_update ="UPDATE newslwtters SET `subject`='".$_REQUEST['mtitle']."',`message`='".$_REQUEST['message']."',`last_update_date`='".date("Y-m-d H:i:s")."' WHERE id='".$_REQUEST['pid']."'"; 
	 
		    $this->Query($p_update);
		   $this->Execute();
		    $this->task="show";
				$this->view ='newslatter';
				$this->show();	
		
			}

		
		
		
		
		
		function status(){
		$query="update newslwtters set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=newslatter");	
		}
		
		
		function delete(){
		
		$query="DELETE FROM newslwtters WHERE id in (".$_REQUEST['id'].")";		
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		//$this->show();
		
		header("location:index.php?control=newslatter");
		}
		
		function viewnewslatter(){	
	 	$query ="select * from newslwtters where id='".$_REQUEST['id']."'";
	
		$this->Query($query);
		return $this->fetchArray();	
		//require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
		function lattermail(){	
			
			$query ="select * from newslwtters where id='".$_REQUEST['id']."'";
			
			$this->Query($query);
			$newslatter = $this->fetchArray();	
			
			$query ="UPDATE newslwtters SET `last_send_date`='".date("Y-m-d H:i:s")."' WHERE id='".$_REQUEST['id']."'"; 
			$this->Query($query);	
			$this->Execute();
			$this->task="show";
			$this->view ='show';
			
			
			$query ="select email from users where subscription=1";
			$this->Query($query);
			$latterusers = $this->fetchArray();	
			
			$query ="select email from providers where subscription=1";
			$this->Query($query);
			$latterproviders = $this->fetchArray();	
			
			if($newslatter) {
				
				foreach($latterusers as $latteruser) {	
					if($latteruser['email']!=EMAILFROM) 
					$tosubscribe .= $tosubscribe?",".$latteruser['email']:$latteruser['email'];
					
				}		
			
				foreach($latterproviders as $latterprovider) {				
					$tosubscribe .= $tosubscribe?",".$latterprovider['email']:$latterprovider['email'];		
					
				}
				/*echo $tosubscribe;
				die;*/
				if($this->mailsend($tosubscribe,EMAILFROM,$newslatter[0]['subject'],$newslatter[0]['message'])) {
				
					$mailsucess = "Mail send sucessfully";
				}
				else {
					$mailsucess = "Mail sending failed";
				}
				$query ="select * from newslwtters";
				$this->Query($query);
				$results = $this->fetchArray(); 
			  //header("location:index.php?control=newslatter&task=show");	
			  require_once("views/".$this->name."/show.php"); 
			}
			
		}
		
	
	}