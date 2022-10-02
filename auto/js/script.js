$(function(){
 $('#location').autocomplete('auto/data.php?mode=sql', {
        width: 230,
        max: 5,
		cacheLength: 0
    });
	//alert("sjdfh");
	$('#mysearch').autocomplete('auto/data.php?mode=sql', {
        width: 180,
        max: 5,
		cacheLength: 0
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