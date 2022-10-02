<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
  <div class="main_box">
    <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >><a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >> <b><?php echo $taxonomy['rewards'];?></b></div>
  </div>
  <div class="tab_content_trip">
    <div class="left_panel">
      <div class="page_heading"><?php echo $taxonomy['my_rewards'];?><span style="float:right;"><?php echo $taxonomy['remain_points'];?>&nbsp;&nbsp;(<?php echo $points[0]['point'];?>)</span></div>
      <div class="my_account_cont">
        <div class="account_box">
          <table class="cart_table cart_table_inner" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th width="300" class="r_bod bot_bod" scope="col" colspan="4"><?php echo $taxonomy['points_details(log)'];?></th>
              
            </tr>
            <?php if($results): ?>
            <?php foreach($results as $result): ?>
            <tr>
              <td class="r_bod cart_sep">
                  <?php echo ucwords(str_replace("_"," ",$result['point_from']));?>
              </td>
              <td align="center">
              <?php echo ucwords($result['type']);?>
              </td>
              <td align="right" class="r_bod"><?php echo ($result['date_time']);?></td>
              <td align="right" class="r_bod"><?php echo ($result['type']=="get")?($result['point']):($result['point']);?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td class="r_bod cart_sep" colspan="3"><h2><?php echo $taxonomy['no_items_found'];?></h2></td>
            </tr>
            <?php endif; ?>
          </table>
          <br />
          <div class="bottom_action">
            <table class="action_tabledum" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td></td>
                <td align="right"><a class="account_btn" href="index.php?control=trip"><?php echo $taxonomy['continue'];?></a></td>
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
