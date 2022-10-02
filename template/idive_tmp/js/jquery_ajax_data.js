/*$(function(){
		$('#ajax_newsletter_form').form({
			success:function(data){
				$('.green_alert').remove();
				$('.alert_red').remove();
				$('#ajax_newsletter_form').before(data);
			}
		});
	});*/
	
	
	
	function newsLetterClick(){
           		$('.loader').remove();
		$('#ajax_newsletter_form').before('<div class="clr"></div><div class="loader" style="margin-left:75px;"><img src="images/ajax-loader3.gif" /></div>');
          		 $('.green_alert').remove();
				$('.alert_red').remove();
		$.ajax({
        type: 'POST',
        url: 'ajax.php?control=myaccount&task=newsletter',
        data: $("#ajax_newsletter_form").serialize(),
        success: function (data) {
          		 $('.green_alert').remove();
				$('.alert_red').remove();
           		$('.loader').remove();
				$('#ajax_newsletter_form').before(data);
         },
      });
	  return false;
	
	}