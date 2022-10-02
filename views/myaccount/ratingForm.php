<div class="content_area_rating">
                   		<div class="login_f_header"><div class="login_here">Overall Rating</div></div> 
                        <!--stars-->
                            <div class="demo">
                                <div class="default-demo_overall"></div>
                            </div>
                        <!--stars-->
                        <div class="login_area">
                        	<form name="ratingForm" action="index.php?control=myaccount&task=saveRating" method="post" >
                        	<table class="rating_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="120px" align="right">Foods:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo" id="food"></div>
                                    </div>
                                </td>
                                <td id="foodtext">Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Equipment:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo" id="equip"></div>
                                    </div>
                                </td>
                                <td id="equiptext">Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Beverages:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"  id="bv"></div>
                                    </div>
                                </td>
                                <td id="bvtext">Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Cabin:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo" id="cb"></div>
                                    </div>
                                </td>
                                <td id="cbtext">Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Service:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo" id="serv"></div>
                                    </div>
                                </td>
                                <td id="servtext">Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Crew:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo" id="crew"></div>
                                    </div>
                                </td>
                                <td id="crewtext">Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Divers:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo" id="diver"></div>
                                    </div>
                                </td>
                                <td id="divertext">Not rated yet</td>
                              </tr>
                              
                              
                             <!-- <tr>
                              <td valign="top" align="right">Give Review:</td>
                              	<td  align="center"></td>
                                <td>&nbsp;</td>
                              </tr>-->
                              <tr>
                            		<td align="center" colspan="3">
                                    	<textarea name="review" id="review" placeholder="Your Review" style="width:370px; margin-left:0px; height:70px; padding:5px;background: #212121; border:transparent; border-top: solid 1px #131313; border-bottom: solid 1px #535353; font-size: 13px;color:#FFF; "><?php echo $reviews[0]['review'] ?></textarea>
                                    </td>
                              </tr>
                              
                              
                              <tr>
                              	<td colspan="3">
                                <a href="#" class="get_quotes_btn" id="ratethis" style="float:right; margin-right:65px; background: #ffc514;
padding: 5px 20px;
color: #000;
font-size: 12px;">Rate It</a>
                                </td>
                              </tr>
                            </table>
                            <div id="countRateType">
                            <input type="hidden" id="rfood" name="rfood" value="<?php echo $rateAr['food']?$rateAr['food']:0 ?>"/>
                            <input type="hidden" id="requip" name="requip" value="<?php echo $rateAr['equipment']?$rateAr['equipment']:0 ?>" />
                            <input type="hidden" id="rbv" name="rbv"  value="<?php echo $rateAr['beverage']?$rateAr['beverage']:0 ?>"/>
                            <input type="hidden" id="rcb" name="rcb"  value="<?php echo $rateAr['cabin']?$rateAr['cabin']:0 ?>"/>
                            <input type="hidden" id="rserv" name="rserv"  value="<?php echo $rateAr['service']?$rateAr['service']:0 ?>"/>
                            <input type="hidden" id="rcrew" name="rcrew"  value="<?php echo $rateAr['crew']?$rateAr['crew']:0 ?>"/>
                            <input type="hidden" id="rdiver" name="rdiver"  value="<?php echo $rateAr['diver']?$rateAr['diver']:0 ?>"/>
                            </div>
                            <input type="hidden" id="trip_id" name="trip_id" value="<?php echo $rows[0]->trip_id ?>"/>
                            <input type="hidden" id="trip_sch_id" name="trip_sch_id" value="<?php echo $tripScheduleId ?>"/>
                            </form>

                        </div>
                        <a href="#" id="popupContactClose_rating"><img title="Close" src="<?php echo $tmp;?>images/q_close.png" width="16" height="15" /></a>

                    </div>
                    
                    <script type="text/javascript">
						
							$.fn.raty.defaults.path = 'images';
							
							$('.default-demo_overall').raty({ readOnly: true, score: 0 });
									
								$('.default-demo').raty({
								click: function(score, evt) {
								//alert('Class: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
								
										$("#r"+$(this).attr('id')).val(score);
							 			rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
							 
								 		var rateCount = 0;	
										$('#countRateType input:hidden').each(function() {
											 if($(this).val() != 0){
												rateCount++;
											 }
										});
								
									 	overAllRate = Number(rate / rateCount);
										$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
								
								}
							});
							
							
							
							
							$("#ratethis").click(function(){
								document.forms['ratingForm'].submit();
							});
							
							
							
							
					</script>
                    
                    <?php if($rateAr){ 
							$rateCount = 0;
							$rate = 0;
							if($rateAr['food'] != 0){
								$rate = $rate + $rateAr['food'];
								$rateCount++;
							}
							if($rateAr['equipment'] != 0){
								$rate = $rate + $rateAr['equipment'];
								$rateCount++;
							}
							if($rateAr['beverage'] != 0){
								$rate = $rate + $rateAr['beverage'];
								$rateCount++;
							}
							if($rateAr['cabin'] != 0){
								$rate = $rate + $rateAr['cabin'];
								$rateCount++;
							}
							if($rateAr['service'] != 0){
								$rate = $rate + $rateAr['service'];
								$rateCount++;
							}
							if($rateAr['crew'] != 0){
								$rate = $rate + $rateAr['crew'];
								$rateCount++;
							}
							if($rateAr['diver'] != 0){
								$rate = $rate + $rateAr['diver'];
								$rateCount++;
							}
							
							
						$overAllRate =  floor($rate / $rateCount);
					?>
                    <script type="text/javascript">
					
					
					
					$('.default-demo_overall').raty({ readOnly: true, score: <?php echo $overAllRate ?> });
					
					
					$('#food').raty({ readOnly: false, score: <?php echo $rateAr['food'] ?>,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						} });
						
					$('#equip').raty({ readOnly: false, score: <?php echo $rateAr['equipment'] ?>,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						} });
					$('#bv').raty({ readOnly: false, score: <?php echo $rateAr['beverage'] ?>,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						}  });
					$('#cb').raty({ readOnly: false, score: <?php echo $rateAr['cabin'] ?>,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						}  });
					$('#serv').raty({ readOnly: false, score: <?php echo $rateAr['service'] ?>,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						}  });
					$('#crew').raty({ readOnly: false, score: <?php echo $rateAr['crew'] ?> ,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						} });
					$('#diver').raty({ readOnly: false, score: <?php echo $rateAr['diver'] ?>,
					click: function(score, evt) {		
						$("#r"+$(this).attr('id')).val(score);
						rate = parseInt($("#rfood").val()) + parseInt($("#requip").val()) + parseInt($("#rbv").val()) + parseInt($("#rcb").val()) + parseInt($("#rserv").val()) + parseInt($("#rcrew").val()) + parseInt($("#rdiver").val());
						var rateCount = 0;	
						$('#countRateType input:hidden').each(function() {
							if($(this).val() != 0){
							rateCount++;
							 }
						});
						overAllRate = Number(rate / rateCount);
						$('.default-demo_overall').raty({ readOnly: true, score: Math.floor(overAllRate) });
						}  });
					
										
					$('#foodtext').html('<span style="color:#0C3;">Rated</span>');
					$('#equiptext').html('<span style="color:#0C3;">Rated</span>');
					$('#bvtext').html('<span style="color:#0C3;">Rated</span>');
					$('#cbtext').html('<span style="color:#0C3;">Rated</span>');
					$('#servtext').html('<span style="color:#0C3;">Rated</span>');
					$('#crewtext').html('<span style="color:#0C3;">Rated</span>');
					$('#divertext').html('<span style="color:#0C3;">Rated</span>');
					
					</script>
					<?php }?>