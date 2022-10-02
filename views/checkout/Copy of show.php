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
              <li id="stpone"> <a href="#"><strong>step1:</strong> &nbsp;&nbsp;&nbsp;checkout options<span class="st-arrow">Open or Close</span></a>
                <?php require_once 'schedulestep.php'; ?>
              </li>
              <li  id="stptwo"> <a href="#"><strong>step2:</strong> &nbsp;&nbsp;&nbsp;Account & Billing Details<span class="st-arrow">Open or Close</span></a>
                 <?php require_once 'step2.php'; ?>
              </li>
              <li id="stpthree"> <a href="#"><strong>step3:</strong> &nbsp;&nbsp;&nbsp;Payment Methods<span class="st-arrow">Open or Close</span></a>
                <?php require_once 'step3.php'; ?>
              </li>
              <li id="stpfour"> <a href="#"><strong>step4:</strong> &nbsp;&nbsp;&nbsp;Confirm Order<span class="st-arrow">Open or Close</span></a>
                <?php require_once 'step4.php'; ?>
              </li>
              <li id="stpfive"> <a href="#"><strong>step5:</strong> &nbsp;&nbsp;&nbsp;Finish Order<span class="st-arrow">Open or Close</span></a>
                 <?php require_once 'step5.php'; ?>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>