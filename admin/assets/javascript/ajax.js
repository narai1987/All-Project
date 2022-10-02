// JavaScript Document
$(function(){
	alert('ppp');
		$('#ajax_schedule_form').form({
			success:function(data){
			/*	$('.green_alert').remove();
				$('.alert_red').remove();*/
				
				$('#ajax_schedule_form').after(data);
			}
		});
	});
	
	
	
