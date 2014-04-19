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
    //add day perameter into this
    $location = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["location"]));
    $country = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["country"]));
    $sql = "SELECT * FROM objects_table WHERE location='$location' AND country='$country'";
    // $sql = "SELECT * FROM objects_table";

    
    // $return["complete"] = ture;
    // $return["details"] = "pulled data";
    // $return["data"] = mysqli_fetch_array(mysqli_query($db, $sql));

    // $return["data"] = array();
    // while($row = mysql_fetch_assoc(mysqli_query($db, $sql))) {
    //   $return["data"][] = $row;
    // }

    if ($results = mysqli_query($db, $sql)) {
      $return["data"] = array();
      while ($row = mysqli_fetch_assoc($results)) {
        $return["data"][] = $row;
      }
      $return["complete"] = ture;
      $return["details"] = "pulled data";
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

print json_encode($return);

?>