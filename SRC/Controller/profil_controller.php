<?php
$path = dirname(__DIR__, 1);
$url = "/Profil_modositas";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "profil_modosit.php";
$routes[$url] = $fileLocation;
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "profil_modifyService.php");
function profilModifyController()
{
  if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    $user_data = automatic_profil_fill_service($id);
    print '<input type="text" name="surname" value="' . $user_data["Vezetéknév"] . '" placeholder="Vezetéknév" required>
  <input type="text" name="firstname"value="' . $user_data["Keresztnév"] . '" placeholder="Keresztnév" required>
  <input type="email" name="mail" value="' . $user_data["e-mail"] . '"placeholder="E-mail" required>
  <input type="password" name="pass" value="' . $user_data["Password"] . '"placeholder="Password" required>';
  lefoglalas($user_data);
    if (isset($_POST["profile_modify"])) {
      $surname = $_POST["surname"];
      $firstname = $_POST["firstname"];
      $mail = $_POST["mail"];
      $pass = $_POST["pass"];
      $license = $_POST["license"];
      $phone = $_POST["phone"];
      print "jogsi:" . $license;
      profilModifyService($id, $surname, $firstname, $mail, $pass, $license, $phone);
      header('Location: /Profil_modositas', true, 303);
    }
    redirectToAccount();
  }
}
function profilDeleteController()
{
  if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    print '<input type="submit" name="delete_profil" value="User profil törlése">';
    if (isset($_POST["delete_profil"])) {
      deleteProfilService($id);
      session_unset();
      header('Location: /Profil_modositas', true, 303);
    }
  }
}
function lefoglalas($user_data){
  if(isset($_SESSION['lefoglal'])){
    print '<input type="text" name="license" value="' . $user_data["Jogosítvány száma"] . '"placeholder="Jogosítvány" required>';
    print '<input type="tel" name="phone" value="' . $user_data["Telefonszám"] . '"placeholder="Telefonszám" required>';
    print '<input type="submit" value="Tovább" name="redirect_account">';
  }else{
    print '<input type="text" name="license" value="' . $user_data["Jogosítvány száma"] . '"placeholder="Jogosítvány">';
    print '<input type="tel" name="phone" value="' . $user_data["Telefonszám"] . '"placeholder="Telefonszám">';
    print '<input type="submit" value="Módosít" name="profile_modify">';
  }
}
function redirectToAccount(){
  if(isset($_POST['redirect_account'])){
    header('Location: /', true, 303);
    exit();
  }
}
