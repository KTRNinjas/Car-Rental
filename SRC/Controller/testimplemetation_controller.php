<?php
//Ezt a két paramétert adjátok meg a saját controlleretekben
$path = dirname(__DIR__, 1);
$url = "/testimplementation";
$fileLocation = $path . "/View/testimplementation.php";
$routes[$url] = $fileLocation;
/*function getRouteOfThisPage(){

  
  return $GLOBALS['url'];
}
function getFileLocationOfThisPage(){
  $fileLocation=$GLOBALS['fileLocation'];
  return $fileLocation;
}*/


function init()
{

  if (isset($_POST["submit"])) {
    data();
    /* $name=$_POST["name"];
      $mail=$_POST["mail"];
      $pass=$_POST["pass"];
      print $name.$mail.$pass; */
  }
}
function data()
{
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $pass = $_POST["pass"];
  print $name . $mail . $pass;
}
