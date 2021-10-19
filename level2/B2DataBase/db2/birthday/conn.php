<?php
$servername = "localhost";
$dbname = "db_level2_eindop";
$username = "root";
$pass = "";

$db = new mysqli($servername,$username,$pass,$dbname);
if ($db->connect_errno > 0){
    die("error : ['$db->connect_error']");
}
else{
echo "done";
}
?>
