<?php
//print_r($companies);
?><script src="assets/viewJs/ViewValidation.js"></script>
<div class="left_content left">
<div class="user_panel">
<div class="detail_container ">
    <div class="head_cont">
    <h2 class="userIcon_grd">
    <table width="99%"><tr><td width="85%">Trips</td> 
    <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
    </tr>
    </table>
    </h2>
    </div>
    <div class="grid_container">
  <div class="main_collaps">
<form name="formBoat" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return tripValidate();" >
<div style="width:100%; height:auto;">
	<!--TOP TABING START HERE-->
    <div class='tab-container'>
         
        <fieldset><legend><strong>Trips For</strong></legend>
          <div id="lang0_1" class="pans">
           <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                        <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em>Choose Boat :</strong></td>
                        <td width="29%">
                        <select class="lang_box" name="boat_id" id="boat_id">
                        	<option value="" >Select Boat</option>
                            <?php foreach($boats as $b): ?>
                            <option value="<?php echo $b['boat_id']; ?>" <?php if($b['boat_id'] == $results['common']->boat_id){ ?> selected="selected" <?php } ?>><?php echo $b['boat_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                         <span id="msgboat_id" style="color:red;" class="font"></span>
                        </td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Type :</strong></td>
                        <td width="29%">
                        <select class="lang_box" name="trip_type_id" id="trip_type_id">
                        	<option value="" >Select Trip type</option>
                            <?php foreach($types as $t): ?>
                            <option value="<?php echo $t['id']; ?>" <?php if($t['id'] == $results['common']->trip_type_id){ ?> selected="selected" <?php } ?>><?php echo $t['trip_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                         <span id="msgtrip_type_id" style="color:red;" class="font"></span>
                        </td>
                        </tr>                          
                        <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Start Date :</strong></td>
                        <td width="29%">
                       <input class="lang_box" id="inputDate" readonly="readonly" value="<?php echo $results['common']->start_date?date("Y-m-d",strtotime($results['common']->start_date)):date("Y-m-d"); ?>" name="start_date"/></td>
                         <td align="right" width="20%"><strong><em class="star_red">*</em> End Date :</strong></td>
                        <td width="29%">
                        <input class="lang_box" id="inputDate2" readonly="readonly" value="<?php echo $results['common']->end_date?date("Y-m-d",strtotime($results['common']->end_date)):date("Y-m-d"); ?>" name="end_date"/>
                        </td>
                        </tr> 
                        <tr>
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Dives :</strong></td>
                        <td>
                        <input type="text" class="lang_box" name="no_of_dives" id="no_of_dives" value="<?php echo $results['common']->no_of_dives; ?>"/>    <span id="msgno_of_dives" style="color:red;" class="font"></span>                     
                        </td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Days :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="no_of_days" id="no_of_days" value="<?php echo $results['common']->no_of_days; ?>"/>
                          <span id="msgno_of_days" style="color:red;" class="font"></span> 
                        </td>
                      </tr>
                          <tr>
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Nights :</strong></td>
                        <td>
                        <input type="text" class="lang_box" name="no_of_nights" id="no_of_nights" value="<?php echo $results['common']->no_of_nights; ?>"/>    <span id="msgno_of_nights" style="color:red;" class="font"></span>                       
                        </td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Min Fee :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="trip_price" id="trip_price" value="<?php echo $results['common']->trip_price; ?>"/>
                           <span id="msgtrip_price" style="color:red;" class="font"></span>  
                        </td>
                       
                                            
                        </table>                    
  </div>
 
    
  </fieldset>
 
       
          <fieldset><legend><strong>Fuel Tank</strong></legend>
          <div id="lang0_1" class="pans">
           <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                       
                       <?php foreach($fuel_tanks as $tank): ?>
                        <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $tank['fuel_tank'] ?>  :</strong></td>
                        <td width="19%">
                       <input class="lang_box" id="fuel_tank<?php echo $tank['id'] ?>" value="<?php echo $tank['id'] ?>" name="fuel_tank<?php echo $tank['id'] ?>" type="checkbox" <?php if($results['tankdata'][$tank['id']]['fuel_tank_id']==$tank['id']){ ?> checked="checked" <?php } ?>/>
                        </td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%">
                        <select class="lang_box" name="ptype<?php echo $tank['id'] ?>" id="ptype<?php echo $tank['id'] ?>" onchange="checkFuelType<?php echo $tank['id'] ?>(this.value)">
                           
                            <option value="paid" <?php if($results['tankdata'][$tank['id']]['tank_price']!=0 || $results['tankdata'][$tank['id']]['tank_price']!=''){ ?> selected="selected" <?php } ?> >Paid</option>
                            <option value="free" <?php if($results['tankdata'][$tank['id']]['tank_price']==0 || $results['tankdata'][$tank['id']]['tank_price']==''){ ?> selected="selected" <?php } ?> >Free</option>
                        </select>
                        </td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%">
                        <input class="lang_box" id="fuelprice<?php echo $tank['id'] ?>" value="<?php echo $results['tankdata'][$tank['id']]['tank_price']?$results['tankdata'][$tank['id']]['tank_price']:'';?>" name="fuelprice<?php echo $tank['id'] ?>"/>
                        </td>
                        </tr>
                        <script type="text/javascript">
							  function checkFuelType<?php echo $tank['id'] ?>(value){
								  if(value != 'paid'){
									 document.getElementById("fuelprice<?php echo $tank['id'] ?>").value = ""; 
									 document.getElementById("fuelprice<?php echo $tank['id'] ?>").disabled = true;
								  }else{
									 document.getElementById("fuelprice<?php echo $tank['id'] ?>").disabled = false;
								  }
							  }
  </script>                                                 
                         <?php endforeach; ?>                    
                                      
                        </table>                    
  </div>
  
    
  </fieldset>
  
  <script type="text/javascript">
  function checkFuelType(value){
	  if(value == 'paid'){
	  }else{
	  }
  }
  </script>
  
  
          <fieldset><legend><strong>Diver</strong></legend>
          <div id="lang0_1" class="pans">
           <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                        <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em>Price for diver  :</strong></td>
                        <td width="19%">
                        <select class="lang_box" name="diver_price" id="diver_price">
                           
                            <option value="paid"  >Paid</option>
                            <option value="free"  >Free</option>
                        </select>
                      
                        </td>
                        
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%">
                        <input class="lang_box" id="fuelprice" value="" name="fuelprice"/>
                           <span id="msgfuelprice" style="color:red;" class="font"></span> 
                        </td>
                        </tr>                                                 
                       
                        <tr>
                        <td align="right" width="27%"><strong><em class="star_red">*</em>Price for kids below certain Age  :</strong></td>
                        <td width="21%">
                       <input class="lang_box" id="price_for_kids" value="<?php echo $results['common']->price_for_kids; ?>" name="price_for_kids"/>    <span id="msgprice_for_kids" style="color:red;" class="font"></span> 
                        </td>
                        
                        </tr>                          
                                      
                        </table>                    
  </div>
  
    
  </fieldset>

</div>
	<!--TOP TABING END HERE-->
</div>

<div id="accordion_data">
<?php
foreach($results1 as $language) {
?>
<h3><a href="#"><?php echo $language['content'];?></a></h3>
<fieldset >
<legend></legend>

<div  class="pans">
           <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                        <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Name :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="trip_title<?php echo $language['id'];?>" id="trip_title<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['trip_title'];?>"/>
                           <span id="msgtrip_title" style="color:red;" class="font"></span> 
                        </td>
                        
                        <td align="right" width="15%"><strong><em class="star_red">*</em> Trip Origin :</strong></td>
                        <td width="24%">
                        <input class="lang_box" id="origin<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['origin'];?>" name="origin<?php echo $language['id'];?>"/>
                          <span id="msgorigin" style="color:red;" class="font"></span> 
                        </td>
                        </tr>                                                 
                        <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em>Trip Destination  :</strong></td>
                        <td width="19%">
                       <input class="lang_box" id="destination<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['destination'];?>" name="destination<?php echo $language['id'];?>"/>
                         <span id="msgdestination" style="color:red;" class="font"></span> 
                        </td>
                        
                        </tr>                                                          
                        <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em>Trip Specification  :</strong></td>
                        <td width="25%">
                       <textarea rows="7" cols="60" class="lang_box" id="specification<?php echo $language['id'];?>" name="specification<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['specification'];?></textarea>
                         <span id="msgspecification" style="color:red;" class="font"></span> 
                       
                        </td>
                        
                        </tr>                       
                                      
                        </table>                    
  </div>

<!--<fieldset >
<legend><strong>Itinerary</strong></legend>
<div class="pans">
           <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                        <tr>
                        <td align="left" width="5%"><strong><em class="star_red">*</em> Name :</strong>
                        <br />
                        <input type="text" class="lang_box" name="itname1" id="itname1" value="<?php echo $results['common']->itname1; ?>"/></td>
                        
                        <td align="left" width="5%"><strong><em class="star_red">*</em> Arrival :</strong>
                        <br />
                        <input class="lang_box" id="inputDate3" value="" name="Arrival"/></td>
                       
                         <td align="left" width="5%"><strong><em class="star_red">*</em> Departure :</strong>
                        <br /><input type="text" class="lang_box" name="Departure" id="inputDate" value="<?php echo $results['common']->itname1; ?>"/></td>
                       
                        
                        <td align="left" width="5%"><strong><em class="star_red">*</em> No. Of Dive :</strong>
                        <br /><input class="lang_box" id="noofdives" value="" name="noofdives"/></td>
                       
                        <td align="left" width="15%"><strong><em class="star_red">*</em> Images :</strong>
                        <br /><input class="lang_box" id="images"  name="images" type="file" multiple/></td>
                        
                        </tr>                                                                   
                        <tr>
                        <td align="left" width="5%"><strong><em class="star_red">*</em> Name :</strong>
                        <br />
                        <input type="text" class="lang_box" name="itname1" id="itname1" value="<?php echo $results['common']->itname1; ?>"/></td>
                        
                        <td align="left" width="5%"><strong><em class="star_red">*</em> Arrival :</strong>
                        <br />
                        <input class="lang_box" id="inputDate" value="" name="Arrival"/></td>
                       
                         <td align="left" width="5%"><strong><em class="star_red">*</em> Departure :</strong>
                        <br /><input type="text" class="lang_box" name="Departure" id="inputDate" value="<?php echo $results['common']->itname1; ?>"/></td>
                       
                        
                        <td align="left" width="5%"><strong><em class="star_red">*</em> No. Of Dive :</strong>
                        <br /><input class="lang_box" id="noofdives" value="" name="noofdives"/></td>
                       
                        <td align="left" width="15%"><strong><em class="star_red">*</em> Images :</strong>
                        <br /><input class="lang_box" id="images"  name="images" type="file" multiple/></td>
                        
                        </tr>                                             
                                               
                                      
                        </table>                    
  </div>

</fieldset>-->	


</fieldset>	
  <?php } ?> 
  
 

</div>
<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
    <td width="70%">&nbsp;</td>
    <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
   <button class="lang_button_re" type="reset"><strong>Reset</strong></button>
    </td>
    </tr>    
</table>     
<input type="hidden" name="control" value="trip"/>
<input type="hidden" name="edit" value="1"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="idd" value="<?php echo $results['common']->id; ?>"  />   
</form>
  
</div>    
</div>   
</div>  
</div>
</div>



<script type="text/javascript">

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


function tripValidate()
{  
	
   
	var chk=1;
	if(document.getElementById('boat_id').value == '') { 
	document.getElementById('msgboat_id').innerHTML ="*Required field.";
	document.getElementById('msgboat_id').className ="error-message";
	chk=0;
	}else { 
	document.getElementById('msgboat_id').innerHTML ='';
	document.getElementById('msgboat_id').className ="";
	}
	
	if(document.getElementById('trip_type_id').value == '') { 
	document.getElementById('msgtrip_type_id').innerHTML ="*Required field.";
	document.getElementById('msgtrip_type_id').className ="error-message";
	chk=0;
	}else { 
	document.getElementById('msgtrip_type_id').innerHTML ='';
	document.getElementById('msgtrip_type_id').className ="";
	}
	
  if(document.getElementById('no_of_dives').value == '') { 
	document.getElementById('msgno_of_dives').innerHTML ="*Required field.";
	document.getElementById('msgno_of_dives').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('no_of_dives').value)){ 
	document.getElementById('msgno_of_dives').innerHTML ="*Must be numeric only.";
	document.getElementById('msgno_of_dives').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgno_of_dives').innerHTML = "";
	document.getElementById('msgno_of_dives').className ="";
	}
	
  if(document.getElementById('no_of_days').value == '') { 
	document.getElementById('msgno_of_days').innerHTML ="*Required field.";
	document.getElementById('msgno_of_days').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('no_of_days').value)){ 
	document.getElementById('msgno_of_days').innerHTML ="*Must be numeric only.";
	document.getElementById('msgno_of_days').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgno_of_days').innerHTML = "";
	document.getElementById('msgno_of_days').className ="";
	}
	
  if(document.getElementById('no_of_nights').value == '') { 
	document.getElementById('msgno_of_nights').innerHTML ="*Required field.";
	document.getElementById('msgno_of_nights').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('no_of_nights').value)){ 
	document.getElementById('msgno_of_nights').innerHTML ="*Must be numeric only.";
	document.getElementById('msgno_of_nights').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgno_of_nights').innerHTML = "";
	document.getElementById('msgno_of_nights').className ="";
	}
 
	
  if(document.getElementById('trip_price').value == '') { 
	document.getElementById('msgtrip_price').innerHTML ="*Required field.";
	document.getElementById('msgtrip_price').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('trip_price').value)){ 
	document.getElementById('msgtrip_price').innerHTML ="*Must be numeric only.";
	document.getElementById('msgtrip_price').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgtrip_price').innerHTML = "";
	document.getElementById('msgtrip_price').className ="";
	}
  if(document.getElementById('diver_price').value == 'paid') {
	  	
  if(document.getElementById('fuelprice').value == '') { 
	document.getElementById('msgfuelprice').innerHTML ="*Required field.";
	document.getElementById('msgfuelprice').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('fuelprice').value)){ 
	document.getElementById('msgfuelprice').innerHTML ="*Must be numeric only.";
	document.getElementById('msgfuelprice').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgfuelprice').innerHTML = "";
	document.getElementById('msgfuelprice').className ="";
	}
  }else {
	  
	document.getElementById('msgfuelprice').innerHTML = "";
	document.getElementById('msgfuelprice').className ="";
	
  }
 
	
  if(document.getElementById('price_for_kids').value == '') { 
	document.getElementById('msgprice_for_kids').innerHTML ="*Required field.";
	document.getElementById('msgprice_for_kids').className ="error-message";
	chk=0;
	}else if(!numeric(document.getElementById('price_for_kids').value)){ 
	document.getElementById('msgprice_for_kids').innerHTML ="*Must be numeric only.";
	document.getElementById('msgprice_for_kids').className ="error-message";
	chk=0;	
    }else {
	document.getElementById('msgprice_for_kids').innerHTML = "";
	document.getElementById('msgprice_for_kids').className ="";
	}
		
  if(document.getElementById('trip_title1').value == '') { 
	document.getElementById('msgtrip_title').innerHTML ="*Required field.";
	document.getElementById('msgtrip_title').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgtrip_title').innerHTML = "";
	document.getElementById('msgtrip_title').className ="";
	}
		
  if(document.getElementById('origin1').value == '') { 
	document.getElementById('msgorigin').innerHTML ="*Required field.";
	document.getElementById('msgorigin').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgorigin').innerHTML = "";
	document.getElementById('msgorigin').className ="";
	}
		
  if(document.getElementById('destination1').value == '') { 
	document.getElementById('msgdestination').innerHTML ="*Required field.";
	document.getElementById('msgdestination').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgdestination').innerHTML = "";
	document.getElementById('msgdestination').className ="";
	}
		
  if(document.getElementById('specification1').value == '') { 
	document.getElementById('msgspecification').innerHTML ="*Required field.";
	document.getElementById('msgspecification').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgspecification').innerHTML = "";
	document.getElementById('msgspecification').className ="";
	}
	
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

</script>