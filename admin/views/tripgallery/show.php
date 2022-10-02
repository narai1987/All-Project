<link rel="stylesheet" type="text/css" href="assets/popup/css/reveal.css" media="all" />
<script type="text/javascript" src="assets/popup/js/jquery.reveal.js"></script>

<!--gallery +  pirobox-->
<script type="text/javascript" src="assets/pirobox/pirobox.min.js"></script>
<link href="assets/css_pirobox/demo5/style.css" class="piro_style" media="screen" title="white" rel="stylesheet" type="text/css" />

<!--//gallery +  pirobox-->

<script type="text/javascript" src="assets/ajaxupload/jquery.form.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 

	//pirobox start
	
	
	$().piroBox({
			my_speed: 1000, //animation speed
			bg_alpha: 0.3, //background opacity
			slideShow : true, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
	//pirobox end


	$("#tripidd").val($('#gallery').val());
	var progressbox     = $('#progressbox');
	var progressbar     = $('#progressbar');
	var statustxt       = $('#statustxt');
	var completed       = '0%';
	
	var options = { 
			target:   '#ajaxData',   /*#output*/// target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			uploadProgress: OnProgress,
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
	
//when upload progresses	
function OnProgress(event, position, total, percentComplete)
{
	//Progress bar
	progressbar.width(percentComplete + '%') //update progressbar percent complete
	statustxt.html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			statustxt.css('color','#fff'); //change status text to white after 50%
		}
}

//after succesful upload
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	//pirobox start
	
	
	$().piroBox({
			my_speed: 1000, //animation speed
			bg_alpha: 0.3, //background opacity
			slideShow : true, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
	//pirobox end

}

//function to check file size before uploading.
function beforeSubmit(){
	
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		//Progress bar
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#000'); //initial color of status text

				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 

</script>
<link href="assets/ajaxupload/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.imgAvatar {
	background-color: #ECFAF9;
	-moz-border-radius: 10px 30px;
	border-radius: 33px 27px / 135px 10px;
	border: 1px solid #E4E4F3;
	padding: 5px;
}
.delete_btn {
	position:absolute;
	top:2px;
	right:1px;
}
.heading {
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	font-weight:bold;
	color:#333;
	margin:0 0 10px;
	background:#f4f4f4;
	padding:5px 0 5px 10px;
}
</style>

<div class="detail_right right">
  <div class="detail_container">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>Trip Gallery</td>
              <td align="right"><a  style="text-decoration:none;" class="lang_button" href="index.php?control=trip">View Trips</a></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form action="index.php" method="post" name="galview">
            <div style="padding:10px;">
              <table >
                <tr>
                  <td><strong><em class="star_red">*</em> Trip :</strong>
                    <select name="gallery" id="gallery" onchange="javascript:document.forms['galview'].submit();">
                      <option value="">Select</option>
                      <?php foreach($results as $result){ ?>
                      <option value="<?php echo $result['trip_id']; ?>" <?php if($result['trip_id']==$_REQUEST['gallery']) {?> selected="selected" <?php } ?> ><?php echo $result['trip_title']; ?></option>
                      <?php } ?>
                    </select>
                    <span id="msgbeverage_id" style="color:red;" class="font"> </span></td>
                    <td align="right" ><input type="hidden" name="control" value="tripgallery"/>
                  <input type="hidden" name="task" value="show"/>
                  <button class="lang_button" type="submit"><strong>View</strong></button></td>
                </tr>
              </table>
            </div>
            
          </form>
          <?php if($_REQUEST['gallery']!='') {?>
          <div id="upload-wrapper">
            <div align="center">
              <form action="ajax.php?control=tripgallery" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
                <h3>Upload More Gallery</h3>
                <span class="">Image Type allowed: Jpeg, Jpg, Png and Gif. | Maximum Size 1 MB</span>
                <input name="ImageFile[]" id="imageInput" type="file" multiple/>
                <input type="submit"  id="submit-btn" value="Upload" />
                <input type="hidden" name="tripidd" id="tripidd" />
                <input type="hidden" name="task" value="ajaxUpload"/>
                <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
                <div id="progressbox" style="display:none;">
                  <div id="progressbar"></div>
                  <div id="statustxt">0%</div>
                </div>
                <div id="output"></div>
              </form>
            </div>
          </div>
          <?php } ?>
          <br />
          <br />
          <div id="ajaxData2">
           <h2 class="main_head">&nbsp;Main Image</h2>
            <?php if($mains[0]->image): ?>
            <div style="position:relative; float:left; padding:10px 5px 5px 10px; "> <a href="<?php echo $mains[0]->image; ?>" class="pirobox_gall" title="main"> <img class="imgAvatar" src="<?php echo $mains[0]->image; ?>" width="135" height="90" alt="edit"  /> </a> <img style="cursor:pointer;" class="delete_btn" src="images/backend/update.png" alt="Update" title="Update" onclick="loadpopupupload();"/> </div>
            <?php 
        else:
        echo '<h3 align="center" style="padding:10px 5px 5px 10px; ">No Image</h3>';
        endif;
        
        
        ?>
          </div>
          <div style="clear:both;"></div>
          <br />
          <div id="ajaxData">
           <h2 class="main_head">&nbsp;Gallery</h2>
            <?php $g = 1;if($gallerys): foreach($gallerys as $gallery):  ?>
            <div style="position:relative; float:left; padding:10px 5px 5px 10px; "> <a href="<?php echo $gallery['image']; ?>" class="pirobox_gall" title="<?php echo $gallery['trip_title'] ?>"> <img class="imgAvatar" src="<?php echo $gallery['image']; ?>" width="135" height="90" alt="edit"  /> </a> <a href="index.php?control=tripgallery&task=delimg&id=<?php echo $gallery['id']; ?>&tripid=<?php echo $gallery['trip_id']; ?>&img=<?php echo $gallery['image']; ?>" onclick="return confirm('Are you sure you want to Delete ')" > <img class="delete_btn" src="images/backend/delete.png" alt="Delete" title="Delete" /> </a> </div>
            <?php $g++;  endforeach; 
		 else:
		 echo '<h3 align="center" style="padding:10px 5px 5px 10px; ">No Gallery Found</h3>';
		 endif;?>
            <div style="clear:both;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>


<!--popup--> 

<a href="#" id="popupid" data-reveal-id="myModal"></a>
<div id="myModal" class="reveal-modal">
  <div style="float:right; width:100%;">
    <div class="news_title_pop">Upload Image</div>
    <br />
    <div>
      <p id="cartajaxdata">
        <?php require_once("mainupload.php");	 ?>
      </p>
    </div>
    <a id="bpop" class="close-reveal-modal"><img src="images/close2.png" width="23" height="23" /></a> </div>
</div>
<script type="text/javascript" /> 
function loadpopupupload() {
		$('#progressbox2').css('display','none');
		//document.getElementById("cartajaxdata").innerHTML=xmlhttp.responseText;			
		document.getElementById("popupid").click();	
} 
		</script>