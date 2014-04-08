<?php 
define('PHP_KEY', 'r0r0n04_z0r0');
header('Content-Type: application/json');

if (isset($_POST["data"])) {
  // $data = json_decode($_POST["data"]);
  $location = strip_tags(mysql_escape_string($_POST["data"]["location"]));
  $locationLevel = strip_tags(mysql_escape_string($_POST["data"]["locationLevel"]));

  $ip = strip_tags(mysql_escape_string($_POST["data"]["ip"]));
  $userName = strip_tags(mysql_escape_string($_POST["data"]["userName"]));
  $objectType = strip_tags(mysql_escape_string($_POST["data"]["objectType"]));
  $objectX = strip_tags(mysql_escape_string($_POST["data"]["objectX"]));
  $objectY = strip_tags(mysql_escape_string($_POST["data"]["objectY"]));



  // $level1 = strip_tags(mysql_escape_string($_POST["data"]["level1"]));
  // $level2 = strip_tags(mysql_escape_string($_POST["data"]["level2"]));
  // $level3 = strip_tags(mysql_escape_string($_POST["data"]["level3"]));
  
  include 'db.php';

  $db = mysql_connect($db_host, $db_usr, $db_pass);
  if (!$db) {
    $return["complete"] = false;
    $return["details"] = "Could not connect to server";
  } else {
    mysql_select_db($db_name,$db);

    //add day perameter into this
    $result = mysql_query("SELECT count(*)  AS `ipCount` FROM `objects_table` WHERE ip='$ip'");
    $row = mysql_fetch_assoc($result);
    $ipCount = $row["ipCount"];
    if ($ipCount<5) {
      $sql = "INSERT INTO `objects_table`
        (`location`,`level`,`ip`,`user_name`,`object_type`,`object_x`,`object_y`)
        values
        ('$location','$locationLevel','$ip','$userName','$objectType','$objectX','$objectY');
        ";
      $insert = mysql_query($sql);
      if (!$insert) {
        $return["complete"] = false;
        $return["details"] = "Could not execute query";
      } else {
        $return["complete"] = true;
        $return["details"] = "Data added to db = >".$ipCount."<";
      }
    } else {
      $return["complete"] = false;
      $return["details"] = "ip limit reached = >".$ipCount."<";
    }
  }
  mysql_close($db);
} else {
  $return["complete"] = false;
  $return["details"] = "No data sent";
}
// echo json_encode($return);
echo json_encode($return);

?>