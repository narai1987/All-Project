<!--top login-->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix" >
         <div class="head_message">
        <table width="100%">
        <tr>
        <td width="24%" id="msgusertype"></td>
        <td width="32%" id="msgemail"></td>
        <td width="43%" id="msgpassword"></td>
        </tr>
        </table>
        </div>
			<form action="index.php" method="post" name="signinForm">
			<div class="left"  style="padding-top:15px;">
          
				<div class="select">
                    <select name="usertype" id="usertype">
                        <option value="0">User Type</option>
                        <option value="1">Provider</option>
                        <option value="2">User</option>
                    </select>
                </div>
			</div>
			<div class="left">
				<!-- Login Form -->
					
                    <input type="text" name="email" id="email" class="inputbox" onkeypress="chekright()" Placeholder="Email Address" />
                   
        			<div class="clear"></div>
					<!--<input type="submit" name="submit" value="Login" class="bt_login" />-->
					<a class="lost-pwd button" style="cursor:pointer;">Register Now !</a>
				
			</div>
			<div class="left">			
				<!-- Register Form -->
					  <input type="password" name="password" id="password" class="inputbox" onkeypress="chekright()" Placeholder="Password" />
                      
                      <div class="clear"></div>
					<!--<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="index.php?control=user&task=forgetpassword">Forgot your password?</a>-->
				<a class="lost-pwd" style="cursor:pointer;" onclick="loadforgot()">Forgot your password?</a>
			</div>
            <div class="left right">			
				<!-- Register Form -->
					<input type="button" name="submit" value="Sign In" class="bt_register" onclick="login()" />
				
			</div>
          <!--  <input type="hidden" name="control_old" value="<?php echo $control;?>"  />
            <input type="hidden" name="view_old" value="<?php echo $view;?>"  />
            <input type="hidden" name="task_old" value="<?php echo $task;?>"  />-->
            <input type="hidden" name="control" value="<?php echo $control;?>"    />
            <input  type="hidden"name="view"  value="<?php echo $view;?>"   />
            <input type="hidden" name="task"  value="login"  />
            <input type="hidden" name="tmpid"  value="<?php echo $tmpid;?>"  />
            </form>
            
            
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Contact us on 0400 939 868</li>
			<li class="sep">|</li>
            <li><div class="social">
            <a href="http://www.facebook.com/TradeAllStars" target="_blank"><img src="images/fb.png" alt="Facebook" /></a>
            <a href="http://www.twitter.com/TradeAllStars" target="_blank"><img src="images/tw.png" alt="Twitter" /></a>
            <a href="http://www.youtube.com/TradeAllStars" target="_blank"><img src="images/in.png" alt="LinkedIn" /></a>
             </div></li>
             
             <li class="sep">|</li>
				<?php if(!$_SESSION['login']) { ?>
			<li id="toggle">
                <a id="open" class="open" href="#"><strong>Log In</strong></a>
				
				<a id="close" style="display: none;" class="close" href="#"><strong>Hide &nbsp;&nbsp;</strong></a>			
			</li>
            
            
				<?php } else { ?> 
			<li>
               
				
                <a href="index.php"><strong><?php //echo $_SESSION['user'];?></strong></a>
                <a href="index.php?control=user&task=logout"><strong> Logout</strong></a>
              
				<a id="close" style="display: none;" class="close" href="#"><strong>Hide &nbsp;&nbsp;</strong></a>			
			</li>
              <?php } ?>
            
			<li class="right">&nbsp;</li>
            <li class="shop_bag" <?php if($_SESSION['usertype']==2) {?> onmouseout="bagpophide()" onmouseover="bagpopshow()"<?php }?>>
        
        <?php
		if($_SESSION['usertype']==2) {
			$query = "SELECT p.id provider_id,p.fname,p.lname,p.image,s.service,s.id service_id,so.hr_rate  FROM favorite f JOIN m_service s ON f.service_id = s.id JOIN providers p ON f.provider_id = p.id JOIN services_offered so ON (f.provider_id = so.provider_id and f.service_id = so.service_id ) WHERE f.user_id = '".$_SESSION['userid']."' AND f.status = '1' ";
			$db->Query($query);
			$db->fetchArray();
			?>
            <div class="left"><a><img src="template/sp_detail/images/bag.png" alt="bag" title="Wishlist" /></a></div>
        <div class="bag_list left">
		<!-- User wishlist data count-->
        	<a href="#" class="bag_item" id="fcount" title="<?php echo $db->numRow();?>">
        <?php
			echo $db->numRow();
		
		?>
        </a>
        <!-- User wishlist data count end-->
        <!--Bag popup start here-->
        
        <div class="bagpopup" id="bagpopud" style="margin-top:1px;">
        </div>
        <!--Bag popup end here-->
        </div>
        <?php
		}?>
      </li>
		</ul> 
	</div> <!-- / top -->
	
