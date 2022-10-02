<?php
	require_once('dbaccess.php');		
	
	if(file_exists('../configuration.php')){		
		require_once('../configuration.php');
	}
	
	
	class configClass extends DbAccess {
		public $view='';
		public $name='config';
				
		function show($view=NULL) {	
			$q_confic ="select * from confic where confic_type_id = '1'";
			$this->Query($q_confic);
			$confics = $this->fetchArray();
			
			require_once("views/".$this->name."/show.php"); 		
		}	
		function tmp_save() {
			$query = "UPDATE templates SET default_temp = '0' WHERE 1 ";	
			$this->Query($query);
			$this->Execute();
			$q_front = "UPDATE templates SET default_temp = '1' WHERE id = '".$_REQUEST['tmpl_front']."' and tmp_type = '1' ";	
			$this->Query($q_front);
			$this->Execute();
			$q_back = "UPDATE templates SET default_temp = '1' WHERE id = '".$_REQUEST['tmpl_back']."' and tmp_type = '0'  ";	
			$this->Query($q_back);
			$this->Execute();
			//$this->show();
			header('location:index.php?control=config');
		}
		function conficChange() {
			foreach($_POST as $key=>$value) {
				if($key!="submit") {;
					$query = "UPDATE confic SET value = '".$value."' WHERE title = '".$key."' ";	
					$this->Query($query);
					$this->Execute();	
				}
			}
			$this->show();
		}
		function tripConfig() {
			foreach($_POST as $key=>$value) {
				if($key!="submit") {;
					$query = "UPDATE trip_config SET value = '".$value."' WHERE title = '".$key."' ";	
					$this->Query($query);
					$this->Execute();	
				}
			}
			$this->show();
		}
		function conficLang() {
			foreach($_POST as $key=>$value) {
				if($key!="submit") {;
					$query = "UPDATE confic SET value = '".$value."' WHERE title = '".$key."' ";	
					$this->Query($query);
					if($this->Execute()) {
						$query = "UPDATE languages SET deff = '0' WHERE 1 ";
						$this->Query($query);
						$this->Execute();
						$query = "UPDATE languages SET deff = '1' WHERE id = '".$value."' ";
						$this->Query($query);
						$this->Execute();
					}
				}
			}
			$this->show();
		}
	/*CLASS END*/
	}