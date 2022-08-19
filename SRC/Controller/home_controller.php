<?php
$path = dirname(__DIR__, 1);
$url = "/";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "home.php";
$routes[$url] = $fileLocation;
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "user_service.php");
function loginController()
{
  if (isset($_SESSION["user_id"])) {
    $surAndFirstName = loginNameService($_SESSION["user_id"]);
    printSurandFirstname($surAndFirstName["Vezetéknév"], $surAndFirstName["Keresztnév"]);
    put_Userid_and_Roleid_into_Session($surAndFirstName["id"], $surAndFirstName["Role_id"]);
    print_Logout_form();
    is_Userid_in_Session();
    Logout();
  }
  if (isset($_POST["login"])) {
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];
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
    header('Location: /', true, 303);
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
    print "A user azonosítója: " . $_SESSION["user_id"] . '<br>';
    print '<a href="/Profil_modositas">Profil módosítása</a>';
  }
}
function Logout()
{
  if (isset($_POST["logout"])) {
    session_unset();
    header('Location: /', true, 303);
  }
}
