<?php 
 $_REQUEST['control'] = "company";
 $_REQUEST['task'] = "branch";
 $_REQUEST['cid'] = $_REQUEST["cid"];
require_once("../controller.php");
 ?>
 

 <?php 
    
                //$i=0;
                foreach($results as $result) {}
                //$i++;
                ?>
  
 <div class="service_head_p">
                   <p>View Branch Detail
                   <a class="button" onclick="addbranches('<?php echo $result['id']; ?>','<?php echo $_SESSION['language_id']; ?>')"  ><img src="images/add_new.png" align="right"/></a></p>
                   </div>   
                   
                    			 
                 <fieldset class="fieldset" >
                 <legend><h4>Branch Detail</h4></legend>
                 <table width="99%" cellpadding="0" cellspacing="2" class="tab_regis">
                 
                  
                 
                 <tr>
                   <th class="grd_sep tr_haed bord_left">S.No</th>
                   <th class=" grd_sep tr_haed" width="15%">Branch Email</th>
                   <th class=" grd_sep tr_haed">Mobile</th>
                   <th class=" grd_sep tr_haed">Street</th>
                   <th class=" grd_sep tr_haed">Location</th>
                   <th class=" grd_sep tr_haed">Address</th>
                   <th class=" grd_sep tr_haed">Action</th>
                   </tr>
      
     
               <?php //echo  $query_alls ="SELECT c.company,cba.*,ct.city,cont.country FROM  companies c JOIN company_branch_address cba ON c.id = cba.company_id JOIN countries cont ON cba.country_id = cont.id JOIN cities ct ON cba.city_id = ct.id WHERE c.id = '".$result['id']."' and c.language_id = '".$_SESSION['language_id']."' ORDER BY cba.id desc";
			   
			   
			    $query_alls ="SELECT * from companies c JOIN company_branch_address cba ON c.id = cba.company_id WHERE c.id = '".$result['id']."' and c.language_id = '".$_SESSION['language_id']."' ORDER BY cba.id DESC";
			  $sql   = mysql_query($query_alls);
			 $i =0;
			 $count = mysql_num_rows($sql);
		 if($count) {
			 while($data = mysql_fetch_array($sql)) { 
		 $i++;
		($i%2==0)? $class="tr_line1 grd_pad" : $class="tr_line2 grd_pad"
	?>
		
			   
                  
                <tr> 
                  <td class="<?php echo $class; ?>" align="center">  <?php echo $i; ?> </td>
                  <td class="<?php echo $class; ?>" align="center">  <?php echo $data['branch_email']; ?> </td>
                  <td class="<?php echo $class; ?>" align="center"> <?php echo $data['mobile']; ?> </td>
                  <td class="<?php echo $class; ?>" align="center"> <?php echo $data['street']; ?> </td>
                 <td class="<?php echo $class; ?>" align="center"> <?php echo $data['location']; ?> </td>
                 <td class="<?php echo $class; ?>" align="center"><?php echo $data['address']; ?></td>
                 <td class="<?php echo $class; ?>" align="center">
               
                <a class="button" onclick="editbranch('<?php echo $data['id']; ?>','<?php echo $_SESSION['language_id']; ?>','<?php echo $data['company_id']; ?>')"><img src="images/edit.png" alt="edit" title="Edit" /></a>
                
                <a href="index.php?control=company&task=branch_delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to Delete ')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a>
                 
                 
                 </td>
               </tr> 
             <?php }
			 } else { ?>
             
              <tr>
             
              
                <td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data Not found.</strong></td>
                </tr>
                  <?php } //}?>
             
    



                 
                 </table>
                
                 </fieldset>
        
   
   
            
  
 
 
    
  
   
