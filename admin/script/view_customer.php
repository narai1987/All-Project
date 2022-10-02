<?php
$_REQUEST['control'] = "customer";
$_REQUEST['task'] = "view_customer";
$_REQUEST['id']= $_REQUEST["id"];

file_exists("../controller.php")?require_once("../controller.php"):(file_exists("../../controller.php")?require_once("../../controller.php"):require_once("controller.php"));
//foreach($results as $result) { }
?>

<fieldset class="service_field" >
    
    <div class="service_head_p">
    <p>View User Detail</p></div>
    
       
   
   <table width="70%" cellpadding="0" cellspacing="2" class="tab_regis"> 
   <tr>
      <td>
        <table>
			<?php 
            
            $i=0;
            foreach($results as $result) {
            $i++;
            ?>
				
      <tr valign="top">
        <td width="13%">
        <a> <?php if($result['image']) { ?>
        <img src="./../images/user/<?php echo $result['image'];?>" alt="avatar" class="img_avatar" /> <?php } else {?>
        <img src="./../images/user/3.png" alt="avatar" class="img_avatar" /><?php } ?>
        </a>
        </td>
     </tr>
     </table>
     </td>
     <td>
       <table  width="80%">
            <tr>
               <td align="right" width="40%"><strong>Name :</strong></td>
                <td colspan="2">
               <?php echo $result['fname'] ." ". $result['lname']; ?>
                
                </td>                    
                
            
           </tr>
        
             <tr>
               <td align="right" width="40%"><strong>Username :</strong></td>
                <td colspan="2">
                <?php echo $result['username']; ?>
               
              </td>         
           </tr>
           
           <!-- <tr>
               <td align="right" width="30%"><strong>Image :</strong></td>
                <td colspan="2">
               <?php echo $result['image']; ?>
              </td>         
           </tr>-->
           <tr>
               <td align="right"  width="40%"><strong>Mobile :</strong></td>
                <td colspan="2">
               <?php echo $result['mobile']; ?>
                 <div id="msgmobile"></div> 
                </td> 
           </tr>
            <tr>
               <td align="right"  width="40%"><strong>DOB :</strong></td>
                <td colspan="2">
               <?php echo $result['dob']; ?>
                </td> 
           </tr>
            <tr>
               <td align="right"  width="40%"><strong>Gender :</strong></td>
                <td colspan="2">
                <?php if($result['gender']==1) { echo "Male"; } else { echo "Female";}?>
             
               </td> 
           </tr>
          <!--<tr>
               <td align="right" valign="top"><strong>User Type :</strong></td>
                <td colspan="2">
                <?php echo $result['user_type'];?>
             
               </td> 
           </tr>-->
           <?php }?> 
           
                         
                  </table>
             </td>
             </tr>
          </table>
          
     </fieldset>