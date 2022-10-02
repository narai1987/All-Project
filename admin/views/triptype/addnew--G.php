<?php
//print_r($companies);
?><script src="assets/viewJs/ViewValidation.js"></script>
<div class="left_content left">
<div class="user_panel">
<div class="detail_container ">
    <div class="head_cont">
    <h2 class="userIcon_grd">
    <table width="99%"><tr><td width="85%">Trip Type</td> 
    <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
    </tr>
    </table>
    </h2>
    </div>
    <div class="grid_container">
  <div class="main_collaps">
<form name="formtriptype" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return formValidate();" >
<div style="width:100%; height:auto;">
	<!--TOP TABING START HERE-->
    <div class='tab-container'>
         
        <fieldset><legend><strong>Trip Type</strong></legend>
          
 <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                        <tr>
                        <td align="left" width="5%"><strong><em class="star_red">*</em>Trip Type  :</strong></td>
                        <td width="11%">
                       <input class="lang_box" id="trip_type" value="<?php echo $results->trip_type; ?>" name="trip_type" />
                        </td>
                        
                        </tr>                          
                                      
                        </table>
    
  </fieldset>

</div>
	<!--TOP TABING END HERE-->
</div>


<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
    <td width="70%">&nbsp;</td>
    <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
    <button class="lang_button_re">&nbsp; <strong>Reset</strong></button>
    </td>
    </tr>    
</table>     
<input type="hidden" name="control" value="triptype"/>
<input type="hidden" name="edit" value="1"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="idd" value="<?php echo $results->id; ?>"  />   
</form>
  
</div>    
</div>   
</div>  
</div>
</div>