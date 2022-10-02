<?php
	require_once('class/dbaccess.php');	
	if(file_exists('../configuration.php')){
		require_once('../configuration.php');
	}
	class menuClass extends DbAccess {
		public $view='';
		public $name='menu';
		
		
		function show($view) {	
			session_start();
			$q_pages ="select * from menus WHERE id = '".$_REQUEST['id']."' and language_id = '".$_SESSION['language_id']."'";
			$this->Query($q_pages);
			$results = $this->fetchArray();	
			foreach($results as $result);
			require_once("views/".$this->name."/show.php"); 					
		}
		
	}