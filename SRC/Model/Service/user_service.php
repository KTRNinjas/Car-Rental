<?php 
  $path = dirname(__DIR__, 1);
  include_once($path.DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."user_dao.php");
  function registration_form($surname, $firstname, $mail, $pass){
    fill_registration($surname, $firstname, $mail, $pass);
  }
  
?>