<?php
	
	require_once('createthumb.php');
	if(file_exists('../textconfig/config.php')) {
		require_once('../textconfig/config.php');
	}
	else {
		require_once('../../textconfig/config.php');
	}
	if(file_exists('configuration.php')){
		require_once('configuration.php');
	}
	else {
		require_once('../configuration.php');	
	}
	class DbAccess extends  CreateThumb {
		public $result;
		public $query;
		public $num_row;
		public $tmpPath;
		public $taxonomy_cont;
		public function DbAccess(){
			
			$query = $tmpid?"SELECT * FROM templates WHERE id = '".$tmpid."' AND tmp_type = 0 AND  status = '1'":"SELECT * FROM templates WHERE status = '1' AND tmp_type = 0 AND default_temp='1'";
			$this->Query($query);
			$result = $this->fetchArray();
			$this->tmpPath = "template/".$result[0]['name'];
		}
			function getTemplate($tmpid) {
			$query = $tmpid?"SELECT * FROM templates WHERE id = '".$tmpid."' AND tmp_type = 0 AND  status = '1'":"SELECT * FROM templates WHERE status = '1' AND tmp_type = 0 AND default_temp='1'";
			$this->Query($query);
			return $this->fetchArray();
			
		}
		
		function cityByCountryId($id) {
			$q_city = "SELECT id,city FROM cities  WHERE country_id = '".$id."' and status = '1' and language_id = '1'";
			$this->Query($q_city);
			$data = $this->fetchArray();
			return $data;
		}
		function cityById($id) {
			$q_city = "SELECT id,city FROM cities  WHERE id = '".$id."' and language_id = '1'";
			$this->Query($q_city);
			$data = $this->fetchArray();
			return $data[0]['city'];
		}
		function countryByCityId($id) {
			$q_country_by_city = "SELECT cntr.* FROM countries cntr JOIN cities c ON cntr.id = c.country_id  WHERE c.id = '".$id."' and cntr.language_id = '1'";
			$this->Query($q_country_by_city);
			$country_by_city = $this->fetchArray();
			return $country_by_city[0]['id'];
		}
		
		function getCountry($id) {
			$q_country = "SELECT * FROM countries WHERE id = '".$id."'  AND language_id = '1'";
			$this->Query($q_country);
			$country = $this->fetchArray();
			return $country[0]['country'];
		}
		
		
		function getMenuTop() {
			$query = "SELECT * FROM menus WHERE status = '1'";
			$this->Query($query);
			return $this->fetchArray();
			
		}
	
		
		function Query($str) {
			$this->query = $str;
			return true;	
		}
		
		function Execute() {
			$this->result = mysql_query($this->query) or die(mysql_error());
			return $this->result;
		}
		
		function isExecute() {
			return  mysql_query($this->query);
		}
		
		function fetchArray() {
			$this->Execute();
			$this->NumRow();
			for($i=0; $i<$this->num_row; $i++){
				$fetch_result[$i] = mysql_fetch_array($this->result);
			}
			return $fetch_result;
		}
		
		function fetchObject() {
			$this->Execute();
			$this->NumRow();
			for($i=0; $i<$this->num_row; $i++){
				$fetch_result[$i] = mysql_fetch_object($this->result);
			}
			return $fetch_result;
		}
		
		function numRow() {
			$this->num_row = mysql_num_rows($this->result);	
			return $this->num_row;
		}
		
		function rowCount(){
			$this->result = mysql_query($this->query) or die(mysql_error());
			$this->num_row = mysql_num_rows($this->result);	
			return $this->num_row;				
		}
		
	
		
		function mailsend($to,$from=NULL,$subject=NULL,$message=NULL) {
			
			$from = $from?$from:EMAILFROM; //$fromMail;//
			$subject = $subject?$subject:SUBJECTMAIL; 
			$message = $message?$message:"<a href=".$this->token.">Click here to varify your account</a>";
			//////////////////////////////////////////////////
			
			 
			 
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.SUBJECTMAIL.' '.$from;
			
			// Additional headers
			//$headers .= 'To: '. $from. "\r\n";
			//$headers .= 'From: '.$subject.' <'.$to.'>' . "\r\n";
			 
			$ok = @mail($to,$subject, $message,  $headers); 
			if ($ok) { 
				return true;
			} else { 
				return false;
			} 	
		}
		
		function uploadFile($dest,$file,$type = NULL) {
			if($type) {
				if($file['type']==$type) {					
					$des = $dest."/".$_REQUEST['id'].$file['name'];
					if(move_uploaded_file($file['tmp_name'],$des)) {
						return $des;
					}
					else {
						return NULL;
					}
				}
				else {
					return NULL;
				}
			}
			else {
				 $des = $dest."/".$_REQUEST['id'].$file['name'];
					if(move_uploaded_file($file['tmp_name'],$des)) {
						return $des;
					}
					else {
						return NULL;
					}
			}
		}
		//Language code start here
		function  taxolist() {
			session_start();
			
			$q_show = "SELECT t.id,tc.content,t.keyword from taxonomy t JOIN taxonomy_content tc ON t.id = tc.taxonomy_id  WHERE t.status = '1' AND tc.language_id = '".$_SESSION['language_id']."' OR tc.language_id = '1' order by tc.language_id  ";			
			$this->Query($q_show);
			$data = $this->fetchArray();
			if($data) {
				foreach($data as $dt) {
					$arr[$dt['keyword']] = $dt['content'];
				}
			}
			else {
				$q_show = "SELECT t.id,tc.content,t.keyword from taxonomy t JOIN taxonomy_content tc ON t.id = tc.taxonomy_id  WHERE t.status = '1' AND tc.language_id = '1'  ORDER BY tc.language_id  ";
			
				$this->Query($q_show);
				$data = $this->fetchArray();
				if($data) {
					foreach($data as $dt) {
						$arr[$dt['keyword']] = $dt['content'];
					}
				}
			}
			return $arr;
		}
		function language() {
			$q_show = "SELECT id,content FROM languages  WHERE deff = '1' and status = '1'";			
			$this->Query($q_show);
			return $this->fetchArray();
		}
		function langAll() {
			$q_show = "SELECT id,content FROM languages  WHERE status = '1'";			
			$this->Query($q_show);
			return $this->fetchArray();
		}
		function siteLanguage() {
			session_start();
			 $q_show = "SELECT t.id,tc.content,t.keyword FROM taxonomy t JOIN taxonomy_content tc ON t.id = tc.taxonomy_id  WHERE t.status = '1' AND tc.language_id = '".$_SESSION['language_id']."' OR tc.language_id = '1'  ORDER BY tc.language_id  ";
			
			$this->Query($q_show);
			$contents = $this->fetchArray();
			  if($contents) {	
				  foreach($contents as $content) {
					 $arrData[$content['keyword']] = $content['content']; 
				  }
			  }
			  else {
				  $q_show = "SELECT t.id,tc.content,t.keyword FROM taxonomy t JOIN taxonomy_content tc ON t.id = tc.taxonomy_id  WHERE t.status = '1' AND tc.language_id = '1'  ORDER BY tc.language_id  ";
			
				$this->Query($q_show);
				$contents = $this->fetchArray();
				if($contents) {	
					foreach($contents as $content) {
						$arrData[$content['keyword']] = $content['content']; 
					}
				} 
				  
			  }
			  return $arrData;	
		}
		
		function rollback() {
			echo mysql_query("rollback");	
		}
		function commit() {
			echo mysql_query("commit");	
		}
		function defaultPageData() {
			$this->Query("SELECT * FROM confic WHERE title = 'paging'");
			$data = $this->fetchArray();
			return $data[0]['value']?$data[0]['value']:5;
		}
	}
?>