<?php
include_once("../Model/Service/AutoArService.php");
$autotipusadatatvevo = "";

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
  $ar = $_POST["ar"];
  $GLOBALS["autotipusadatatvevo"] = AutotipusAdatAtvevo($marka, $tipus, $ar);
  print $marka . $tipus. $ar."forint";
}
function printresult()
{
  print $GLOBALS["autotipusadatatvevo"];
}
