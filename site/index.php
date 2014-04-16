<?php
  define('PHP_KEY', 'r0r0n04_z0r0');
  include 'db.php';
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

  $location = $geo["city"]!=="" ? $geo["city"] : ($geo["region_name"]!=="" ? $geo["region_name"] : ($geo["country_name"]!=="" ? $geo["country_name"] : "limbo"));
  $country = $geo["country_name"];
  // if ($geo["city"]!=="") {
  //   $location = $geo["city"];
  //   $locationLevel = 1;
  // } else if ($geo["region_name"]!=="") {
  //   $location = $geo["region_name"];
  //   $locationLevel = 2;
  // } else if ($geo["country_name"]!=="") {
  //   $location = $geo["country_name"];
  //   $locationLevel = 3;
  // } else {
  //   $location = "limbo";
  //   $locationLevel = 4;
  // }
 


  if (isset($_GET["location"]) && isset($_GET["country"])) { //render specific location

    //clean location and query db
    // if location at level exists show, otherwise go to limbo
    $getLocation = strip_tags(mysql_real_escape_string($_GET["location"]));
    $getCountry = strip_tags(mysql_real_escape_string($_GET["country"]));


    $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
    if (mysqli_connect_errno()) {
      // $return["complete"] = false;
      // $return["details"] = "Could not connect: ".mysqli_connect_error();
    } else {
      //add day perameter into this
      $result = mysqli_query($db, "SELECT * FROM objects_table WHERE location='$getLocation' AND country='$getCountry'");
      var_dump(mysqli_fetch_array($result));
    }
    mysqli_close($db);

    
  } else { //render current location
    // set up locations current location
    // $data = getLocationData($location,$country);
    // var_dump();
  }





  //get the desired data
  $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
  if (mysqli_connect_errno()) {
    //fail  
    //$return["details"] = "Could not connect: ".mysqli_connect_error();
  } else {
    //add day perameter into this
    $result = mysqli_query($db, "SELECT * FROM objects_table");
    var_dump(mysqli_fetch_array($result));
   
  }
  mysqli_close($db);


    



  


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
        "country":"<?php echo $geo['country_name']; ?>",
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
    <h1>Current Data</h1>
    <p>country: <?php echo $geo["country_name"]; ?></p>
    <p>region: <?php echo $geo["region_name"]; ?></p>
    <p>city: <?php echo $geo["city"]; ?></p>
    <p>location: <?php echo $location; ?>, <?php echo $location; ?></p>

    <br>
    <br>

    <h1>Loaded Data</h1>
    <p>.<?php echo $data["complete"]; ?>.</p>
    <p>.<?php echo $data["details"]; ?>.</p>
    <br>
    <br>

    <button id="testButton">test</button>
    <p id="responseText"></p>




    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
  </body>

</html>




