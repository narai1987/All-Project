// JavaScript Document

function fillOriginAndDes(id) {
$.ajax({
url:"ajax.php?control=search&task=origin&id="+id,
success:function(result17){
	
	
			$.ajax({
		url:"ajax.php?control=search&task=destination&id="+id,
		success:function(result7){
		$("#destination").html(result7);
		$("#destination").trigger('update');
		}});
	
$("#origin").html(result17);
$("#origin").trigger('update');
}});

}	

function fillDestination(id) {
$.ajax({
url:"ajax.php?control=search&task=OrgDestination&id="+id,
success:function(result5){
	
$("#destination").html(result5);
$("#destination").trigger('update');
}});

}	


function fillEndDate(id) {
$.ajax({
url:"ajax.php?control=search&task=endDate&id="+id,
success:function(result5){
	
$("#end_date").html(result5);
$("#end_date").trigger('update');
}});

}	