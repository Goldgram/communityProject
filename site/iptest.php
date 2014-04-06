<?php
  $ip = $_SERVER["REMOTE_ADDR"];
  
  // TODO: for dev
  // $ip = $_SERVER["SERVER_NAME"]==="localhost" ? "89.101.132.209" : $_SERVER["REMOTE_ADDR"];
  // $ip = "";//empty ip
  $ip = "89.100.130.46";//dublin my ip
  // $ip = "89.101.132.209";//dublin publicis ip
  // $ip = "31.193.138.225";// uk ip
  // $ip = "198.211.103.38";// us ip
  // $ip = "50.31.252.76";// japan ip


  
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Community Project</title>
    <link media="all" type="text/css" rel="stylesheet" href="http://normalize-css.googlecode.com/svn/trunk/normalize.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="resources/css/main.css">
  </head>
  <body>

    <p><?php echo $ip; ?></p>

    <button id="testButton">test</button>




    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
  </body>

</html>


