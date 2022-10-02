// JavaScript Document

<!--quick cart-->
$(document).ready(function() {
		$('.answer').css('z-index','100000');
		$('#qc1').hover(
			function (){
				$(this).find('.answer').slideDown(300);
				$('.question').css('color','#fbc012');
			}, 
			function () {
				$(this).find('.answer').slideUp(300);
				$('.question').css('color','#ffffff');
			}
		);
	});
	
<!--// quick cart-->

<!--stylish select-->
	$(function () {
		$("#country_id").selectbox();
		$("#country_id_currency").selectbox();
		
	});
<!--//stylish select-->


