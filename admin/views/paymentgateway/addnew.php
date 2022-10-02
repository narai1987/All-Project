<?php 
//echo '<pre>';print_r($results);
?>


<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return paymentgateway()" enctype="multipart/form-data">
    
      <?php foreach($arrData['doctors'] as $result) { }  ?>
      <div class="detail_container ">
        <div class="head_cont">
          <h2 class="main_head">
            <table width="99%">
              <tr>
                <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
                  <?php if($results['content'][1]['id']=='') { echo "Add New Gateway Method"; } else {echo "Edit Gateway Method";} ?></td>
                <td></td>
              </tr>
            </table>
          </h2>
        </div>
        <div class="grid_container">
          <div class="main_collaps">
            <div style="padding:10px;">
              <table >
              
             
                  
              <tr>
                    <td><strong><em class="star_red">*</em> Gateway Name :</strong></td>
                    <td><input type="text" name="gateway" id="gateway" value="<?php echo $results['content']['gateway']; ?>" class="lang_box"/><br />
                      <span id="msggateway" style="color:red;" class="font"> </span></td>
                  </tr>
                <tr>
                  <td><strong><em class="star_red">* </em> Gateway Logo<?php echo $results['content']['upload'];?> :</strong></td>
                 <td>   <input type="file" name="logo" id="logo" value="" style="width:155px;"/>
                    <em>(image size 768x444)</em> <span id="msgimage" style="color:red;" class="font"> </span></td>
                </tr>
              </table>
            </div>
            <div id="accordion_data">
  
              <input type="hidden" name="control" value="paymentgateway"/>
              <input type="hidden" name="edit" value="1"/>
              <input type="hidden" name="task" value="save"/>
              <input type="hidden" name="id" id="idd" value="<?php echo $results['content']['id']; ?>"  />
              
                 <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
              <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
           
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button" type="submit"><strong>Submit</strong></button>
                  <button class="lang_button_re" type="reset" onclick="resetGateway()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />

          </div>
        </div>
    </div>
  </form>
</div>


<script type="text/javascript">
function isletter(txt)
{
	var iChars = "!@#$^&*+=[]\\\/{}|\":<>?0123456789";
	var chk	=1;
	for (var i = 0; i < txt.length; i++) {
    if (iChars.indexOf(txt.charAt(i)) != -1) {
   		chk=0;
        }
    }
	if(chk){
	return true;
	}else{
	return false;
	}
}
	

	
	
function paymentgateway(){ 

	var cnt = 1;
	var id=document.getElementById('idd').value;	
	var image = document.getElementById('logo').value;	
	var fzipLength = image.length;
	var fzipDot = image.lastIndexOf(".");
	var fzipType = image.substring(fzipDot,fzipLength);
	if(image) {	
		if((fzipType==".jpg")||(fzipType==".jpeg")||(fzipType==".gif")||(fzipType==".png")) {
		document.getElementById('msgimage').innerHTML = "";			
		}
		else {	
		cnt = 0;	
		document.getElementById('msgimage').innerHTML = "Invalid file format only (jpg,gif,png)";
		}
	}
	else {
		if(!id) {  
		cnt = 0;
		document.getElementById('msgimage').innerHTML = "Please upload Gateway logo";
	    }
		else {
			document.getElementById('msgimage').innerHTML = "";
		}
	
	}
	
		
	if(document.getElementById('gateway').value=='') {
	cnt = 0;	
	document.getElementById('msggateway').innerHTML="This field is required";
	
	}
	else if(!isletter(document.getElementById('gateway').value)) {
	cnt = 0;	
	document.getElementById('msggateway').innerHTML="Invalid Gateway name ";

	}
	else  {
	document.getElementById('msggateway').innerHTML="";

	}
	
		if(cnt==1){	
		return true;
		}else {	
		return false;
		}
		
}


function resetGateway()	
	{ 
	
	document.getElementById('msgimage').innerHTML = "";
	document.getElementById('msggateway').innerHTML="";
	
	}
	

</script>
