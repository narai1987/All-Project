<?php
$tops = $db->ads('top');
/*foreach($tops as $top1){
		$top .=  $top1['content'];
}*/
//////////////
$bottoms = $db->ads('bottom');
if(count($bottoms)) {
	foreach($bottoms as $bottom1){
			$bottom .=  $bottom1['content'];
	}
}
//////////////
$toplefts = $db->ads('topleft');
if(count($toplefts)) {
	foreach($toplefts as $topleft1){
			$topleft .=  $topleft1['content'];
	}
}
//////////////
$toprights = $db->ads('topright');
if(count($toprights)) {
	foreach($toprights as $topright1){
			$topright .=  $topright1['content'];
	}
}
//////////////
$bottomlefts = $db->ads('bottomleft');
if(count($bottomlefts)) {
	foreach($bottomlefts as $bottomleft1){
			$bottomleft .=  $bottomleft1['content'];
	}
}
//////////////
$bottomrights = $db->ads('bottomright');
if(count($bottomrights)) {
	foreach($bottomrights as $bottomright1){
			$bottomright .=  $bottomright1['content'];
	}
}