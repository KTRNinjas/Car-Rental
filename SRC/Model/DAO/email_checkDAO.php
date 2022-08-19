<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
function checkEmails($mail){
  $kapcsolat = $GLOBALS["kapcsolat"];
  $sql = "SELECT id FROM `autokolcsonzo`.`contact` WHERE e-mail=$mail";
  $result = mysqli_query($kapcsolat, $sql);
  $egysor = mysqli_fetch_array($result);
    return $egysor["id"];
}
?>