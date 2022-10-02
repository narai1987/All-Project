<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>  
 <?php 
    
                //$i=0;
                foreach($results as $result) {}
                //$i++;
                ?>
<!--<div class="left_content right">--><div class="left_content">
<div class="user_panel">  
<!--<div class="detail_right right">--><div class="detail_right">
<div class="iframe_container">
<div class="head_cont">
<h2 class="testimonial_s">
<table width="99%">
<tr>
<td width="60%">View Branch Detail</td> 
<td width="39%">
<form name="iframefilterForm" method="post" action="iframe.php" >
<span style="font-size:12px;">Show entries :</span>
<select name="iframefilter" class="reg_txt" id="iframefilter" onchange="iframepaging1(this.value)">
<option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>>All</option>
<option value="2"<?php if($_REQUEST['tpages']=="2") {?> selected="selected"<?php }?> >2</option>
<option value="5"<?php if($_REQUEST['tpages']=="5") {?> selected="selected"<?php }?> >5</option>
<option value="10"<?php if($_REQUEST['tpages']=="10") {?> selected="selected"<?php }?>>10</option>
<option value="20"<?php if($_REQUEST['tpages']=="20") {?> selected="selected"<?php }?>>20</option>
<option value="50"<?php if($_REQUEST['tpages']=="50") {?> selected="selected"<?php }?>>50</option>
<option value="100"<?php if($_REQUEST['tpages']=="100") {?> selected="selected"<?php }?>>100</option>
</select>
<input type="hidden" name="control" value="company"  />
<input type="hidden" name="view" value="company"  />
<input type="hidden" name="task" value="iframeBranch"  />
<input type="hidden" name="cid" id="cid" value="<?php echo $_REQUEST['cid'];?>"/>
<input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages'];?>"  />
<input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
<input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
<input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
</form></td>
<td><a href="#" class="button" onclick="addbranches('<?php echo $_REQUEST['cid'];?>','<?php echo $_SESSION['language_id']; ?>')"  ><img src="images/add_new.png" align="right"/></a></td>
</tr>
</table>
</h2>
</div>
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>

<td class="grd_sep tr_haed bord_left" width="6%" align="center"><strong>S.No.</strong></td>
<td class="grd_sep tr_haed" align="center" width="17%"><strong>Branch Name</strong></td>  
<td class="grd_sep tr_haed" align="center" width="17%"><strong>Branch Email</strong></td>  
<td class="grd_sep tr_haed"  align="center" width="15%"><strong>Mobile</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Location</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Address</strong></td>
<td class="grd_sep tr_haed" align="center"  width="8%"><strong>Action</strong></td>
</tr>
</table>
<div class="grid_container" id="mmm" style="height:370px; overflow:auto;">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<!--<tr>

<td class="grd_sep tr_haed bord_left" width="4%" align="center"><strong>S.No.</strong></td>
<td class="grd_sep tr_haed " width="15%"><strong>Branch Email</strong></td>  
<td class="grd_sep tr_haed " ><strong>Mobile</strong></td>    
<td class="tr_haed bord_right" align="center"><strong>Street</strong></td>
<td class="tr_haed bord_right" align="center"><strong>Location</strong></td>
<td class="tr_haed bord_right" align="center"><strong>Address</strong></td>
<td class="tr_haed bord_right" align="center"><strong>Action</strong></td>
</tr>-->


<?php  $countno = ($page-1)*$tpages;
$i=0; 
if(count($results)) {
	foreach($results as $data){ 
	$i++;
	 $countno++;
	 ($i%2==0)? $class="tr_line1 grd_pad" : $class="tr_line2 grd_pad"
	 
?>

<tr>
<td class="<?php echo $class; ?>" width="6%" align="center" > <?php echo $countno; ?> <input type="hidden" name="id" id="id" value="<?php echo $data['company_id'];?>"/> </td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['branch_name']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="17%" ><?php echo $data['branch_email']; ?> </td>
<td class="<?php echo $class; ?>" align="center" width="15%"><?php echo $data['mobile']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['location']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['address']; ?></td>

  <td class="<?php echo $class; ?>" align="center" width="8%">
   <a href="#" class="button" onclick="editbranch('<?php echo $data['id']; ?>','<?php echo $_SESSION['language_id']; ?>','<?php echo $data['company_id']; ?>')"><img src="images/edit.png" alt="edit" title="Edit" /></a>
                
                <a href="index.php?control=company&task=branch_delete&id=<?php echo $data['id']; ?>&company_id=<?php echo $data['company_id']; ?>" onclick="return confirm('Are you sure you want to Delete ')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a>
                </td>
</tr>

<?php }
			 } else { ?>
             
              <tr>
             
              
                <td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data Not found.</strong></td>
                </tr>
                  <?php } //}?>
</table>
</div>
<br />