</div>
<!--top login Close-->
<!--Header-->
<div id="p_header">
<div id="header">
<div class="logo"><a href="index.php"><img src="images/logo.png"  /></a></div>
<div class="welcome_user right">
<?php if($_SESSION['login']) {
		$profileLink = $_SESSION['usertype']==1?"index.php?control=providersaccount&views=myprofile&task=myprofile&tmpid=5":"index.php?control=usersaccount&views=usersaccount&task=myprofile&tmpid=5";
	 ?>
      <span><?php if($_REQUEST['tmpid']!=5) {?><a href="<?php  echo $profileLink;?>">Welcome <?php echo $_SESSION['user'];?> </a><?php } else {?>Welcome&nbsp<?php  echo $_SESSION['user']; }?>
      </span>
	<?php  }
	  else { ?>
     <a style="text-decoration:none;">Welcome Guest!</a>
	  <?php } 
	  ?>  
     <!-- <a href="index.php?control=user&task=logout"><?php echo $_SESSION['user']?'Logout':'';?></a>-->
      </div>
</div>
</div>
<div class="pop_forgot" style="width:450px height:140px;">
	<div style="float:right;"><a class="popupCloseForgot"></a></div>
    <div class="service_field">
    <div class="service_head_p">
     <p>Forgot Password</p>
    <div class="providerbox">

			<div class="advance_prov">


				<div class="ad_search_pro" style="margin-top:20px;">
                	<form name="forgotForm" method="post" action="index.php" onsubmit="return validateFrm();" >
                    	<div class="forgot_password"  >
							<div style="padding-left:6px;">
                            	<span>User :&nbsp;</span><input type="radio" name="usertype" value="2" checked="checked"  /><span>&nbsp;&nbsp;&nbsp;  Provider :&nbsp;</span><input type="radio" name="usertype" value="1"  />
                            </div>
                    	<div id="msgfemail" class="left" style="padding-top:15px; width:6px;"></div><input type="text" name="femail" id="femail" class="input_forgot merg_for left" onkeypress="chekright()" Placeholder="Email Address" />
                   			<input type="submit" name="submit" value="" class="bt_submit left "  />
                   			<input type="hidden" name="control" value="user"  />
                   			<input type="hidden" name="task" value="sendtoken"  />
                   			<input type="hidden" name="tmpid" value=""  />
        			
				
						</div>
                    </form>
            	
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
<div class="backgroundPopupForgot"></div>
<script type="text/javascript">
function loadforgot() {
	loadPopupForgot();
	centerPopupForgot();
}
function isEmail2(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}
function validateFrm() {
	var ret = isEmail2(document.getElementById("femail").value);
	if(!ret) {
		document.getElementById("msgfemail").innerHTML = "*";
	}
	return ret;
}
</script>
<style type="text/css">
#msgfemail {
	 color:#F00 !important; /*
	 float:left;
	 margin-top:15px;
	 margin-left:-6px;*/
}
</style>
<?php
//include_once("include/forgot.php");
?>
<!--Header Close-->