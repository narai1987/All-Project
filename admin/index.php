<?php
ob_start(); 
global $tmp;
    //ini_set("display_errors","Off");
	if(file_exists('configuration.php')){
		require_once('configuration.php');
	}
	require_once('class/dbaccess.php');
	require_once('class/users.php');
	//require_once('textconfig/config.php');
	date_default_timezone_set("Asia/Calcutta");
	$db = new DbAccess();
	
	session_start();
	if($_REQUEST['language'])
	$_SESSION['language_id'] = $_REQUEST['language'];
	else
	$_SESSION['language_id'] = 1;
	
	if($_REQUEST['language'])
	$_SESSION['taxlanguage_id'] = $_REQUEST['language'];
	elseif($_SESSION['taxlanguage_id'])
	$_SESSION['taxlanguage_id'] = $_SESSION['taxlanguage_id'];
	else
	$_SESSION['taxlanguage_id'] = 1;
	
	$ob = new DbAccess();
	$languages = $ob->language();
	//print_r($languages);
	if($_SESSION['language_id'])
	$lang = $_SESSION['language_id'];
	else {
		$lang = $_SESSION['language_id'] = $languages[0]['id'];		
	}
	
	$keyword = $ob->taxolist();
	//print_r($keyword);
	$template = $db->getTemplate($_REQUEST['tmpid']);	
	$menus =  $db->getMenuTop();
	
	$control = $_REQUEST['control'];
	$view = $_REQUEST['view']?$_REQUEST['view']:$_REQUEST['control'];
	$task= $_REQUEST['task'];
	$tmpid= $_REQUEST['tmpid'];
			
	

	session_start();
	if(!$_SESSION['username'] and $_REQUEST['email']) {
		$db->Auth('user');
	}
	
	/*CHECK MY ACCOUNT TEMPLATES FOR LOGIN*/
	if(!$_SESSION['username']) {
		header('location:login.php');
	}
	/*CHECK MY ACCOUNT TEMPLATES FOR LOGIN END*/
	$tmp = "template/".$template[0]['name'];
	$sitelogo = $tmp."/"."images/logo.png";
	include_once("template/".$template[0]['name']."/index.php"); 
	
	ob_flush();