<?php if(count($results)>0){ ?>
<div class="pageIndex">
<?php
include("iframepagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
</div>
<?php } ?>
</div>
</div>
</div>
      
</div>




   <!--PopUp Starts-->
    <div class="popupContent popupContent_service" style="width: 72%;">
    <div class="pop_log_bg">
        <div class="popupClose"></div>
             
              <div id="addnew_branchpopup">
       
          
           
             
                
                </div>
            
         <!-- <div id="addnew_branchpopup" style="position:absolute; display:none;border:6px solid #000; top:-10px; width:80%; background: none repeat scroll 0 0 #FFFFFF; border-radius: 15px 15px 15px 15px;" >-->
        
        </div>
     
      </div>
  </div>
  
<script type="text/javascript">
  
  function isletter(txt)
{
	var iChars = "!@#$^&*()+=-[]\\\';,./{}|\":<>?0123456789";
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

function isEmail(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}

function numeric(sText)
{
 var ValidChars = "0123456789,.";
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



function add_branch_validation()
{  
	
   
	var chk=1;
	if(document.getElementById('branch_name').value == '') { 
	document.getElementById('msgbname').innerHTML ="*Required field.";
	document.getElementById('msgbname').className ="error-message";
	chk=0;
	}else { 
	document.getElementById('msgbname').innerHTML ='';
	document.getElementById('msgbname').className ="";
	}
	if(document.getElementById('branch_email').value == '') { 
	document.getElementById('msgbranch_email').innerHTML ="*Required field.";
	document.getElementById('msgbranch_email').className ="error-message";
	chk=0;
	}else if(!isEmail(document.getElementById('branch_email').value)){ 
	document.getElementById('msgbranch_email').innerHTML ="*Invalid email-id.";
	document.getElementById('msgbranch_email').className ="error-message";
	chk=0;	
    }else { 
	document.getElementById('msgbranch_email').innerHTML ='';
	document.getElementById('msgbranch_email').className ="";
	}
	
	if(document.getElementById('mobile').value == '') { 
	document.getElementById('msgmobile').innerHTML ="*Required field.";
	document.getElementById('msgmobile').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('mobile').value)){ 
	document.getElementById('msgmobile').innerHTML ="*Must be number only.";
	document.getElementById('msgmobile').className ="error-message";
	chk=0;	
    }else { 
	document.getElementById('msgmobile').innerHTML ='';
	document.getElementById('msgmobile').className ="";
	}
	
  if(document.getElementById('phone').value == '') { 
	document.getElementById('msgphone').innerHTML ="*Required field.";
	document.getElementById('msgphone').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('phone').value)){ 
	document.getElementById('msgphone').innerHTML ="*Must be number only.";
	document.getElementById('msgphone').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgphone').innerHTML = "";
	document.getElementById('msgphone').className ="";
	}
	
  if(document.getElementById('fax').value == '') { 
	document.getElementById('msgfax').innerHTML ="*Required field.";
	document.getElementById('msgfax').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('fax').value)){ 
	document.getElementById('msgfax').innerHTML ="*Must be number only.";
	document.getElementById('msgfax').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgfax').innerHTML = "";
	document.getElementById('msgfax').className ="";
	}
	
  if(document.getElementById('country_id').value == '') { 
	document.getElementById('msgcountry_id').innerHTML ="*Required field.";
	document.getElementById('msgcountry_id').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgcountry_id').innerHTML = "";
	document.getElementById('msgcountry_id').className ="";
	}
	
  if(document.getElementById('state_id').value == '') { 
	document.getElementById('msgstate_id').innerHTML ="*Required field.";
	document.getElementById('msgstate_id').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgstate_id').innerHTML = "";
	document.getElementById('msgstate_id').className ="";
	}	
	
	
  if(document.getElementById('city_id').value == '') { 
	document.getElementById('msgcity_id').innerHTML ="*Required field.";
	document.getElementById('msgcity_id').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgcity_id').innerHTML = "";
	document.getElementById('msgcity_id').className ="";
	}	
	
	
  if(document.getElementById('street').value == '') { 
	document.getElementById('msgstreet').innerHTML ="*Required field.";
	document.getElementById('msgstreet').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgstreet').innerHTML = "";
	document.getElementById('msgstreet').className ="";
	}
	
  if(document.getElementById('location').value == '') { 
	document.getElementById('msglocation').innerHTML ="*Required field.";
	document.getElementById('msglocation').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msglocation').innerHTML = "";
	document.getElementById('msglocation').className ="";
	}
		
  if(document.getElementById('address').value == '') { 
	document.getElementById('msgaddress').innerHTML ="*Required field.";
	document.getElementById('msgaddress').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgaddress').innerHTML = "";
	document.getElementById('msgaddress').className ="";
	}
	
	
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

</script>
