<?php 
define('PHP_KEY', 'r0r0n04_z0r0');
header('Content-Type: application/json');

if (isset($_POST["data"])) {
  include 'db.php';
  $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
  if (mysqli_connect_errno()) {
    $return["complete"] = false;
    $return["details"] = "Could not connect: ".mysqli_connect_error();
  } else {
    $ip = $_SERVER["REMOTE_ADDR"];
    // $ip = "50.31.252.76";// japan ip
    $location = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["location"]));
    $country = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["country"]));
    $userName = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["userName"]));
    $objectType = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["objectType"]));
    $objectX = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["objectX"]));
    $objectY = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["objectY"]));

    $sql = "SELECT count(*)  AS `ipCount` FROM `objects_table` WHERE ip='$ip' AND location='$location' AND country='$country' AND timestamp>=UNIX_TIMESTAMP(CURDATE())";

    if ($results = mysqli_query($db, $sql)) {
      $row = mysqli_fetch_assoc($results);
      if ($row["ipCount"]<3) {
        $sql = "INSERT INTO `objects_table`
          (`ip`,`location`,`country`,`user_name`,`object_type`,`object_x`,`object_y`)
          values
          ('$ip','$location','$country','$userName','$objectType','$objectX','$objectY');
          ";
        if (mysqli_query($db, $sql)) {
          $return["complete"] = true;
          $return["details"] = "Data added to db";
        } else {
          $return["complete"] = false;
          $return["details"] = "Could not execute query";
        }
      } else {
        $return["complete"] = false;
        $return["details"] = "ip limit reached";
      }
      mysqli_free_result($results);
    } else {
      $return["complete"] = false;
      $return["details"] = "query failed";
    }
  }
  mysqli_close($db);
} else {
  $return["complete"] = false;
  $return["details"] = "No data sent";
}

echo json_encode($return);

?>