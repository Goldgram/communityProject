var objectsArray;

function renderObjects() {
	var printout = "";
	$.each(objectsArray["data"], function(i, object){
		printout += "<div class='object "+object["objectType"]+"' style='left:"+object["objectX"]+"px; top:"+object["objectY"]+"px; background-color:"+object["objectColor"]+";'>"+object["userName"]+"</div>";
	});
	$("#objectContainer").append(printout);
	dragObjectsSetUp();
}

function getObjectsData(getLocationObject) {
	$.post("getObjects.php", { data: getLocationObject }, function(response) {
		console.log(response["complete"]);
  	objectsArray = response;
  	renderObjects();

	  // if (response["complete"]) {

	  // } else {
	    // $("#responseText").text(response["details"]);
	  // }

	});
}










var gridSize = 50;
var $container = $("#objectContainer");

var windowWidth = $(window).width();
var windowHeight = $(window).height();
alert(Math.floor(windowWidth/gridSize)+" - "+windowHeight);
var gridColumns = Math.floor(windowWidth/gridSize);
var gridRows = 5;

for (i = 0; i < gridRows * gridColumns; i++) {
	y = Math.floor(i / gridColumns) * gridSize;
	x = (i * gridSize) % (gridColumns * gridSize);
	$("<div/>").css({position:"absolute", border:"1px solid #454545", width:gridSize-1, height:gridSize-1, top:y, left:x}).prependTo($container);
}

TweenLite.set($container, {height: gridRows * gridSize + 1, width: gridColumns * gridSize + 1});

function dragObjectsSetUp(){
	Draggable.create(".object", {
    type:"x,y",
    edgeResistance:0.65,
    bounds:"#objectContainer",
    throwProps:true,
    liveSnap:true,
    snap: {
      x: function(endValue) {
        return Math.round(endValue/gridSize)*gridSize;
      },
      y: function(endValue) {
        return Math.round(endValue/gridSize)*gridSize;
      }
    }
	});
}
// dragObjectsSetUp();



var queryString = function() {
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
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





$(window).load(function() {
  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
  // $("html, body").scrollTop($(document).height()); //not working correctly
});

$(document).ready(function() {
	$("#dynamicAdd").click(function(){

		userObject["userName"] = "A";
    userObject["objectType"] = "square";
    userObject["objectX"] = "0";
    userObject["objectY"] = "0";
    userObject["objectColor"] = "red";

		JSON.stringify(userObject);
		$.post("postObject.php", { data: userObject }, function(response) {
		  if (response["complete"]) {
        $("#responseText").text(response["details"]);
      } else {
        $("#responseText").text(response["details"]);
      }
		});

		$container.append("<div class='object "+userObject["objectType"]+"' style='left:"+userObject["objectX"]+"px; top:"+userObject["objectY"]+"px; background-color:"+userObject["objectColor"]+";'>"+userObject["userName"]+"</div>");
		dragObjectsSetUp();

	});



	// test if cookies are enabled
	// $.cookie("test_cookie", "cookie_value", { path: "/" });
	// if ($.cookie("test_cookie") == "cookie_value") {
	//     // cookie worked, set/enable appropriate things
	// }

});