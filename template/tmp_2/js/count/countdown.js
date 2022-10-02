/**********************************
jQuery Countdown Script v0.1 (beta)
Website: http://devingredients.com
Author: Catalin Berta

Article: http://devingredients.com/2011/11/building-an-extensible-jquery-countdown-plugin-from-scratch/
Download link: http://devingredients.com/files/020/final020/020-final.zip 
**********************************/

(function($) {
	$.fn.countdown = function(options, callback) {

		//custom 'this' selector
		var thisEl = $(this);

		//array of custom settings
		var settings = { 
			'date': null,
			'format': null
		};

		//append the settings array to options
		if(options) {
			$.extend(settings, options);
		}
		
		//main countdown function
		function countdown_proc() {
			
			var eventDate = Date.parse(settings['date']) / 1000;
			var currentDate = Math.floor($.now() / 1000);
			
			if(eventDate <= currentDate) {
				callback.call(this);
				clearInterval(interval);
			}
			
			var seconds = eventDate - currentDate;
			
			var days = Math.floor(seconds / (60 * 60 * 24)); //calculate the number of days
			seconds -= days * 60 * 60 * 24; //update the seconds variable with no. of days removed
			
			var hours = Math.floor(seconds / (60 * 60));
			seconds -= hours * 60 * 60; //update the seconds variable with no. of hours removed
			
			var minutes = Math.floor(seconds / 60);
			seconds -= minutes * 60; //update the seconds variable with no. of minutes removed
			
			//conditional Ss
			if (days == 1) { thisEl.find(".timeRefDays").text("day"); } else { thisEl.find(".timeRefDays").text("Days"); }
			if (hours == 1) { thisEl.find(".timeRefHours").text("hour"); } else { thisEl.find(".timeRefHours").text("Hours"); }
			if (minutes == 1) { thisEl.find(".timeRefMinutes").text("minute"); } else { thisEl.find(".timeRefMinutes").text("Minutes"); }
			if (seconds == 1) { thisEl.find(".timeRefSeconds").text("second"); } else { thisEl.find(".timeRefSeconds").text("Seconds"); }
			
			//logic for the two_digits ON setting
			if(settings['format'] == "on") {
				days = (String(days).length >= 2) ? days : "0" + days;
				//days = days.;
				var days1=days.substr(0,1);
				var days2=days.substr(1,1);
				
				hours = (String(hours).length >= 2) ? hours : "0" + hours;
				hours = String(hours);
				var hours1=hours.substr(0,1);
				var hours2=hours.substr(1,1);
				
				
				
				minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
				minutes = String(minutes);
				var minutes1=minutes.substr(0,1);
				var minutes2=minutes.substr(1,1);
				
				seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
				seconds = String(seconds);
				var seconds1=seconds.substr(0,1);
				var seconds2=seconds.substr(1,1);
				
			}
			
			//update the countdown's html values.
			if(!isNaN(eventDate)) {
				thisEl.find(".days1").text(days1);
				thisEl.find(".days2").text(days2);
				thisEl.find(".hours1").text(hours1);	
				thisEl.find(".hours2").text(hours2);
				thisEl.find(".minutes1").text(minutes1);	
				thisEl.find(".minutes2").text(minutes2);			
				thisEl.find(".seconds1").text(seconds1);	
				thisEl.find(".seconds2").text(seconds2);			
			} else { 
				alert("Invalid date. Here's an example: 12 Tuesday 2012 17:30:00");
				clearInterval(interval); 
			}
		}
		
		//run the function
		countdown_proc();
		
		//loop the function
		interval = setInterval(countdown_proc, 1000);
		
	}
}) (jQuery);