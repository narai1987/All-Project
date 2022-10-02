<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class homeClass extends DbAccess {
		public $view='';
		public $name='home';
				
		function show($view) {	
			$tmp = 	$this->tmpPath;		
			require_once("views/".$this->name."/show.php");		
		}		
	}