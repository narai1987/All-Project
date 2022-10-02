/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	$(".menu > li").click(function(e){
		switch(e.target.id){
			case "news":
				//change status & style menu
				$("#news").addClass("active");
				$("#tutorials").removeClass("active");
				$("#links").removeClass("active");
				//display selected division, hide others
				$("div.news").fadeIn();
				$("div.tutorials").css("display", "none");
				$("div.links").css("display", "none");
			break;
			case "tutorials":
				//change status & style menu
				$("#news").removeClass("active");
				$("#tutorials").addClass("active");
				$("#links").removeClass("active");
				//display selected division, hide others
				$("div.tutorials").fadeIn();
				$("div.news").css("display", "none");
				$("div.links").css("display", "none");
			break;
			case "links":
				//change status & style menu
				$("#news").removeClass("active");
				$("#tutorials").removeClass("active");
				$("#links").addClass("active");
				//display selected division, hide others
				$("div.links").fadeIn();
				$("div.news").css("display", "none");
				$("div.tutorials").css("display", "none");
			break;
		}
		//alert(e.target.id);
		return false;
	});
	$(".menu1 > li").click(function(e){
		switch(e.target.id){
			case "desc":
				//change status & style menu
				$("#desc").addClass("active");
				$("#spec").removeClass("active");
				$("#rev").removeClass("active");
				//display selected division, hide others
				$("div.desc").fadeIn();
				$("div.spec").css("display", "none");
				$("div.rev").css("display", "none");
			break;
			case "spec":
				//change status & style menu
				$("#desc").removeClass("active");
				$("#spec").addClass("active");
				$("#rev").removeClass("active");
				//display selected division, hide others
				$("div.spec").fadeIn();
				$("div.desc").css("display", "none");
				$("div.rev").css("display", "none");
			break;
			case "rev":
				//change status & style menu
				$("#desc").removeClass("active");
				$("#spec").removeClass("active");
				$("#rev").addClass("active");
				//display selected division, hide others
				$("div.rev").fadeIn();
				$("div.desc").css("display", "none");
				$("div.spec").css("display", "none");
			break;
		}
		//alert(e.target.id);
		return false;
	});
	$(".menu2 > li").click(function(e){
		switch(e.target.id){
			case "tab1":
				//change status & style menu
				$("#tab1").addClass("active");
				$("#tab2").removeClass("active");
				$("#tab3").removeClass("active");
				$("#tab4").removeClass("active");
				$("#tab5").removeClass("active");
				$("#tab6").removeClass("active");
				//display selected division, hide others
				$("div.tab1").fadeIn();
				$("div.tab2").css("display", "none");
				$("div.tab3").css("display", "none");
				$("div.tab4").css("display", "none");
				$("div.tab5").css("display", "none");
				$("div.tab6").css("display", "none");
			break;
			case "tab2":
				//change status & style menu
				$("#tab1").removeClass("active");
				$("#tab2").addClass("active");
				$("#tab3").removeClass("active");
				$("#tab4").removeClass("active");
				$("#tab5").removeClass("active");
				$("#tab6").removeClass("active");
				//display selected division, hide others
				$("div.tab2").fadeIn();
				$("div.tab1").css("display", "none");
				$("div.tab3").css("display", "none");
				$("div.tab4").css("display", "none");
				$("div.tab5").css("display", "none");
				$("div.tab6").css("display", "none");
			break;
			case "tab3":
				//change status & style menu
				$("#tab1").removeClass("active");
				$("#tab2").removeClass("active");
				$("#tab3").addClass("active");
				$("#tab4").removeClass("active");
				$("#tab5").removeClass("active");
				$("#tab6").removeClass("active");
				//display selected division, hide others
				$("div.tab3").fadeIn();
				$("div.tab1").css("display", "none");
				$("div.tab2").css("display", "none");
				$("div.tab4").css("display", "none");
				$("div.tab5").css("display", "none");
				$("div.tab6").css("display", "none");
			break;
			case "tab4":
				//change status & style menu
				$("#tab1").removeClass("active");
				$("#tab2").removeClass("active");
				$("#tab3").removeClass("active");
				$("#tab4").addClass("active");
				$("#tab5").removeClass("active");
				$("#tab6").removeClass("active");
				//display selected division, hide others
				$("div.tab4").fadeIn();
				$("div.tab1").css("display", "none");
				$("div.tab2").css("display", "none");
				$("div.tab3").css("display", "none");
				$("div.tab5").css("display", "none");
				$("div.tab6").css("display", "none");
			break;
			case "tab5":
				//change status & style menu
				$("#tab1").removeClass("active");
				$("#tab2").removeClass("active");
				$("#tab3").removeClass("active");
				$("#tab4").removeClass("active");
				$("#tab5").addClass("active");
				$("#tab6").removeClass("active");
				//display selected division, hide others
				$("div.tab5").fadeIn();
				$("div.tab1").css("display", "none");
				$("div.tab2").css("display", "none");
				$("div.tab3").css("display", "none");
				$("div.tab4").css("display", "none");
				$("div.tab6").css("display", "none");
			break;
			case "tab6":
				//change status & style menu
				$("#tab1").removeClass("active");
				$("#tab2").removeClass("active");
				$("#tab3").removeClass("active");
				$("#tab4").removeClass("active");
				$("#tab5").removeClass("active");
				$("#tab6").addClass("active");
				//display selected division, hide others
				$("div.tab6").fadeIn();
				$("div.tab1").css("display", "none");
				$("div.tab2").css("display", "none");
				$("div.tab3").css("display", "none");
				$("div.tab5").css("display", "none");
				$("div.tab4").css("display", "none");
			break;
		}
		
		//alert(e.target.id);
		return false;
	});
	$(".menu3 > li").click(function(e){
		switch(e.target.id){
			case "ship":
				//change status & style menu
				$("#ship").addClass("active");
				$("#gift").removeClass("active");
				$("#coupon").removeClass("active");
				//display selected division, hide others
				$("div.ship").fadeIn();
				$("div.gift").css("display", "none");
				$("div.coupon").css("display", "none");
			break;
			case "gift":
				//change status & style menu
				$("#ship").removeClass("active");
				$("#gift").addClass("active");
				$("#coupon").removeClass("active");
				//display selected division, hide others
				$("div.gift").fadeIn();
				$("div.ship").css("display", "none");
				$("div.coupon").css("display", "none");
			break;
			case "coupon":
				//change status & style menu
				$("#ship").removeClass("active");
				$("#gift").removeClass("active");
				$("#coupon").addClass("active");
				//display selected division, hide others
				$("div.coupon").fadeIn();
				$("div.ship").css("display", "none");
				$("div.gift").css("display", "none");
			break;
		}
		//alert(e.target.id);
		return false;
	});
});