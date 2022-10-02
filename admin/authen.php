<?php
ob_start();
require_once('bootstrap.php'); 	
$username = $_REQUEST['email'];
$password = $_REQUEST['password'];
$type =$_REQUEST['type'];
	if($username && $password){
	 $query = "SELECT * FROM users WHERE email='".$username."' AND password = '".md5($password)."' and utype = '1' ";
	$dba->Query($query);
	$rows = $dba->fetchArray();
	
	foreach($rows as $row){}
		if($dba->rowCount()){
			if($row['utype']) {		
				session_start();
				$_SESSION['username']=$row['username'];
				$_SESSION['email']=$row['email'];
				$_SESSION['admin']='1';
				$_SESSION['admin_name']=$row['fname'];
				$_SESSION['adminid']=$row['id'];
				$_SESSION['image']=$row['image'];
				$_SESSION['utype']='Administrator';
				
				header('location:index.php?msg=1');
			}
			else {
				header('location:login.php?error=2');
			}
		}
		else {
		header('location:login.php?error=1');
		}
		return true;
	}else {	
	header('location:login.php?error=1');
	}
	
ob_flush();		
?>