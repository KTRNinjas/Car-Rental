<?php 
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
function getBuyerTypeMagan($type){
  $kapcsolat = $GLOBALS["kapcsolat"];
  $sql = "SELECT `id` FROM `autokolcsonzo`.`account` WHERE `Magán/Cég`=0";
  $result=mysqli_query($kapcsolat,$sql);
  
}
function getBuyerTypeCeges($type){
  $kapcsolat = $GLOBALS["kapcsolat"];
  $sql = "SELECT `id` FROM `autokolcsonzo`.`account` WHERE `Magán/Cég`=1";
  $result=mysqli_query($kapcsolat,$sql);
  
}

?>