<div class="pop_feed">
	<a class="popupClose5"></a>							
    <div id="feed_popup">                
    	<fieldset class="service_field" >
                <div class="service_head_p"><p>What you think</p></div>
                
                <form action="index.php" name="feedForm" id="feedForm" method="post" onsubmit="return feedAdd();" >
                <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                  <tr>
                    <td align="right" valign="top"><strong> Title:</strong></td>
                    <td><input type="text" name="title" id="feedtitle" class="reg_txt" /></td><td><span id="feedtitlemsg"></span></td>  
                  </tr>  
                  <tr>
                    <td align="right" valign="top" width="24%"><strong>Comment :</strong></td>
                    <td valign="top"><textarea name="feed" id="feedtxt" rows="5" class="reg_txt" ></textarea></td><td valign="top"><span id="feedmsg" ></span></td> 
                  </tr>  
                   <tr>
                    <td ></td>
                    <td height="30"><button type="submit" name="submit" class="submit" ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;</strong></button>
                   
                    </td>
                  </tr>                
                  </table>
                  <input type="hidden" name="control" value="<?php echo $_REQUEST['control'];?>"  />
                  <input type="hidden" name="task" value="<?php echo $_REQUEST['task'];?>"  />
                  <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  /><!--
                  <input type="hidden" name="" value="<?php //echo $_REQUEST['control'];?>"  />
                  <input type="hidden" name="" value="<?php //echo $_REQUEST['control'];?>"  />-->
              </form>
          </fieldset>
     </div>
</div>
<div class="backgroundPopupfeed"></div>	