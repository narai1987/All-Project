<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
<table width="99%">
<tr>
<td width="45%"> <?php if($_REQUEST['id']){ ?>Edit Page<?php }else{ ?>Add New  <?php } ?></td> 
<td></td>
<td></td>
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="mmm">

<form method="post" action="index.php" onsubmit="return pages();" enctype="multipart/form-data">

<table width="98%" cellpadding="1" cellspacing="2" class="tab_regis">

<tr>
<td align="right" width="15%" valign="top"><strong> Company Name:</strong></td>
<td><input type="text" class="reg_txt" name="company" id="company" value="<?php echo $data['company']?$data['company']:$_REQUEST['name']; ?>" /><div id="companyid" ></div>
</td>
</tr>


<tr>
<td align="right" valign="top"><strong id="chkk"  style="display:none">Company Logo :</strong></td>
<td id="chk"><input type="file" class="reg_txt" id="logo" name="logo" /><div id="logoid" ></div>
</td>
</tr>
<tr>
<td align="right" valign="top"><strong id="chkk"  style="display:none">Company Logo :</strong></td>
<td id="chk"><img src="<?php echo $data['logo'];?>"  /><div id="logoid" ></div>
</td>
</tr>

<tr >
<td align="right" valign="top"><strong id="chh" > Detail : 	</strong></td>
<td id="ch"> <textarea class="ckeditor" name="description" id="des" rows="5" cols="50"><?php echo $data['description'] ; ?> </textarea><div id="contentid" style="color:#F00;" ><?php
echo $errmsg;?></div>
</td><div id="descr" ></div>
</tr>
<tr><td></td><td colspan="2">

</td></tr>
</table>   

<p align="left" style="margin-top:4px;">
<input type="hidden" name="control" value="company"/>
<input type="hidden" name="view" value="company"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" value="<?php echo $data['id'] ; ?>" id="id" />
<input class="submit" type="submit" value="<?php if($_REQUEST['id']){ ?>Update<?php }else{ ?>Save<?php } ?>" />
<!--<input class="submit" type="Reset" value="Reset" onclick="resett()" />-->
</p> 
</form>
</div>
</div>
</div>
<script type="text/javascript">
	function valid_comapany() {
		//if(var abc){}
	}
</script>