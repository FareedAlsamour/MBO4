<?php
$servername = "localhost";
$dbname = "db_level2_opdr8";
$username = "root";
$password = "";

$db = new mysqli($servername,$username,$password,$dbname);
if ($db->connect_errno > 0) {
  die("database connection error : [' $db->connect_error '] ");
}
//echo "Connected!";

?>
