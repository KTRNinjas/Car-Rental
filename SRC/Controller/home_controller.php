<?php
$path = dirname(__DIR__, 1);
$url = "/";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "home.php";
$routes[$url] = $fileLocation;
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "user_service.php");
function loginController()
{
  isset($_POST["login"]);
  if (isset($_POST["login"])) {
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];
    loginService($mail, $pass);
    $belepesiAdatok = loginService($mail, $pass);
    checkBelepesiAdatok($belepesiAdatok);
  }
}
function checkBelepesiAdatok($belepesiAdatok)
{
  if (isset($belepesiAdatok["Vezetéknév"])) {
    $sur = $belepesiAdatok["Vezetéknév"];
    $first = $belepesiAdatok["Keresztnév"];
    $id = $belepesiAdatok["id"];
    $role = $belepesiAdatok["Role_id"];
    printSurandFirstname($sur, $first);
    put_Userid_and_Roleid_into_Session($id, $role);
    print_Logout_form();
    is_Userid_in_Session();
    Logout();
  } else {
    print "Hibás e-mail cím/ jelszó!";
  }
}
function printSurandFirstname($sur, $first)
{
  print "Üdvözöllek " . $sur . " " . $first;
}
function put_Userid_and_Roleid_into_Session($id, $role)
{
  $_SESSION["user_id"] = $id;
  $_SESSION["role_id"] = $role;
}
function print_Logout_form()
{
  print '<form action="" method="post"><input type="submit" name="logout" value="Kijelentkezés"></form>';
}
function is_Userid_in_Session()
{
  if (isset($_SESSION["user_id"])) {
    print "A user azonosítója: " . $_SESSION["user_id"];
  }
}
function Logout()
{
  if (isset($_POST["logout"])) {
    session_unset();
  }
}
