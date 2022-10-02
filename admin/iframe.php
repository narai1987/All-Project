<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="template/tmp_2/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="template/tmp_2/styles/menu.css" type="text/css" media="screen" />





<!--POPUP JQUERY START HERE-->

<link rel="stylesheet" href="jquery/popup/popup.css" type="text/css" />
<script src="jquery/popup/jquery-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery/popup/popup.js"></script>
<script type="text/javascript" src="jquery/grid/jquery-1.7.2.js"></script>

<!--POPUP JQUERY END HERE-->
<!--Assets script javascript start-->
  <script src="assets/javascript/script.js"></script>
  <script src="assets/javascript/javascript.js"></script>
  <script src="assets/javascript/idiveLanguage.js"></script>
  <!--<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>-->
  

  

<!--Assets script javascript end-->
<!-- ----------left Menu script--------    --->
<link rel="stylesheet" href="template/tmp_2/jquery/collasp/collaps.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo "template/tmp_2";?>/jquery/collasp/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".accordion2 h3").eq(0).addClass("active");
	$(".accordion2 div").eq(0).show();

	$(".accordion2 h3").click(function(){
		$(this).next("div").slideToggle("slow")
		.siblings("div:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});

});
</script>
<!--            ----------left Menu script Close--------    --->





<!--------Combobox style------>
<link rel="stylesheet" type="text/css" href="template/tmp_2/jquery/msdropdown/dd.css" />
<!--<script type="text/javascript" src="jquery/msdropdown/js/jquery-1.3.2.min.js"></script>-->
<script type="text/javascript" src="template/tmp_2/jquery/msdropdown/js/jquery.dd.js"></script>
<!--------Combobox style close------>

<!--------Placeholder---------->
<script type="text/javascript" src="template/tmp_2/jquery/placeholder/Placeholders.min.js"></script>
<!--------Placeholder Close---------->

<!--coloaps start here-->
<script src="jquery/collasp_sec/jquery-1.7.2.js"></script>
	<!--<script src="jquery/collasp_sec/jquery.ui.core.js"></script>-->
	<script src="jquery/collasp_sec/jquery.ui.widget.js"></script>
	<script src="jquery/collasp_sec/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="jquery/collasp_sec/demos.css">
	<script>
	$(function() {
		$( "#accordion_data" ).accordion({
			collapsible: true
		});
	});
	</script>
<!--coloaps end here-->

 <!--------multi tab style close------> 
  <link rel="stylesheet" href="template/tmp_2/jquery/multi_tab/tabs.css">
  <script src="template/tmp_2/jquery/multi_tab/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="template/tmp_2/jquery/multi_tab/jquery.easytabs.min.js" type="text/javascript"></script>
   <script type="text/javascript">
   
    $(document).ready( function() {
		
/*crEditor();
	 $('.tab-container').bind('easytabs:after', function(evt, tab, panel, data) {
			alert('gaurav'); 
       crEditor();
		});*/
	
      $('.tab-container').easytabs();
	 
    });
	
	 
  </script>
  <!--------multi tab style close------>

<!--------Combobox style------>
<link rel="stylesheet" type="text/css" href="template/tmp_2/jquery/msdropdown/dd.css" />
<!--<script type="text/javascript" src="jquery/msdropdown/js/jquery-1.3.2.min.js"></script>-->
<script type="text/javascript" src="template/tmp_2/jquery/msdropdown/js/jquery.dd.js"></script>
<!--------Combobox style close------>

</head>
<style type="text/css">
body{
	background:none;
	}

.user_panel div.iframe_container {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #C4E5FF;
    border-radius: 8px 8px 0 0;
    margin-bottom: 10px;
    margin-top: 10px;
    padding-bottom: 7px;
	width:100%;
  
}


.user_panel div.iframe_container div.head_cont {
    background: -moz-linear-gradient(center top , #EBF5FE, #DEEFFB) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-bottom: 1px solid #C4E5FF;
    border-radius: 7px 7px 0 0;
    box-shadow: 0 1px 2px #FFFFFF inset;
    font-family: Arial,Helvetica,sans-serif;
    padding: 5px 0;
    width: 100%;
}

.user_panel div.iframe_container div.head_cont h2 {
    color: #58575B;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12pt;
    font-weight: bold;
}


</style>

<script type="text/javascript">
	function iframepaging(str) {
		//alert(str);
		document.getElementById("page").value = str;
		document.getElementById("tpages").value = document.getElementById("iframefilter").value;
		document.iframefilterForm.submit();
	}
	function iframepaging1(str) {
		//alert(str);
		document.getElementById("page").value = 1;
		document.getElementById("tpages").value = str;
		//alert(document.getElementById("tpages").value);
		document.iframefilterForm.submit();
	}
	

	
	
	
</script>
<body>
<?php 
require_once("controller.php");
;?>

</body>
</html>
