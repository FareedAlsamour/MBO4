<?php
function onlyAlpha($input){
/*Notes for myself
^ – To match start of the string.
[] – Matches the allowed characters.
+ – To match one or more characters of the same type.
$ – To match end of string.
*/

  if (!preg_match("/^[a-zA-Z]+$/", $input)) {
    return false;
  }
  else{
    return true;
    // "Input is OnlyAlpha!"
  }
}

function onlyNum($input){
  if (!preg_match("/^[0-9]+$/", $input)) {
    return false;
    //"Input isn't only nummeric"
  }else {
    return true;
    // "Input is only numbers"
  }
}

function isPostcode($input){
    if (onlyNum(substr($input,0 ,4)) && onlyAlpha(substr($input, 4))) {
      return true;
    }
    else {
      return "Enter a valid postcode ex: 1234BG";
    }
}
//echo isPostcode("1234ig");
//echo isPostcode("12v4ig");

function nlNumber($input){
  if (strlen($input) != 10) {
    return "invalid number!";
  } else if (!onlyNum($input)) {
    return "invalid number!";
  } elseif ($input[0] != 0 || $input[1] != 6) {
    return "invalid number!";
  } else {
    return "valid number!";
  }
}
//echo nlNumber("069131915");

function sex($input){
  if($input == "man"){
    return "man";
  } elseif($input == "woman") {
    return "woman";
  } else {
    return "enter sex: man / woman.";
  }
}
// echo sex("man");

function isEmail($input){
  if (!preg_match("/[\.]/", $input)) {
    return "invalid email!" ;
  }elseif (!preg_match("/[@]/",$input)) {
    return "invalid email!";
  }
  else {
    return "true";
  }
}
// echo isEmail("asdasd@gmail.com");
// echo "<br>";

function isAddress($input){
  // if (preg_match("/^(\w+) (\d+)$/", $input)){
  //   return "true";
  // }else {
  //   return "false";
  // }
  $parts = explode(" ",$input);
  if ((onlyAlpha($parts[0])) &&(onlyNum($parts[count($parts)-1]))) {
    return "true";
  }else {
    return "invalid address!";
  }
}
// echo isAddress("jnjnjnkk 83");

 ?>


 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>1 = true / else print error message</h3>
    Is ("alpha") alleen alfabetisch?
    <?= onlyAlpha("alpha") ?>
    <hr>
    Is ("434343d") alleen numeriek?
    <?= onlyNum("434343d") ?>
    <hr>
    is ("12344f") een Nederlandse postcode ?
    <?= isPostcode("12344f") ?>
    <hr>
    Nederland mobiel nummer check ("0681319155")?
    <?= nlNumber("0681319155") ?>
    <hr>
    Is "woman" alleen “man” of “vrouw”?
    <?= sex("woman") ?>
    <hr>
    Is "example@gmail.com" een geldig email adres?
    <?= isEmail("example@gmail.com") ?>
    <hr>
    is een variabele een adres (alfabetisch opgevolgd door numeriek)
    <?= isAddress("Lisdoddestraat 95");?>
  </body>
</html>
