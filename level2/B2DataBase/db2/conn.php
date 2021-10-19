<?php
$servername = "localhost";
$databasename = "db_level2_opdr1";
$username = "root";
$password = "";

//Create connection
$db = new mysqli($servername,$username,$password,$databasename);

if ($db->connect_errno > 0) {
  die("unable to connect to database['. $db->connect_error .']");
}
echo "Connected successfully <br />";

$sql = <<<SQL
      SELECT *
      FROM `songs`
SQL;

if (!$result = $db->query($sql)) {
  die("there was an error running the query [". $db->error ."]");
}
echo "queried successfully<br />";


while ($row = $result->fetch_assoc()) {
  echo $row['title'] . '<br />';
}
echo "total results: " . $result->num_rows . "<br />";

$result->free();


//Prepred statment
$statement = $db->prepare("SELECT `title` FROM `songs` WHERE `artist` = ?");

$artist = "INZO";
$statement->bind_param('s', $artist);
$statement->execute();
//testing out
$statement->bind_result($returned_name);
while ($statement->fetch()) {
  echo $returned_name . "<br />";
}
$statement->free_result();

//closeeeeeeeee da door hun
$db->close();



?>
