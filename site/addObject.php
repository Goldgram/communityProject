<?php 
define('PHP_KEY', 'r0r0n04_z0r0');
header('Content-Type: application/json');

if (isset($_POST["data"])) {
  // $data = json_decode($_POST["data"]);
  $location = strip_tags(mysql_escape_string($_POST["data"]["location"]));
  $level1 = strip_tags(mysql_escape_string($_POST["data"]["level1"]));
  $level2 = strip_tags(mysql_escape_string($_POST["data"]["level2"]));
  $level3 = strip_tags(mysql_escape_string($_POST["data"]["level3"]));
  
  include 'db.php';

  // $db = mysql_connect($db_host, $db_usr, $db_pass);
  // if (!$db) {
  //   $return["complete"] = false;
  //   $return["details"] = "Could not connect to server";
  // } else {
  //   mysql_select_db($db_name,$db);
  //   $SQL = "
  //     INSERT INTO `booking_entries`
  //     (`fname`,`lname`,`phone`,`email`,`age`,`club`,`description`)
  //     values
  //     ('$fname','$lname','$phone','$email','$age','$club','$description');
  //     ";
  //   $insert = mysql_query($SQL);
  //   if (!$insert) {
  //     $return["complete"] = false;
  //     $return["details"] = "Could not execute query";
  //   } else {
      $return["complete"] = true;
      // $return["details"] = "Data added to db";
      $return["details"] = $location." - ".$level1." - ".$level2." - ".$level3;
  //   }
  // }
  // mysql_close($db);
} else {
  $return["complete"] = false;
  $return["details"] = "No data sent";
}
// echo json_encode($return);
echo json_encode($return);

?>