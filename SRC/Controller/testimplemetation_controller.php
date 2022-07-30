<?php
//Ezt a két paramétert adjátok meg a saját controlleretekben és adjákok hozzá a saját controllereteket a master_controllerhez
$path = dirname(__DIR__, 1);
$url = "/testimplementation";
$fileLocation = $path .DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."testimplementation.php";
$routes[$url] = $fileLocation;


//Ez Niki kódjából van lopva, csak tesztcélzattal loptam, mert van benne egy POST
function init()
{

  if (isset($_POST["submit"])) {
    data();
  }
}
function data()
{
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $pass = $_POST["pass"];
  print $name . $mail . $pass;
}
