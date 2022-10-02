<?php
	session_start();
	$_POST['language_id'];
	$language_id = $_REQUEST['language_id']?$_REQUEST['language_id']:($_SESSION['language_id']?$_SESSION['language_id']:"1");
	$_SESSION['language_id'] = $language_id;
	include_once('class/dbaccess.php');
	$oob = new DbAccess();
	
	$keyword = $oob->taxolist();
	
	//print_r($keyword);