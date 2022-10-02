<?php /*ALL BOATS GRID START*/
			$db = new DbAccess();
			$queryallBoats = "SELECT b.id AS boat_id,bs.boat_name FROM boats b JOIN boatspecifications bs ON bs.boat_id = b.id WHERE b.status = 1 AND bs.language_id = ".$_SESSION['language_id']."";
			$db->Query($queryallBoats);
			$allBoats = $db->fetchObject();
			/*ALL BOATS GRID START*/ ?>

<div class="link_box<?php echo $_REQUEST['control']?'_others':'';?>">
	  <div class="boxes"><a href="index.php?control=trip&task=upcoming"><img src="<?php echo $tmp;?>/images/upcoming_trips.png" width="310" height="131" /></a></div>
      <div class="boxes"><a href="index.php?control=boat&boat_id=<?php echo $allBoats[0]->boat_id ?>"><img src="<?php echo $tmp;?>/images/popular_boats.png" width="310" height="131" /></a></div>
      <div class="boxes last"><a href="index.php?control=popularTrip"><img src="<?php echo $tmp;?>/images/popular_trips.png" width="310" height="131" /></a></div>
    </div>