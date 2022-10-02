<?php
	require_once('dbaccess.php');		
	
	
	
	class LanguageClass extends DbAccess {
		public $view='';
		public $task='';
		public $old_task='';
		public $name='language';
		
		function show() {
			$where=" 1 ";			
			if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $where =" content LIKE '".$string."%'";	
			}
            $q_show = "SELECT count(id) numrow from languages WHERE ".$where;	
			$this->Query($q_show);
			$total_data = $this->fetchArray();
			$total_data[0]['numrow'] ;
			
			/* Paging start here */
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 10;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			
			$tdata = ($total_data[0]['numrow']%$tpages)?(floor($total_data[0]['numrow']/$tpages)+1):round($total_data[0]['numrow']/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			$page   = intval($_REQUEST['page']) > $tdata ? 1 :intval($_REQUEST['page']) ;
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */
		
		  $query = "select * from languages WHERE 1 LIMIT ".(($page-1)*$tpages).",".$tpages;
		    if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $query = "select * from languages where content LIKE '".$string."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}
		   
			$this->Query($query);
			$results = $this->fetchArray();	
			$content = $this->siteLanguage();
			require_once("views/".$this->name."/".$this->task.".php"); 
		}
		
		function addLanguage() {
			
			$query = "select * from languages where id = '".$_REQUEST['id']."'";
			$this->query($query);
			$results['languages'] = $this->fetchArray();
			$results['content'] = $this->siteLanguage();
			//print_r($results['content']);
			require_once("views/".$this->name."/".$this->task.".php");
			
		}
		
		
		function save() {
			
			$content = $_REQUEST['content'];
			if($_REQUEST['id']) {
				$image = $_FILES['image'];
				$file=$_FILES['taxonomy'];
				echo $name_lang = explode(".",$file['name']);
				$name = "language";
				$folder = "./../images/language/";
				move_uploaded_file($image["tmp_name"] , $folder.$name.$_REQUEST['id']."."."png");
								
				echo $query = "UPDATE languages SET content='".ucwords($name_lang[0])."', date_time='".date("Y-m-d H:i:s")."' WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query);
				$this->Execute();
				
				if($file['name']){
					$query_text="DELETE FROM taxonomy_content WHERE language_id in (".$_REQUEST['id'].")";	
					$this->Query($query_text);
					$this->Execute();
					$d_name = "default_";
					$d_folder = "./../images/language/files/";
					move_uploaded_file($file["tmp_name"] , $d_folder.$d_name.$_REQUEST['id']."."."po");
								
					$file_r = fopen($d_folder.$d_name.$_REQUEST['id']."."."po", "r") or die('unable to read');
					while(!feof($file_r)){
					
						$msgid=explode("msgid ",fgets($file_r));
						if($msgid[1]){
						
							$msgid=trim(str_replace('"',"",$msgid[1]));
									
							$msgidd[]=str_replace(" ","_",strtolower($msgid));	
							echo $queryy = "select id from taxonomy where keyword = '".str_replace(" ","_",strtolower($msgid))."'";
							$this->query($queryy);
							$data = $this->fetchArray();
							if($data[0]['id']){
								$msgid_arr[str_replace(" ","_",strtolower($msgid))]=$data[0]['id'] ;	
							}else{
								$query1 = "INSERT INTO `taxonomy` (`keyword`, `date_time`,`status`) VALUES ('".str_replace(" ","_",strtolower($msgid))."','".date("Y-m-d H:i:s")."','1')";
								$this->Query($query1);
								$this->Execute();
								$msgid_arr[str_replace(" ","_",strtolower($msgid))]=mysql_insert_id();
							}
							
						
						}
					
						$msgstr=explode("msgstr ",fgets($file_r));
						if($msgstr[1]){
							$msgstr_arr[str_replace(" ","_",strtolower($msgid))]=trim(str_replace('"',"",$msgstr[1]));
						}
					}			
					fclose($file_r);
					
					$query = "INSERT INTO `taxonomy_content` (`taxonomy_id`, `language_id`,`content`,`date_time`,`status`) VALUES ";					
					for($i=0;$i<count($msgstr_arr);$i++){					
						$val .= $val?",('".$msgid_arr[$msgidd[$i]]."','".$_REQUEST['id']."', '".$msgstr_arr[$msgidd[$i]]."','".date("Y-m-d H:i:s")."','1')":"('".$msgid_arr[$msgidd[$i]]."','".$_REQUEST['id']."', '".$msgstr_arr[$msgidd[$i]]."','".date("Y-m-d H:i:s")."','1')";
										
					}
					echo $query = $query.$val;
					
					$this->Query($query);
					$this->Execute();
				}
									
			}
			else {	
			
				$image = $_FILES['image']; 
				$file=$_FILES['taxonomy'];
				$name_lang = explode(".",$file['name']);
				$query = "INSERT INTO `languages` (`content`, `date_time`,`status`) VALUES ('".ucwords($name_lang[0])."','".date("Y-m-d H:i:s")."','1')";
				$this->Query($query);
				$this->Execute();
				$lang_id=mysql_insert_id();
				$name = "language";
				$folder = "./../images/language/";
				move_uploaded_file($image["tmp_name"] , $folder.$name.$lang_id."."."png");
				$d_name = "default_";
				$d_folder = "./../images/language/files/";
				move_uploaded_file($file["tmp_name"] , $d_folder.$d_name.$lang_id."."."po");
							
				$file_r = fopen($d_folder.$d_name.$lang_id."."."po", "r") or die('unable to read');
				while(!feof($file_r)){
				
				$msgid=explode("msgid ",fgets($file_r));
				if($msgid[1]){
					$msgid=trim(str_replace('"',"",$msgid[1]));		
					$msgidd[]=str_replace(" ","_",strtolower($msgid));	
					$queryy = "select id from taxonomy where keyword = '".str_replace(" ","_",strtolower($msgid))."'";
					$this->query($queryy);
					$data = $this->fetchArray();
					if($data[0]['id']){
						$msgid_arr[str_replace(" ","_",strtolower($msgid))]=$data[0]['id'] ;	
					}else{
						$query1 = "INSERT INTO `taxonomy` (`keyword`, `date_time`,`status`) VALUES ('".str_replace(" ","_",strtolower($msgid))."','".date("Y-m-d H:i:s")."','1')";
						$this->Query($query1);
						$this->Execute();
						$msgid_arr[str_replace(" ","_",strtolower($msgid))]=mysql_insert_id();
					}
					
				
				}
			
				$msgstr=explode("msgstr ",fgets($file_r));
				if($msgstr[1]){
					$msgstr_arr[str_replace(" ","_",strtolower($msgid))]=trim(str_replace('"',"",$msgstr[1]));
				}
			}			
			fclose($file_r);						
				for($i=0;$i<count($msgstr_arr);$i++){					
				$query = "INSERT INTO `taxonomy_content` (`taxonomy_id`, `language_id`,`content`,`date_time`,`status`) VALUES ('".$msgid_arr[$msgidd[$i]]."','".$lang_id."','".$msgstr_arr[$msgidd[$i]]."','".date("Y-m-d H:i:s")."','1')";
				$this->Query($query);
				$this->Execute();					
				}
			
			}
						
			header('location:index.php?control=language');
				
		}
		
		
			function status(){
		

			$query="update languages set status='".$_REQUEST['status']."' WHERE id='".$_REQUEST['id']."'";					
			$this->Query($query);	
			$this->Execute();
			$this->task="show";
		    $this->view ='show';
		    $this->show();
			//header("Location:index.php?control=language");
		
		}
		
		function delete(){
		
		$query="DELETE FROM languages WHERE id in (".$_REQUEST['id'].")";	
		$this->Query($query);
		$this->Execute();
		$query_text="DELETE FROM taxonomy_content WHERE language_id in (".$_REQUEST['id'].")";	
		$this->Query($query_text);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		$this->show();
		//header("location:index.php?control=language");
		
		}
		
	
		
		
	}