<?php
  
  $ip = $_SERVER["REMOTE_ADDR"];

  // TODO: for dev
  // $ip = $_SERVER["SERVER_NAME"]==="localhost" ? "89.101.132.209" : $_SERVER["REMOTE_ADDR"];
  // $ip = "";//empty ip
  // $ip = "89.100.130.46";//dublin my ip
  // $ip = "89.101.132.209";//dublin publicis ip
  // $ip = "31.193.138.225";// uk ip
  // $ip = "198.211.103.38";// us ip
  $ip = "50.31.252.76";// japan ip
  

  // $url = "http://api.ipinfodb.com/v3/ip-city/?key=98e360c9d6887e4f88d0c26b675b7b584c17fdef0c56038476845857c19094f6&ip=".$ip;
  $url = "http://freegeoip.net/json/".$ip;
  $geo = json_decode(file_get_contents($url), true);

  $location = $geo["city"]!=="" ? $geo["city"] : ($geo["region_name"]!=="" ? $geo["region_name"] : ($geo["country_name"]!=="" ? $geo["country_name"] : "limbo"));
  $country = $geo["country_name"];

?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Community Project</title>
    <link media="all" type="text/css" rel="stylesheet" href="http://normalize-css.googlecode.com/svn/trunk/normalize.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="resources/main.min.css">
  </head>
  <body>

    <!-- <h2>Current Data: <?php //echo $location; ?>, <?php //echo $country; ?></h2> -->
  <!-- <div id="objectContainerWrap"> -->
    <div id="objectContainer">
      


      <button id="leftControl" class="menuControls">left</button>
      <button id="rightControl" class="menuControls">right</button>
      <button id="topControl" class="menuControls">top</button>
      <button id="bottomControl" class="menuControls">bottom</button>
      
      <button id="dynamicAdd">Add</button>
    </div>



  <!-- </div> -->
     
    
    
    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/TweenMax.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/plugins/CSSPlugin.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/utils/Draggable.min.js"></script>
    <script type="text/javascript">
      var userObject = {
        "location":"<?php echo $location; ?>"
        ,"country":"<?php echo $geo['country_name']; ?>"
        ,"userName":"Anonymous"
        ,"objectType":"square"
        ,"objectWidth":1
        ,"objectHeight":1
        ,"objectX":1
        ,"objectY":1
        ,"objectColor":"#333"
        ,"objectTexture":"000"
        ,"objectZIndex":0
        ,"objectRotation":0
      };
    </script>
    <script type="text/javascript" src="resources/main.min.js"></script>
  </body>

</html>




