<?php
include_once "conn.php";
include_once "process.php";


$select = "SELECT * from `births`";
if (!$result = $db->query($select)) {
  die("error getting data ['.$db->error.']");
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
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>DOB</th>
          <th>Current Age</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td><a href=\"inde.php?edit=" .$row['id']. "\">Edit</a></td>";
          echo "<td>" .$row['name']. "</td>";
          echo "<td>" .$row['birthday']. "</td>";
          $birth_year = substr($row['birthday'],0,4);
          $birth_month = substr($row['birthday'],5,2);
          $current_year = date("Y");
          $current_month = date("m");
          if ($birth_month > $current_month)
            {
              $current_year = $current_year - 1;
              $current_month = $current_month + 12;
            }
          echo "<td>" .($current_year - $birth_year). " year/s and " .($current_month - $birth_month). " month/s old.</td>";
          echo "<td><a href=\"main.php?delete=" .$row['id']. "\">Delete</a></td></tr>";



        }
         ?>
       </tr>
      </tbody>
    </table>
    <a href="inde.php"><button>add more!</button></a>


  </body>
</html>
