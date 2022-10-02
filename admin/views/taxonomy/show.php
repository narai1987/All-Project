<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>
<script type="text/javascript">
function changeTaxnLang(){

}
</script>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="75%" class="main_txt">Taxonomy</td>
            <td  align="right"><span>Language : </span></td>
            <td align="left"><form name="taxnlang" action="index.php?control=taxonomy" method="post">
                <?php  $sql = "select * from languages";
$data= mysql_query($sql);
?>
                <select name="language" id="language" class="reg_txt" onchange="javascript:document.forms['taxnlang'].submit();">
                  <?php while($language=mysql_fetch_array($data)) { ?>
                  <option value="<?php echo $language['id'];?>" <?php if($language['id']==$_SESSION['taxlanguage_id']){?> selected="selected" <?php }?>><?php echo $language['content'];?></option>
                  <?php } ?>
                </select>
              </form></td>
          </tr>
        </table>
        <div class="printed_pro">
          <form name="filterForm" id="filterForm" action="index.php" method="post">
            <table width="99%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%" align="right" valign="middle">Search :</td>
                <td width="30%" class="grd_pad"><input type="text" class="rec_searchInput left" name="search" id="search" value="<?php echo $_REQUEST['search'] ;?>" Placeholder="Type to filter..." style="width:80%;" onkeyup="changelag(this.id,'<?php echo $_SESSION['language_id']; ?>')" />
                  <button type="submit" class="record_search left"><?php echo $content[''];?></button></td>
                <td width="50%" align="right">Show entries :</td>
                <td class="grd_pad"><select name="filter" id="filter" class="reg_txt" onchange="paging1(this.value)">
                    <option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>>All</option>
                    <option value="2"<?php if($_REQUEST['tpages']=="2") {?> selected="selected"<?php }?> >2</option>
                    <option value="5"<?php if($_REQUEST['tpages']=="5") {?> selected="selected"<?php }?> >5</option>
                    <option value="10"<?php if($_REQUEST['tpages']=="10") {?> selected="selected"<?php }?>>10</option>
                    <option value="20"<?php if($_REQUEST['tpages']=="20") {?> selected="selected"<?php }?>>20</option>
                    <option value="50"<?php if($_REQUEST['tpages']=="50") {?> selected="selected"<?php }?>>50</option>
                    <option value="100"<?php if($_REQUEST['tpages']=="100") {?> selected="selected"<?php }?>>100</option>
                  </select></td>
              </tr>
            </table>
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
                <input type="hidden" name="defftask" id="defftask"/>
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
            <!--<input type="hidden" name="control" value="taxonomy"/>
<input type="hidden" name="view" value="show"/>
<input type="hidden" name="task" value="show"/>-->
          </form>
        </div>
      </h2>
    </div>
    <div class="grid_container">
      <?php //print_r($content);?>
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="5%" align="justify"><strong><?php echo $content['s._no'];?></strong></td>
          <td class="tr_haed bord_right" width="20%"><strong><?php echo $content['keyword'];?></strong></td>
          <td class="tr_haed bord_right" width="20%"><strong><?php echo $content['date'];?></strong></td>
          <td class="tr_haed bord_right" align="center" width="15%"><strong><?php echo $content['action'];?></strong></td>
        </tr>
        <?php
if($results) {
$i = (($page-1)*$tpages);
foreach($results as $result) {$i++;
	 ($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td align="justify"><?php echo $i;?></td>
          <td ><?php echo $result['content'];?></td>
          <td ><?php echo date("d-M-Y g:i A",strtotime($result['date_time']));?></td>
          <td  align="center">
          <!--<a href="index.php?control=taxonomy&task=delete&id=<?php echo $result['taxonomy_id']; ?>&page=<?php echo $_REQUEST['page']; ?>&tpages=<?php echo $_REQUEST['tpages']; ?>"  onclick="return confirm('Are you sure to delete this item ?');" title="Delete" >-->
            <a onclick="taxonomy_delete(<?php echo $result['taxonomy_id']; ?>)" style="cursor:pointer;" title="Delete">
          <img src="images/backend/del.png" alt="<?php echo $content['delete'];?>" /></a></td>
        </tr>
        <?php }
} else{?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data Not Found
            <?php //echo $content['data_not_found'];?>
            .</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <div class="pageIndex">
    <?php if($result['taxonomy_id']) {
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); 
}
else { 

}
?>
  </div>
</div>
<script type="text/javascript">
	var strThai= new String(224,"TIS-620");
</script> 
<script type="text/javascript">

function addTaxonomy() {
	alert('ppp');
document.getElementById("popdivid").innerHTML ='<p align="center" style="margin:50px 50px 50px 50px;" ><img src="images/ajax-loader.gif" /></p>';

		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
					marginZeroAuto();
				 editor();
                
			}
		}	
		//alert("gjh kh kjh");
		xmlhttp.open("GET","script/ajax.php?control=taxonomy&task=addTaxonomy",true);
		xmlhttp.send();
	
}

function editTaxonomy(id) {
document.getElementById("popdivid").innerHTML ='<p align="center" style="margin:50px 50px 50px 50px;" ><img src="images/ajax-loader.gif" /></p>';

		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				 
alert('sdjkfh');
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
					marginZeroAuto();
				 editor();
			}
		}
		//alert(id);
		xmlhttp.open("GET","script/ajax.php?control=taxonomy&task=addTaxonomy&id="+id,true);
		xmlhttp.send();
}


</script> 
<script type="text/javascript">
function isletter(txt)
{
	var iChars = "!@#$^&*()+=-[]\\\';,/{}|\":<>?0123456789";
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
	
function taxonomy()
{ 
	var cnt = 0;
	var keyword = document.getElementById('keyword').value;

	
  
	if(document.getElementById('keyword').value=='') {
		document.getElementById('msgkeyword').innerHTML="This field is required";
	}
	else if(!isletter(keyword)) {
		document.getElementById('msgkeyword').innerHTML="Invalid keyword";
	}
	else if(document.getElementById('keyword').value!='') {
		document.getElementById('msgkeyword').innerHTML="";
		cnt++;
	}
	
	if(cnt == 1){	
			return true;
		}else {	
			return false;
		}

}
</script> 
