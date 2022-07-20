<?php 
  function init(){
    if(isset($_POST["submit"])){
      data();
      print "Bejutott";
      $name=$_POST["name"];
      $mail=$_POST["mail"];
      $pass=$_POST["pass"];
      print $name.$mail.$pass;
    }
  }
  function data(){
  /*   $name=$_POST["name"];
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
      print $name.$mail.$pass; */
  }
?>