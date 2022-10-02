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
<td width="60%">View Report Detail</td> 
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
<td></td>
</tr>
</table>
</h2>
</div>
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>

<td class="grd_sep tr_haed bord_left" width="6%" align="center"><strong>S.No.</strong></td>
<td class="grd_sep tr_haed" align="center" width="17%"><strong>User Name</strong></td>  
<td class="grd_sep tr_haed" align="center" width="17%"><strong>Email</strong></td>  
<td class="grd_sep tr_haed"  align="center" width="15%"><strong>Contact</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Trip Name</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Trip Type</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Trip Status</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Start Date</strong></td>
<td class="grd_sep tr_haed" align="center"  width="17%"><strong>End Date</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>Payed Total</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>No Of Person</strong></td>
<td class="grd_sep tr_haed" align="center"  width="18%"><strong>No Of Child</strong></td>
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
<td class="<?php echo $class; ?>" width="6%" align="center" > <?php echo $countno; ?> </td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['fname']; ?><?php echo $data['lname']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="17%" ><?php echo $data['email']; ?> </td>
<td class="<?php echo $class; ?>" align="center" width="15%"><?php echo $data['mobile']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['trip_title']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['trip_type_id']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['trip_status']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['start_date']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="17%"><?php echo $data['end_date']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['grand_total']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['no_of_person']; ?></td>
<td class="<?php echo $class; ?>" align="center" width="18%"><?php echo $data['no_of_child']; ?></td>

 
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
      
        
        </div>
     
      </div>
  </div>
  
