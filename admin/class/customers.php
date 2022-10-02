<?php
	require_once('dbaccess.php');	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class CustomerClass extends DbAccess {
		public $view='';
		public $name='customer';

		
		function show(){	
		$uquery ="select * from users where utype!=1";
		$this->Query($uquery);
		$uresults = $this->fetchArray();	
		$tdata=count($uresults);
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
		$query ="select * from users where utype!=1 LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($query);
		$results = $this->fetchArray();		
		
		require_once("views/".$this->name."/".$this->task.".php"); 
		}
		
		
		function  updateprofile(){
		
		if((!empty($_REQUEST['id']))) {
			
		
		$query="update users set status=1 , gender='".$_REQUEST['gender']."'";				
				
				if(!empty($_REQUEST['fname'])){
				$query.=",fname='".$_REQUEST['fname']."'"	;
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
				header("location:index.php");
				
		}
		
		$query ="select * from users where id=".$_SESSION['adminid'];
		$this->Query($query);
		$results = $this->fetchArray();	foreach($results as $result){}
	
		require_once("views/".$this->name."/".$this->task.".php");		
		}
		
		function  changepassword(){
		if((!empty($_REQUEST['id'])) && ($_REQUEST['password']==$_REQUEST['cpassword']) && ($_REQUEST['password'] && $_REQUEST['cpassword'])) {
				
				//$this->Query("update users set password = '".md5($_REQUEST['password'])."' where id = '".$_REQUEST['id']."'");
				$query="update users set password = '".md5($_REQUEST['password'])."' where id = '".$_REQUEST['id']."'";
				$this->Query($query);
				$this->Execute();	
				if($this->Execute()) {					
				header("location:index.php");
				}
		}
		require_once("views/".$this->name."/".$this->task.".php");	
			
		}
		
		
		function search(){	
		
		/*if(preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$_REQUEST['search'])) {
			$uquery="SELECT * from users  where email='".$_REQUEST['search']."'";
			}else if($_REQUEST['search']){
		echo	$uquery="SELECT * from users where fname LIKE '%".$_REQUEST['search']."%' or mobile LIKE '%".$_REQUEST['search']."%'";
			}else{
		echo	$uquery="SELECT * from users where utype!=1";
			}	*/
			
		$uquery ="select * from users where utype!=1";
		$this->Query($uquery);
		$uresults = $this->fetchArray();	
		$tdata=count($uresults);
		
		$tdata=count($uresults);
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
						 	
			if(preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$_REQUEST['search'])) {
			$query="SELECT * from users where email='".$_REQUEST['search']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}else if($_REQUEST['search']){
			//$query="SELECT * from users where utype!=1 and fname LIKE '%".$_REQUEST['search']."%' or lname LIKE '%".$_REQUEST['search']."%' or username LIKE '%".$_REQUEST['search']."%' or mobile LIKE '%".$_REQUEST['search']."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			 $string = trim($_REQUEST['search']);
			 $arr = explode(" ",$string,2);
			//print_r($arr);
			 $where .=" and fname LIKE '".$arr[0]."' and lname LIKE '".$arr[1]."' or fname LIKE '%".$string."%' or lname LIKE '%".$string."%' or username LIKE '%".$string."%' or mobile LIKE '%".$string."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			
			$query="SELECT * from users where utype!=1 ".$where;}else{
			$query="SELECT * from users where utype!=1 LIMIT ".(($page-1)*$tpages).",".$tpages;
			}	
			
			
			
			$this->Query($query);
			$results = $this->fetchArray();	
			$this->task="show";
			require_once("views/".$this->name."/".$this->task.".php");	
		}
		
		
		function view_customer(){	
        $query ="SELECT * from users where id='".$_REQUEST['id']."'";
		
		$this->Query($query);
		return $results = $this->fetchArray();	
	    }
		
		function update_user(){	
		 $fname = $_REQUEST['fname'];  $lname = $_REQUEST['lname'];	 $username = $_REQUEST['username']; 
		 $email = $_REQUEST['email']; $password = $_REQUEST['password']; $mobile = $_REQUEST['mobile'];  $dob = $_REQUEST['dob'];  $gender = $_REQUEST['gender']; $user_type = $_REQUEST['registerUser']; 
		 $image = $_FILES['image'];
		 $folder= "./../images/user/";
		 move_uploaded_file($image["tmp_name"] , $folder.$image["name"]);
		 
		 $query ="SELECT * from users where id='".$_REQUEST['id']."'";
		 $this->Query($query);
		 $results = $this->fetchArray();
		 	
		 if($image['name']) {
		 $folderImgName = $results[0]['image'];
		 $folder= "./../images/user/";
	     unlink($folder.$folderImgName);
		
		move_uploaded_file($image["tmp_name"] , $folder.$image["name"]);
		
        $query="update users set fname='".$fname."', lname='".$lname."',username='".$username."',email='".$email."',mobile='".$mobile."',dob='".$dob."',gender='".$gender."',image='".$image['name']."' WHERE id='".$_REQUEST['id']."'";	
		
		}
		else {
		$query="update users set fname='".$fname."', lname='".$lname."',username='".$username."',email='".$email."',mobile='".$mobile."',dob='".$dob."',gender='".$gender."' WHERE id='".$_REQUEST['id']."'";	
		}
		$this->Query($query);	
		$this->Execute();
			
		header("location:index.php?control=customer");
	    }
		
		function status(){
		$query="update users set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();	
		header("location:index.php?control=customer");
		}
		
		
		function delete(){
		
		$query="DELETE FROM users WHERE id in (".$_REQUEST['id'].")";	
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=customer");
		
		}
		
		function addnew_user(){
	     $fname = $_REQUEST['fname'];  $lname = $_REQUEST['lname'];	 $username = $_REQUEST['username']; 
		 $email = $_REQUEST['email']; $password = $_REQUEST['password']; $mobile = $_REQUEST['mobile'];  $dob = $_REQUEST['dob'];  $gender = $_REQUEST['gender']; $user_type = $_REQUEST['registerUser']; 
		 $image = $_FILES['image'];
		 $folder= "./../images/user/";
		 move_uploaded_file($image["tmp_name"] , $folder.$image["name"]);
		$query ="INSERT into users (fname,lname,username,email,password,image,mobile,dob,gender,user_type,date_time) value 
		('".$fname."','".$lname."','".$username."','".$email."','".md5($password)."','".$image['name']."','".$mobile."','".$dob."','".$gender."','".$user_type."','".date("Y-m-d H:i:s")."')";
		$this->Query($query);
		$this->Execute();	
		header("location:index.php?control=customer&task=show");
		
		}
	
	}