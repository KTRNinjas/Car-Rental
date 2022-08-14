<?php 
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
function profilModifyDAO($id,$surname,$firstname,$mail,$pass,$license,$phone){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="UPDATE `autokolcsonzo`.`contact` SET `Vezetéknév`='$surname',`Keresztnév`='$firstname',`e-mail`='$mail',`Password`='$pass',`Jogosítvány száma`='$license',`Telefonszám`='$phone' WHERE `id`='$id'";
  mysqli_query($kapcsolat,$sql);
}
function automatic_profil_fill($id){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="SELECT * FROM `autokolcsonzo`.`contact` WHERE `id`=$id";
  $result=mysqli_query($kapcsolat,$sql);
  $user_data=[];
  while($egysor=mysqli_fetch_array($result)){
    $user_data["id"]=$egysor["id"];
    $user_data["Vezetéknév"]=$egysor["Vezetéknév"];
    $user_data["Keresztnév"]=$egysor["Keresztnév"];
    $user_data["e-mail"]=$egysor["e-mail"];
    $user_data["Password"]=$egysor["Password"];
    $user_data["Jogosítvány száma"]=$egysor["Jogosítvány száma"];
    $user_data["Telefonszám"]=$egysor["Telefonszám"];
  }
  return $user_data;
}
function deleteProfilDAO($id){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="DELETE FROM `autokolcsonzo`.`contact` WHERE `id`=$id";
  mysqli_query($kapcsolat,$sql);
}
?>