<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="55%" class="main_txt">Currencys</td>
            <td align="center"><form name="filterForm" id="filterForm" method="post" action="index.php"  >
                <span style="font-size:12px;">Show entries :</span>
                <select name="filter" id="filter" class="reg_txt" onchange="paging1(this.value)">
                  <option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>>All
                  <?php //echo $content['all'];?>
                  </option>
                  <option value="2"<?php if($_REQUEST['tpages']=="2") {?> selected="selected"<?php }?> >2</option>
                  <option value="5"<?php if($_REQUEST['tpages']=="5") {?> selected="selected"<?php }?> >5</option>
                  <option value="10"<?php if($_REQUEST['tpages']=="10") {?> selected="selected"<?php }?>>10</option>
                  <option value="20"<?php if($_REQUEST['tpages']=="20") {?> selected="selected"<?php }?>>20</option>
                  <option value="50"<?php if($_REQUEST['tpages']=="50") {?> selected="selected"<?php }?>>50</option>
                  <option value="100"<?php if($_REQUEST['tpages']=="100") {?> selected="selected"<?php }?>>100</option>
                </select>
                <input type="hidden" name="control" value="<?php echo $_REQUEST['control'];?>"  />
                <input type="hidden" name="view" value="<?php echo $_REQUEST['view'];?>"  />
                <input type="hidden" name="task" id="task" value="<?php echo $_REQUEST['task'];?>"  />
                <input type="hidden" name="tpages" id="tpages" value=""  />
                <input type="hidden" name="subs" id="subs" value=""  />
                <input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
                <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
                <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
                
                
                
                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="status" id="status"  />
                <input type="hidden" name="defftask" id="defftask" />
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
              </form></td>
            <td><a href="index.php?control=currency&task=addnew" class="button" ><img src="images/add_new.png"></a></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="5%" align="center"><strong>Sr.no.</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Currencys</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Sign Code</strong></td>
          <td class="tr_haed bord_right" align="center" width="15%"><strong><?php echo $content['action'];?></strong></td>
        </tr>
        <?php
	if($results) {
	$i = (($page-1)*$tpages);
	foreach($results as $result) {$i++;
			 ($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td  align="center"><?php echo $i;?></td>
          <td ><?php echo $result['currency'];?></td>
          <td ><?php echo $result['sign_code'];?></td>
          <td  align="center"><!--<a href="index.php?control=currency&task=addnew&id=<?php echo $result['id'] ; ?>" class="button"> -->
            <a onclick="currency_edit(<?php echo $result['id']; ?>)" style="cursor:pointer;" title="Edit">
          <img src="images/backend/edit.png" alt="setting_grd" title="Edit" /></a>
            <?php if($result['id']!='1'){ ?>
            <?php if($result['status']){  ?>
            <a href="index.php?control=currency&task=status&id=<?php echo $result['id'] ; ?>&page=<?php echo $_REQUEST['page']; ?>&tpages=<?php echo $_REQUEST['tpages']; ?>&status=0" title="Click to publish" >
           <!-- <a onclick="currency_status(<?php echo $result['id']; ?>)" style="cursor:pointer;" title="Click to Unpublish">>-->
            <img src="images/backend/check.png" alt="check_de" /></a>
            <?php }else{ ?>
            <a href="index.php?control=currency&task=status&id=<?php echo $result['id'] ; ?>&page=<?php echo $_REQUEST['page']; ?>&tpages=<?php echo $_REQUEST['tpages']; ?>&status=1" title="Click to unpublish" ><img src="images/backend/check_de.png" alt="check_de" /></a>
            <?php } ?>
            <?php } ?>
            <?php if($result['id']!='1'){ ?>
          <!--  <a href="index.php?control=currency&task=delete&id=<?php echo $result['id']; ?>&page=<?php echo $_REQUEST['page']; ?>&tpages=<?php echo $_REQUEST['tpages']; ?>"  onclick="return confirm('Are you sure you want to delete ?');" title="Delete" >-->
             <a onclick="currency_delete(<?php echo $result['id']; ?>)" style="cursor:pointer;" title="Delete">
            <img src="images/backend/del.png" alt="Delete" /></a>
            <?php } ?></td>
        </tr>
        <?php }
	} else{?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="6" align="center"><strong><?php echo $content['date_not_found'] ;?>.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($result)>0){ ?>
  <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  <?php } ?>
</div>
<script type="text/javascript">
	var strThai= new String(224,"TIS-620");
</script> 
<script type="text/javascript">

function addcurrency() {
document.getElementById("logindivid").innerHTML ='<p align="center" style="margin:50px 50px 50px 50px;" ><img src="images/ajax-loader.gif" /></p>';

		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				
					document.getElementById("logindivid").innerHTML=xmlhttp.responseText;
				 editor();
                
			}
		}	
		//alert("gjh kh kjh");
		xmlhttp.open("GET","script/currency/add_currency.php",true);
		xmlhttp.send();
	
}

function editcurrency(id) { 
document.getElementById("logindivid").innerHTML ='<p align="center" style="margin:50px 50px 50px 50px;" ><img src="images/ajax-loader.gif" /></p>';

		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				
					document.getElementById("logindivid").innerHTML=xmlhttp.responseText;
				 editor();
			}
		}
		//alert(id);
		xmlhttp.open("GET","script/currency/add_currency.php?id="+id,true);
		xmlhttp.send();
}


</script> 
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


	
function validation_currency(id)
{ 
	var cnt = 0;
	var content = document.getElementById('content').value;

	
  
	if(document.getElementById('content').value=='') {
		document.getElementById('msgcontent').innerHTML="This field is required";
	}
	else if(!isletter(content)) {
		document.getElementById('msgcontent').innerHTML="Invalid currency";
	}
	else if(document.getElementById('content').value!='') {
		document.getElementById('msgcontent').innerHTML="";
		cnt++;
	}
	
	
	var image = document.getElementById('image').value;
	
	var fzipLength = image.length;
	var fzipDot = image.lastIndexOf(".");
	var fzipType = image.substring(fzipDot,fzipLength);
	if(image) {
	  	//cntmin ++;
	    //cntmax = 9;
	
		if((fzipType==".jpg")||(fzipType==".jpg")||(fzipType==".gif")||(fzipType==".png")) {
			document.getElementById('msgimage').innerHTML = "";
			cnt++;
			
		}
		else {		
			document.getElementById('msgimage').innerHTML = "Invalid file format only (jpg,gif,png)";
		}
	}
	else {
		if(!id) { 
		document.getElementById('msgimage').innerHTML = "Please upload an image";
	    }
		else {
			document.getElementById('msgimage').innerHTML = "";
		cnt++;
		}
	
	}

	
	if(cnt == 2){	
			return true;
		}else {	
			return false;
		}

}
</script> 
