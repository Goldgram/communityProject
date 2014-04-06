$(document).ready(function() {
	$("#testButton").click(function () {
		alert("post data");
	});

	// test if cookies are enabled
	$.cookie('test_cookie', 'cookie_value', { path: '/' });
	if ($.cookie('test_cookie') == 'cookie_value') {
	    // cookie worked, set/enable appropriate things
	}

});