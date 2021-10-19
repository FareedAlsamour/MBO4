<?php
include_once "conn.php";
include_once "process.php";


$select = "SELECT * FROM `wishlist`";
if (!$result = $db->query($select)) {
  die("Error fetching data : [' .$db->error. ']");
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
           <th>Item</th>
           <th>Price</th>
           <th>Description</th>
           <th>Market</th>
           <th>Link</th>
           <th></th>
         </tr>
       </thead>
       <tbody>
         <?php
         while ($row = $result->fetch_assoc()) {
           echo "<tr><td><a href=\"opdracht8.php?edit=" .$row['id']. "\">Edit</a></td>";
           echo "<td>" .$row['item']. "</td>";
           echo "<td>" .$row['price']. "$</td>";
           echo "<td>" .$row['description']. "</td>";
           echo "<td>" .$row['shopname']. "</td>";
           echo "<td><a href=//" .$row['link']. ">Link</a></td>";
           echo "<td><a href=\"wishlist.php?delete=" .$row['id']. "\">DELETE</a></td></tr>";
         }
          ?>



     </table>
   </body>
 </html>
