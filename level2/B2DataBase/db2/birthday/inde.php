<?php
include_once "process.php";

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
<form class="" action="main.php" method="post">
  <label for="name">Name :</label>
  <input id="name" type="text" name="name" value= "<?= $name ?>">

  <label for="date">Date of Birth :</label>
  <input id="date" type="date" name="date" value="<?= $birthday ?>">

  <input type="submit" name="submit" value="Submit">
</form>
<a href="main.php"><button>Show Table!</button></a>

</body>
</html>
