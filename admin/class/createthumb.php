<?php
	
	class CreateThumb  {
		
		public $destpath = '';
		public $thumbwidth = 150;
		public $thumbheight = 150;
		/*
		$file=$_FILES['image'];
		if($file['name']){
			$filename=$_REQUEST['id']."_".str_replace(" ","_",$file['name']);
			move_uploaded_file($file['tmp_name'],"excel/big/".$filename);
			if(resizeImage("excel/big/".$filename,$filename,"excel/".$filename)){
				$qurery= "UPDATE phone_directory SET profile_image='".$filename."' WHERE id ='".$_REQUEST['id']."'";
				mysql_query($qurery);
			}
			
			header("location:".$_REQUEST['url']);	
		}
		else{
			header("location:".$_REQUEST['url']);	
		}
		*/
		

		function resizeImage($source, $filename, $thumb_source){		
			$info = pathinfo($source);
			$ext = strtolower($info['extension']);
			if(!$this->checkMemory($source, $ext))
			{
			echo "not allocate memory";
			die;
			}
			$thumb_path = $thumb_source;
			$jg_useforresizedirection = 1;
			$jg_thumbwidth = $this->thumbwidth;
			$jg_thumbheight = $this->thumbheight;
			$jg_thumbcreation = 'gd2';
			$jg_thumbquality = 100;
			$jg_cropposition = 2;
			$return =$this->resizeImageFile($source,$thumb_path,$jg_useforresizedirection,$jg_thumbwidth,$jg_thumbheight,$jg_thumbcreation,$jg_thumbquality,false,	$jg_cropposition);	
			if($return){
			//unlink($source);
			return true;		
			}else{
			return false;
			}
			
		}
	
		function checkMemory($filename, $format){
			if((function_exists('memory_get_usage')) && (ini_get('memory_limit'))){
			$imageInfo = getimagesize($filename);
			$jpgpic = false;
			switch(strtoupper($format)){
			case 'GIF':
			// Measured factor 1 is better
			$channel = 1;
			break;
			case 'JPG':
			case 'JPEG':
			case 'JPE':
			$channel = $imageInfo['channels'];
			$jpgpic=true;
			break;
			case 'PNG':
			// No channel for png
			$channel = 3;
			break;
			}
			$MB  = 1048576;
			$K64 = 65536;
			
			$corrfactor = 2.1;
			
			$memoryNeeded = round(($imageInfo[0]
			* $imageInfo[1]
			* $imageInfo['bits']
			* $channel / 8
			+ $K64)
			* $corrfactor);
			
			$memoryNeeded = memory_get_usage() + $memoryNeeded;
			// Get memory limit
			$memory_limit = @ini_get('memory_limit');
			if(!empty($memory_limit) && $memory_limit != 0)
			{
			$memory_limit = substr($memory_limit, 0, -1) * 1024 * 1024;
			}
			
			if($memory_limit != 0 && $memoryNeeded > $memory_limit)
			{
			$memoryNeededMB = round ($memoryNeeded / 1024 / 1024, 0);
			
			return false;
			}
			}
			
			return true;
		}
	
	
	
		function resizeImageFile($src_file, $dest_file, $useforresizedirection,$new_width, $thumbheight, $method, $dest_qual, $max_width = false, $cropposition){
			// Doing resize instead of thumbnail, copy original and remove it.
			$imginfo = getimagesize($src_file);
			
			if(!$imginfo)
			{
			
			return false;
			}
			
			// GD can only handle JPG & PNG images
			if(    $imginfo[2] != IMAGETYPE_JPEG
			&&  $imginfo[2] != IMAGETYPE_PNG
			&&  $imginfo[2] != IMAGETYPE_GIF
			&&  ($method == 'gd1' || $method == 'gd2')
			)
			{
			
			return false;
			}
			
			$imagetype = array(1 => 'GIF', 2 => 'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD',
			6 => 'BMP', 7 => 'TIFF', 8 => 'TIFF', 9 => 'JPC', 10 => 'JP2',
			11 => 'JPX', 12 => 'JB2', 13 => 'SWC', 14 => 'IFF');
			
			$imginfo[2] = $imagetype[$imginfo[2]];
			
			// Height/width
			$srcWidth  = $imginfo[0];
			$srcHeight = $imginfo[1];
			
			if(   ($max_width && $srcWidth <= $new_width && $srcHeight <= $new_width)
			||  (!$max_width && $srcWidth <= $new_width && $srcHeight <= $thumbheight)
			)
			{
			// If source image is already of the same size or smaller than the image
			// which shall be created only copy the source image to destination
			//$debugoutput .= JText::_('COM_JOOMGALLERY_UPLOAD_RESIZE_NOT_NECESSARY').'<br />';
			if(!@ copy($src_file, $dest_file))
			{
			
			
			return false;
			}
			
			return true;
			}
			
			// For free resizing and cropping the center
			$offsetx = null;
			$offsety = null;
			if($max_width)
			{
			
			if($new_width <= 0)
			{
			
			return false;
			}
			
			$ratio = max($srcHeight,$srcWidth) / $new_width ;
			}
			else
			{
			// Resizing to thumbnail
			
			if($new_width <= 0 || $thumbheight <= 0)
			{
			
			return false;
			}
			
			switch($useforresizedirection)
			{
			// Convert to height ratio
			case 0:
			$ratio = ($srcHeight / $thumbheight);
			$testwidth = ($srcWidth / $ratio);
			// If new width exceeds setted max. width
			if($testwidth > $new_width)
			{
			$ratio = ($srcWidth / $new_width);
			}
			break;
			// Convert to width ratio
			case 1:
			$ratio = ($srcWidth / $new_width);
			$testheight = ($srcHeight/$ratio);
			// If new height exceeds the setted max. height
			if($testheight>$thumbheight)
			{
			$ratio = ($srcHeight/$thumbheight);
			}
			break;
			// Free resizing and cropping the center
			case 2:
			if($srcWidth < $new_width)
			{
			$new_width = $srcWidth;
			}
			if($srcHeight < $thumbheight)
			{
			$thumbheight = $srcHeight;
			}
			// Expand the thumbnail's aspect ratio
			// to fit the width/height of the image
			$ratiowidth = $srcWidth / $new_width;
			$ratioheight = $srcHeight / $thumbheight;
			if ($ratiowidth < $ratioheight)
			{
			$ratio = $ratiowidth;
			}
			else
			{
			$ratio = $ratioheight;
			}
			// Calculate the offsets for cropping the source image according
			// to thumbposition
			switch($cropposition)
			{
			// Left upper corner
			case 0:
			$offsetx = 0;
			$offsety = 0;
			break;
			// Right upper corner
			case 1:
			$offsetx = floor(($srcWidth - ($new_width * $ratio)));
			$offsety = 0;
			break;
			// Left lower corner
			case 3:
			$offsetx = 0;
			$offsety = floor(($srcHeight - ($thumbheight * $ratio)));
			break;
			// Right lower corner
			case 4:
			$offsetx = floor(($srcWidth - ($new_width * $ratio)));
			$offsety = floor(($srcHeight - ($thumbheight * $ratio)));
			break;
			// Default center
			default:
			$offsetx = floor(($srcWidth - ($new_width * $ratio)) * 0.5);
			$offsety = floor(($srcHeight - ($thumbheight * $ratio)) * 0.5);
			break;
			}
			}
			}
			
			if(is_null($offsetx) && is_null($offsety))
			{
			$ratio = max($ratio, 1.0);
			
			$destWidth  = (int)($srcWidth / $ratio);
			$destHeight = (int)($srcHeight / $ratio);
			}
			else
			{
			$destWidth = $new_width;
			$destHeight = $thumbheight;
			$srcWidth  = (int)($destWidth * $ratio);
			$srcHeight = (int)($destHeight * $ratio);
			}
			
			// Method for creation of the resized image
			switch($method)
			{
			
			case 'gd2':
			if(!function_exists('imagecreatefromjpeg'))
			{
			
			return false;
			}
			if(!function_exists('imagecreatetruecolor'))
			{
			
			return false;
			}
			if($imginfo[2] == 'JPG')
			{
			$src_img = imagecreatefromjpeg($src_file);
			}
			else
			{
			if($imginfo[2] == 'PNG')
			{
			$src_img = imagecreatefrompng($src_file);
			}
			else
			{
			$src_img = imagecreatefromgif($src_file);
			}
			}
			
			if(!$src_img)
			{
			return false;
			}
			$dst_img = imagecreatetruecolor($destWidth, $destHeight);
			
			$jg_fastgd2thumbcreation = 1;
			
			
			
			if($jg_fastgd2thumbcreation == 0)
			{
			if(!is_null($offsetx) && !is_null($offsety))
			{
			imagecopyresampled( $dst_img, $src_img, 0, 0, $offsetx, $offsety,
			$destWidth, (int)$destHeight, $srcWidth, $srcHeight);
			}
			else
			{
			imagecopyresampled( $dst_img, $src_img, 0, 0, 0, 0, $destWidth,
			(int)$destHeight, $srcWidth, $srcHeight);
			}
			}
			else
			{
			if(!is_null($offsetx) && !is_null($offsety))
			{
			$this->fastImageCopyResampled( $dst_img, $src_img, 0, 0, $offsetx, $offsety,
			$destWidth, (int)$destHeight, $srcWidth, $srcHeight);
			}
			else
			{
			$this->fastImageCopyResampled( $dst_img, $src_img, 0, 0, 0, 0, $destWidth,
			(int)$destHeight, $srcWidth, $srcHeight);
			}
			}
			
			if(!@imagejpeg($dst_img, $dest_file, $dest_qual))
			{
			// Workaround for servers with wwwrun problem
			$dir = dirname($dest_file);
			imagejpeg($dst_img, $dest_file, $dest_qual);
			}
			imagedestroy($src_img);
			imagedestroy($dst_img);
			break;
			
			default:
			//echo 'no method found';
			break;
			}
			
			// Set mode of uploaded picture
			//JPath::setPermissions($dest_file);
			
			// We check that the image is valid
			$imginfo = getimagesize($dest_file);
			if(!$imginfo)
			{
			return false;
			}
			
			return true;
		}
	
	
	
		function fastImageCopyResampled(&$dst_image, $src_image, $dst_x, $dst_y,
			$src_x, $src_y, $dst_w, $dst_h,
			$src_w, $src_h, $quality = 3)
			{
			if(empty($src_image) || empty($dst_image) || $quality <= 0)
			{
			return false;
			}
			
			if($quality < 5 && (($dst_w * $quality) < $src_w || ($dst_h * $quality) < $src_h))
			{
			$temp = imagecreatetruecolor($dst_w * $quality + 1, $dst_h * $quality + 1);
			imagecopyresized  ($temp, $src_image, 0, 0, $src_x, $src_y, $dst_w * $quality + 1,
			$dst_h * $quality + 1, $src_w, $src_h);
			imagecopyresampled($dst_image, $temp, $dst_x, $dst_y, 0, 0, $dst_w,
			$dst_h, $dst_w * $quality, $dst_h * $quality);
			imagedestroy      ($temp);
			}
			else
			{
			imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w,
			$dst_h, $src_w, $src_h);
			}
			return true;
		}


	}
	
?>