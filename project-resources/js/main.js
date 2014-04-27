var objectsArray;




var gridSize = 40;
// var $objectContainerWrap = $("#objectContainerWrap");
var $objectContainer = $("#objectContainer");


var windowWidth = $(window).width();
var windowHeight = $(window).height();

var screenWidth = screen.width;
var screenHeight = screen.height;

// alert(screenWidth+" - "+screenHeight);
// console.log(Math.floor(windowWidth/gridSize)+" - "+windowHeight);


// var gridColumns = Math.floor(windowWidth/gridSize);
// var gridRows = 20;
var gridColumns = Math.floor(screenWidth/gridSize)+3;
var gridRows = Math.floor(screenHeight/gridSize)+3;

// $objectContainerWrap.css({"height":(gridRows*gridSize)+"px"});
// $objectContainer.css({"width":"750px"});
// $objectContainer.css({"width":(gridColumns*gridSize)+"px"});
// $objectContainer.css({"width":(gridColumns*gridSize)+"px", "margin-left":"-"+(gridColumns*gridSize)/2+"px"});



function addObject(object) {
  return "<div class='object "+object["objectType"]+"-"+object["objectWidth"]+"x"+object["objectHeight"]+"' style='left:"+( object["objectX"]===0 ? 1 : (object["objectX"]*gridSize) )+"px; top:"+(object["objectY"]*gridSize)+"px; background-color:"+object["objectColor"]+"; z-index:"+object["objectZIndex"]+";'>"+object["id"]+"</div>";
}


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

function renderObjects() {
  var printout = "";
  $.each(objectsArray["data"], function(i, object){
    printout += addObject(object);
    //printout += "<div class='object "+object["objectType"]+"' style='left:"+( object["objectX"]===0 ? 1 : (object["objectX"]*gridSize) )+"px; top:"+(object["objectY"]*gridSize)+"px; background-color:"+object["objectColor"]+"; z-index:"+object["objectZIndex"]+";'>"+object["userName"]+"</div>";
  });
  $("#objectContainer").append(printout);
  dragObjectsSetUp();
}

function getObjectsData(getLocationObject) {
  $.post("getObjects.php", { data: getLocationObject }, function(response) {
    // console.log(response["complete"]);
    
    if (response["complete"]>0) {
      objectsArray = response;
      renderObjects();
    } else {
      // $("#responseText").text(response["details"]);
    }

  });
}







for (var i = 0; i < gridRows * gridColumns; i++) {
	var y = Math.floor(i / gridColumns) * gridSize;
	var x = (i * gridSize) % (gridColumns * gridSize);
	$("<div/>").css({position:"absolute", border:"1px solid #454545", width:gridSize-1, height:gridSize-1, top:y, left:x}).prependTo($objectContainer);
}

TweenLite.set($objectContainer, {height: gridRows * gridSize + 1, width: gridColumns * gridSize + 1});


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
  $("html, body").animate({ scrollTop: $(document).height() }, { duration: 1000, queue: false});
  $("html, body").animate({ scrollLeft: ((gridColumns*gridSize)-windowWidth)/2 }, { duration: 1000, queue: false});
});




$(document).ready(function() {
	$("#dynamicAdd").click(function(){

    //random values for testing
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    var colors = ["aqua","black","blue","fuchsia","gray","green","lime","maroon","navy","olive","orange","purple","red","silver","teal","yellow"];
		var shapes = ["square","circle"];
    userObject["userName"] = "A";
    userObject["objectType"] = shapes[getRandomInt(0,1)];
    userObject["objectWidth"] = getRandomInt(1,4);
    userObject["objectHeight"] = getRandomInt(1,4);
    userObject["objectX"] = getRandomInt(1,8);
    userObject["objectY"] = getRandomInt(1,8);
    userObject["objectColor"] = colors[getRandomInt(0,15)];
    userObject["objectTexture"] = 0;
    userObject["objectZIndex"] = 0;



		JSON.stringify(userObject);
		$.post("postObject.php", { data: userObject }, function(response) {
		  if (response["complete"]) {
        $("#responseText").text(response["details"]);
      } else {
        $("#responseText").text(response["details"]);
      }
		});
		// $objectContainer.append("<div class='object "+userObject["objectType"]+"' style='left:"+userObject["objectX"]+"px; top:"+userObject["objectY"]+"px; background-color:"+userObject["objectColor"]+";'>"+userObject["userName"]+"</div>");
    $objectContainer.append(addObject(userObject));
		dragObjectsSetUp();

	});



	// test if cookies are enabled
	// $.cookie("test_cookie", "cookie_value", { path: "/" });
	// if ($.cookie("test_cookie") == "cookie_value") {
	//     // cookie worked, set/enable appropriate things
	// }

});