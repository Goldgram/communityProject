<?php
  // capture the users ip address otherwise use ireland 89.101.132.209 as default
  $ip = $_SERVER['SERVER_NAME']!='localhost'?$_SERVER['REMOTE_ADDR']:'89.101.132.209';
  $url = "http://freegeoip.net/json/".$ip;
  $geo = json_decode(file_get_contents($url), true);

  $userFingerprint = $_SERVER['REMOTE_ADDR'] . '<br><br><br>' . $_SERVER['HTTP_USER_AGENT'] . '<br><br><br>' . $_SERVER['HTTP_ACCEPT'];
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Community Project</title>
    <link media="all" type="text/css" rel="stylesheet" href="http://normalize-css.googlecode.com/svn/trunk/normalize.css"/>
    <link media="all" type="text/css" rel="stylesheet" href="resources/css/main.css">
    <script type="text/javascript">
      var ipCountryName = "<?php echo $geo['country_name'] ?>";
    </script>
  </head>
  <body>

    <p><?php echo $geo['country_name']; ?></p>
    <p><?php echo $userFingerprint; ?></p>

    <button id="testButton">test</button>




    <!--[if lte IE 8]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
  </body>

</html>


