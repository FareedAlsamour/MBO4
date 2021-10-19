<?php include_once "connection.php";
session_start();


//PREPARED STATEMENT TO DISPLAY SELECTED SONG DATA IN THE EDIT FORM
$statement = $db->prepare("SELECT artist, title FROM `songs` WHERE `id` = ?");
$name = "";
$title= "";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $statement->bind_param('i', $id);
  $statement->execute();
  $statement->bind_result($song,$artist_name);
  while ($statement->fetch()) {
    $title = $song;
    $name = $artist_name;

  }
  $_SESSION["id"] = $id;
}

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
     <form class="" action="opdracht4.php" method="post">
       <label for="song">Song name</label>
       <input id="song" type="text" name="song" value="<?= $name ?>">

       <label for="artist">Artist name</label>
       <input id="artist" type="text" name="artist" value="<?= $title ?>">
       <input type="submit" name="submit" value="submit">
       <a href="opdracht3.php"><button type="button" name="button">Check added songs</button></a>
     </form>
   <?php




    if (isset($_SESSION['id'])) {
      if (isset($_POST['submit'])) {
       $sql = $db->prepare("UPDATE `songs` SET `title` = '" .$_POST["song"]."' , `artist` = '" .$_POST["artist"]. "' WHERE `id` =?");
       $sql->bind_param('i',$_SESSION['id']);
       $sql->execute();
       //echo $_SESSION['id'];
       session_unset();
       header('Location: opdracht3.php');


     }
   }

     else  {
       if (isset($_POST['submit'])) {


       $sql ="INSERT INTO `songs`
                    (`artist`,`title`)
              VALUES ('" .$_POST["artist"]. "','" .$_POST["song"]."')";
              if (!$result = $db->query($sql)) {
                 die("error : [" .$db->error . "]");
              }
              echo "queried successfully<br />";
              header('Location: opdracht3.php');


     }
   }

   $db->close();


    ?>
   </body>
 </html>
