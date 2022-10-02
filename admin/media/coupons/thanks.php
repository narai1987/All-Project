<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="yiZNKaOmBDps5l1614Gn_-2aSP8trUGSMbs33gZzW38" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CATEGORY | MY KIDS</title>
<link rel="shortcut icon" href="images/simply_modern_favicon_0.png" type="image/x-icon" />

<meta name="description" content="My Kids,Photo Contest,Photo contest in Chhattisgarh,Santosh Rungta Group Of Institutions,Rungta Group Of Institutions" >

<meta name="keywords" content="My Kids,Photo Contest,Photo Contest in Chhattisgarh,Kids School,Kids Events,Online Photo Contest, Online Photo Contest For Kids,First Time in Chhattisgarh Photo Contest,About my kids,About My Kids Contest,My Kids Category,My Kids Registration,How its Work," >

<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/custom.css">

<script type="text/javascript">
<!--

    var Sound = new Object();
    Sound.play = function Sound_play(src) {
        if (!src) return false;
        this.stop();
        var elm;
        if (typeof document.all != "undefined") {
            elm = document.createElement("bgsound");
            elm.src = src;
        }
        else {
            elm = document.createElement("object");
            elm.setAttribute("data", src);
            elm.setAttribute("type", "audio/x-wav");
            elm.setAttribute("controller", "true");
            elm.height = 1;
            elm.width = 1;
        }
        document.body.appendChild(elm);
        this.elm = elm;
        return true;
    };

    Sound.stop = function Sound_stop() {
        if (this.elm) {
            this.elm.parentNode.removeChild(this.elm);
            this.elm = null;
        }
    };

//-->
</script>


</head>

<body onLoad="Sound.play('media/song_4.mp3')">
<div id="times_sponsor"><img src="images/time_icon.png" style="left:5px; top:20px; position:fixed; z-index:100;" /></div>

<div id="amul_sponsor"><img src="images/amul_icon.png" style="left:5px; top:180px; position:fixed; z-index:100;" /></div>

<div id="mama_sponsor"><img src="images/mama_icon.png" style="right:5px; top:20px; position:fixed; z-index:100;" /></div>

<div id="ris_sponsor"><img src="images/ris_icon.png" style="right:5px; top:120px; position:fixed; z-index:100;" /></div>

<div id="tag_sponsor"><img src="images/tag.png" style="right:5px; top:400px; position:fixed; z-index:100;" /></div>
<div id="page">

  <!-- container main start -->
    
      <div id="container">
      
        <!-- haeder -->
        
          <?php include_once "header.php"; ?>
          
        <!-- haeder ends--> 
        
        <!-- nav -->
        
            <?php include_once "nav.php"; ?> 
        
        <!-- nav end -->
        
        
        <!-- content_container -->
        
          <div id="content_container">
          
             <div class="row">
          
                <div class="left_section left">
                
                       <h2>Thanks For Registration</h2>
                      
                      <div class="matter" style="margin-left:5px;">
                       
                            <?php

require 'config.php';

$a = mysql_insert_id();

$sql="select * from my_kids_registration where Reg_ID='$a'";

	$qury=mysql_query($sql);
	$numrows=mysql_num_rows($qury);
	if($numrows==1)
	{
	
		while($row=mysql_fetch_array($qury))
		{
			

			echo "<table cellspacing='0' cellpadding='4' class='table' width='100%' id='app'>";
            
            	
				    echo "<tr class='odd'>";
                  echo "  <td   align='left' class='pad' width='50%'>Your Child Name:</td>";
				   echo "  <td   align='left' class='pad' width='50%'>". $row[Child_name] ."</td>";
				   echo " </tr>";
				   echo "   <tr class='even'>";
				    echo "  <td   align='left' class='pad' width='50%'>Picture ID</td>";
				  echo "  <td   align='left' class='pad' width='50%'>". $row[image_url] ."</td>";
				   echo " </tr>";
				   
					echo "   <tr>";
				   echo "  <td   align='left'  width='50%'>Your Picture</td>";
                    echo "  <td  align='right' width='50%'><img src=". $row["image_url"] ." width='161px' height='150px'/></td>";
                    echo " </tr>";
			   
  #echo "<tr>";
  #echo "<td nowrap='nowrap'>" . $row[0] . "</td>";
  #echo "<td nowrap='nowrap'>" . $row[1] . "</td>";
  #echo "</tr>";
  $tr++;

  }
echo "</table>";
			
		}
	
	

	
?>

                       
                      </div>
                      
                
                      <div class="row" style="margin-bottom:20px; margin-top:20px;"></div>
                
                </div>
                
                 <div class="right_section right">
                 
                      <?php include_once "right_part.php"; ?>
                  
                 </div>
                
                
                <div class="clear"></div>
  
                </div>
  
                
  
  
          </div>
      
        <!-- content_container end-->
        
      </div>
 
  <!-- container main end -->
  
  
  <!-- footer section starts -->
  
       <?php include_once "footer.php"; ?>
  
  <!-- footer section ends -->

</div>

<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <script>
    // very simple to use!
    $(document).ready(function() {
      $('#myCarousel').carousel();
    });
  </script>
</body>
</html>