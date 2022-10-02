$(function(){
 $('#location').autocomplete('auto/data.php?mode=sql', {
        width: 250,
        max: 5
    }); 
	var state = document.getElementById("state_id").value;
	$('#city_fill').autocomplete('auto/city.php?mode=sql&state_id='+state, {
        width: 150,
        max: 8
    });
    /*$('#month').autocomplete(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], {
        width: 200,
        max: 3
    });

    $('#year').autocomplete('data.php?mode=xml', {
        width: 200,
        max: 5
    });

    $('#country').autocomplete('data.php?mode=sql', {
        width: 200,
        max: 5
    });*/

});
function chnState(state) {
	$('#city_fill').autocomplete('auto/city.php?mode=sql&state_id='+state, {
        width: 150,
        max: 8
    });
}