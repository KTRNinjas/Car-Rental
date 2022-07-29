<?php 
  include_once("../Model/Service/user_service.php");
  function init(){
    if(isset($_POST["submit"])){
      data();
      print "Bejutott";
      /* $name=$_POST["name"];
      $mail=$_POST["mail"];
      $pass=$_POST["pass"];
      print $name.$mail.$pass; */
    }
  }
  function data(){
    $surname=$_POST["surname"];
    $firstname=$_POST["firstname"];
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
      print $surname.$firstname.$mail.$pass;
      registration_form($surname, $firstname, $mail, $pass);
  }
?>