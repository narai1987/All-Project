<?php
ini_set("display_errors","Off");
error_reporting(0);
	$server = 'localhost';
	$db = 'db_idive';
	$user = 'root';
	$password = '';
	

	
	
	$link = mysql_connect($server,$user,$password) or die(mysql_error());
	mysql_select_db($db,$link) or die(mysql_error());
	mysql_query("SET NAMES utf8");
	
?>