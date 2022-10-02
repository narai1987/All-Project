
<script type="text/javascript">

$(document).ready(function() { 
//$("#boatidd").val($('#gallery').val());
							var progressbox2     = $('#progressbox2');
							var progressbar2     = $('#progressbar2');
							var statustxt2       = $('#statustxt2');
							var completed2       = '0%';
				
						var options = { 
								target:   '#ajaxData2',   /*#output*/// target element(s) to be updated with server response 
								beforeSubmit:  UpbeforeSubmit,  // pre-submit callback 
								uploadProgress: UpOnProgress,
								success:       UpafterSuccess,  // post-submit callback 
								resetForm: true        // reset the form after successful submit 
							}; 
					
						 $('#MainUploadForm').submit(function() { 
								$(this).ajaxSubmit(options);  			
								// return false to prevent standard browser submit and page navigation 
								return false; 
							});
				



//when upload progresses	
function UpOnProgress(event, position, total, percentComplete)
{
	//Progress bar
	progressbar2.width(percentComplete + '%') //update progressbar percent complete
	statustxt2.html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			statustxt2.css('color','#fff'); //change status text to white after 50%
		}
}

//after succesful upload
function UpafterSuccess()
{
	$('#submit-btn2').show(); //hide submit button
	$('#loading-img2').hide(); //hide submit button	
	
	//pirobox start
	
	
	$().piroBox({
			my_speed: 1000, //animation speed
			bg_alpha: 0.3, //background opacity
			slideShow : true, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
	//pirobox end
	$('#bpop').click();
	
	
}

//function to check file size before uploading.
function UpbeforeSubmit(){
	
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#mainFile').val()) //check empty input filed
		{
			$("#output2").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#mainFile')[0].files[0].size; //get file size
		var ftype = $('#mainFile')[0].files[0].type; // get file type
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output2").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output2").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		//Progress bar
		progressbox2.show(); //show progressbar
		progressbar2.width(completed2); //initial value 0% of progressbar
		statustxt2.html(completed2); //set status text
		statustxt2.css('color','#000'); //initial color of status text

				
		$('#submit-btn2').hide(); //hide submit button
		$('#loading-img2').show(); //hide submit button
		$("#output2").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output2").html("Please upgrade your browser, because your current browser lacks some new features we need!");
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


<div id="upload-wrapper">
<div align="center">

    <form action="ajax.php?control=boatgallery" onSubmit="return false" method="post" enctype="multipart/form-data" id="MainUploadForm">

<h3>Update Image</h3>
	<span class="">Image Type allowed: Jpeg, Jpg, Png and Gif. | Maximum Size 1 MB</span><br />

    <input name="mainFile" id="mainFile" type="file" />
    <input type="submit"  id="submit-btn2" value="Upload" />
    <input type="hidden" name="boatidd2" id="boatidd2" value="<?php echo $_REQUEST['gallery']; ?>"/>
    <input type="hidden" name="task" value="uploadImage"/>
    <input type="hidden" name="imageType" id="imageType" value=""/>
    <img src="images/ajax-loader.gif" id="loading-img2" style="display:none;" alt="Please Wait"/>
<div id="progressbox2" style="display:none;">
    <div id="progressbar2"></div>
    <div id="statustxt2">0%</div>
</div>
	<div id="output2"></div>



    </form>
</div>
</div>