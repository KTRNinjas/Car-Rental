<?php
$path = dirname(__DIR__, 1);
$url = "/";
$fileLocation = $path . DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."home.php";
$routes[$url] = $fileLocation;
include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."Service".DIRECTORY_SEPARATOR."user_service.php");
function loginController(){
  isset($_POST["login"]);
   if(isset($_POST["login"])){
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
    loginService($mail, $pass);
    $belepesiAdatok=loginService($mail, $pass);
    if(isset($belepesiAdatok["Vezetéknév"])){
      $sur=$belepesiAdatok["Vezetéknév"];
      $first=$belepesiAdatok["Keresztnév"];
      $id=$belepesiAdatok["id"];
      $role=$belepesiAdatok["Role_id"];
      print "Üdvözöllek ".$sur." ".$first;
    }else{
      print "Hibás e-mail cím/ jelszó!";
    }
   }
}

