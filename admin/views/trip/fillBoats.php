<option value="0" >Select Boat</option>
                            <?php foreach($boats as $b): ?>
                            <option value="<?php echo $b['boat_id']; ?>" <?php if($b['boat_id'] == $results['common'][0]->boat_id){ ?> selected="selected" <?php } ?>><?php echo $b['boat_name']; ?></option>
                            <?php endforeach; ?>