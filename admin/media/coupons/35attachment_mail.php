<?php


    $fileatt = $_FILES['attachment']['tmp_name']; 
    $fileatt_type = $_FILES['attachment']['type']; 
    $fileatt_name = $_FILES['attachment']['name'];

 if(file($attachment)) {
		$subject =  "Hello";		
		$from = "narai1987@gmail.com";
		$messagehtml = "<table border=0><tr><td>Dear " .$_REQUEST['user_nicename']."<br></td></tr>";
		$messagehtml .= "<tr><td>You have been successfully send.<br><br><br><br></td></tr>";
		$messagehtml .= "<tr><td>Please download the attached file<br><br><br><br></td></tr>";
		
		$messagehtml .= "<tr><td>Yours sincerely, <br>Nagesh Kumar rai </td></tr></table>";
								
		 //if (file($fileatt)) { 
		
		$file = fopen($fileatt,'rb'); 
		$data = fread($file,filesize($attachment)); 
		fclose($file);
	
		// split the file into chunks for attaching
		$content = chunk_split(base64_encode($data));
		$uid = md5(uniqid(time()));
	
		// build the headers for attachment and html
		$h = "From: $from\r\n";
		if ($replyto) $h .= "Reply-To: ".$replyto."\r\n";
		$h .= "MIME-Version: 1.0\r\n";
		$h .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$h .= "This is a multi-part message in MIME format.\r\n";
		$h .= "--".$uid."\r\n";
		$h .= "Content-type:text/html; charset=iso-8859-1\r\n";
		$h .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$h .= $messagehtml."\r\n\r\n";
		$h .= "--".$uid."\r\n";
		$h .= "Content-Type: ".$ftype."; name=\"".basename($fileatt)."\"\r\n";
		$h .= "Content-Transfer-Encoding: base64\r\n";
		$h .= "Content-Disposition: attachment; filename=\"".basename($fileatt)."\"\r\n\r\n";
		$h .= $content."\r\n\r\n";
		$h .= "--".$uid."--";
		if(mail( $to, $subject, $messagehtml, str_replace("\r\n","\n",$h) )) {
		}
	}?>