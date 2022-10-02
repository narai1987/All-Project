
<div align="center"><h2>Over all Rating</h2></div>
<?php

//print_r($results);
foreach($results as $data){
?>

<div align="center" class="detail_right right" >
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td ><strong><h3>User Name</h3></strong></td>
    <td><?php echo"User name". $data['user_id']; ?></td>
  </tr>
  <tr>
  <td ><strong><h3>Rating For</h3></strong></td>
   <td><?php echo $data['rating_type']; ?></td>
   </tr>
   <tr>
    <td ><strong><h3>Rating</h3></strong></td>
    <td><?php if($data['rating']==1){?>
    <img src="images/star1.png" />
    <?php } elseif($data['rating']==2){ ?>
    <img src="images/star2.png" />
     <?php } elseif($data['rating']==3){ ?>
      <img src="images/star3.png" />
      <?php } elseif($data['rating']==4){ ?>
      <img src="images/star4.png" />
      <?php } else { ?>
      <img src="images/star5.png" />
      <?php } ?>
    </td>
  </tr>
  <tr>
   <td ><strong><h3>Review</h3></strong></td>
    <td><?php echo $data['review']; ?></td>
  </tr>
  
</table><br />

</div>
<?php } ?>