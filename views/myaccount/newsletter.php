<?php if($flag==1)
echo '<div class="clr"></div><div class="green_alert">You have already subscribed.</div>';
else if($flag==0)
echo '<div class="clr"></div><div class="green_alert">Thanks, Your E-mail address has been added.</div>';
else if($flag==-2)
echo '<div class="clr"></div><div class="alert_red">E-mail is not registered yet.</div>';
else if($flag==-1) 
echo  '<div class="clr"></div><div class="alert_red">Please enter a valid E-mail Address.</div>';
?>