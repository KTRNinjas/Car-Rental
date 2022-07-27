<?php 
require_once("Dbconn.php");
function fill_registration($surname, $firstname, $mail, $pass){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `user_account_join_id`) VALUES (NULL, '$surname', '$firstname', '$mail', '$pass', '', '', '')";
  $ok=mysqli_query($kapcsolat, $sql);
}
function get_contact_id($surname, $firstname, $mail, $pass){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="SELECT id FROM `autokolcsonzo`.`contact` 
  WHERE Vezetéknév=$surname AND Keresztnév=$firstname AND e-mail=$mail AND Password=$pass";
  $result=mysqli_query($kapcsolat, $sql);
  while($egysor=mysqli_fetch_array($result)){
      return $egysor["id"];
 }
}
function create_user_account_join($contact_id){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="INSERT INTO `autokolcsonzo`.`user_account_join` (`id`, `account_id`, `contact_id`) VALUES (NULL, '', '$contact_id')";
}
function create_account(){
  $kapcsolat=$GLOBALS["kapcsolat"];
  $sql="";
}
?>