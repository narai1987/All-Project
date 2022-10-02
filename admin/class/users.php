<?php
	require_once('dbaccess.php');
	require_once('../textconfig/config.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class UserClass extends DbAccess {
		public $view='';
		public $name='user';

		
		function show(){	
		$uquery ="select * from users where 1";
		$this->Query($uquery);
		$uresults = $this->fetchArray();	
		$tdata=count($uresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */	
		$query ="select * from users where 1 LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($query);
		$results = $this->fetchArray();		
		
		require_once("views/".$this->name."/".$this->task.".php"); 
		}
		
		
		
		
		function  updateprofile(){
		
		if((!empty($_REQUEST['id']))) {
			
		
				session_start();
				$query="update users set status=1 , gender='".$_REQUEST['gender']."'";				
				
				if(!empty($_FILES['logo']['name'])) {
					if(move_uploaded_file($_FILES['logo']['tmp_name'],"images/admin/".$_FILES['logo']['name'])) {
						
						$_SESSION['image'] = $_FILES['logo']['name'];
						$query .=",image='".$_FILES['logo']['name']."'"	;
					}
				}
				
				if(!empty($_REQUEST['fname'])){
				$query.=",fname='".$_REQUEST['fname']."'"	;
				
				$_SESSION['admin_name']=$_REQUEST['fname'];
				}
				
				if(!empty($_REQUEST['lname'])){
				$query.=",lname='".$_REQUEST['lname']."'"	;
				}
				
				if(!empty($_REQUEST['mobile'])){
				$query.=",mobile='".$_REQUEST['mobile']."'"	;
				}
				
				$query.=" where id=".$_REQUEST['id'];
				
				$this->Query($query);
				$this->Execute();
					 
				//header("location:index.php");
				
		}
		
		$query ="select * from users where id=".$_SESSION['adminid'];
		$this->Query($query);
		$results = $this->fetchArray();	foreach($results as $result){}
	
		require_once("views/".$this->name."/".$this->task.".php");		
		}
		
		function  changepassword(){
			session_start();
			 
		          if((!empty($_REQUEST['id'])) && ($_REQUEST['password']==$_REQUEST['cpassword']) && ($_REQUEST['password'] && $_REQUEST['cpassword'])) {
			
				  $query = "SELECT *  FROM users WHERE password = '".md5($_REQUEST['oldpassword'])."' and id =".$_REQUEST['id'];
		
			    $this->Query($query);
				//echo $this->rowCount();
			if($this->rowCount()) {
				//echo "kyo ja rha hai";
				//return "NO";
				$query1="update users set password = '".md5($_REQUEST['password'])."' where id = '".$_REQUEST['id']."'";
				$this->Query($query1);
				if($this->Execute()) {	
				
				$_SESSION['error'] = "Your password has been changed successfully";	
				$_SESSION['errorclass'] = "success"		;	
				//header("location:index.php?control=user&task=changepassword");
				}
			}
			else {
				//echo "kyo nhi ja rha hai";
				 $nomatch= "Old Password did not match";
			}
				
				
				
			 
		}
		require_once("views/".$this->name."/".$this->task.".php");	
			
		}
		
		
		function search(){	
		
		if(preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$_REQUEST['search'])) {
			$uquery="SELECT * from users  where email='".$_REQUEST['search']."'";
			}else if($_REQUEST['search']){
			$uquery="SELECT * from users where fname LIKE '%".$_REQUEST['search']."%'";
			}else{
			$uquery="SELECT * from users ";
			}	
			
			$this->Query($uquery);
			$uresults = $this->fetchArray();	
			$tdata=count($uresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
						 	
			if(preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$_REQUEST['search'])) {
			$query="SELECT * from users  where email='".$_REQUEST['search']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}else if($_REQUEST['search']){
			$query="SELECT * from users where fname LIKE '%".$_REQUEST['search']."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}else{
			$query="SELECT * from users LIMIT ".(($page-1)*$tpages).",".$tpages;
			}	
			
			$this->Query($query);
			$results = $this->fetchArray();	
			$this->task="show";
			require_once("views/".$this->name."/".$this->task.".php");	
		}
		
		
		function status(){
		$query="update users set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();	
		header("location:index.php?control=user");
		}
		
		
		function delete(){
		
		$query="DELETE FROM users WHERE id in (".$_REQUEST['id'].")";	
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=user");
		
		}
		
		
		
		
		
	
	}