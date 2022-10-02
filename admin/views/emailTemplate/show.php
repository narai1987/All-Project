<link rel="stylesheet" type="text/css" href="assets/popup/css/reveal.css" media="all" />
<script type="text/javascript" src="assets/popup/js/jquery.reveal.js"></script>

<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="60%" class="main_txt">E-mail Templates </td>
            <td align="center"><form name="filterForm" id="filterForm" method="post" action="index.php" >
                <span style="font-size:12px;">Show entries :</span>
                <select name="filter" class="reg_txt" id="filter" onchange="paging1(this.value)">
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
               
                <input type="hidden" name="defftask" id="defftask"  />
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
              </form></td>
            <td><a href="index.php?control=emailTemplate&task=addnew" ><img src="images/add_new.png" /></a></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container" id="mmm">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="7%" align="center"><strong>S.No.</strong></td>
          <td class="tr_haed bord_right" width="12%" align="center"><strong>Type</strong></td>
          <td class="tr_haed bord_right " width="20%" align="center"><strong>Title</strong></td>
          <td class="tr_haed bord_right" width="30%" align="center"><strong>Subject</strong></td>
          <!--<td class="grd_sep tr_haed " width="30%" align="center"><strong>Content</strong></td> -->
          <td class="tr_haed bord_right" width="12%" align="center"><strong>Action</strong></td>
        </tr>
        <?php  $countno = ($page-1)*$tpages;
$i=0; 
if(count($contents)) {
	foreach($contents as $content){ 
	$i++;
	 $countno++;
	 ($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td  width="7%" align="center"><?php echo $countno; ?></td>
          <td  width="12%" align="center"><?php echo $content['type']; ?></td>
          <td  width="20%" align="center"><?php echo $content['title']; ?></td>
          <td  width="30%" align="center"><?php echo substr(strip_tags($content['subject']),0,50); ?>...</td>
          <!--<td  width="30%" align="center"><?php echo substr(strip_tags($content['content']),0,50); ?>...</td>-->
          <td  width="12%" align="center"><a style="cursor:pointer;" onclick="fabricajax('<?php echo $content['id'] ; ?>');"><img src="images/zoom.png" alt="view" title="Preview template" /></a> 
       <!--   <a href="index.php?control=emailTemplate&task=addnew&id=<?php echo $content['id'] ; ?>">-->
           <a onclick="emailTemplate_edit(<?php echo $content['id']; ?>)" style="cursor:pointer;">
          <img src="images/edit.png" alt="edit" title="Edit" /></a>
            <?php if($content['status']) {?>
            <!--<a href="index.php?control=emailTemplate&view=emailTemplate&task=status&id=<?php echo $content['id']; ?>&status=0&type=<?php echo $content['type']; ?>" > --><a onclick="emailTemplate_status(<?php echo $content['id']; ?>,0)" style="cursor:pointer;" title="Click to Unpublish">
            <img src="images/backend/check.png" title="Click to Deactive"/> </a>
            <?php } else { ?>
            <?php ?>
     <!--  <a href="index.php?control=emailTemplate&view=emailTemplate&task=status&id=<?php echo $content['id']; ?>&status=1&type=<?php echo $content['type']; ?>" > -->
     <a onclick="emailTemplate_status(<?php echo $content['id']; ?>,1)" style="cursor:pointer;" title="Click to Publish">
     <img src="images/backend/check_de.png" title="Click to Active"/> </a>
            <?php } ?>
            <?php if($content['status']!=1) { ?>
           <!-- <a href="index.php?control=emailTemplate&task=delete&id=<?php echo $content['id']; ?>" onclick="return confirm('Are you sure you want to Delete ')" >-->
             <a onclick="emailTemplate_delete(<?php echo $content['id']; ?>)" title="Delete"  style="cursor:pointer;">
            <img src="images/backend/del.png" alt="Delete" title="Delete" /></a>
            <?php } ?></td>
        </tr>
        <?php } }else{ ?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="5" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($contents)>0){ ?>
    <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  <?php } ?>
  
  
  <a href="#" id="popupid" data-reveal-id="myModal"></a> </div>

<!--popup-->

<div id="myModal" class="reveal-modal">
  <div style="float:right; width:100%;">
    <div class="news_title_pop">Template Preview</div>
    <br />
    <div>
      <p id="cartajaxdata">This is a default modal in all its glory, but any of the styles here can easily be changed in the CSS.</p>
    </div>
    <a class="close-reveal-modal"><img src="images/close2.png" width="23" height="23" /></a> </div>
</div>
<script type="text/javascript" /> 
function fabricajax(id) {

	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	
		}

		xmlhttp.onreadystatechange=function(){		
			if (xmlhttp.readyState==4){				
			document.getElementById("cartajaxdata").innerHTML=xmlhttp.responseText;			
			document.getElementById("popupid").click();			
			}
		}
	xmlhttp.open("GET","ajax.php?control=emailTemplate&task=templateajax&id="+id,true);
	xmlhttp.send();	
} 


	</script> 
	