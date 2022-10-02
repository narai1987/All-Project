<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>View</title>
<link rel="stylesheet" href="assets/webview/styles/main.css" type="text/css" media="screen" />
<script src="assets/webview/js/validate.js" type="text/javascript"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(
hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="assets/webview/js/Tabs/css/style.css">	
   <script src='assets/webview/js/Tabs/jquery.min.js'></script>
    <script src='assets/webview/js/webview.js'></script>
    <script src="assets/webview/js/Tabs/organictabs.jquery.js"></script>
    <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
            $("#example-two").organicTabs({
                "speed": 300
            });
    
        });
    </script>
  
    <!--<link rel="stylesheet" href="assets/webview/jquery/collasp_sec/jquery.ui.all.css">
	<script src="assets/webview/js/collasp_sec/jquery-1.7.2.js"></script>-->
	<!--<script src="assets/webview/jquery/collasp_sec/jquery.ui.core.js"></script>-->
	<script src="assets/webview/js/collasp_sec/jquery.ui.widget.js"></script>
	<script src="assets/webview/js/collasp_sec/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="assets/webview/js/collasp_sec/demos.css">
	   <script>
	   function callCoo() {
	$(function() {
		jQuery( "#accordion_data" ).accordion({
			collapsible: true
		});
	});
	   }
	callCoo();
	</script> 
</head>

<body>
<?php
	require_once("controller.php");
?>
<div id="testDiv"></div>
</body>
</html>