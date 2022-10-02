 

<div class="detail_right right" style="float:none !important;">
<div class="detail_container" style="font-weight:normal;">


 <?php 
            
           /* $i=0;
            foreach($results as $result) {
            $i++;*/
			
			$i=0; 
//print_r($results);
if(count($results)) {
	foreach($results as $result){ 
		$i++;
		if($result['start_trip_datetime']<date("Y-m-d H:i:s") && $result['end_trip_datetime']>date("Y-m-d H:i:s")) {
			$status = "Running";
		}
		else if($result['start_trip_datetime']<date("Y-m-d H:i:s") && $result['end_trip_datetime']<date("Y-m-d H:i:s")) {
			$status = "Closed";
		}
		else {
			$status = "Coming Up";
		}
			
			
			
            ?>
          
   <div class="service_head_p">
                   <p><?php echo $results[0]['trip_title']." ".$results[0]['boat_name']." ".$results[0]['orign'];?> <span style="margin-left:10%;"><?php if($result['trip_price']!=0 && $result['trip_price']!="") { echo "Trip Price : " .$result['trip_price']." THB"; }?></span> <span style="margin-left:15%;"><?php if($result['grand_total']!=0 && $result['grand_total']!="") { echo "Grand Total : " .$result['grand_total']." THB"; }?></span></p></div>      
<fieldset class="fieldset" >
              
    
          
        
          <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
			
                <legend><h4>User Details</h4></legend>
                 <tr valign="top">
                 <td align="right"  width="18%"><strong> Applicant's Name : </strong></td>
                  <td colspan="2"> <?php echo $result['fname']." ".$result['lname']; ?>
                 </td>
                 <td align="right" ><strong> Username :</strong></td>
                 <td><?php echo $result['username']; ?> </td>
                         
                       
                 </tr>
                 <tr valign="top">
                 <td align="right"><strong> Email-ID : </strong></td>
                  <td colspan="2">
                   <?php echo $result['email']; ?>
                  </td>
                 <td align="right" ><strong> mobile : </strong></td>
                 <td><?php echo $result['mobile']; ?>    </td>         
                      
                 </tr>
                 <tr valign="top">
                 <td align="right"><strong> Date of Birth : </strong></td>
                  <td colspan="2"> <?php echo $result['dob']; ?>
                 </td>
                 
                 <td align="right"><strong> Gender : </strong></td>
                 <td><?php if($result['gender']==1) { echo "Male"; } else { echo "Female";}?></td>
                 </tr>
                 </table>
                 </fieldset> 
                 
                   
                 
                 
                 <fieldset class="fieldset" >
                 
                 <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                <legend><h4>Trips Detail</h4></legend>
                 
                    <tr valign="top">
                        <td align="right"  width="18%"><strong> Start Trip Datetime :</strong></td>
                        <td colspan="2"><?php  echo $result['start_trip_datetime'];?>
                        </td>
                        <td align="right"><strong> End Trip Datetime :</strong></td>
                        <td>
                        <?php  echo $result['end_trip_datetime'];?>
                        </td>        
                    </tr>
                    
                    <tr valign="top">
                        <td align="right"><strong> No. of Person :</strong></td>
                        <td colspan="2"><?php  echo $result['no_of_person'];?>
                        </td>
                        <td align="right"><strong> No. of Child :</strong></td>
                        <td>
                        <?php  echo $result['no_of_child'];?>
                        </td>        
                    </tr>

                    <tr valign="top">
                        <td align="right"><strong> Origin :</strong></td>
                        <td colspan="2">
                         <?php  echo $this->cityById($result['origin_id']);?>
                        </td>
                        <td align="right"><strong> Destination :</strong></td>
                        <td>
                        <?php  echo $this->cityById($result['destination_id']);?>
                        </td>        
                    </tr>
                    
                    
                    <tr valign="top">
                        <td align="right"><strong> Beverages :</strong></td>
                        <td colspan="2">
						<?php
                       $b=0;
                        foreach($bevresults as $bevresult) {
                        $b++;
                       echo $bevresult['beverage'].", ";
                        }?>
                        </td>
                        <td align="right"><strong> Foods :</strong></td>
                        <td>
                        <?php 
                       $f=0;
                        foreach($foodresults as $foodresult) {
                        $f++;
                       echo $foodresult['food']. ", ";
                        }?>
                        </td>        
                    </tr>
                    
                    <tr valign="top">
                        <td align="right"><strong> Boat Name :</strong></td>
                        <td colspan="2">
						<?php
                       $bt=0;
                        foreach($boatresults as $boatresult) {
                        $bt++;
                       echo $boatresult['boat_name'];
                        }?>
                        </td>
                        <td align="right"><strong> Trip Equipments :</strong></td>
                        <td>
                        <?php 
                       $eq=0;
                        foreach($equipresults as $equipresult) {
                        $eq++;
                       echo $equipresult['equipment']. ", ";
                        }?>
                        </td>        
                    </tr>
                    <tr valign="top">
                        <td align="right"><strong> Specification : </strong></td>
                        <td> <?php echo $result['specification']; ?></td>
                        
                        <td align="right"><strong>  </strong></td>
                        <td>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td align="right"><strong> Image : </strong></td>
                        <td><img src="<?php echo $result['image']; ?>" width="100" height="100" alt="image"/></td>
                        
                        <td align="right"><strong>  </strong></td>
                        <td> 
                        </td>
                    </tr>
                 </table>
                 </fieldset>
   
   
  
 
    <?php } }?>
</div>



      
</div>
