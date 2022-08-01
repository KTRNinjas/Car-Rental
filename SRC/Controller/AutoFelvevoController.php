<?php
include_once("../Model/Service/AutoTipusService.php");
$autotipusadatatvevo="";

function initAutotipusbekuldes()
{
  if (isset($_POST["Autotipusbekuldes"])) {
    Autotipusbekuldes();
  }
}
function Autotipusbekuldes()
{
  $marka = $_POST["marka"];
  $tipus = $_POST["tipus"];
  $premium = isset($_POST["premium"]);
  $ar=$_POST["ar"];
  $GLOBALS["autotipusadatatvevo"] =AutotipusAdatAtvevo($marka,$tipus , $premium,$ar);
  print $marka.$ar;
}
function printresult(){
  print $GLOBALS["autotipusadatatvevo"];
}
