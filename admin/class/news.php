<?php
	require_once('dbaccess.php');
	require_once('../textconfig/config.php');		
	
	if(file_exists('../configuration.php')){
		
		require_once('../configuration.php');
	}
	
	class NewClass extends DbAccess {
		public $view='';
		public $name='new';
		
		
		
		
		function save(){
			
			if(empty($_REQUEST['id']) && !empty($_REQUEST['news']) && !empty($_REQUEST['title']) &&  !empty($_REQUEST['userid'])){										
					$title = $_REQUEST['title'];		
					$news = $_REQUEST['news'];									
					$query = "INSERT INTO news VALUES('','".$title."','".$_REQUEST['userid']."','".$news."','".date("Y-m-d H:i:s")."','1')";									
					$this->Query($query);
					$this->Execute();
										
			 }else if(!empty($_REQUEST['id'])){
				 
				$title = $_REQUEST['title'];		
				$news = $_REQUEST['news'];	
				$query="update news set status=1 ,date_time='".date("Y-m-d H:i:s")."'";
				
				if(!empty($title)){
				$query.=",title='".$title."'"	;
				}
				
				if(!empty($news)){
				$query.=",news='".$news."'"	;
				}
				$query.=" where id=".$_REQUEST['id'];
				
													
				$this->Query($query);
				$this->Execute();	 
				 
			 }
			 $this->task="show";
			 $this->view ='show';
			 //$this->show();
			 header("location:index.php?control=new");		
		}
		
		
		
		function show(){	
		$nquery ="select * from news";
		$this->Query($nquery);
		$nresults = $this->fetchArray();	
		$tdata=count($nresults);
		/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$_REQUEST['tpages'] = $tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : PERPAGE;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $tdata?($adjacents = 4):0;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
		/* Paging end here */	
		
		$query ="select * from news LIMIT ".(($page-1)*$tpages).",".$tpages;
		$this->Query($query);
		$results = $this->fetchArray();	
		require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
				
		function search(){	
				
			if($_REQUEST['search']){
			$nquery="SELECT * from news where title LIKE '%".$_REQUEST['search']."%' ";
			}else{
			$nquery="SELECT * from news ";	
			}
			
			$this->Query($nquery);
			$nresults = $this->fetchArray();	
			$tdata=count($nresults);
			
			/* Paging start here */
			$page   = intval($_REQUEST['page']);
			$tpages = ($_REQUEST['tpages']) ? intval($_REQUEST['tpages']) : 5;//$tdata; // 20 by default
			$adjacents  = intval($_REQUEST['adjacents']);
			$tdata = ($tdata%$tpages)?(($tdata/$tpages)+1):round($tdata/$tpages);//$_GET['tpages'];// 
			$tdata = floor($tdata);
			if($page<=0)  $page  = 1;
			if($adjacents<=0) $adjacents = 4;
			$reload = $_SERVER['PHP_SELF'] . "?control=".$_REQUEST['control']."&views=".$_REQUEST['view']."&task=".$_REQUEST['task']."&tmpid=".$_REQUEST['tmpid']."&tpages=" . $tpages . "&amp;adjacents=" . $adjacents;	
			/* Paging end here */	
						 	
			if($_REQUEST['search']){
			$query="SELECT * from news where title LIKE '%".$_REQUEST['search']."%' LIMIT ".(($page-1)*$tpages).",".$tpages;
			}else{
			$query="SELECT * from news LIMIT ".(($page-1)*$tpages).",".$tpages;	
			}	
				
			$this->Query($query);
			$results = $this->fetchArray();
			$this->task="show";
			require_once("views/".$this->name."/".$this->task.".php"); 					
		
		}
		
		
		function status(){
		$query="update news set status=".$_REQUEST['status']." WHERE id='".$_REQUEST['id']."'";	
		$this->Query($query);	
		$this->Execute();
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=new");	
		}
		
		
		function delete(){
		
		$query="DELETE FROM news WHERE id in (".$_REQUEST['id'].")";	
		$this->Query($query);
		$this->Execute();	
		$this->task="show";
		$this->view ='show';
		//$this->show();
		header("location:index.php?control=new");	
		}
	
	}