<?php
	require_once('dbaccess.php');		
	
		
		if(file_exists('../configuration.php')){		
			require_once('../configuration.php');
		}
	
	class taxonomyClass extends DbAccess {
		public $view='';
		public $task='';
		public $old_task='';
		public $name='taxonomy';
		
		function show() {
			session_id();
			$where=" language_id = '".$_SESSION['taxlanguage_id']."'";			
			if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
			 $where .=" and content LIKE '%".$string."%'";	
			}	
			$q_show = "SELECT count(taxonomy_id) numrow  from taxonomy_content WHERE ". $where;			
			$this->Query($q_show);
			$total_data = $this->fetchArray();
			$total_data[0]['numrow'];
			/* Paging start here */
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : $this->defaultPageData();
			$adjacents  = intval($_REQUEST['adjacents']);			
			$tdata = ($total_data[0]['numrow']%$tpages)?(floor($total_data[0]['numrow']/$tpages)+1):round($total_data[0]['numrow']/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			$page   = intval($_REQUEST['page']) > $tdata ? 1 :intval($_REQUEST['page']) ;
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here    ORDER BY content ASC*/
	
		 	$query = "select * from taxonomy_content WHERE language_id = '".$_SESSION['taxlanguage_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			
			if($_REQUEST['search']) {
				$string = trim($_REQUEST['search']);
				$query = "select * from taxonomy_content where language_id='".$_SESSION['taxlanguage_id']."' and content LIKE '%".$string."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}
			$this->Query($query);
			$results = $this->fetchArray();				 
			$keyword = $this->siteLanguage();
			$content = $this->taxolist();	
			
					
		if($results=='' and $tdata > 0){
				$page   = $_REQUEST['page'] - 1;
				
			 $query ="SELECT count(taxonomy_id) numrow  from taxonomy_content WHERE = '".$_SESSION['taxlanguage_id']."' LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();	
			}				
			require_once("views/".$this->name."/show.php");	
			//require_once("views/".$this->name."/".$this->task.".php"); 
		}
		
		function addTaxonomyFle() {
			if($_FILES['taxonomy']['name']) {
				
				$langFile = explode(".",$_FILES['taxonomy']['name']);
				
				if($langFile[1] == 'po'){
				
				$q_match = "SELECT * FROM languages WHERE content = '".ucwords($langFile[0])."'";
				$this->Query($q_match);
				if($this->rowCount()) {
					$language_id = $this->fetchArray();
					move_uploaded_file($_FILES['taxonomy']['tmp_name'],"views/taxonomy/textfile/".$_FILES['taxonomy']['name']);
					$file = fopen("views/taxonomy/textfile/".$_FILES['taxonomy']['name'], "r") or exit("Unable to open file!");
					//Output a line of the file until the end is reached
					$i = 0;
					while(!feof($file)) {
						$text = explode(";",fgets($file));
						$str[$i]['id'] = str_replace('=',"",explode('text',$text[0]));
						$str[$i]['val'] = str_replace('=',"",explode("value",$text[1]));
						$key = str_replace(" ","_",$str[$i]['id']['1']);
						$val = $str[$i]['val']['1'];
						$key = strtolower($key);
						$query = "SELECT * FROM taxonomy WHERE keyword = '".$key."'";
						
						$this->Query($query);
						$results = $this->fetchArray();	
						if(count($results)) {
							$texonomy_id = $results[0]['id'];
							$query = "SELECT * FROM taxonomy_content WHERE taxonomy_id = '".$texonomy_id."' and language_id = '".$language_id[0]['id']."' ";
						
							$this->Query($query);
							$results = $this->fetchArray();
							if(count($results)) {	
								$q_update = "UPDATE taxonomy_content SET content = '".trim($val)."', date_time = '".date("Y-m-d H:i:s")."' WHERE  taxonomy_id = '".$texonomy_id."' and language_id = '".$language_id[0]['id']."' ";
								$this->Query($q_update);
								$this->Execute();
							}
							else {
								$q_insert = "INSERT INTO taxonomy_content(taxonomy_id,language_id,content,date_time,status) VALUES ('".$texonomy_id."','".$language_id[0]['id']."','".trim($val)."','".date("Y-m-d H:i:s")."','1')";
								$this->Query($q_insert);
								$this->Execute();
							}
						}
						else {
							$q_insert = "INSERT INTO taxonomy(id,keyword,status) VALUES ('','".strtolower(trim($key))."','1')";
							
							$this->Query($q_insert);
							$this->Execute();
							
							$q_insert = "INSERT INTO taxonomy_content(taxonomy_id,language_id,content,date_time,status) VALUES ('".mysql_insert_id()."','".$language_id[0]['id']."','".trim($val)."','".date("Y-m-d H:i:s")."','1')";
							$this->Query($q_insert);
							$this->Execute();
						}						
						$i++;
					}				
					fclose($file);
					require_once("views/".$this->name."/show.php");
				}
				else {
					$this->Query("INSERT INTO `languages` (`id`, `content`, `icon`, `deff`, `date_time`, `status`) VALUES ('', '".ucwords($langFile[0])."', '', 0, '".date("Y-m-d H:i:s")."', 1)");
					$this->Execute();
					$q_match = "SELECT * FROM languages WHERE content = '".ucwords($langFile[0])."'";
					$this->Query($q_match);
					$language_id = $this->fetchArray();
					
					move_uploaded_file($_FILES['taxonomy']['tmp_name'],"views/taxonomy/textfile/".$_FILES['taxonomy']['name']);
					$file = fopen("views/taxonomy/textfile/".$_FILES['taxonomy']['name'], "r") or exit("Unable to open file!");
					//Output a line of the file until the end is reached
					$i = 0;
					while(!feof($file)) {
						$text = explode(";",fgets($file));
						$str[$i]['id'] = str_replace('=',"",explode('text',$text[0]));
						$str[$i]['val'] = str_replace('=',"",explode("value",$text[1]));
						$key = str_replace(" ","_",$str[$i]['id']['1']);
						$val = $str[$i]['val']['1'];
						$key = strtolower($key);
						$query = "SELECT * FROM taxonomy WHERE keyword = '".$key."'";
						$this->Query($query);
						$results = $this->fetchArray();	
						if(count($results)) {
							$texonomy_id = $results[0]['id'];
							$query = "SELECT * FROM taxonomy_content WHERE taxonomy_id = '".$texonomy_id."' and language_id = '".$language_id[0]['id']."' ";
						
							$this->Query($query);
							$results = $this->fetchArray();
							if(count($results)) {	
								$q_update = "UPDATE taxonomy_content SET content = '".trim($val)."', date_time = '".date("Y-m-d H:i:s")."' WHERE  taxonomy_id = '".$texonomy_id."' and language_id = '".$language_id[0]['id']."' ";
								$this->Query($q_update);
								$this->Execute();
							}
							else {
								$q_insert = "INSERT INTO taxonomy_content(taxonomy_id,language_id,content,date_time,status) VALUES ('".$texonomy_id."','".$language_id[0]['id']."','".trim($val)."','".date("Y-m-d H:i:s")."','1')";
								$this->Query($q_insert);
								$this->Execute();
							}
						}
						else {
							$q_insert = "INSERT INTO taxonomy(id,keyword,status) VALUES ('','".strtolower(trim($key))."','1')";
							$this->Query($q_insert);
							$this->Execute();
							
							$q_insert = "INSERT INTO taxonomy_content(taxonomy_id,language_id,content,date_time,status) VALUES ('".$texonomy_id."','".$language_id[0]['id']."','".trim($val)."','".date("Y-m-d H:i:s")."','1')";
							$this->Query($q_insert);
							$this->Execute();
						}						
						$i++;
					}	
										
					fclose($file);
					require_once("views/".$this->name."/show.php");
				}
				
				}else{
				header('location:index.php?control=taxonomy&task=addTaxonomyFle&f=po');
				}
			}
			else {
				require_once("views/".$this->name."/".$this->task.".php"); 
			}
		}
		
		function readText() {
				
		}
		
		function addTaxonomy() {
			echo "oooooooooo";
			session_start();
			echo $query = "select * from taxonomy_content where taxonomy_id = '".$_REQUEST['id']."' and language_id = '".$_SESSION['language_id']."'";	
			$this->query($query);
			$results = $this->fetchArray();
			$keyword = $this->siteLanguage();
			if(file_exists("../views/".$this->name."/".$this->task.".php"))
				require_once("../views/".$this->name."/".$this->task.".php");
			else
				require_once("views/".$this->name."/".$this->task.".php");
		}
		
		function addTaxonomy_lang() {
			$query = "select * from taxonomy_content where taxonomy_id = '".$_REQUEST['did']."' and language_id = '".($_REQUEST['lang_id']?$_REQUEST['lang_id']:'1')."' and status = '1'";	
			$this->Query($query);
			$arrData['taxonomy_content'] = $this->fetchArray();
			$arrData['content'] = $this->siteLanguage();
			return $arrData;
			if(count($results)) {
				return $this->fetchArray();
			}
			else {
				return "0";
			}
		}
		
		
		function save() {
			
			$keyword = $_REQUEST['keyword'];
			$languageId = $_REQUEST['languageId'];
			$description = $_REQUEST['description'];
			if($_REQUEST['id'] && $_REQUEST['languageId']) {
			$query = "UPDATE taxonomy_content SET language_id='".$languageId."', content='".mysql_real_escape_string($keyword)."',date_time='".date("Y-m-d H:i:s")."' WHERE taxonomy_id = '".$_REQUEST['id']."' and language_id='".$_REQUEST['languageId']."'";
				$this->Query($query);
				$this->Execute();
						
			}
			elseif($_REQUEST['lang_id']) {
				
			
		     $query = "INSERT INTO `taxonomy_content` (`taxonomy_id`,`language_id`,`content`,`date_time`,`status`) VALUES ('".$_REQUEST['id']."','".$_REQUEST['lang_id']."','".mysql_real_escape_string($keyword)."', '".date("Y-m-d H:i:s")."','1')";
			$this->Query($query);
				$this->Execute();
			}
			
			else {
		       $query = "INSERT INTO `taxonomy` (`keyword`, `description`, `date_time`,`status`) VALUES ('".str_replace(" ","_",(strtolower($keyword)))."','".$description."', '".date("Y-m-d H:i:s")."','1')";
			
				$this->Query($query);
				$this->Execute();
		
		 $query = "INSERT INTO `taxonomy_content` (`taxonomy_id`,`language_id`,`content`,`date_time`,`status`) VALUES ('".mysql_insert_id()."','".$_SESSION['language_id']."','".mysql_real_escape_string($keyword)."', '".date("Y-m-d H:i:s")."','1')";
			$this->Query($query);
				$this->Execute();
				
				
				}
			
			header('location:index.php?control=taxonomy');
				
		}
		
		
			function status(){
		

			$query="update taxonomy_content set status='".$_REQUEST['status']."' WHERE taxonomy_id='".$_REQUEST['id']."'";					
			$this->Query($query);	
			$this->Execute();
			$this->task="show";
		    $this->view ='show';
		    $this->show();
			//header("Location:index.php?control=taxonomy");
		
		}
		
		function delete(){
		
		$query="DELETE FROM taxonomy_content WHERE taxonomy_id in (".$_REQUEST['id'].")";	
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		$this->show();
		//header("location:index.php?control=taxonomy&page='".$_REQUEST['page']."'");
		
		}
		
		function search() {
			if($_REQUEST['search']) {
			$query = "select * from taxonomy_content where content LIKE '%".$_REQUEST['search']."%'";
			}
			else {
		header("location:index.php?control=taxonomy");
			}
			$this->Query($query);
			$results = $this->fetchArray();
			$this->task="show";
		    require_once("views/".$this->name."/".$this->task.".php"); 
			}
		
		
	}