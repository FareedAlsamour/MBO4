<?php

function tafel($input, $x){
    if ($input == 0) {
      return 0;
    }
    if ($input < 0) {
      return tafel($input+1, $x) -$x;
    }
     elseif ($input == 1) {
      return $x;
    }else {
      return tafel($input -1, $x) + $x;
    }
}
if (isset($_POST['submit'])) {
  for ($i=1; $i <= 10; $i++) {

    echo $_POST['number']. " * " .$i. " = ". tafel($_POST['number'],$i);
    echo "<br>";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="tafel.php" method="post">
      Enter a number to get it's table:
      <br>
      <input type="number" name="number" value="">
      <input type="submit" name="submit" value="submit">
    </form>
  </body>
</html>
