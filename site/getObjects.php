<?php 
define('PHP_KEY', 'r0r0n04_z0r0');
header('Content-Type: application/json');

if (isset($_POST["data"])) {
  include 'db.php';
  $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
  if (mysqli_connect_errno()) {
    $return["complete"] = 0;
    $return["details"] = "Could not connect: ".mysqli_connect_error();
  } else {
    
    $localLocation = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["localLocation"]));
    $location = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["location"]));
    $country = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["country"]));
    $sql = "SELECT * FROM objects_table WHERE location='$location' AND country='$country'";
    
    if ($results = mysqli_query($db, $sql)) {
      $return["data"] = array();
      while ($row = mysqli_fetch_assoc($results)) {
        $return["data"][] = $row;
      }
      if ($return["data"][0]) {
        $return["complete"] = 1;
        $return["details"] = "pulled data";
      } else if ($localLocation==="false"){
        $limboResults = mysqli_query($db, "SELECT * FROM objects_table WHERE location='limbo' AND country='limbo'");
        $return["data"] = array();
        while ($row = mysqli_fetch_assoc($limboResults)) {
          $return["data"][] = $row;
        }
        $return["complete"] = 2;
        $return["details"] = "limbo";
      } else {      
        $return["complete"] = 0;
        $return["details"] = "no data";
      }
      mysqli_free_result($results);
    } else {
      $return["complete"] = 0;
      $return["details"] = "query failed";
    } 
  }
  mysqli_close($db);
} else {
  $return["complete"] = 0;
  $return["details"] = "no data sent";
}

echo json_encode($return);

?>