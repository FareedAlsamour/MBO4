<?php
     include_once 'connection.php';
     if (isset($_GET['delete'])) {
       $id = $_GET['delete'];
       $statement = $db->prepare("DELETE FROM `songs` WHERE `id` = ?");
       $statement->bind_param('i', $id);
       $statement->execute();
     }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    * {
      margin: 0 auto;
      background-color: gray;
      font-size: 20px;
    }
    button:hover{
      color: red;

    }
    

      td{
        border: solid black 2px;
        width: 24%;
        height: 20px;
        border-radius: 5%;
        text-align: center;
      }
      button{
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      }



    </style>
  </head>
  <body>
  <?php
    $sql = <<<SQL
                SELECT *
                FROM `songs`
    SQL;

    if (!$result = $db->query($sql)) {
      die("Quiering failed: ['.$db->error.']");
    }

  ?>

  <table>
    <tr>
      <th></th>
      <th>Title</th>
      <th>Artist</th>
        <th></th>
    </tr>
    <?php
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td><a href=\"opdracht4.php?id=" .$row['id']. "\"><button type=\"button\" name=\"button\">Edit</button></a></td>";
       echo "<td>" . $row['title'] . "</td>";
       echo "<td>" .$row['artist'] . "</td>";

       echo "<td><a href=\"opdracht3.php?delete=" .$row['id']. "\"><button type=\"button\" name=\"button\">Delete</button></a></td></tr>";
     }
    ?>
  </table>
  <a href="opdracht4.php"><button type="button" name="button">Add a new song!</button></a>


  </body>
</html>
