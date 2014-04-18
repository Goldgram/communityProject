$(document).ready(function() {


			

	$.post("getObjects.php", { data: locationObject }, function(response) {
		console.log("done");
	  if (response["complete"]) {
      $("#responseText").text(response["details"]);
	  	console.log("good");
	  	console.log(response["data"]);
    } else {
    	console.log("bad");
      $("#responseText").text(response["details"]);
    }
	});



	$("#testButton").click(function() {
    userObject["userName"] = "Sterling Archer";
    userObject["objectType"] = "Square";
    userObject["objectX"] = "150";
    userObject["objectY"] = "100";

    console.log(userObject);

		JSON.stringify(userObject);
		$.post("postObject.php", { data: userObject }, function(response) {
		  if (response["complete"]) {
        $("#responseText").text(response["details"]);
      } else {
        $("#responseText").text(response["details"]);
      }
		});
	});

	// test if cookies are enabled
	// $.cookie("test_cookie", "cookie_value", { path: "/" });
	// if ($.cookie("test_cookie") == "cookie_value") {
	//     // cookie worked, set/enable appropriate things
	// }

});