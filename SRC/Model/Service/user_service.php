<?php 
  $path = dirname(__DIR__, 1);
  include_once($path."/DAO/user_dao.php");
  function registration_form($surname, $firstname, $mail, $pass){
    fill_registration($surname, $firstname, $mail, $pass);
  }
  
?>