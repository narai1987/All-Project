<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class tripgalleryClass extends DbAccess {
	public $view='';
	public $name='tripgallery';

	function show($view) {	
		
		$query ="SELECT * from trip_specifications WHERE language_id = '".$_SESSION['language_id']."'";
		$this->Query($query);
		$results = $this->fetchArray();	
		
		if($_REQUEST['gallery']!='') {
		$tripg ="SELECT * from trip_specifications ts join trip_gallery tg ON ts.trip_id = tg.trip_id WHERE ts.trip_id='".$_REQUEST['gallery']."' and ts.language_id = '".$_SESSION['language_id']."'";
		$this->Query($tripg);
		$gallerys = $this->fetchArray();	
		}
		
		
		/*GET TRIP MAIN IMAGES AND ITS FLOORPLANS*/
		$boatmQ = "SELECT image FROM trips WHERE id = '".$_REQUEST['gallery']."'";
		$this->Query($boatmQ);
		$mains = $this->fetchObject();
		/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
				
		require_once("views/".$this->name."/show.php");	
		
	}

     function showgallery() { echo "Hello".$_REQUEST['id'];
       require_once("views/".$this->name."/show.php");	
	 }

	
	function ajaxUpload(){
		
		$trip_Id = $_POST['tripidd'];
		if($trip_Id!=''):
			
				$folder_url = "media/trips/".$trip_Id;
						if(!is_dir($folder_url))
							mkdir($folder_url);
							
				$galleryUrl = $folder_url;	
				
				
				############ Edit settings ##############
				$ThumbSquareSize 		= 100; //Thumbnail will be 200x200
				$BigImageMaxSize 		= 300; //Image Maximum height or width
				$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
				$DestinationDirectory	= $galleryUrl.'/'; //specify upload directory ends with / (slash)
				$Quality 				= 90; //jpeg quality
				##########################################
		
				//check if this is an ajax request
				if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
					die();
				}
			
	
				for($i = 0; $i <= count($_FILES['ImageFile']); $i++) {
					
								// Random number will be added after image name
								$RandomNumber 	= rand(0, 9999999999); 
							
								$ImageName 		= str_replace(' ','-',strtolower($_FILES['ImageFile']['name'][$i])); //get image name
								$ImageSize 		= $_FILES['ImageFile']['size'][$i]; // get original image size
								$TempSrc	 	= $_FILES['ImageFile']['tmp_name'][$i]; // Temp name of image file stored in PHP tmp folder
								$ImageType	 	= $_FILES['ImageFile']['type'][$i]; //get file type, returns "image/png", image/jpeg, text/plain etc.
					
								
								$newImage = $RandomNumber.$ImageName;
								$fullUrl = $galleryUrl."/".$newImage;
								
								$success = move_uploaded_file($TempSrc, $fullUrl);
									if($success){
											$query_Gal = "INSERT INTO `trip_gallery` (`trip_id`, `image`, `status`) VALUES ('".$trip_Id."', '".$fullUrl."', 1)";
											$this->Query($query_Gal);
											$this->Execute();
									}
			
				  }
	  
	  
	  					
						
									$tripg ="SELECT * from trip_specifications ts join trip_gallery tg ON ts.trip_id = tg.trip_id "
									. " WHERE ts.trip_id='".$trip_Id."' and ts.language_id = '".$_SESSION['language_id']."'";
											$this->Query($tripg);
											$gallerys = $this->fetchArray();
												
	  					
										require_once("views/".$this->name."/ajaxview.php");	
	   	
		
		 endif;
	  
	 
	}



	function delimg(){
		
		if($_REQUEST['id']) {
	    $unlinkafbeelding = "SELECT * FROM trip_gallery WHERE id = '".$_REQUEST['id']."' and trip_id=".$_REQUEST['tripid'];	
		$select = mysql_query($unlinkafbeelding);
		$image = mysql_fetch_array($select);
		
		unlink("./".$image['image']);
		  
			
		$query = "DELETE FROM trip_gallery WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		
		
	
		
		
		
		}
	header("location:index.php?control=tripgallery&task=show&gallery=".$_REQUEST['tripid']);
		
	}


	
	function uploadImage(){
		$trip_Id = $_POST['tripidd2'];
		if($trip_Id!=''):
			
				$folder_url = "media/trips/".$trip_Id;
						if(!is_dir($folder_url))
							mkdir($folder_url);
							
				$galleryUrl = $folder_url;
				
				############ Edit settings ##############
				$ThumbSquareSize 		= 100; //Thumbnail will be 200x200
				$BigImageMaxSize 		= 300; //Image Maximum height or width
				$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
				$DestinationDirectory	= $galleryUrl.'/'; //specify upload directory ends with / (slash)
				$Quality 				= 90; //jpeg quality
				##########################################
		
				//check if this is an ajax request
				if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
					die();
				}
			
	
					// Random number will be added after image name
					$RandomNumber 	= rand(0, 9999999999); 
					
					
					$mImageType = "image";
					
					$ImageName 		= "main_".$trip_Id.str_replace(' ','-',strtolower($_FILES['mainFile']['name'])); //get image name
					$ImageSize 		= $_FILES['mainFile']['size']; // get original image size
					$TempSrc	 	= $_FILES['mainFile']['tmp_name']; // Temp name of image file stored in PHP tmp folder
					$ImageType	 	= $_FILES['mainFile']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.
		
					
					$newImage = $RandomNumber.$ImageName;
					$fullUrl = $galleryUrl."/".$newImage;
					
					$success = move_uploaded_file($TempSrc, $fullUrl);
						if($success){
								$query_Gal = "UPDATE `trips` SET ".$mImageType." = '".$fullUrl."' WHERE id = '".$trip_Id."'";
								$this->Query($query_Gal);
								$this->Execute();
						}
	  
	  
	  
	  					/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
						$boatmQ = "SELECT image FROM trips WHERE id = '".$trip_Id."'";
						$this->Query($boatmQ);
						$mains = $this->fetchObject();
						/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
						require_once("views/".$this->name."/ajaxview2.php");	
	    
		
		
		endif;
	}
	
	
	
	
	

		
		function beverage($view) {	
			session_start();
			$query ="select * from beverage_types WHERE  language_id = '".$_SESSION['language_id']."'";
			$this->Query($query);
			$tresult = $this->fetchArray();
			$tdata=count($tresult);
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
			 $query =$query." LIMIT ".(($page-1)*$tpages).",".$tpages;
			$this->Query($query);
			$results = $this->fetchArray();
			$keyword = $this->siteLanguage();
			//require_once("views/".$this->name."/".$this->task.".php"); 			
			require_once("views/".$this->name."/beverage.php");		
		}


       function beverage_addnew() {
			
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$results1 = $this->fetchArray();
		
		if($_REQUEST['id']) {
				
			foreach($results1 as $lang) {
						$query_all ="SELECT * FROM  beverage_types WHERE id = '".$_REQUEST['id']."' AND  language_id = '".$lang['id']."'";
						$this->Query($query_all);
						$allContents = $this->fetchArray();
						foreach($allContents as $allcontent){
						$results['content'][$lang['id']] = $allcontent;
						}	
			}
		}
		
		require_once("views/".$this->name."/beverage_addnew.php");
	}
	
	
	function beverage_save() {	
		
		$status = 1; 
		$query_lang = "SELECT * FROM languages WHERE 1";
		$this->Query($query_lang);
		$languages = $this->fetchArray();		
		
		if(!$_REQUEST['id']) {	
			$max_query=	"SELECT MAx(id) mx FROM beverage_types";
			$this->Query($max_query);
			$max_id = $this->fetchArray();
			$id=$max_id[0][0]['mx']+1;
			$query = "INSERT INTO `beverage_types` (`id`,`language_id` ,`beverage_type`, `status`) VALUES ";
			$i=0;
			foreach($languages as $lang){
				
				$query .= $i==0 ? "(".$id." , ".$lang['id']." , '".$_REQUEST['beveragename'.$lang['id']]."' , '".$status."')" : " , (".$id." , ".$lang['id']." , '".$_REQUEST['beveragename'.$lang['id']]."' , '".$status."')";
				$i++;
			}
				
			$this->Query($query);
			$this->Execute();
		}else{
			$currentID = $_REQUEST['id'];
			foreach($languages as $lang){
			$query = "UPDATE `beverage_types` SET `beverage_type` = '".$_REQUEST['beveragename'.$lang['id']]."' WHERE id = '".$currentID."' and language_id=".$lang['id'];			
			$this->Query($query);
			$this->Execute();
			}
		}
		header('location:index.php?control=beverage&task=beverage');
	}

    function beverage_status(){
			
		$query = "UPDATE beverage_types SET status ='".$_REQUEST['status']."' WHERE id = ".$_REQUEST['id'];
					$this->Query($query);
					$this->Execute();	
			
		header('location:index.php?control=beverage&task=beverage');
		}
		
   function beverage_delete(){
			
		$query = "DELETE FROM beverage_types WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		header('location:index.php?control=beverage&task=beverage');
	   }
	   
	   
	   
	   
	   
	   
	   

}