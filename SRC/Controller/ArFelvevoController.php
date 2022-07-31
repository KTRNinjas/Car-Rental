<?php 
include_once("../Model/Service/ArService.php");
$autoaratvevo="";
function initAutoarbekuldes()
{
  if (isset($_POST["Autotarbekuldes"])) {
    Autotarbekuldes();
  }
}
function Autotarbekuldes(){
    $markatipus=$_POST["markaTipus"];
    $ar=$_POST["ar"];
    $GLOBALS["autoaratvevo"] =Autoaratvevo($markatipus,$ar);
    print $ar.$markatipus;

}
function printresult(){
    print $GLOBALS["autoaratvevo"];
  }
?>