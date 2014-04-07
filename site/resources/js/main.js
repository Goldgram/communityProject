$(document).ready(function() {
	$("#testButton").click(function () {
		// event.preventDefault();
		// console.log(geoObject);
		JSON.stringify(geoObject);
		$.post("addObject.php", { data: geoObject }, function(response) {
		  // console.log(response);
		  if (response["complete"]) {
        $("#responseText").text("Added.");
      } else {
        $("#responseText").text("Sorry, your request could not be completed at this time. Please try again later.");
      }
		}).fail(function() {
    	$("#responseText").text("Sorry, your request could not be completed at this time. Please try again later.");
	  });
	});

	// test if cookies are enabled
	// $.cookie("test_cookie", "cookie_value", { path: "/" });
	// if ($.cookie("test_cookie") == "cookie_value") {
	//     // cookie worked, set/enable appropriate things
	// }

});