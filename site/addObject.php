<?php 
define('PHP_KEY', 'r0r0n04_z0r0');
header('Content-Type: application/json');

if (isset($_POST["data"])) {
  // $data = json_decode($_POST["data"]);
  $location = strip_tags(mysqli_escape_string($_POST["data"]["location"]));
  $locationLevel = strip_tags(mysqli_escape_string($_POST["data"]["locationLevel"]));

  $ip = strip_tags(mysqli_escape_string($_POST["data"]["ip"]));
  $userName = strip_tags(mysqli_escape_string($_POST["data"]["userName"]));
  $objectType = strip_tags(mysqli_escape_string($_POST["data"]["objectType"]));
  $objectX = strip_tags(mysqli_escape_string($_POST["data"]["objectX"]));
  $objectY = strip_tags(mysqli_escape_string($_POST["data"]["objectY"]));



  // $level1 = strip_tags(mysqli_escape_string($_POST["data"]["level1"]));
  // $level2 = strip_tags(mysqli_escape_string($_POST["data"]["level2"]));
  // $level3 = strip_tags(mysqli_escape_string($_POST["data"]["level3"]));
  
  include 'db.php';

  $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
  if (mysqli_connect_errno()) {
    $return["complete"] = false;
    $return["details"] = "Could not connect: ".mysqli_connect_error();
  } else {
    //add day perameter into this
    $result = mysqli_query($db, "SELECT count(*)  AS `ipCount` FROM `objects_table` WHERE ip='$ip'");
    $row = mysqli_fetch_assoc($result);
    $ipCount = $row["ipCount"];

    if ($ipCount<5) {
      $sql = "INSERT INTO `objects_table`
        (`location`,`level`,`ip`,`user_name`,`object_type`,`object_x`,`object_y`)
        values
        ('$location','$locationLevel','$ip','$userName','$objectType','$objectX','$objectY');
        ";
      $insert = mysqli_query($db, $sql);
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
  mysqli_close($db);
} else {
  $return["complete"] = false;
  $return["details"] = "No data sent";
}
// echo json_encode($return);
echo json_encode($return);

?>