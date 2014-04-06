<?php if(!defined('PHP_KEY') || PHP_KEY!=='r0r0n04z0r0')exit('No direct script access allowed');

// local testing
$db_host = 'localhost';
$db_name = 'community_database';
$db_usr = 'root';
$db_pass = 'root';

// live version
// $db_host = '';
// $db_name = '';
// $db_usr = '';
// $db_pass = '';

$db = mysql_connect($db_host, $db_usr, $db_pass) or die(mysql_error());
mysql_select_db($db_name,$db);

?>