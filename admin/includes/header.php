<!--header start--> 
<?php 
include_once('class/dbaccess.php');
	session_start();
	$lang = $_SESSION['language_id'];
	$ob = new DbAccess();
	$languages = $ob->language();
	
	//print_r($languages);
?>
<!--header close--> 
<?php echo $keyword[$info]; ?>
<div id="header_p">
<div id="header">
<div class="logo left"><a href="index.php"><img src="images/logo.png" alt="Jetanin" /></a></div>


<div class="welcome_user right">
<div class="left wel_text"> 
<?php echo $keyword['welcome'];?> <a title="admin" href="#" class="button" onclick="edituser('<?php echo $_SESSION['id'];?>','<?php echo $_REQUEST['control'];?>','<?php if($_REQUEST['isflag']=="total" or $_REQUEST['isflag']=="new" or $_REQUEST['isflag']=="active" or $_REQUEST['isflag']=="deactive" ) { echo $_REQUEST['isflag']; }?>')"><strong><?php echo substr($_SESSION['admin_name'],0,15); ?></strong><br /></a>

<!--<a title="admin" class="left" ><strong><?php echo $keyword['admin'];?></strong></a>-->
</div>
<ul>
<li><a href="index.php?control=user&task=updateprofile"><img src="images/setting.png" alt="" /></a>
<ul>
<li> <a href="#" class="button" onclick="edituser('<?php echo $_SESSION['id'];?>','<?php echo $_REQUEST['control'];?>','<?php if($_REQUEST['isflag']=="total" or $_REQUEST['isflag']=="new" or $_REQUEST['isflag']=="active" or $_REQUEST['isflag']=="deactive" ) { echo $_REQUEST['isflag']; }?>')"><?php echo $keyword['edit_account'];?></a>
<!--<a href="#"><?php echo $keyword['edit_account'];?></a>--></li>
<li class="top_m_radius">
 <a href="#" class="button" onclick="chpasswordadmin('<?php echo $_SESSION['id'];?>','<?php echo $_REQUEST['control'];?>','<?php if($_REQUEST['isflag']=="total" or $_REQUEST['isflag']=="new" or $_REQUEST['isflag']=="active" or $_REQUEST['isflag']=="deactive" ) { echo $_REQUEST['isflag']; }?>')"><?php echo $keyword['change_password'];?></a>
<!--<a href="#"><?php echo $keyword['change_password'];?></a>-->
</li>
</ul>
</li>
<li><a href="logout.php"><img src="images/logout.png" alt="Log Out" title="Log Out" /></a></li>
<!--<li><select name="language" id="language" class="reg_txt" onchange="changeLanguage(this.value)">
<?php
//foreach($languages as $language) {
	$langt=array();
foreach($languages as $language) {
$langt[$language['id']]=$language['content'];	
?>
<option value="<?php echo $language['id'];?>" <?php if($language['id']==$lang){?> selected="selected" <?php }?>><?php echo $language['content'];?></option>   
<?php }?>
</select></li>-->
</ul>
</div>
</div>
</div>