<?php
  if (isset($_GET["location"])) { //render specific location
    //clean location and query db
  } else { //render current location
     // $ip = $_SERVER["REMOTE_ADDR"];
  
    // TODO: for dev
    // $ip = $_SERVER["SERVER_NAME"]==="localhost" ? "89.101.132.209" : $_SERVER["REMOTE_ADDR"];
    // $ip = "";//empty ip
    $ip = "89.100.130.46";//dublin my ip
    // $ip = "89.101.132.209";//dublin publicis ip
    // $ip = "31.193.138.225";// uk ip
    // $ip = "198.211.103.38";// us ip
    // $ip = "50.31.252.76";// japan ip
    
  
    // $url = "http://api.ipinfodb.com/v3/ip-city/?key=98e360c9d6887e4f88d0c26b675b7b584c17fdef0c56038476845857c19094f6&ip=".$ip;
    $url = "http://freegeoip.net/json/".$ip;
    $geo = json_decode(file_get_contents($url), true);
  
    // $geo["city"] = "City Name";
    // $geo["region_name"] = "Region Name";
    // $geo["country_name"] = "Country Name";
  
    // $location = $geo["city"]!=="" ? $geo["city"] : ($geo["region_name"]!=="" ? $geo["region_name"] : ($geo["country_name"]!=="" ? $geo["country_name"] : "limbo"));
    
    if ($geo["city"]!=="") {
      $location = $geo["city"];
      $locationLevel = 1;
    } else if ($geo["region_name"]!=="") {
      $location = $geo["region_name"];
      $locationLevel = 2;
    } else if ($geo["country_name"]!=="") {
      $location = $geo["country_name"];
      $locationLevel = 3;
    } else {
      $location = "limbo";
      $locationLevel = 4;
    }


    




    // set up locations if not exist
  }
 
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Community Project</title>
    <link media="all" type="text/css" rel="stylesheet" href="http://normalize-css.googlecode.com/svn/trunk/normalize.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="resources/css/main.css">
    <script type="text/javascript">
      var userObject = {
        "location":"<?php echo $location; ?>",
        "locationLevel":"<?php echo $locationLevel; ?>",
        //should ip be set at end point?
        "ip":"<?php echo $ip; ?>",
        "userName":"",
        "objectType":"",
        "objectX":"",
        "objectY":""
        // "level1":"<?php echo $geo['country_name']; ?>",
        // "level2":"<?php echo $geo['region_name']; ?>",
        // "level3":"<?php echo $geo['city']; ?>"
      };
    </script>
  </head>
  <body>

    <p>country: <?php echo $geo["country_name"]; ?></p>
    <p>region: <?php echo $geo["region_name"]; ?></p>
    <p>city: <?php echo $geo["city"]; ?></p>
    <p>location: <?php echo $location; ?></p>


    <button id="testButton">test</button>
    <p id="responseText"></p>




    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
  </body>

</html>




