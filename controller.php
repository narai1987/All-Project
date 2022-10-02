<?php
//session_start();
//ini_set("display_errors","Off");
    $control = $_REQUEST['control'];
	$view = $_REQUEST['view'];
	$task = $_REQUEST['task'];
	
	$tmpid = $_REQUEST['tmpid'];	
	
	if($control){
		if($_REQUEST['task'])
		$task = $_REQUEST['task'];
		else
		$task = "show";
		if($_REQUEST['view'])
		$view = $_REQUEST['view'];
		else 
		$view = $control;//"home";
		
		$classFile = $control;
		require_once('class/'.$classFile.'s.php'); 
		$class = $classFile."Class";
		
		$ob = new $class;
		
		$ob->view = $view;
		$ob->task = $task;
		
		$ob->type = $_REQUEST['type'];
		$ob->id = $_REQUEST['id'];
	
		$results = $ob->$task($view);
	}
	else {
		$task = $_REQUEST['task']?$_REQUEST['task']:'show';
		$classFile = "home";
		//exit;	
		require_once('class/'.$classFile.'s.php'); 
		$class = $classFile."Class";
		$ob = new $class;
		$ob->view = "show";
		$ob->type = $_REQUEST['type'];
		$ob->id = $_REQUEST['id'];
		$results = $ob->$task($ob->view);
		
	}