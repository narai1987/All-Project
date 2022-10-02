<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class homeClass extends DbAccess {
		public $view='';
		public $name='home';
		
		function show($view) {
			require_once("views/".$this->name."/show.php"); 
		}
		
		function news() {
			$this->Query("select * from news where status = '1' ");
			$newss = $this->fetchArray();			
			
			require_once("views/".$this->name."/news.php"); 
		}
	}