
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calender Demo</title>
<link rel="stylesheet" href="newCal/jquery-ui.css">
<script src="newCal/jquery-1.9.1.js"></script>
<script src="newCal/jquery-ui.js"></script>

<script>
jQuery.noConflict();
  jQuery(function($) {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
  
 
  
  </script>
</head>
<body>

<strong><em class="star_red">* </em>From Date :</strong>
<input type="text" name="start_date" id="from" class="reg_txt" style="width:155px;" /><strong><em class="star_red">* </em> 
To Date :</strong>
<input type="text" name="end_date" id="to" class="reg_txt" style="width:155px;"/>
</body>
</html>