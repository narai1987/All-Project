<?php
ob_start(); 
    session_start();
	if(file_exists('configuration.php')){
		require_once('configuration.php');
	}
	require_once('class/dbaccess.php');
	require_once('class/users.php');
	require_once('textconfig/config.php');
	date_default_timezone_set("Asia/Calcutta");
	
	$control = $_REQUEST['control'];
	$view = $_REQUEST['view']?$_REQUEST['view']:$_REQUEST['control'];
	$task= $_REQUEST['task'];
	$tmpid= $_REQUEST['tmpid'];
			
	include_once('controller.php'); ?>