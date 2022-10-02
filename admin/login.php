<?php
ini_set("display_errors","Off");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" media="screen" href="styles/adminLogin.css">
</head>




<body>
<div id="login">
<div class="loginbox_container">
<div class="l_box_con">
<?php if($_REQUEST['error']==1){ ?>
<div style="color:#F00; text-align:center; font-size:14px; font-weight:bold;" >*Invalid Email or Password.</div>
<?php }
else  if($_REQUEST['error']==2){ ?>
<div style="color:#F00; text-align:center; font-size:14px; font-weight:bold;" >*You are not a authorised user.</div>
<?php }?>
<form action="authen.php" method="post">
<table width="100%" cellspacing="0" class="login_table" cellpadding="0">
<tr height="40px">
<td class="td1 tr2" width="2%"></td>
<td class="td2 tr2">Login</td><td ></td>
</tr>
<tr >
<td colspan="2" valign="top" height="120px">
<table width="100%" cellspacing="0" cellpadding="0">
<tr class="tr2">
<td class="tr2 " align="center" height="60" width="30%">Email-Id :</td>
<td class="tr2 bod_right" align="left">
<input type="text" class="t_box_sign" name="email"  />
<input type="hidden" name="control" value="user" />

<input type="hidden" name="task" value="login" />

</td>
</tr>

<tr class="tr2">
<td align="center" class="tr2" height="60">Password :</td>
<td class="tr2 bod_right" align="left"><input type="password" class="t_box_sign" name="password" /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="2" class="tr1" height="50">
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="81%" style="padding-left:9px;"><input type="checkbox" /> Remember me</td>
<td><input type="submit" class="but_login" name="login" style="cursor:pointer;" value="" />




</td>
</tr>
</table>
</td>
</tr>

</table>
</form>
</div>

</div>
</div>
</body>
</html>
