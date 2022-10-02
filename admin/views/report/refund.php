<?php  /*echo '<pre>';
			print_r($results);*/?>
<form  method="post" action="index.php" onsubmit="return refund()">  
        
        <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
        
               <!--<tr>
                    <td align="right" width="30%" valign="top"><strong>Gateway Method :</strong></td>
                    <td colspan="2"><select class="lang_box" name="gatewaymethod" id="gatewaymethod">
                            <option value="" >Select Gateway</option>
                            <?php foreach($paymentgateways as $paymentgateway): ?>
                            <option value="<?php echo $paymentgateway['id']; ?>"><?php echo $paymentgateway['gateway']; ?></option>
                            <?php endforeach; ?>
                          </select><br />
                          <span id="msggatewaymethod" style="color:red;" class="font"></span></td>
                  </tr>-->
        
        
				
            <tr>
               <td align="right" width="30%" valign="top"><strong>Transaction ID :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="refund_transaction_id" id="refund_transaction_id"/><br />
                <span id="msgrefund_transaction_id" style="color:red;" class="font"></span> 
                
                </td>                    
                
            
           </tr>
           <tr>
               <td align="right" width="30%" valign="top"><strong>Amount :</strong></td>
                <td colspan="2">
                <input type="text" class="regis_area" name="amount" id="amount"/><br />
                <span id="msgamount" style="color:red;" class="font"></span> 
                
                </td>                    
                
            
           </tr>
           
           <tr>
                <td align="right"></td>
                <td colspan="2" align="right" style="padding-right:10px;">
                <button class="lang_button" type="submit"><strong>Submit</strong></button>
                <button class="lang_button_re" type="reset" onclick="resetRefund()"><strong>Reset</strong></button>

               <!-- <input class="lang_button"  type="submit" value="Save" />
                <input class="lang_button_re" type="reset" onclick="resetGateway()"/>-->
                <input type="hidden" name="control" value="report" />
                <input type="hidden" name="booking_id" id="booking_id" value="<?php echo $results[0]['id']; ?>" />
                <input type="hidden" name="txnid" id="txnid" value="<?php echo $results[0]['txnid']; ?>" />
                <input type="hidden" name="task" value="save_refund_amount" />
                </td>
            
            </tr>
                           
                  </table>
                  
            </form>
            
            
 