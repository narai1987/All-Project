<ul>
        <?php
		//print_r($taxonomy);
		 if($_SESSION['login']){ ?>
          <li><?php echo $taxonomy['welcome'];?>!  <?php echo $_SESSION['username']; ?></li>
          <li><a href="index.php?control=wishlist"><?php echo $taxonomy['wishlist'];?> (<span id="cwish"><?php echo $Wtotal; ?></span>)</a></li>
          <?php } ?>
          <li><a href="index.php?control=compare"><?php echo $taxonomy['compare'];?> (<span id="tcomp"><?php echo $Ctotal; ?></span>)</a></li>
          <?php if($_SESSION['login']){ ?>
          <li><a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a></li>
          <li class="last"> <a href="index.php?control=user&task=logout" class="login_popupk" title="logout"> <?php echo $taxonomy['logout'];?></a></li>
		  <?php }
		  else{ ?>
          <li class="last"><?php echo $taxonomy['welcome_visitor_you_can']?> <a href="#" class="login_popup" onclick="fieldblankValidate();"><?php echo $taxonomy['login'];?></a> or <a href="#" class="login_popup"  onclick="fieldblankValidate();"><?php echo $taxonomy['create_an_account']?></a>.</li>
          <?php } ?>
        </ul>
        
        
       <script type="text/javascript">
	   
	   
			function fieldblankValidate()
			{ // alert("Hello");
			document.getElementById('fname').value ='';
			document.getElementById('fname').className ="login_txt l_username";
			document.getElementById('msgfname').innerHTML ='';
			document.getElementById('lname').value='';
			document.getElementById('lname').className ="login_txt l_username";
			document.getElementById('msglname').innerHTML ='';
			document.getElementById('rusername').value = '';
			document.getElementById('rusername').className ="login_txt l_username";
			document.getElementById('msgrusername').innerHTML ='';
			document.getElementById('email').value = '';
			document.getElementById('email').className ="login_txt l_email";
			document.getElementById('msgemail').innerHTML = "";
			document.getElementById('rpassword').value = '';
			document.getElementById('rpassword').className ="login_txt l_password";
			document.getElementById('msgrpassword').innerHTML = "";
			document.getElementById('cpassword').value = '';
			document.getElementById('cpassword').className ="login_txt l_password";
			document.getElementById('msgcpassword').innerHTML = "";
			document.getElementById('mobile').value = '';
		    document.getElementById('mobile').className ="login_txt l_tel";
			document.getElementById('msgmobile').innerHTML ='';
			
			
			document.getElementById('username').value='';
			document.getElementById('password').value='';
			
			
			
			
			
			
			
			}
	   
	   </script>    
       