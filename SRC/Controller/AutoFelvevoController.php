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
  $ar=$_POST["ar"];
  $GLOBALS["autotipusadatatvevo"] =AutotipusAdatAtvevo($marka,$tipus,$ar);
  print $marka.$ar.$tipus;
}
function printresult(){
  print $GLOBALS["autotipusadatatvevo"];
}
