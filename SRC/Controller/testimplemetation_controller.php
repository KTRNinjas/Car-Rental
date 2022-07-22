<?php 
$i=0;
$i=$i+1;
print "belépések száma".$i;
$url="/KTRNINJAS/Car-Rental/SRC/testimplementation";

function getRouteOfThisPage(){

  
  return $GLOBALS['url'];
}
function getFileLocationOfThisPage(){
  $fileLocation="/View/testimplementation.php";
  return $fileLocation;
}


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
?>