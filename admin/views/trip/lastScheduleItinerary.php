<?php
//echo $_REQUEST['trip_schedule_id']."sssss";?>    <div class="detail_container">
    	<div class="itinerary">
            <fieldset class="fieldset-iti">
                <legend><h2>Itinerary From Previous Schedule</h2></legend>
                <form action="index.php" method="post" enctype="multipart/form-data" name="formOld">          
                    <div class="itineraryTop">
                        <table width="100%" cellpadding="0" cellspacing="0"><tr>
                        <td width="4%"></td>
                        <td width="30%"><p>Start Date</p></td>
                        <td ><p>End Date</p></td>
                        </tr>
                        <?php
                        foreach($results as $result) {
                        ?><tr>
                        <td><input type="radio" name="chooseScheduleId" value="<?php echo $result['id'];?>" checked /></td>
                        <td style="padding-left:4px;"><?php echo date("Y-M-d",strtotime($result['start_date']));?></td>
                        <td style="padding-left:4px;"><?php echo date("Y-M-d",strtotime($result['end_date']));?></td>
                        </tr>
                        <?php }?>
                        </table>
                    </div>
                    <div class="newItinerary">
                        <input type="submit" name="submit" value="OK" class="btn_enter">
                        <input type="hidden" name="control" value="trip"/>
                        <input type="hidden" name="task" value="saveOldItinerary"/>
                        <input type="hidden" name="scheduleId" value="<?php echo $_REQUEST['trip_schedule_id'];?>"  />
                        <input type="hidden" name="tripId" value="<?php echo $result['trip_id'];?>"  />
                    </div>
                </form>
            </fieldset>
            </div>
            <div class="or_divider"><img src="images/or.png"  /></div>
            
            <div class="itinerary">
                <fieldset class="fieldset-iti">
                    <legend><h2>Create New Itinerary</h2></legend>
                    <form action="index.php" method="post" enctype="multipart/form-data" name="formIti" >
                        <div class="itineraryTop">
                        	<p>
                            	Either you can create new itineraries for this new schedule of the trip.
                            </p>
                        </div>
                        <div class="newItinerary">
                        <div class="center">
                            <input type="submit" name="submit" value="Create New" class="btn_enter" >
                            <input type="hidden" name="control" value="trip"/>
                            <input type="hidden" name="task" value="saveNewItinerary"/>
                            <input type="hidden" name="scheduleId" value="<?php echo $_REQUEST['trip_schedule_id'];?>"  />
                            <input type="hidden" name="tripId" value="<?php echo $result['trip_id'];?>"  />
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
    </div>