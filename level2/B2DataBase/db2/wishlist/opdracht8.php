<?php
include_once 'conn.php';
include_once 'process.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">

    input[type=text], select {
       width: 100%;
       padding: 12px 20px;
       margin: 8px 0;
       display: inline-block;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       }

       input[type=submit], button{
       width: 100%;
       background-color: #4CAF50;
       color: white;
       padding: 14px 20px;
       margin: 8px 0;
       border: none;
       border-radius: 4px;
       cursor: pointer;
       }

       input[type=submit]:hover {
       background-color: #45a049;
       }
    </style>

  </head>
  <body>
    <form class="" action="wishlist.php" method="post">
      <label for="item">Item :</label>
      <input id="item" type="text" name="item" value= "<?= $item ?>">

      <label for="price">Price :</label>
      <input id="price" type="text" name="price" value="<?= $price ?>">

      <label for="description">Description :</label>
      <input id="description" type="text" name="description" value="<?= $description ?>">

      <label for="shop">Shop :</label>
      <input id="shop" type="text" name="shop" value="<?= $shop ?>">

      <label for="link">Link :</label>
      <input id="link" type="text" name="link" value="<?= $link?>">

      <input type="submit" name="submit" value="submit">
    </form>

  </body>
</html>
