<?php 
$path=dirname(__DIR__, 1);
  include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."Service".DIRECTORY_SEPARATOR."user_service.php");
  $url="/registration";
  $fileLocation = $path .DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."registration.php";
  $routes[$url] = $fileLocation;

  function initRegistration(){
    if(isset($_POST["submit"])){
      dataRegistration();   
    }
  }
  function dataRegistration(){
    $surname=$_POST["surname"];
    $firstname=$_POST["firstname"];
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
      if (registration_form($surname, $firstname, $mail, $pass)!=NULL && registration_form($surname, $firstname, $mail, $pass)){
        print "Sikeres regisztráció";
      } else{
        print "Sikertelen regisztráció!";
      }
  }
