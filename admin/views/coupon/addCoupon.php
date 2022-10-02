<script src="assets/viewJs/ViewValidation.js"></script>
<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />
<script src="assets/calender/newCal/jquery-1.9.1.js"></script>
<script src="assets/calender/newCal/jquery-ui.js"></script>
<script type="text/javascript">
jQuery.noConflict();
  jQuery(function($) {
    $( "#fromd" ).datepicker({
		dateFormat:"yy-mm-dd",	
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $( "#tod" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#tod" ).datepicker({
		dateFormat:"yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $( "#fromd" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
  </script>

<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return couponValidate('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
                <?php if($coupons[0]['id']=='') { echo "Add New Coupon"; } else {echo "Edit Coupon";} ?></td>
              <td></td>
            </tr>
          </table>
        </h2>
        <br />
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <div style="padding:10px; border:1px #f0f5ff solid; ">
            <table width="100%" cellpadding="5" cellspacing="5">
              <tr>
                <td width="22%"><strong>Coupon Category :</strong></td>
                <td><select name="category" id="category" >
                    <option value="1" <?php echo ($coupons[0]['coupon_category_id']=='1')?"selected":"";?>>Liveabords</option>
                    <option value="2" <?php echo ($coupons[0]['coupon_category_id']=='2')?"selected":"";?>>Daytrips</option>
                    <option value="3" <?php echo ($coupons[0]['coupon_category_id']=='3')?"selected":"";?>>Others</option>
                  </select>
                  <span id="msgfood_id" style="color:red;" class="font"> </span></td>
                <td align="right"> 
                  <a onclick="scheduleForCoupon(category.value)" style="cursor:pointer;" class="lang_button">Add&nbsp;Upcoming&nbsp;Trips </a></td>
                <td><span id="msgScId" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td valign="top"><strong><em class="star_red">*</em> Start Date :</strong></td>
                <td><input type="text" name="start_date" class="lang_box" id="fromd" readonly="readonly" value="<?php echo $coupons[0]['start_date'];?>"  />
                  <br />
                  <span id="msgfromd" style="color:red;" class="font"> </span></td>
                <td valign="top"><strong><em class="star_red">*</em> End Date :</strong></td>
                <td><input type="text" name="end_date" class="lang_box" id="tod" readonly="readonly" value="<?php echo $coupons[0]['end_date'];?>" />
                  <br />
                  <span id="msgtod" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td valign="top"><strong><em class="star_red">*</em> Discount :</strong></td>
                <td><input type="text" name="discount" id="discount" class="lang_box" maxlength="3" value="<?php echo $coupons[0]['discount'];?>"  />
                  <br />
                  <span id="msgdiscount" style="color:red;" class="font"> </span></td>
                <td valign="top"><strong><em class="star_red">*</em> Coupon Image:</strong></td>
                <td><input type="file" name="coupon_image" id="coupon_image"  />
                  <br />
                  <span id="msgcoupon_image" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td valign="top"><strong><em class="star_red">*</em> No of Coupon :</strong></td>
                <td><input type="text" name="no_of_coupon" id="no_of_coupon" class="lang_box"  maxlength="4" value="<?php echo $coupons[0]['no_of_coupon'];?>"  />
                  <br />
                  <span id="msgno_of_coupon" style="color:red;" class="font"> </span></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="4"><fieldset class="field_profile">
                    <legend>Coupon Type</legend>
                    <p>
                      <?php foreach($results['coupon_type'] as $coupontype) {?>
                      <input type="radio" name="coupon_type" id="coupon_type<?php echo $coupontype['id'];?>" value="<?php echo $coupontype['id'];?>" <?php echo ($coupons[0]['coupon_type_id']==$coupontype['id'])?"checked":"";?> />
                      <a title="<?php echo $coupontype['detail'];?>"><?php echo ucwords(str_replace("_"," ",$coupontype['coupon_type']));?></a>
                      <?php }?>
                    </p>
                    <p id="normal_coupon" > </p>
                  </fieldset></td>
              </tr>
            </table>
          </div>
          <div id="accordion_data">
            <?php //echo '<pre>'; print_r($results);
foreach($results['language'] as $language) {
	
?>
            <h3><?php echo $language['content'];?></h3>
            <div id="chlang<?php echo $language['id'];?>" style="border:1px solid #f0f5ff; border-top:none !important; margin-top:-3px;">
              <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
                <tr>
                  <td width="20%" align="right"><strong><em class="star_red">*</em> Title :</strong></td>
                  <td><input type="text" name="title<?php echo $language['id'];?>"   class="lang_box"  id="title<?php echo $language['id'];?>" value="<?php echo $det[$language['id']]['title']; ?>"   onkeyup="changelag(this.id,'<?php echo $language['id'];?>')" />
                    <span id="msgtitle<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                </tr>
                <tr>
                  <td width="20%" align="right"><strong><em class="star_red">*</em> Description :</strong></td>
                  <td><textarea name="description<?php echo $language['id'];?>"  class="lang_box"    id="description<?php echo $language['id'];?>" ><?php echo $det[$language['id']]['description']; ?></textarea>
                    <span id="msgdescription<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                </tr>
                
                
              </table>
            </div>
            <?php
}
?>
            <input type="hidden" name="control" value="coupon"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="save"/>
            <input type="hidden" name="schedule" id="schedule" value="<?php echo $schedule;?>"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $coupons[0]['id']; ?>"  />
            <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
            <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
          </div>
          <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
            <tr>
              <td width="70%">&nbsp;</td>
              <td align="center" ><button class="lang_button" type="submit"><strong>Submit</strong></button>
                <button class="lang_button_re" type="reset" onclick="resetCoupon()"><strong>Reset</strong></button></td>
            </tr>
          </table><br />

        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">

function numeric(sText)
{
 var ValidChars = "0123456789%,.";
 var IsNumber=true;	
 for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {			 
		 IsNumber = false;
         }
      }
  	 return IsNumber;
}

	
function couponValidate(str){ 

	var chk=1;
	var id=document.getElementById('idd').value;	
	
	if(document.getElementById('fromd').value == '') {
	chk = 0;
	document.getElementById('msgfromd').innerHTML ="This field is required";	
	}else {
	document.getElementById('msgfromd').innerHTML = "";
	}
	
	if(document.getElementById('tod').value == '') {
	chk = 0;
	document.getElementById('msgtod').innerHTML ="This field is required";	
	}else {
	document.getElementById('msgtod').innerHTML = "";
	}
	
	if(document.getElementById('discount').value == '') {
	chk = 0;
	document.getElementById('msgdiscount').innerHTML ="This field is required";	
	}else if(!numeric(document.getElementById('discount').value)) {
	chk = 0;
	document.getElementById('msgdiscount').innerHTML ="*Must be numeric only.";	
	}
	else {
	document.getElementById('msgdiscount').innerHTML = "";
	}
	
	if(document.getElementById("idd").value=='') {
			var image = document.getElementById('coupon_image').value;	
			var fzipLength = image.length;
			var fzipDot = image.lastIndexOf(".");
			var fzipType = image.substring(fzipDot,fzipLength);
			if(image) {
				//alert("hello");
				//cntmin ++;
				//cntmax = 9;
			
				if((fzipType==".jpg")||(fzipType==".jpg")||(fzipType==".gif")||(fzipType==".png")) {
					document.getElementById('msgcoupon_image').innerHTML = "";
					//cnt = 1;
					
				}
				else {	chk = 0;	
					document.getElementById('msgcoupon_image').innerHTML = "Invalid file format only (jpg,gif,png)";
				}
			}
			else {
					//alert("hfjhhjjh");
				if(!id) {  chk = 0;
				document.getElementById('msgcoupon_image').innerHTML = "Please upload an image";
				}
				else {
					document.getElementById('msgcoupon_image').innerHTML = "";
				//cnt = 1;
				}
			
			}
	}
	else {
		
		var image = document.getElementById('coupon_image').value;	
			var fzipLength = image.length;
			var fzipDot = image.lastIndexOf(".");
			var fzipType = image.substring(fzipDot,fzipLength);
			if(image) {
				//alert("hello");
				//cntmin ++;
				//cntmax = 9;
			
				if((fzipType==".jpg")||(fzipType==".jpg")||(fzipType==".gif")||(fzipType==".png")) {
					document.getElementById('msgcoupon_image').innerHTML = "";
					//cnt = 1;
					
				}
				else {	chk = 0;	
					document.getElementById('msgcoupon_image').innerHTML = "Invalid file format only (jpg,gif,png)";
				}
			}
			else {
					//alert("hfjhhjjh");
				if(!id) {  chk = 0;
				document.getElementById('msgcoupon_image').innerHTML = "Please upload an image";
				}
				else {
					document.getElementById('msgcoupon_image').innerHTML = "";
				//cnt = 1;
				}
			
			}
			
		
	}
	
	if(document.getElementById('no_of_coupon').value == '') {
	chk = 0;
	document.getElementById('msgno_of_coupon').innerHTML ="This field is required";	
	}else if(!numeric(document.getElementById('no_of_coupon').value)) {
	chk = 0;
	document.getElementById('msgno_of_coupon').innerHTML ="*Must be numeric only.";	
	}else {
	document.getElementById('msgno_of_coupon').innerHTML = "";
	}
	
	if(document.getElementById('title'+str).value=='') {
	chk=0;	
	document.getElementById('msgtitle'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgtitle'+str).innerHTML="";
    }	
	
	if(document.getElementById('description'+str).value=='') {
	chk=0;	
	document.getElementById('msgdescription'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgdescription'+str).innerHTML="";
    }	
	
	
	if(document.getElementById('schedule').value=='') {
	chk=0;	
	document.getElementById('msgScId').innerHTML="Click here to Add Upcoming Trips";
	}else  {
	document.getElementById('msgScId').innerHTML="";
    }
	
    if(chk){	
	return true;
	}else {	
	return false;
	}
		
}




function resetCoupon()	
	{ 
	
	document.getElementById('msgfromd').innerHTML = "";
	document.getElementById('msgtod').innerHTML = "";
	document.getElementById('msgdiscount').innerHTML = "";
	document.getElementById('msgno_of_coupon').innerHTML = "";
	document.getElementById('msgtitle1').innerHTML="";
	document.getElementById('msgdescription1').innerHTML="";
	document.getElementById('msgcoupon_image').innerHTML = "";
	document.getElementById('msgScId').innerHTML="";
	}

</script> 
