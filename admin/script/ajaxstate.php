<?php

$_REQUEST['control'] = "countrie";
$_REQUEST['task'] = "ajaxstate";
require_once("../controller.php");
$ajstate=$results;

?>
<?php if($ajstate){ ?>

<option value="" >Select State</option> 
<?php foreach($ajstate as $ajstates){ ?>
<option value="<?php echo $ajstates['id']; ?>"   <?php if($ajstates['id']==$countrycode[0]["state_id"]){ ?> selected="selected" <?php } ?> ><?php echo $ajstates['state']; ?></option> 
<?php }}else{ ?>

<option value="" >Select State</option> 

<?php } ?>
