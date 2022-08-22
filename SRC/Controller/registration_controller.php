<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "user_service.php");
$url = "/registration";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "registration.php";
$routes[$url] = $fileLocation;

function initRegistration()
{
  if (isset($_POST["registration"])) {
    dataRegistration();
  }
}
function dataRegistration()
{
  $surname = $_POST["surname"];
  $firstname = $_POST["firstname"];
  $mail = $_POST["mail"];
  $pass = $_POST["pass"];
  $isRegistered = registration_form($surname, $firstname, $mail, $pass);
  $id= ifmailRegistered($mail);
  if ($isRegistered != NULL && $isRegistered && $id!=[]) {
    print "Sikeres regisztráció";
  } else {
    print "Sikertelen regisztráció!";
  }
}
function ifmailRegistered($mail){
    return checkEmailService($mail);
  
  }
