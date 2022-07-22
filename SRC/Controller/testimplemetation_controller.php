<?php 
//Ezt a két paramétert adjátok meg a saját controlleretekben
$url="/KTRNINJAS/Car-Rental/SRC/testimplementation";
$fileLocation="/View/testimplementation.php";
$routes[$url]=$fileLocation;
/*function getRouteOfThisPage(){

  
  return $GLOBALS['url'];
}
function getFileLocationOfThisPage(){
  $fileLocation=$GLOBALS['fileLocation'];
  return $fileLocation;
}*/


  function init(){
    
    if(isset($_POST["submit"])){
      data();
      /* $name=$_POST["name"];
      $mail=$_POST["mail"];
      $pass=$_POST["pass"];
      print $name.$mail.$pass; */
    }
  }
  function data(){
    $name=$_POST["name"];
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
      print $name.$mail.$pass;
  }
