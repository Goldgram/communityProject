var objectsArray;

function renderObjects() {
	var printout = "";
	$.each(objectsArray["data"], function(i, object){
	  printout += "<p>id: "+object["id"]+"</p>";
		printout += "<p>ip: "+object["ip"]+"</p>";
		printout += "<p>location: "+object["location"]+"</p>";
		printout += "<p>country: "+object["country"]+"</p>";
		printout += "<p>user name: "+object["user_name"]+"</p>";
		printout += "<p>object type: "+object["object_type"]+"</p>";
		printout += "<p>object x: "+object["object_x"]+"</p>";
		printout += "<p>object y: "+object["object_y"]+"</p>";
		printout += "<p>------------------<p>";
	});
	$("#resultsDiv").html(printout);
}

function getObjectsData(getLocationObject) {
	// var data = {"test":"whopop"};
	$.post("getObjects.php", { data: getLocationObject }, function(response) {
		// console.log(data);
		// console.log(response["complete"]);
		// console.log(response["details"]);
		// console.log(response["data"]);
	    $("#responseText").text(response["details"]);
	  	

	  	objectsArray = response;
	  	renderObjects();

	  // if (response["complete"]) {
			// var printout = "";
			// $.each(response["data"], function(i, object){
			//   printout += "<p>id: "+object["id"]+"</p>";
			// 	printout += "<p>ip: "+object["ip"]+"</p>";
			// 	printout += "<p>location: "+object["location"]+"</p>";
			// 	printout += "<p>country: "+object["country"]+"</p>";
			// 	printout += "<p>user name: "+object["user_name"]+"</p>";
			// 	printout += "<p>object type: "+object["object_type"]+"</p>";
			// 	printout += "<p>object x: "+object["object_x"]+"</p>";
			// 	printout += "<p>object y: "+object["object_y"]+"</p>";
			// 	printout += "<p>------------------<p>";
			// });
	  // 	$("#resultsDiv").html(printout);
	  // } else {

	    // $("#responseText").text(response["details"]);
	  // }
	  // console.log(objectsArray["complete"]);
	  // data["details"] = response["details"];
	  // data["complete"] = "responsecomplete";
	  // data["details"] = "response['details']";
	});
// console.log(objectsArray["complete"]);
	// return data;
}




var queryString = function() {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    	// If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
    	// If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
    	// If third or later entry with this name
    } else {
      query_string[pair[0]].push(pair[1]);
    }
  } 
  return query_string;
}();


if (queryString.location && queryString.country) {
	getObjectsData({"localLocation":"false", "location":queryString.location, "country":queryString.country});
} else {
	getObjectsData({"localLocation":"true", "location":userObject["location"], "country":userObject["country"]});
}

// console.log(">");
// console.log(objectsArray["complete"]);
// console.log(">");





$(document).ready(function() {

	$("#testButton").click(function() {
    userObject["userName"] = "Sterling Archer";
    userObject["objectType"] = "Square";
    userObject["objectX"] = "150";
    userObject["objectY"] = "100";

		JSON.stringify(userObject);
		$.post("postObject.php", { data: userObject }, function(response) {
		  if (response["complete"]) {
        $("#responseText").text(response["details"]);
      } else {
        $("#responseText").text(response["details"]);
      }
		});
	});

	$("#testButton2").click(function() {
		console.log(objectsArray);		
		// console.log(objectsArray["complete"]);
		// console.log(objectsArray["details"]);
		// console.log(objectsArray["data"]);
	});

	// test if cookies are enabled
	// $.cookie("test_cookie", "cookie_value", { path: "/" });
	// if ($.cookie("test_cookie") == "cookie_value") {
	//     // cookie worked, set/enable appropriate things
	// }

});