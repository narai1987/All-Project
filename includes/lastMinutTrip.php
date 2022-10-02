<?php



	//$q_lastMinutTrips = "SELECT t.*,ts.trip_title FROM trips t JOIN trip_specifications ts ON ts.trip_id = t.id WHERE ts.language_id = 1 AND t.lastminut = '1' ";
	
	
	 $q_lastMinutTrips = "SELECT ts.trip_title,t.id AS trip_id,t.image"
					. " \n ,sc.start_trip_datetime,sc.id AS schedule_id "
					. " \n FROM trips t JOIN trip_specifications ts ON "
					. " \n ts.trip_id = t.id JOIN trip_schedules sc ON sc.trip_id = t.id WHERE ts.language_id = 1"
					. " \n AND sc.start_trip_datetime >'".date("Y-m-d H:is")."' "
					. " \n GROUP BY sc.trip_id ORDER BY sc.start_trip_datetime LIMIT 0,7";
	
	
	$db->Query($q_lastMinutTrips);
	$result_lastMinutTrips = $db->fetchArray();
?>
<div id="last_book_cont">
	<div class="last_book">
    <div class="clr"></div>
		<div class="list_carousel" <?php /*?>data-animated="bounceIn"<?php */?>>
       		<div class="heading"><span><?php echo $taxonomy['last_minute_trips'];?></span></div>
				<ul id="foo2">
                <?php $i = 1; foreach($result_lastMinutTrips as $result_lastMinutTrip) {?>
					<li>
                    	<img src="admin/<?php echo $result_lastMinutTrip['image'];?>" width="465" height="197" />
                        <div class="lm_caption"><?php echo $result_lastMinutTrip['trip_title'];?></div>
                        <div class="count_container">
                       		<div class="trip_text"><?php echo $taxonomy['this_trip_will_expire_in'];?></div>
                          <div class="counter">
                            <ul class="countdown countdown<?php echo $i;?>">
                              <li>
                                <span class="days"></span>                               
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds"></span>                               
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                            <div class="readmore"><a href="index.php?control=tripdetail&trip_id=<?php echo $result_lastMinutTrip['trip_id'];?>&schId=<?php echo $result_lastMinutTrip['schedule_id'];?>"><?php echo $taxonomy['read_more'];?></a></div>
                        </div>
                    </li>
                    <script type="text/javascript">
					$(document).ready(function() {
						$(".countdown<?php echo $i;?>").countdown({
						date: "<?php echo date("d F Y H:i:s",strtotime($result_lastMinutTrip['start_trip_datetime']));?>", // add the countdown's end date (i.e. 3 november 2012 12:00:00)
						format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
						},
						function() { 
						// the code here will run when the countdown ends
						
						});
					});
					</script>
                    <?php $i++; }?>
					
				</ul>
				<div class="clearfix"></div>
				<a id="prev2" class="prev" href="#"><img src="<?php echo $tmp;?>/images/prev.png" width="25" height="25" /></a>
				<a id="next2" class="next" href="#"><img src="<?php echo $tmp;?>/images/next.png" width="25" height="25" /></a>
		  
			</div>
	</div>
</div>