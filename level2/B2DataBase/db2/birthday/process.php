<?php
include_once "conn.php";
session_start();
if (!isset($_SESSION['edit'])) {

  if (isset($_POST['submit'])) {
    $insert = "INSERT INTO `births` (`name`,`birthday`)
                          VALUES('".$_POST["name"]."', '".$_POST["date"]."')";
    if (!$result = $db->query($insert)) {
      die("error inserting data ['.$db->error.']");
    }

  }
}

if (isset($_GET['edit'])) {
  $display = $db->prepare("SELECT * FROM `births` WHERE `id`= ?");
  $display->bind_param('i', $_GET['edit']);
  $display->execute();
  $display->bind_result($bd_id,$bd_name,$bd_date);
  while ($display->fetch()) {
    $id= $bd_id;
    $name = $bd_name;
    $birthday =$bd_date;
  }
  $_SESSION['edit'] = $_GET['edit'];
} else {
  $id = "";
  $name = "";
  $birthday = "";
}

if (isset($_SESSION['edit'])) {
  if (isset($_POST['submit'])) {
    $edit = $db->prepare("UPDATE `births` SET `name` = '".$_POST["name"]."',
                                        `birthday` = '".$_POST["date"]."' WHERE `id` = ?");
    $edit->bind_param('i',$_SESSION['edit']);
    $edit->execute();
    session_unset();
  }
}





if (isset($_GET['delete'])) {

  $delete = $db->prepare("DELETE from `births` WHERE `id` = ?");
  $delete->bind_param('i',$_GET['delete']);
  $delete->execute();
  echo "Deleted!";
}
?>
