<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >> <!--<a class="active" href="index.php?control=myaccount&task=changePass">--><b><?php echo $taxonomy['newsletter'];?></b><!--</a>--></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading"><?php echo $taxonomy['monthly_e-news_letter'];?></div>
        <div class="my_account_cont">
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['subscribe_to_our_newsletter_and_get_exclusive_deals_you_wont_find_anywhere'];?>. 
			
			
            </p>
             <form name="subscribe" action="index.php" method="post">
            <table class="account_form" width="100%" border="0" cellspacing="0" cellpadding="0">
             
              <tr>
                <td><input class="txt_box" name="email" id="email" placeholder="<?php echo $taxonomy['e-mail_id_here'];?>" type="text">
                <em id="msgmail" style="color:#F00;">
                <?php 
            		if($flag==1)
					echo '<span style="color:#093;">You have already subscribed.</span>';
					else if($flag==200)
					echo '<span style="color:#093;">Thanks, Your E-mail address has been added.</span>';
					else if($flag==-2)
					echo '<span style="color:#F00;">E-mail is not registered yet.</span>';
					else if($flag==-1) 
					echo  '<span style="color:#F00;">Please enter a valid E-mail Address.</span>';
			?>
                </em>
                </td>
              </tr>
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><!--<a class="account_btn" href="my_account.html">Back</a>--></td>
                    <td align="right"><a class="account_btn" onclick="checkVali()" style="cursor:pointer;"><?php echo $taxonomy['Subscribe'];?></a></td>
                  </tr>
                </table>
            </div>
            <input type="hidden" name="control" value="myaccount" />
            <input type="hidden" name="task" value="newssubscribe" />
            </form>
            </div>
            
          </div>
      </div> 
      <div class="right_panel">
      <?php include_once("includes/myaccountleftlink.php");?>
      </div>
       <div class="clr"></div>
    </div>
  </div>
  
  <script type="text/javascript">
  function checkVali(){
  var chk=1;
	if(document.getElementById('email').value == '') { 
	document.getElementById('msgmail').innerHTML ="*Required field.";
	chk=0;
	}else { 
	document.getElementById('msgmail').innerHTML ='';
	}
	
	
  if(chk) {	
	document.forms['subscribe'].submit();
	}
  }
  </script>