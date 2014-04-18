<?php 
define('PHP_KEY', 'r0r0n04_z0r0');
header('Content-Type: application/json');
$return["complete"] = true;
$return["details"] = "nothing";
if (isset($_POST["data"])) {
  include 'db.php';
  $db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
  if (mysqli_connect_errno()) {
    $return["complete"] = false;
    $return["details"] = "Could not connect: ".mysqli_connect_error();
  } else {
    //add day perameter into this
    // $location = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["location"]));
    // $country = strip_tags(mysqli_real_escape_string($db, $_POST["data"]["country"]));
    // $sql = "SELECT * FROM objects_table WHERE location='$location' AND country='$country'";
    $sql = "SELECT * FROM objects_table";
    // $return["complete"] = ture;
    // $return["details"] = "pulled data";
    // $return["data"] = mysqli_fetch_array(mysqli_query($db, $sql));

    // $return["data"] = array();
    // while($row = mysql_fetch_assoc(mysqli_query($db, $sql))) {
    //   $return["data"][] = $row;
    // }

    if ($result = mysqli_query($db, $sql)) {
      $return["data"] = array();
      /* fetch associative array */
      while ($row = mysqli_fetch_assoc($result)) {
        $return["data"][] = $row;
          // printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
      }
      $return["complete"] = ture;
      $return["details"] = "pulled data";

      /* free result set */
      mysqli_free_result($result);
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