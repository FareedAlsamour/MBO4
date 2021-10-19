<?php
require_once 'calculator.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .inline{
        display: inline-block;
        width: 20%;
        vertical-align: top;
        border-left: 2px solid black;
        margin: 10px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="inline">

      <p>4 + 2 = <?=add(4,2) ?></p>
      <p>4 + (-2) = <?=add(4,-2) ?></p>
      <p>(-4) + 2 = <?=add(-4,2) ?></p>
      <p>(-4) + (-2) = <?=add(-4,-2) ?></p>
    </div>
    <div class="inline">
      <p>6 - 3 = <?= minus(6,3)?></p>
      <p>3 - 6 = <?= minus(3,6)?></p>
      <p>(-6) - 3 = <?= minus(-6,3)?></p>
      <p>(-6) - (-3) = <?= minus(-6,-3)?></p>
    </div>
    <div class="inline">
      <p>7 * 3 = <?= multi(7,3) ?></p>
      <p>(-7) * 3 = <?= multi(-7,3) ?></p>
      <p>7 * (-3) = <?= multi(7,-3) ?></p>
      <p>(-7) * (-3) = <?= multi(-7,-3) ?></p>
    </div>
    <div class="inline">
      <p>9 / 2 = <?= div(9,2) ?></p>
      <p>9 / 3 = <?=div(9,3) ?></p>
      <p>0 / 3 = <?=div(0,3) ?></p>
      <p>(-9) / 3 = <?=div(-9,3) ?></p>
      <p>9 / (-3) = <?=div(9,-3) ?></p>
      <p>(-9) / (-3) = <?=div(-9,-3) ?></p>
      <p>9 / 0 = <?=div(9,0) ?></p>
    </div>
  </body>
</html>
