<?php 
include"config1.php";
$tripType = $_REQUEST['tripType'];
$productType = $_REQUEST['productType'];
if($tripType and $productType) {
	$sql="select * from trips WHERE trip_type_id = '".$tripType."' and trip_category_id = '".$productType."'";
}
else if($tripType or $productType) {
	if($tripType)
	$sql="select * from trips WHERE trip_type_id = '".$tripType."'";
	if($productType)
	$sql="select * from trips WHERE trip_category_id = '".$productType."'";
}
else {
	$sql="select * from trips";
}

$rs = mysql_query($sql);

$str = "";
if(!mysql_num_rows($rs))
$str['result']['status'] = "failed";
$i=0;
while($result=mysql_fetch_array($rs)) {
	
	$str['result'][$i]['tripID'] = $result['id']; 
	$str['result'][$i]['tripTitle'] = $result['title']; 
	$str['result'][$i]['tripPlace'] = $result['place']; 
	$str['result'][$i]['tripImageURL'] = $result['url']; 
	$i++;
}
echo json_encode($str);
die;
?>