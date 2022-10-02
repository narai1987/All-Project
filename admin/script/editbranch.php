<?php 
 $_REQUEST['control'] = "company";
 $_REQUEST['task'] = "editbranch";
  $_REQUEST['id'] = $_REQUEST["id"];
  $_REQUEST['lngid'] = $_REQUEST["lngid"];
  $_REQUEST['cmpid'] = $_REQUEST["cmpid"];
require_once("../controller.php");
 ?>
  <?php 
    
               $i=0;
                foreach($results as $result) {
               $i++;
			   //echo $result['branch_email'];
			   
			   
				}
                ?>

 <!--<div class="popupClose" onclick="closepopup()"></div>-->

 <fieldset class="service_field" >
    
    <div class="service_head_p">
    <p>Edit Branch</p></div>
    
       
        <form  method="post" action="index.php" enctype="multipart/form-data" onsubmit="return add_branch_validation();">  
     
        <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
				
           <tr>
               <td align="right" width="30%" valign="top"><strong>Branch Name :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="branch_name" id="branch_name"  value="<?php echo $result['branch_name'];?>"/>
                <span id="msgbname" style="color:red;" class="font"></span>
              </td>  
                   
           </tr>	
            <tr>
               <td align="right" width="30%" valign="top"><strong>Branch Email :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="branch_email" id="branch_email" value="<?php echo $result['branch_email'];?>"/>          
                <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
                <input type="hidden" name="compId" id="compId" value="<?php echo $_REQUEST['cmpid']; ?>" />
                <input type="hidden" name="langId" id="langId" value="<?php echo $_REQUEST['lngid']; ?>" />
                  <span id="msgbranch_email" style="color:red;" class="font"></span> 
                <input type="hidden" name="control" value="company" />
                <input type="hidden" name="view" value="company" />
                <input type="hidden" name="task" value="savebranch" />
                </td>                    
                
            
           </tr>
           <tr>
               <td align="right" width="30%" valign="top"><strong>Mobile :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="mobile" id="mobile" value="<?php echo $result['mobile'];?>" maxlength="12"/>
                 <span id="msgmobile" style="color:red;" class="font"></span>
              </td>  
                   
           </tr>
             <tr>
               <td align="right" width="30%" valign="top"><strong>Phone :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="phone" id="phone" maxlength="12" value="<?php echo $result['phone'];?>"/>
                <span id="msgphone" style="color:red;" class="font"></span>
              </td>         
           </tr>
            <tr>
               <td align="right" width="30%" valign="top"><strong>Fax :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="fax" id="fax" maxlength="15" value="<?php echo $result['fax'];?>"/>
               <span id="msgfax" style="color:red;" class="font"></span>
              </td>         
           </tr>
          
           
           <tr>
               <td align="right" valign="top"><strong>Country :</strong></td>
                <td colspan="2">
                <?php  $sql = "select distinct(id),country from countries where language_id='".$_REQUEST['lngid']."'";
				        $data= mysql_query($sql);
					?>
               <select name="country_id" id="country_id" class="reg_txt">
                    <option value="" >Select Country</option>
					  
					<?php while($row=mysql_fetch_array($data)) { ?>
                          <option  value="<?php echo $row['id']; ?>" <?php if($row['id']==$result['country_id'])  {?> selected="selected" <?php } ?>><?php echo $row['country']; ?></option>
                        
                         
						  
					<?php	}  ?>
                    </select>
                
               <!-- <input type="text" class="regis_area" name="country_id" id="country_id"/>-->
                 <span id="msgcountry_id" style="color:red;" class="font"></span>
                </td> 
           </tr>
            <tr>
               <td align="right" valign="top"><strong>State :</strong></td>
                <td colspan="2">
                 <?php  $sqls = "select distinct(id),state from states where language_id='".$_REQUEST['lngid']."'";
				        $datas= mysql_query($sqls);
					?>
               <select name="state_id" id="state_id" class="reg_txt">
                    <option value="" >Select State</option>
					  
					<?php while($srow=mysql_fetch_array($datas)) { ?>
                          <option value="<?php echo $srow['id']; ?>" <?php if($srow['id']==$result['state_id'])  {?> selected="selected" <?php } ?>><?php echo $srow['state']; ?></option>
						  
					<?php	}  ?>
                    </select>
               <span id="msgstate_id" style="color:red;" class="font"></span>
                </td> 
           </tr>
             <tr>
               <td align="right" valign="top"><strong>City :</strong></td>
                <td colspan="2">
                 <?php  $csql = "select distinct(id),city from cities where language_id='".$_REQUEST['lngid']."'";
				        $cdatas= mysql_query($csql);
					?>
               <select name="city_id" id="city_id" class="reg_txt">
                    <option value="" >Select City</option>
					  
					<?php while($crow=mysql_fetch_array($cdatas)) { ?>
                          <option value="<?php echo $crow['id']; ?>" <?php if($crow['id']==$result['city_id'])  {?> selected="selected" <?php } ?>><?php echo $crow['city']; ?></option>
						  
					<?php	}  ?>
                    </select>
                     <span id="msgcity_id" style="color:red;" class="font"></span>
                 </td> 
           </tr>
           
              <tr>
               <td align="right" width="30%" valign="top"><strong>Street :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="street" id="street" value="<?php echo $result['street'];?>"/>
                <span id="msgstreet" style="color:red;" class="font"></span>
              </td>         
           </tr>
          
              <tr>
               <td align="right" width="30%" valign="top"><strong>Location :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="location" id="location" value="<?php echo $result['location'];?>"/>
                <span id="msglocation" style="color:red;" class="font"></span>
              </td>         
           </tr>
           
              <tr>
               <td align="right" width="30%" valign="top"><strong>Address :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="address" id="address" value="<?php echo $result['address'];?>"/>
                <span id="msgaddress" style="color:red;" class="font"></span>
              </td>         
           </tr>
           
           <tr>
                <td align="right"></td>
                <td colspan="2" >
             
                <!-- <input type="hidden" name="id" id="id" value="<?php echo $lid; ?>" />
                <input class="submit" type="button" value="Save" onclick="save_addbranch()" />-->
            <input class="lang_button" type="submit" value="Update" />
               
                </td>
            
            </tr>
                           
                  </table>
                  
            </form>
     </fieldset>
    