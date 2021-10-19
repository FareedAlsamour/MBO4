<?php
function add($x, $y){
  if ($x == 0) {
    return $y;
  }
  if ($x < 0) {
    return add($x + 1 ,$y) -1;
  }
   else {
    return add($x-1 , $y) +1;
  }
}
//echo add(3,-4);

function minus($x, $y){

  if ($x == $y) {
    return 0;
  }
  if ($x < $y) {
    return minus($x+1, $y) -1;
  } else {
    return minus($x-1, $y)+1;
  }
}
// echo minus(0, 4);
// echo "<br>";
// echo minus(2,2);
function multi($x,$y){
  if ($x == 0) {
    return 0;
  }
  if ($x < 0) {
    return multi($x+1, $y) -$y;
  }
  if ($x == 1) {
    return $y;
  } else {
    return  multi($x-1, $y)+$y ;
  }
}
// echo multi(3,4);

function div($x,$y){
  if ($x == 0) {
    return 0;
  }
  if ($y == 0) {
    return "for God's/Math's sake just don't :)";
  }
  if ($x<0 && $y<0) {
    return div($x-$y,$y)+1;
  } else if ($x < 0 || $y < 0) {
    return div($x + $y, $y) -1;
  } else if ($x< $y) {
    return 0;
}
  else {
    return div($x-$y,$y)+1;
  }
}
?>
