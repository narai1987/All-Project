<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >> <!--<a class="active" href="index.php?control=myaccount&task=addressBook">--><b><?php echo $taxonomy['address_book'];?></b><!--</a>--></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading"><?php echo $taxonomy['address_book'];?></div>
        <div class="my_account_cont">
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['address_book_entries'];?></p>
            <table class="account_form" width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <?php foreach($results as $result): ?>
              
              <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['first_name'];?>:</label></td>
                        <td><?php echo $result['fname']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['last_name'];?>:</label></td>
                        <td><?php echo $result['lname']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['Address'];?> 1:</label></td>
                        <td><?php echo $result['addressone']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['Address'];?> 2:</label></td>
                        <td><?php echo $result['addresstwo']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['City'];?>:</label></td>
                        <td><?php echo $result['city']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['post_code'];?>:</label></td>
                        <td><?php echo $result['postalcode']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['country'];?>:</label></td>
                        <td><?php echo $result['country']; ?></td>                       
                      </tr>
                      <tr>
                        <td width="100"><label><?php echo $taxonomy['region/state'];?>:</label></td>
                        <td><?php echo $result['state']; ?></td>                       
                      </tr>
                    </table>
                </td>
                <td align="right"><a class="account_btn_grey" href="index.php?control=myaccount&task=addNewAddress&id=<?php echo $result['id']; ?>"><?php echo $taxonomy['Edit'];?></a>&nbsp;<a class="account_btn_grey" href="index.php?control=myaccount&task=delBook&id=<?php echo $result['id']; ?>"><?php echo $taxonomy['delete'];?></a></td>
              </tr>
              <tr>
                <td colspan="3"><p class="account_sep"></p></td> 
              </tr>
              <?php endforeach; ?>
              
              
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><!--<a class="account_btn" href="my_account.html">Back</a>--></td>
                    <td align="right"><a class="account_btn" href="index.php?control=myaccount&task=addNewAddress"><?php echo $taxonomy['new_address_entry'];?></a></td>
                  </tr>
                </table>
            </div>
            </div>
          </div>
      </div> 
      <div class="right_panel">
      <?php include_once("includes/myaccountleftlink.php");?>
      </div>
       <div class="clr"></div>
    </div>
  </div>