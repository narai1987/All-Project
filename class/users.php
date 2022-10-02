<?php
	require_once('dbaccess.php');
	
	class userClass extends DbAccess {
		public $view='';
		public $name='user';
		public $token;
		
		
		
		function logout() {
			session_start();
			$skip = $_SESSION['skip'];
			session_destroy();	
			session_start();
				$_SESSION['skip'] = $skip?$skip:0;
			$_SESSION['error'] = "You are successfully logout.";
					$_SESSION['errorclass'] = "";
				$_SESSION['alert']= $alert = 1;
			header("location:index.php");
		}
		
		function register() {
			$chQuery = "SELECT * FROM users WHERE email = '".$_REQUEST['email']."'";
			$this->Query($chQuery);
			$num = $this->rowCount();
			
			$chQuery2 = "SELECT * FROM users WHERE username = '".$_REQUEST['username']."'";
			$this->Query($chQuery2);
			$num2 = $this->rowCount();
			if($num and $num2){
				session_start();
				session_destroy();	
				session_start();
				$_SESSION['error'] = "Email and Username already registered.";
				$_SESSION['errorclass'] = "warn_red";
				header("location:index.php");
			}elseif($num){
				session_start();
				session_destroy();	
				session_start();
				$_SESSION['error'] = "Email already registered.";
				$_SESSION['errorclass'] = "warn_red";
				header("location:index.php");
			}elseif($num){
				session_start();
				session_destroy();	
				session_start();
				$_SESSION['error'] = "Username already registered.";
				$_SESSION['errorclass'] = "warn_red";
				header("location:index.php");
			}
			else{
				$query = "INSERT INTO users (username,password,fname,lname,email,mobile,gender,date_time,status) values('".mysql_real_escape_string(trim($_REQUEST['username']))."','".md5($_REQUEST['password'])."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','1','".date("Y-m-d H:i:s")."','0')";
			
				$this->Query($query);
				$this->Execute();
				$newuserid = $this->lastInsertId();
				$token = $this->createtoken($newuserid,1);
				$this->Query("UPDATE users SET token = '".$token."' WHERE id = '".$newuserid."'");
				if($this->Execute()) {
					
					
					$getTemplateQuery = "SELECT * FROM email_templates WHERE type = 'Registration' AND status = 1";
					$this->Query($getTemplateQuery);
					$templates = $this->fetchObject();
				
					$subject = $templates[0]->subject;
					$message=stripcslashes($templates[0]->content);			 
					$message=str_replace("{username}",$_REQUEST['username'],$message); 			 
					$message=str_replace("{password}",$_REQUEST['password'],$message); 
					$message=str_replace("{date}",date("Y-m-d"),$message); 
					$message=str_replace("{name}",$_REQUEST['fname']." ".$_REQUEST['lname'],$message); 
					$message=str_replace("{link}","http://".$_SERVER['HTTP_HOST']."/index.php?control=user&task=verify&id=".$newuserid."&token=".$token,$message);
					
						if($this->mailsend($_REQUEST['email'], EMAILFROM, $subject, $message)) {
							
							session_start();
							
							$_SESSION['error'] = "You are successfully registered to iDive Trip. An Email is sent to your E-mail Id to verify your acount.";
							$this->getUserPoints('join_point',$newuserid);
							
						}
						else {
						
							session_start();
							$_SESSION['error'] = "Registration failed due to some error. Please try again later.";
							$_SESSION['errorclass'] = "warn_red";
							
						}
				}
				else {
					session_start();
					$_SESSION['error'] = "Registration failed due to some error. Please try again later.";
					$_SESSION['errorclass'] = "warn_red";
					
				}
				header("location:index.php");
			}
		}
		
		function createtoken($id,$type=NULL) {
			if($type) {
				return $this->token = time().$id;
			}
			else {
				$this->token = "control=user&view=user&task=verify&id=".$id;
			return base64_encode($this->token);
			}
		}
		function createpassword($pwd,$name) {
			$pwd = date("i:s").$pwd;
			return substr(strtolower(md5($pwd)),0,6);
		}
		function mailsend($to,$from=NULL,$subject=NULL,$message=NULL,$text=NULL) {
			
			$from = $from?$from:EMAILFROM; //$fromMail;//
			$subject = $subject?$subject:"iDive Trip"; 
			$subject1 = $subject."  ".$text." "; 
			$message = $message?$message:"<a href=".$this->token.">Click here to varify your account</a>";
			//////////////////////////////////////////////////
			
			 
			 
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'To: '. $to. "\r\n";
			$headers .= 'From: '.$subject.'    <'.$from.'>' . "\r\n";
			 
			$ok = @mail($to, $subject1, $message, $headers); 
			if ($ok) { 
				return true;
			} else { 
				return false;
			} 	
		}
		function verify() {
			
			$id = $_REQUEST['id'];
			$token = $_REQUEST['token'];
			$query = "SELECT * FROM users WHERE id = '".$id."' AND token = '".$token."'";
			$this->Query($query);
			$results = $this->fetchArray();
			if($results) {
				//$newpwd = $this->createpassword($results[0]['id'],$results[0]['fname']);
				$q = "UPDATE users SET status = '1' , token = '' where id = '".$id."'";
				$this->Query($q);
				if($this->Execute()){
					session_start();
					$_SESSION['error'] = "Welcome to iDive Trip. You have successfully Verified.";
				}
				else {
					session_start();
					$_SESSION['error'] = "Sorry! You are not authorised to use this link";
					$_SESSION['errorclass'] = "warn_red";
				}
			} 
			else {
				session_start();
				$_SESSION['error'] = "Sorry! You are not authorised to use this link";
				$_SESSION['errorclass'] = "warn_red";
			}
			
			header("location:index.php");
		}	
		
		
		function changemypass() {
			
			//$email = $_REQUEST['email'];
			$token = base64_decode($_REQUEST['token']);
			$id = $_REQUEST['id'];
			if($token) {
			$queryss = "SELECT * FROM users WHERE id ='".$_REQUEST['id']."' AND token = '".$token."'"; 
			$this->Query($queryss);
			$datess = $this->fetchArray();
			
			
		     if(date("Y-m-d H:i:s")<= $datess[0]['exp_date_time']) {	
				require_once("views/".$this->name."/".$this->task.".php");
			   }
			   else {
				require_once("views/".$this->name."/".expired.".php");
			   }
			}
			else {
		      require_once("views/".$this->name."/".$this->task.".php");
			}
		}
		
		function updatePass(){
			
			$token = base64_decode($_REQUEST['token']);
			$id = $_REQUEST['id'];
			
			$querys = "SELECT * FROM users WHERE id ='".$_REQUEST['id']."' AND token = '".$token."'";      
			$this->Query($querys);
			$dates = $this->fetchArray();
			
			if(date("Y-m-d H:i:s")<= $dates[0]['exp_date_time']) {						
				$qr = "UPDATE users SET password = '".md5($_REQUEST['newpass'])."', token ='' WHERE id = '".$_REQUEST['id']."'";
				$this->Query($qr);
				$this->Execute();
				
				header("location:index.php?control=user&task=changemypass&msg=success");				
			}
			else {
				header("location:index.php?control=user&task=changemypass&token=".base64_encode($token)."&id=".$id."&msg=token");
			
			}			
		} 
		
			
		function myforgotpassword(){
				
			
			session_start();
		  $email = $_REQUEST['email'];
	    $chQuery = "SELECT * FROM users WHERE email = '".$_REQUEST['email']."'";
		$this->Query($chQuery);
	   // $num = $this->rowCount();
	    $results = $this->fetchArray();
		//echo '<pre>';
		//print_r($results);
		$token = strtotime(date("Y-m-d H:i:s")).rand();
		if($results){ 
			 $results[0]['username'];
			$qr = "update users set token = '".$token."',exp_date_time = '".date("Y-m-d H:i:s",mktime(date('H')+24,date('i'),date('s'),date('m'),date('d'),date('Y')))."' ,exp_status = '0'  where id = '".$results[0]['id']."'";
			$this->Query($qr);
			$this->Execute();
			
			
			 $query = "SELECT * FROM email_templates WHERE  status ='1' and type = 'Forget Password' and language_id='".$_SESSION['language_id']."'";
			$this->Query($query);
			$emails = $this->fetchArray();
			
			//echo $emails[0]['subject'];
			
			$url = "http://".$_SERVER['HTTP_HOST']."/idive/index.php?control=user&task=changemypass";
		    $url .= "&token=".base64_encode($token)."&success=success&id=".$results[0]['id'];
		
		    $to = $email;
			$from = "idive@gmail.com"; 
			$subject = $emails[0]['subject'];
			$message = $emails[0]['title']." ". $emails[0]['content']." <a href=".$url.">Click Here</a>";  
			
		
			
			//////////////////////////////////////////////////
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'To: '. $to. "\r\n";
			$headers .= 'From: '.$subject.' <'.$from.'>' . "\r\n";
			 
			$ok = @mail($to, $subject, $message, $headers); 
			if ($ok) { 
				session_start();
				session_destroy();	
				session_start();
				$_SESSION['error'] = "Please check your email and click on the link to reset your password.";
				header("location:index.php?control=user&task=forgotpass");
				
			} else { 
				session_start();
				session_destroy();	
				session_start();
				$_SESSION['error'] = "Sending failed! Please try again.";
				$_SESSION['errorclass'] = "warn_red";
				header("location:index.php?control=user&task=forgotpass");
				
			} 	
		
		}
		else { 
			session_start();
				session_destroy();	
				session_start();
			$_SESSION['error'] = "Email-Id is not registered yet.";
				$_SESSION['errorclass'] = "warn_red";
			header("location:index.php?control=user&task=forgotpass");	
		}
		
	} 
		 
		 
		 
	function mailsends($to,$from=NULL,$subject=NULL,$message=NULL) {
			
		$from = $from?$from:EMAILFROM; //$fromMail;//
		$subject = $subject?$subject:SUBJECTMAIL; 
		$message = $message?$message:"";
		//////////////////////////////////////////////////
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'To: '. $from. "\r\n";
		$headers .= 'From: '.$subject.' <'.$to.'>' . "\r\n";
		 
		$ok = @mail($to, $subject, $message, $headers); 
		if ($ok) { 
		
			return true;
		} else { 
			return false;
		} 	
	}
		
		
		function changepassword() {
			
			$email = $_REQUEST['email'];
			$message = $_REQUEST['message'];
			$alert = $_REQUEST['alert'];
			require_once("views/".$this->name."/".$this->task.".php");
		}
		
		function forgetpassword() {
			require_once("views/".$this->name."/".$this->task.".php");				
		}
		
		function forgotpass() {
			require_once("views/".$this->name."/".$this->task.".php");				
		}
		
		function checktoken() {
			if($_REQUEST['usertype']=="2") {
				$query = "SELECT * FROM users WHERE token = '".$_REQUEST['token']."' AND email = '".$_REQUEST['email']."'";
				$this->Query($query);
				if($this->rowCount()) {
					session_start();
					$message = VAILDTOKEN;
					$alert = 1;
					require_once("views/".$this->name."/resetpassword.php");
				}
				else {
					session_start();
					$message =INVAILDTOKEN;
					$alert = 2;
					require_once("views/".$this->name."/token.php");
				}
			}
			else if($_REQUEST['usertype']=="1") {
				$query = "SELECT * FROM providers WHERE token = '".$_REQUEST['token']."' AND email = '".$_REQUEST['email']."'";
				$this->Query($query);
				
				if($this->rowCount()) {
					session_start();
					$message = VAILDTOKEN;
					$alert = 1;
					require_once("views/".$this->name."/newpassword.php");
				}
				else {
					session_start();
					$message =INVAILDTOKEN;
					$alert = 2;
					require_once("views/".$this->name."/token.php");
				}
			}
			else {
				session_start();
				$message =INVAILDTOKEN;
				$alert = 2;
				require_once("views/".$this->name."/token.php");
			}
			
		}
		
		
		function resetpassword() {
			if(($_REQUEST['password']==$_REQUEST['confirm']) && ($_REQUEST['password'] && $_REQUEST['confirm'])) {
				
				$this->Query("update users set password = '".md5($_REQUEST['password'])."' where email = '".$_REQUEST['email']."'");
				if($this->Execute()) {	
					$message = PASSWORDCHANGE;
					$alert = 1;
					require_once("views/".$this->name."/resetpassword.php");
				}
			}
			else {
				$message = PASSWORDERROR;
				$alert = 3;
				require_once("views/".$this->name."/resetpassword.php");
			}
		}
		function newpassword() {
			if(($_REQUEST['password']==$_REQUEST['confirm']) && ($_REQUEST['password'] && $_REQUEST['confirm'])) {
				
				$this->Query("update providers set password = '".md5($_REQUEST['password'])."' where email = '".$_REQUEST['email']."'");
				if($this->Execute()) {	
					$message = PASSWORDCHANGE;
					$alert = 1;
					require_once("views/".$this->name."/newpassword.php");
				}
			}
			else {
				$message = PASSWORDERROR;
				$alert = 3;
				require_once("views/".$this->name."/newpassword.php");
			}
		}
		/* check email availability 
		for the service user signup*/
		function checkemailavailable() {
			$query = "SELECT *  FROM users WHERE email = '".$_REQUEST['email']."'";
			$this->Query($query);
			if($this->rowCount()) {
				return "NO";
			}
			else {
				return "YES";
			}
		}
		/* end functio check email availability 
		for the service user signup*/
		
		function unsubscribe() {
			
			$this->Query("select * from users p WHERE id = '".$_REQUEST['id']."' ");
			$users = $this->fetchArray();
			
			if($this->numRow()) {
				$query = "UPDATE users SET subscription = '0' WHERE id = '".$_REQUEST['id']."'";
				$this->Query($query);
				if($this->isExecute()) {
					session_start();
					$_SESSION['message'] = UNSUBSCRIBE;
					$_SESSION['alert'] = 1;
					header("location:index.php");
				}
				else {
					session_start();
					$_SESSION['message'] = ALREADYUNSUBSCRIBE;
					$_SESSION['alert'] = 2;
					header("location:index.php");
				}
			}
			
		}
		
		/* For new sign up page */
		function usersignup() {
			$this->Query("select * from confic WHERE id = '3' ");
			$results = $this->fetchArray();
			require_once("views/".$this->name."/usersignup.php");
		}
		/* For new sign up page end */
		function userlink() {
			$tokenmix = base64_decode($_REQUEST['val']);
			$token = explode("&",$tokenmix);
			$query = "SELECT * FROM users WHERE token = '".$token[0]."' AND email = '".$token[1]."' AND exp_date_time>='".date("Y-m-d H:i:s",mktime(date('H')-24,date('i'),date('s'),date('m'),date('d'),date('Y')))."'";
			$this->Query($query);
			if($this->rowCount()) {
				
				$query1 = "SELECT * FROM users WHERE exp_status = '0' AND email = '".$token[1]."'";
				$this->Query($query1);
				if($this->rowCount()) {
					$u_query = "UPDATE users SET exp_status = '1' , exp_date_time = '".date("Y-m-d H:i:s")."'  WHERE email = '".$token[1]."' ";
					$this->Query($u_query);
					$this->Execute();
					session_start();
					//$message = VAILDTOKEN;
					$message = "<div class='ad_search_pro' style='margin-left:20px;'>

                	<form name='forgotForm' method='post' action='index.php' onsubmit='return frmsbt();' >
                    	<div class='forgot_password' >
					<p id='msgtoppassword'></p>
                    		<table><tr><td><span  id='msgforgotpassword'></span></td></td><td width=500><input type='password' name='password' id='forgotpassword' class='input_forgot merg_for' placeholder='New Password'  /></td></tr>
                            <tr><td colspan=2 height=10></td></tr>
                    		<tr><td><span id='msgforgotconfirm' class='float:left;'></span></td><td><input type='password' name='confirm' id='forgotconfirm' class='input_forgot merg_for' placeholder='Confirm Password'  /></td></tr>
							</table>
							<br>
                   			<input type='submit' name='submit' value='' class='bt_submit' />
                   			<input type='hidden' name='control' value='user'  />
                   			<input type='hidden' name='task' value='fixpassword'  />
                   			<input type='hidden' name='email' value='".$token[1]."'  />
                   			<input type='hidden' name='tmpid' value=''  />
        			
				
						</div>
                    </form>
            	
                </div>";
					$alert = 1;
					$alert1 = 1;
					require_once("views/".$this->name."/user.php");
					
				}
				else {
						$query2 = "SELECT * FROM users WHERE exp_status = '1' AND exp_date_time > '".date("Y-m-d H:i:s",mktime(date('H')-2,date('i'),date('s'),date('m'),date('d'),date('Y')))."' AND email = '".$token[1]."'";
					$this->Query($query2);
					if($this->rowCount()) {
						session_start();
						//$message = VAILDTOKEN;
						$message = "<div class='ad_search_pro' style='margin-left:20px;'>

                	<form name='forgotForm' method='post' action='index.php' onsubmit='return frmsbt();' >
                    	<div class='forgot_password' >
					<p id='msgtoppassword'></p>
                    		<table><tr><td><span  id='msgforgotpassword'></span></td></td><td width=500><input type='password' name='password' id='forgotpassword' class='input_forgot merg_for' placeholder='New Password'  /></td></tr>
                            <tr><td colspan=2 height=10></td></tr>
                    		<tr><td><span id='msgforgotconfirm' class='float:left;'></span></td><td><input type='password' name='confirm' id='forgotconfirm' class='input_forgot merg_for' placeholder='Confirm Password'  /></td></tr>
							</table>
							<br>
                   			<input type='submit' name='submit' value='' class='bt_submit' />
                   			<input type='hidden' name='control' value='user'  />
                   			<input type='hidden' name='task' value='fixpassword'  />
                   			<input type='hidden' name='email' value='".$token[1]."'  />
                   			<input type='hidden' name='tmpid' value=''  />
        			
				
						</div>
                    </form>
            	
                </div>";
						$alert = 1;
					$alert1 = 1;
						require_once("views/".$this->name."/user.php");
						
					}
					else {
						session_start();
						$message ="<p>Oops! Sorry link has been expired.</p>";//INVAILDTOKEN;
						$alert = 2;
						require_once("views/".$this->name."/user.php");
					}
				}
			}
			else {
				session_start();
				$message ="<p>Oops! Sorry link has been expired.</p>";//INVAILDTOKEN;
				$alert = 2;
				require_once("views/".$this->name."/user.php");
			}
		}
		
		
		function fixpassword() {
			if($_REQUEST['password']==$_REQUEST['confirm']) {
				//echo $_REQUEST['password'];
				
				$query = "update users set password = '".md5($_REQUEST['password'])."' where email = '".$_REQUEST['email']."'";
				
				$this->Query($query);
				if($this->Execute()) {
					$this->Query("select fname from users where email = '".$_REQUEST['email']."'");
					$fname = $this->fetchArray();
					$query1 = "update users set token = '' where email = '".$_REQUEST['email']."'";
					
					$this->Query($query1);
					$this->Execute();
					//$message = PASSWORDCHANGE;
					$alert = 8;
					$subject = SUBJECTMAIL;
					$message1 .= "Dear ".$fname[0]['fname']."<br>";
					$message1 .= "Your password has now been successfully changed.<br><br>";
					$message1 .= "Your email : <bold>".$_REQUEST['email']."</bold><br><br>";
					$message1 .= "Password : <bold>".$_REQUEST['password']."</bold><br><br><br>";
					$message1 .= "Regards<br><br>";					
					$message1 .= "The Team <br /> TradeAllStars";
					
					if(!$this->mailsend($_REQUEST['email'], EMAILFROM, $subject, $message1, 'Password Change')) {
						$_SESSION['message'] .="<br>".PASSWORDSEND;
						$message = PASSWORDCHANGE;//VERIFIED;
						$_SESSION['alert']=2;
						$alert=2;
						$email = $_REQUEST['email'];
					}
					require_once("views/".$this->name."/user.php");
				}
			}
			else {
				$message = PASSWORDERROR;
				$alert = 3;
				require_once("views/".$this->name."/user.php");
			}
		}
		function sendtoken() {
			
			//echo $_REQUEST['usertype'];
			if($_REQUEST['usertype']=="1") {
				$query = "SELECT * FROM providers WHERE email = '".$_REQUEST['foemail']."'";
				$this->Query($query);
				$results = $this->fetchArray();
				if(count($results)) {
					$token = $this->createtoken($results[0]['id'],1);
					$subject = MAILSUBJECT;
					$message .= "Dear ".$results[0]['fname']."<br>";
					//$message .= "Your email id registered as provider usertype.<br><br>";
					$message .= "For change of password <a href=".SUBDOMAIN."/index.php?control=provider&task=userlink&val=".base64_encode($token."&".$_REQUEST['email']).">click here</a><br><br>";					
					$message .= "The Team <br /> TradeAllStars";
					
				}
				if($this->mailsend($results[0]['email'], EMAILFROM, $subject, $message, 'Password Recovery')) {
					
					$qr = "update providers set token = '".$token."',exp_date_time = '".date("Y-m-d H:i:s",mktime(date('H')+2,date('i'),date('s'),date('m'),date('d'),date('Y')))."' ,exp_status = '0'  where id = '".$results[0]['id']."'";
					
					$this->Query($qr);
					if($this->Execute()) {						
						session_start();
						$message = TOKENSEND;
						$alert = 1;
						require_once("views/provider/provider.php");
					}
					else {
						session_start();
						$message = TOKENSENDFAILED;
						$alert = 2;
						require_once("views/".$this->name."/provider.php");
					}
				} 
				else {
					
					$message = NOSUBSCRIBE;
					$alert = 2;
					require_once("views/".$this->name."/provider.php");
				}

			} 
			else if($_REQUEST['usertype']) {
				
				$query = "SELECT * FROM users WHERE email = '".$_REQUEST['femail']."'";
				$this->Query($query);
				$results = $this->fetchArray();
				if($results) {
					$token = $this->createtoken($results[0]['id'],1);
					$subject = FORGOTPASSWORDSUBJECT;
					$message .= "Dear ".$results[0]['fname'].",<br><br>";
					$message .= "To reset your password, simply click the link below. That will take you to a web page where you can create a new password.<br><br> <a href=".SUBDOMAIN."/index.php?control=user&task=userlink&val=".base64_encode($token."&".$_REQUEST['email']).">click here</a><br><br>";
					$message .= "The Team <br /> TradeAllStars";
					if($this->mailsend($results[0]['email'], EMAILFROM, $subject, $message)) {
						$qr = "update users set token = '".$token."',exp_date_time = '".date("Y-m-d H:i:s",mktime(date('H')+2,date('i'),date('s'),date('m'),date('d'),date('Y')))."' ,exp_status = '0' where id = '".$results[0]['id']."'";
						$this->Query($qr);
						if($this->Execute()) {						
							session_start();
							$message = TOKENSEND;
							$alert = 1;
							require_once("views/".$this->name."/user.php");
						}
					}
					else {
						session_start();
						$message = TOKENSENDFAILED;
						$alert = 2;
						require_once("views/".$this->name."/user.php");
					}
				}
				else {
					session_start();
					$message = NOSUBSCRIBE;
					$alert = 2;
					require_once("views/".$this->name."/user.php");
				}
			}
		}
	}