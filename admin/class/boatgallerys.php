<?php
require_once('dbaccess.php');	
if(file_exists('../configuration.php')){		
	require_once('../configuration.php');
}


class boatgalleryClass extends DbAccess {
	public $view='';
	public $name='boatgallery';

	function show($view) {	
		
		$query ="SELECT * from boatspecifications WHERE language_id = '".$_SESSION['language_id']."'";
		$this->Query($query);
		$results = $this->fetchArray();	
		
		if($_REQUEST['gallery']!='') {
		$tripg ="SELECT * from boatspecifications bs join boat_images bi ON bs.boat_id = bi.boat_id WHERE bs.boat_id='".$_REQUEST['gallery']."' and bs.language_id = '".$_SESSION['language_id']."'";
		$this->Query($tripg);
		$gallerys = $this->fetchArray();
		
		
		/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
		$boatmQ = "SELECT main_image, upper_deck,main_deck,lower_deck FROM boats WHERE id = '".$_REQUEST['gallery']."'";
		$this->Query($boatmQ);
		$mains = $this->fetchObject();
		/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
		
		
			foreach($gallerys AS $gg):
			if($gg['gallery_type_id'] == 1)
			$boatGallerys['Exterior'][] = $gg;//$gg['gallery_type_id']
			else
			$boatGallerys['Interior'][] = $gg;
			endforeach;
		
		}
				
		require_once("views/".$this->name."/show.php");	
		
	}


	function ajaxUpload(){
		
		$boat_Id = $_POST['boatidd'];
		if($boat_Id!=''):
			
				$gal_type_id = $_POST['galType'];
				$folder_url = "media/boats/".$boat_Id;
						if(!is_dir($folder_url))
							mkdir($folder_url);
							
				$galleryUrl = $folder_url."/gallery";
						if(!is_dir($galleryUrl))
							mkdir($galleryUrl);		
				
				
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
											$query_Gal = "INSERT INTO `boat_images` (`boat_id`, `images`, `gallery_type_id`, `status`) VALUES ('".$boat_Id."', '".$fullUrl."', '".$gal_type_id."', 1)";
											$this->Query($query_Gal);
											$this->Execute();
									}
			
				  }
	  
	  
	  
	  					$tripg ="SELECT * from boatspecifications bs join boat_images bi ON bs.boat_id = bi.boat_id"
							. " WHERE bs.boat_id='".$boat_Id."' and bs.language_id = '".$_SESSION['language_id']."'";
							$this->Query($tripg);
							$gallerys = $this->fetchArray();
							foreach($gallerys AS $gg):
							if($gg['gallery_type_id'] == 1)
							$boatGallerys['Exterior'][] = $gg;//$gg['gallery_type_id']
							else
							$boatGallerys['Interior'][] = $gg;
							endforeach;
		
				
							require_once("views/".$this->name."/ajaxview.php");	
	    endif;
	  
	 
	}
	
	

	function delimg(){
		
		if($_REQUEST['id']) {
	    $unlinkafbeelding = "SELECT * FROM boat_images WHERE id = '".$_REQUEST['id']."' and boat_id=".$_REQUEST['boatid'];	
		$select = mysql_query($unlinkafbeelding);
		$image = mysql_fetch_array($select);
		
		unlink("./".$image['images']);
		  
			
		$query = "DELETE FROM boat_images WHERE id = ".$_REQUEST['id'];	
		$this->Query($query);
		$this->Execute();
		
		
	
		
		
		
		}
	header("location:index.php?control=boatgallery&task=show&gallery=".$_REQUEST['boatid']);
		
	}


	
	function uploadImage(){
		$boat_Id = $_POST['boatidd2'];
		if($boat_Id!=''):
			
				$folder_url = "media/boats/".$boat_Id;
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
					
					
					if($_REQUEST['imageType'] == 'main_image')
					$mImageType = "main_image";
					else if($_REQUEST['imageType'] == 'upper_deck')
					$mImageType = "upper_deck";
					else if($_REQUEST['imageType'] == 'main_deck')
					$mImageType = "main_deck";
					else if($_REQUEST['imageType'] == 'lower_deck')
					$mImageType = "lower_deck";
					
					
					$ImageName 		= $ImageType.$boat_Id.str_replace(' ','-',strtolower($_FILES['mainFile']['name'])); //get image name
					$ImageSize 		= $_FILES['mainFile']['size']; // get original image size
					$TempSrc	 	= $_FILES['mainFile']['tmp_name']; // Temp name of image file stored in PHP tmp folder
					$ImageType	 	= $_FILES['mainFile']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.
		
					
					$newImage = $RandomNumber.$ImageName;
					$fullUrl = $galleryUrl."/".$newImage;
					
					$success = move_uploaded_file($TempSrc, $fullUrl);
						if($success){
								$query_Gal = "UPDATE `boats` SET ".$mImageType." = '".$fullUrl."' WHERE id = '".$boat_Id."'";
								$this->Query($query_Gal);
								$this->Execute();
						}
	  
	  
	  
	  					/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
						$boatmQ = "SELECT main_image, upper_deck,main_deck,lower_deck FROM boats WHERE id = '".$boat_Id."'";
						$this->Query($boatmQ);
						$mains = $this->fetchObject();
						/*GET BOAT MAIN IMAGES AND ITS FLOORPLANS*/
						require_once("views/".$this->name."/ajaxview2.php");	
	    
		
		
		endif;
	}
	
	
	

}