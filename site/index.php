<?php
  
  $ip = $_SERVER["REMOTE_ADDR"];

  // TODO: for dev
  // $ip = $_SERVER["SERVER_NAME"]==="localhost" ? "89.101.132.209" : $_SERVER["REMOTE_ADDR"];
  // $ip = "";//empty ip
  // $ip = "89.100.130.46";//dublin my ip
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
 


  // define('PHP_KEY', 'r0r0n04_z0r0');

  // function getLocationData($location, $country) {
  //   include 'db.php';
  //   // global $db_host, $db_usr, $db_pass, $db_name;
  //   //get the desired data
  //   $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
  //   if (mysqli_connect_errno()) {
  //     //fail 
  //     // $data
  //     //$return["details"] = "Could not connect: ".mysqli_connect_error();
  //   } else {
  //     //add day perameter into this
  //     $location = strip_tags(mysqli_real_escape_string($db, $location));
  //     $country = strip_tags(mysqli_real_escape_string($db, $country));
  //     // $sql = "SELECT * FROM objects_table WHERE location='$location' AND country='$country'";
  //     $sql = "SELECT * FROM objects_table WHERE location='$location' AND country='$country'";
  //     $data = mysqli_query($db, $sql);
  //   }
  //   mysqli_close($db);
  //   return $data;
  // }




  // $hasUrlLocationData = false;
  // if (isset($_GET["location"]) && isset($_GET["country"])) { //render specific location

  //   // //clean location and query db
  //   // // if location at level exists show, otherwise go to limbo
  //   $objects = getLocationData($_GET["location"],$_GET["country"]);

  //   //if the data is Ok
  //   $hasUrlLocationData = $objects ? true : false;
  // } 

  // if(!$hasUrlLocationData) { //render current location
  //   // set up locations current location
  //   $objects = getLocationData($location,$country);
  // }
// var_dump($objects);



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
      var locationObject = {
        "location":"<?php echo $location; ?>",
        "country":"<?php echo $geo['country_name']; ?>"
      };
    </script>
  </head>
  <body>
    <h1>Current Data</h1>
    <p>location: <?php echo $location; ?>, <?php echo $country; ?></p>
    <br>
    <br>

    <h1>Loaded Data</h1>
    <?php foreach($objects as $object):?>
      <!-- <p>*<?php //var_dump($object); ?>*</p> -->
      <p>id: <?php echo $object["id"]; ?></p>
      <p>ip: <?php echo $object["ip"]; ?></p>
      <p>location: <?php echo $object["location"]; ?></p>
      <p>country: <?php echo $object["country"]; ?></p>
      <p>userName: <?php echo $object["user_name"]; ?></p>

      <p>***</p>
    <?php endforeach;?>
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




