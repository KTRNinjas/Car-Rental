<?php 
require_once("Dbconn.php");
function fill_registration($surname, $firstname, $mail, $pass){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `user_account_join_id`) VALUES (NULL, '$surname', '$firstname', '$mail', '$pass', '', '', '')";
  $ok=mysqli_query($kapcsolat, $sql);
}
?>