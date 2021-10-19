<?php
$servername = "localhost";
$dbname = "db_level2_opdr1";
$username = "root";
$pass = "";

$db = new mysqli($servername,$username,$pass,$dbname);
if ($db->connect_errno > 0) {
  die("Database connection error['. $db->connect_error .']");
}
?>
