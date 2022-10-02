<?php
ini_set("display_errors","Off");

		if (isset($_GET['load']))
{
	$params = array();
	$params = explode("/", $_GET['load']);

	$control = strtolower($params[0]);
	
	if (isset($params[1]) && !empty($params[1]))
	{
		$task = $params[1];
	}
	
	if (isset($params[2]) && !empty($params[2]))
	{
		$query = $params[2];
	}
	
}
else {

 	$control = $_REQUEST['control'] ;
	$view = $_REQUEST['view'];
	$task = $_REQUEST['task'];
}
	if($control){
		if(empty($task)){
			if($_REQUEST['task'])
			$task = $_REQUEST['task'];
			else
			$task = "show";
		}
		if($_REQUEST['view'])
		$view = $_REQUEST['view'];
		else 
		$view = "home";	
		
		$classFile = $control;
		$file = "class/".$classFile."s.php";
		
		if(file_exists($file)) {
			require_once($file);
		}
		else {
			require_once($file);
		}
		$class = $classFile."Class";
		
		$ob = new $class;
		
		$ob->view = $view;
		$ob->task = $task;
		$ob->type = $_REQUEST['type'];
		$ob->id = $_REQUEST['id'];
		$results = $ob->$task($ob->view);
	}
	else {
		
		$task = $_REQUEST['task']?$_REQUEST['task']:'show';
		$classFile = "home";
		require_once('class/'.$classFile.'s.php'); 
		$class = $classFile."Class";
		$ob = new $class;
		$ob->view = "show";
		$ob->type = $_REQUEST['type'];
		$ob->id = $_REQUEST['id'];
		$view;	
		$results = $ob->$task($ob->view);
		
	}