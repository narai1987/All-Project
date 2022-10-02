
<script type="text/javascript">

$(function() {
		$('#st-accordion').accordion({
			open : 0
			
		});
	});
	
</script>
<div id="main_box_cont">
    <div class="main_box">
      <div class="breadcrumb"><a href="index.php">Home</a> >> <a class="active" href="#">Checkout</a></div>
    </div>
    <div class="tab_content_trip">
      <div class="page_heading">Checkout Info</div>
      <div class="trip_box_cont">
        <div class="trip_box trip_box_compare">
          <div id="st-accordion" class="st-accordion">
            <ul>
            <li id="stpfiveli"> <a id="stpfive" >&nbsp;&nbsp;&nbsp;Finish Order<span class="st-arrow">Open or Close</span></a>
                 <?php require_once 'step5.php'; ?>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>