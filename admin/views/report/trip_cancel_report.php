<link rel="stylesheet" type="text/css" href="assets/popup/css/reveal.css" media="all" />
<script type="text/javascript" src="assets/popup/js/jquery.reveal.js"></script>

<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>
<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />
<script src="assets/calender/newCal/jquery-1.9.1.js"></script>
<script src="assets/calender/newCal/jquery-ui.js"></script>
<script type="text/javascript">
jQuery.noConflict();
  jQuery(function($) {
    $( "#cancel_date" ).datepicker({
      dateFormat: "yy-mm-dd",
//changeMonth: true,
     // changeYear: true, 
	 
    });
  });
  
  </script>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="75%" class="main_txt">Trip Cancel Report</td>
            <td align="right"><p style="font-size:12px;">Download Report</p></td>
            <td align="right" >
            <a href="ajax.php?control=report&task=export_cancel&filter1=<?php echo $_REQUEST['filter1']; ?>&end_date=<?php echo $_REQUEST['end_date']; ?>&start_date=<?php echo $_REQUEST['start_date']; ?>"> <img src="images/excel.jpg" height="20" title="Download" /></a>
            <!--<a href="ajax.php?control=report&task=export_cancel"> <img src="images/excel.jpg" height="20" title="Download" /></a>  -->
            </td>
          </tr>
        </table>
        <div class="printed_pro">
          <form name="filterForm" method="post" action="index.php"  >
            <table width="99%" cellspacing="0" cellpadding="0" >
              <tr>
               <td align="right" ><strong>Search :</strong></td>
                 <!--<td width="15%" class="grd_pad"><select name="filter1" id="filter1" class="reg_txt" onchange="start()">
                    <option value=""<?php if($_REQUEST['filter1']=="") {?> selected="selected"<?php }?>>Report Order</option>
                    <option value="day"<?php if($_REQUEST['filter1']=="day") {?> selected="selected"<?php }?>>Daily</option>
                    <option value="week"<?php if($_REQUEST['filter1']=="week") {?> selected="selected"<?php }?>>Weekly</option>
                    <option value="month"<?php if($_REQUEST['filter1']=="month") {?> selected="selected"<?php }?>>Monthly</option>
                    <option value="half_year"<?php if($_REQUEST['filter1']=="half_year") {?> selected="selected"<?php }?>>Half Yearly</option>
                    <option value="year"<?php if($_REQUEST['filter1']=="year") {?> selected="selected"<?php }?>>Yearly</option>
                  </select></td>-->
                   <td><input type="text" name="search" id="search" value="<?php echo $_REQUEST['search']; ?>" style="width:100px; margin-left:30px;" class="reg_txt"  placeholder="Name, Email" /></td>
                <td><input type="text"  readonly="readonly" name="cancel_date" id="cancel_date" value="<?php echo $_REQUEST['cancel_date']; ?>" style="width:100px; margin-left:30px;" class="reg_txt"  placeholder="Cancel Trip Date" /></td>
               <!-- <td><input type="text"  readonly="readonly" name="end_date" id="endDate"  value="<?php echo $_REQUEST['end_date'];?>" style="width:100px;" class="reg_txt"  placeholder="End-Date" /></td>-->
                <td><img onclick="javascript:document.forms['filterForm'].submit();" src="images/go_search.gif" style="cursor:pointer;" /></td>
                <td width="15%" align="right">Show entries :</td>
                <td class="grd_pad"><select name="filter" id="filter" class="reg_txt" onchange="paging1(this.value)">
                    <option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>><?php echo $content['all'];?></option>
                    <option value="2"<?php if($_REQUEST['tpages']=="2") {?> selected="selected"<?php }?> >2</option>
                    <option value="5"<?php if($_REQUEST['tpages']=="5") {?> selected="selected"<?php }?> >5</option>
                    <option value="10"<?php if($_REQUEST['tpages']=="10") {?> selected="selected"<?php }?>>10</option>
                    <option value="20"<?php if($_REQUEST['tpages']=="20") {?> selected="selected"<?php }?>>20</option>
                    <option value="50"<?php if($_REQUEST['tpages']=="50") {?> selected="selected"<?php }?>>50</option>
                    <option value="100"<?php if($_REQUEST['tpages']=="100") {?> selected="selected"<?php }?>>100</option>
                  </select>
                  <input type="hidden" name="control" value="<?php echo $_REQUEST['control'];?>"  />
                  <input type="hidden" name="view" value="<?php echo $_REQUEST['view'];?>"  />
                  <input type="hidden" name="task" value="<?php echo $_REQUEST['task'];?>"  />
                  <input type="hidden" name="tpages" id="tpages" value=""  />
                  <input type="hidden" name="subs" id="subs" value=""  />
                  <input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
                  <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
                  <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  /></td>
              </tr>
            </table>
          </form>
        </div>
      </h2>
    </div>
    <div class="grid_container">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed" width="6%" align="center"><strong>Sr.no.</strong></td>
          <td class="tr_haed bord_left" ><strong>User Name</strong></td>
          <td class="tr_haed bord_left" ><strong>Email</strong></td>
          <td class="tr_haed bord_left" ><strong>Trip Title</strong></td>
          
          <td class="tr_haed bord_left" ><strong>Cancel Date</strong></td>
          <td class="tr_haed bord_left" ><strong>Payed Total</strong></td>
          <td class="tr_haed bord_left" ><strong>Trip Status</strong></td>
          <td class="tr_haed bord_left" ><strong>Action</strong></td>
        <!--  <td class="tr_haed bord_left" ><strong>No Of Person</strong></td>
          <td class="tr_haed bord_left" ><strong>No Of Child</strong></td>
          
          <td class="tr_haed bord_left"><strong>Contact</strong></td>
    <td class="tr_haed bord_left"><strong>Trip Name</strong></td>
    <td class="tr_haed bord_left"><strong>End Date</strong></td>
     <td class="tr_haed bord_left"><strong>Trip Type</strong></td>--> 
        </tr>
        <?php
	/*echo "<pre>";
	print_r($results);*/
	if($results) {
	$i = 0;
	foreach($results as $data) {$i++;
	 ($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td  align="center"><?php echo $i;?></td>
          <td ><?php echo $data['fname']; ?> <?php echo $data['lname']; ?></td>
          <td ><?php echo $data['email']; ?></td> 
           <td ><?php echo substr($data['trip_title'],0,22)."..."; ?></td>
          <td ><?php echo $data['cancel_date']; ?></td>
          <td ><?php echo $data['grand_total']; ?></td>
          <td ><?php if($data['cancel_status']==1){ echo "Cancel"; }else{ echo "Confirm";  } ?></td>
          <td ><?php if($data['cancel_status']==1){ ?>   <a onclick="refundAmount('<?php echo $data['id']; ?>')" > <img src="images/backend/branch_icon.png" alt="Delete" /></a><?php } else {?>
          <!--<strong>Cancel Completed</strong>-->
          <?php } ?>
          </td>
          <!--<td ><?php echo $data['no_of_person']; ?></td>
          <td ><?php echo $data['no_of_child']; ?></td>-->
          
          <!-- <td ><?php //echo $data['mobile']; ?></td>
      <td ><?php //echo $data['trip_title']; ?></td>
      <td ><?php //echo $data['end_date']; ?></td>
      <td ><?php //echo $data['trip_type_id']; ?></td>--> 
        </tr>
        <?php }
			}else{ ?>
        <tr>
          <td colspan="8" align="center" style="padding-top:5px;"><span style="color:#666;"><strong>No Report Found</strong></span></td>
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
  <a href="#" id="popupid" data-reveal-id="myModal"></a> </div>

<!--popup-->

<div id="myModal" class="reveal-modal">
  <div style="float:right; width:100%;">
    <div class="news_title_pop">Refund Amount</div>
    <br />
    <div>
      <p id="cartajaxdata">This is a default modal in all its glory, but any of the styles here can easily be changed in the CSS.</p>
    </div>
    <a class="close-reveal-modal"><img src="images/close2.png" width="23" height="23" /></a> </div>
</div>



<script type="text/javascript">
	var strThai= new String(224,"TIS-620");
</script> 
<script>
function start(){
document.getElementById('startDate').value="";
document.getElementById('endDate').value="";
}



function refundAmount(id) {
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
	xmlhttp.open("GET","ajax.php?control=report&task=refund&id="+id,true);
	xmlhttp.send();	
} 


</script> 



           
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
	

	
	
function refund(){ 

	var cnt = 1;
	/*if(document.getElementById('gatewaymethod').value=='') {
	cnt = 0;	
	document.getElementById('msggatewaymethod').innerHTML="This field is required";
	}else  {
	document.getElementById('msggatewaymethod').innerHTML="";
    }*/
	
	if(document.getElementById('refund_transaction_id').value=='') {
	cnt = 0;	
	document.getElementById('msgrefund_transaction_id').innerHTML="This field is required";
	}else  {
	document.getElementById('msgrefund_transaction_id').innerHTML="";
    }
	
	if(document.getElementById('amount').value=='') {
	cnt = 0;	
	document.getElementById('msgamount').innerHTML="This field is required";
	}else  {
	document.getElementById('msgamount').innerHTML="";
    }
		if(cnt){	
		return true;
		}else {	
		return false;
		}
		
}


function resetRefund()	
	{ 
	
	//document.getElementById('msggatewaymethod').innerHTML = "";
	document.getElementById('msgrefund_transaction_id').innerHTML="";
	document.getElementById('msgamount').innerHTML="";
	}
	

</script>
