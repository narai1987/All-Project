<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <fieldset class="field_profile" >
    <legend>Search</legend>
    <form action="index.php" method="post">
      <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
        <tr>
          <td align="right" width="10%"><strong>Search : </strong></td>
          <td width="18%"><input type="text" class="lang_box" name="search" value="<?php echo $_REQUEST['search'] ;?>"   /></td>
          <td><button class="lang_button"><strong>Search</strong></button></td>
        </tr>
      </table>
      <input type="hidden" name="control" value="customer"/>
      <input type="hidden" name="view" value="show"/>
      <input type="hidden" name="task" value="search"/>
    </form>
  </fieldset>
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="55%" class="main_txt">Reviews</td>
            <td align="center"><form action="index.php"  method="post" name="filterForm" id="filterForm" >
                <span style="font-size:12px;">Show entries :</span>
                <select name="filter"  class="reg_txt" id="filter" onchange="paging1(this.value)">
                  <option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>>All</option>
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
                <input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
                <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
                <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
                
                
                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="status" id="status"  />
                <input type="hidden" name="defftask" id="defftask"   />
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
              </form></td>
            <!--<td><a href="#" onclick="delete_user()"><img src="images/Delete_all.png" /></a></td>
<td><a href="#" onclick="addUser()" class="button"><img src="images/add_new.png" /></a></td>--> 
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container" id="us">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="7%" align="center"><strong>S.No.</strong></td>
          <td class="tr_haed bord_right" width="10%"><strong>User Name</strong></td>
          <td class="tr_haed bord_right" width="13%"><strong>Trip Name</strong></td>
          <td class="tr_haed bord_right" width="15%"><strong>Trip Schedule</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Review</strong></td>
          <td class="tr_haed bord_right" width="10%"><strong>Rating</strong></td>
          <td class="tr_haed bord_right" width="15%"><strong>Date</strong></td>
          <td class="tr_haed bord_right" align="center"><strong>Action</strong></td>
        </tr>
        <?php
if($results) {
	$countno = ($page-1)*$tpages;
$i=0;
foreach($results as $result){ 
$i++;
$countno++;
($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td  align="center"><?php echo $countno; ?></td>
          <td ><?php echo $result['user_id'] ; ?></td>
          <td ><?php echo $result['trip_id'] ; ?></td>
          <td ><?php echo $result['trip_schedule_id'] ; ?></td>
          <td ><?php echo $result['review'] ; ?></td>
          <td ><?php echo $result['AVG(tra.rating)'] ; ?></td>
          <td ><?php echo $result['date_time'] ; ?></td>
          <td  align="center">
          
          <a onclick="review_detail('<?php echo $result['id']; ?>')" style="cursor:pointer;"><img src="images/backend/magni.png" title="Review Detail"/></a> 
           <?php if($result['status']) {?>
            <a onclick="active(<?php echo $result['id']; ?>,0)" style="cursor:pointer;"> <img src="images/backend/check_de.png" title="Click to Publish"/> </a>
            <?php }else {?>
            <a onclick="active(<?php echo $result['id']; ?>,1)" style="cursor:pointer;"> <img src="images/backend/check.png" title="Click to Unpublish"/> </a>
            <?php } ?>
            <a onclick="detete(<?php echo $result['id']; ?>)" title="Delete" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a>
            
            <?php } ?></td>
        </tr>
        <?php   }else{?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($results)>0){ ?>
    <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  <?php } ?>
</div>





<link rel="stylesheet" type="text/css" href="assets/popup/css/reveal.css" media="all" />
<script type="text/javascript" src="assets/popup/js/jquery.reveal.js"></script>

<a href="#" id="popupid" data-reveal-id="myModal"></a> </div>

<!--popup-->

<div id="myModal" class="reveal-modal">
  <div style="float:right; width:100%;">
    <div align="center" class="news_title_pop"><strong>Reviews</strong></div>
   
    <div>
      <p id="cartajaxdata">This is a default modal in all its glory, but any of the styles here can easily be changed in the CSS.</p>
    </div>
    <a class="close-reveal-modal"><img src="images/close2.png" width="23" height="23" /></a> </div>
</div>
<script type="text/javascript">
  
/*function review_detail(id)	{ 
	var xmlhttp;
	
	if (window.XMLHttpRequest) {
	  xmlhttp=new XMLHttpRequest();
	  }else{
	
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  { 
	  if (xmlhttp.readyState==4)
		{
		
		document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
			
		}
	  }
	  //alert(id);
	 
	xmlhttp.open("GET","script/review_detail.php?id="+id,true);
	xmlhttp.send();
}*/
function review_detail(id) {
	
	$('#cartajaxdata').html('<p align="center" style="padding-top:75px"><img src="../images/image.gif" width="50"/></p>');
	document.getElementById("popupid").click();
	
		//alert("gfhgf");
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("cartajaxdata").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("cartajaxdata").innerHTML="data not found...";
				}				
					
			}
		}
		//alert(cid);
		xmlhttp.open("GET","ajax.php?control=review&task=review_detail&id="+id,true);
		xmlhttp.send();
}	
  
  
  
  </script> 
