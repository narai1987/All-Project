<!--web2.0 start-->
  <div id="p_web">
<div id="web">
<div class="f_container">
<div class="f_boxes">
<div class="f_head"><p>What people think <em></em></p></div>

<table width="100%" style="margin-top:10px;">
<tr>
<td class="test_desc1" valign="top" style="width:97% !important; min-height:95px;">

<!--<a><img src="<?php echo $feeds[0]['image']?"images/user/".$feeds[0]['image']:"template/sp_detail/images/testi_icon.png";?>" alt="icon" class="test_iconimg" /></a><br />-->
<p>
<?php echo $feeds[0]['feed'];?>
</p>

</td>
<!--<td class="test_desc1" valign="top" style=" border:1px solid #FFF;" >


</td>-->

</tr>
<tr>
<td>
<a class="test_icon1" style="text-decoration:none;"><?php echo $feeds[0]['fname']." ".$feeds[0]['lname'];?></a>
<br />
<button type="button" name="feed" id="feed" onclick="myfeed('<?php echo $_SESSION['userid'];?>')" class="submit_review" style="font-size:8pt; padding:4px; margin-top:10px; font-family:Arial, Helvetica, sans-serif;">What You Think</button>
</td>
</tr>


</table>
</div>
<?php
if(count($addresss)) {
	
?>
<div class="seperator"></div>

<div class="f_boxes">

<div class="f_head"><p><?php echo $addresss[0]['page'];?><em></em></p></div>

<p><span><?php echo $addresss[0]['content'];?></span></p>
<br />

</div>
<?php } ?>

<div class="seperator"></div>
<div class="f_boxes">
<div class="f_head">



<p>Other Links <em></em></p></div>
<?php
//print_r($otherlinks);
if(count($otherlinks)) {
	?>
    <div style="float:left;">
    <?php
	$i = 0;
	foreach($otherlinks as $otherlink) {
		if($otherlink['category'] == "Other Links") { 
			$i++; ?>
			<p><a href="<?php echo $otherlink['link'];?>"><?php echo $otherlink['page'];?></a></p>
		<?php 
			if($i%6==0) {?>
            	</div><div style="float:left; margin-left:10px;">
      <?php } 
		}
	}
	?>
    </div>
    <?php
}?>
<!--
<p><a href="../index.html">Home </a> </p>
<p><a href="../product.html#portfolio">Products</a></p>
<p><a href="#">Partners</a></p>
<p><a href="../career.html#career">Career </a> </p>
<p><a href="../contact.html#contact">Contact Us</a> </p>-->




</div>
<div class="seperator"></div>

<div class="f_boxes map_last123">
<div class="f_head"><p>Subscribe to Newsletter <em></em></p></div>

<!--subscription-->
<div class="newslatter"><h6></h6>
<div class="subscribe">Subscribe to our newsletter and get
exclusive deals you won't find anywhere else.
<div class="email">
<form action="index.php" method="post" name="subscriptnForm" >
    <input type="text" name="subscribe" id="subscribe" class="news_leterbox left" placeholder="Email Address" /> 
    <button type="button" class="subscribe_but right" onclick="subscribe1(subscribe.value)">Subscribe</button>
</form>
</div><span id="subs_msg"></span>
<!--<span id="subs_msg"><a href="#"><strong>x</strong></a> &nbsp;Please enter a valid E-mail Address</span><br />

<span><em><a href="#"><strong></strong></a> Please enter a valid E-mail Address</em></span>-->

</div>

</div>
<!--subscription-->
<!--<div class="f_head">



<p>Address <em></em></p></div>
<p><span>First Floor, Y-Square, Opposite 
S.K. Motors, Khurram Nagar,
Lucknow - 226022, Uttar Pradesh,
INDIA </span></p>
<p><span><label for="Phone" class="lab_for"><strong>Phone </strong>:</label> <label for="number">+91 - 0522 - 4081436</label></span><br />

<span><label for="Email" class="lab_for"><strong>Email &nbsp; </strong>:</label> <label for="id">contact@infranix.com</label></span><br />

<span><label for="skype" class="lab_for"><strong>Skype </strong>:</label> <label for="sky">tauseef.2sidd</label></span></p>
-->


</div>
<!--<div class="f_boxes map_last">
<div class="f_head"><p>Track our Location <em></em></p></div>
<iframe width="235" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=INFRANIX+IT+Solutions,+Lucknow,+Uttar+Pradesh&amp;aq=0&amp;oq=infranix&amp;sll=26.836828,80.950613&amp;sspn=0.373127,0.441513&amp;ie=UTF8&amp;hq=INFRANIX+IT+Solutions,&amp;hnear=Lucknow,+Uttar+Pradesh&amp;ll=26.888722,80.967328&amp;spn=0.093223,0.110378&amp;t=m&amp;z=13&amp;iwloc=A&amp;cid=1497745135325076285&amp;output=embed" style="margin-top:5px;"></iframe><br />

</div>-->
</div>
</div>
</div>
  
    <!--web2.0 close-->


<!--footer starts-->
<div id="footer_p">
<div id="footer">
<div class="f_menu left_drag">
<p>
© Copyright 2013, Trade All Stars. All rights reserved 
</p>
</div>

</div>


</div>
</div>
<!--footer close-->
<?php
include_once("feed_pop.php");
include_once("login_pop.php");
?>
<div id="chkid" ></div>