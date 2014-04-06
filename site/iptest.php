<?php
  $ip = $_SERVER["REMOTE_ADDR"];
  
  // TODO: for dev
  $ip = $_SERVER["SERVER_NAME"]==="localhost" ? "89.101.132.209" : $_SERVER["REMOTE_ADDR"];
  // $ip = "";//empty ip
  // $ip = "89.100.130.46";//dublin my ip
  // $ip = "89.101.132.209";//dublin publicis ip
  // $ip = "31.193.138.225";// uk ip
  // $ip = "198.211.103.38";// us ip
  $ip = "50.31.252.76";// japan ip
  
  // function file_get_contents_curl($url) {
  //     $ch = curl_init();
  //     curl_setopt($ch, CURLOPT_HEADER, 0);
  //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
  //     curl_setopt($ch, CURLOPT_URL, $url);
  //     $data = curl_exec($ch);
  //     curl_close($ch);
  //     return $data;
  //   }

    function curl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }


        // $feed = 'http://twitter.com/statuses/user_timeline.rss?screen_name=google&count=6';
        // $tweets = curl($feed);
        // echo "test1";
        // echo "test1";
        // echo ">>".$tweets;


// http://api.ipinfodb.com/v3/ip-city/?key=98e360c9d6887e4f88d0c26b675b7b584c17fdef0c56038476845857c19094f6&ip=74.125.45.100





  $url = "http://freegeoip.net/json/".$ip;
  // $url = "http://api.ipinfodb.com/v3/ip-city/?key=98e360c9d6887e4f88d0c26b675b7b584c17fdef0c56038476845857c19094f6&ip=".$ip;

  // var_dump(file_get_contents_curl($url));
var_dump(curl($url));

  // $userFingerprint = $_SERVER['REMOTE_ADDR'] . '<br><br><br>' . $_SERVER['HTTP_USER_AGENT'] . '<br><br><br>' . $_SERVER['HTTP_ACCEPT'];
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>test 5</title>



  </head>
  <body>
<p>stuff</p>
    <button id="testButton">test</button>




  </body>

</html>




