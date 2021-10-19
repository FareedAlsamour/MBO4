<?php
session_start();
include_once "conn.php";
if (!isset($_SESSION['edit'])) {

  if (isset($_POST['submit'])) {
    $insert = "INSERT INTO `wishlist`(`item`, `price`, `description`, `shopname`, `link`)
                            VALUES  ('" .$_POST["item"]. "','" .$_POST["price"]. "','" .$_POST["description"]. "',
                              '".$_POST["shop"]."','".$_POST["link"]."')";
     if (!$result = $db->query($insert)) {
       die("insert data error : ['.$db->error.']");
     }

  }
}


if (isset($_GET['edit'])) {
  $display_statement = $db->prepare("SELECT * from `wishlist` where `id` = ?");
  $display_statement->bind_param('i', $_GET['edit']);
  $display_statement->execute();
  $display_statement->bind_result($gift_id,$gift_item,$gift_price,$gift_description,$gift_shop,$gift_link);
  while ($display_statement->fetch()) {
    $id=$gift_id;
    $item=$gift_item;
    $price=$gift_price;
    $description = $gift_description;
    $shop = $gift_shop;
    $link = $gift_link;
  }
  $_SESSION['edit'] = $_GET['edit'];


} else {
  $id = "";
  $item = "";
  $price = "";
  $description = "";
  $shop = "";
  $link = "";


}

if (isset($_SESSION['edit'])) {
    if (isset($_POST['submit'])) {
      $edit_statement = $db->prepare("UPDATE `wishlist` SET `item` = '" .$_POST["item"]. "',
                                                `price` = '" .$_POST["price"]. "',
                                                `description` = '" .$_POST["description"]. "',
                                                `shopname` = '" .$_POST["shop"]. "',
                                                `link` = '" .$_POST["link"]. "' WHERE `id` = ?");
      $edit_statement->bind_param('i', $_SESSION['edit']);
      $edit_statement->execute();
      session_unset();
     }


}
if (isset($_GET['delete'])) {
  $statement = $db->prepare("DELETE FROM `wishlist` WHERE `id` = ?");
  $statement->bind_param('i', $_GET['delete']);
  $statement->execute();
}

 ?>
