<?php
include_once("../Model/Service/AutoTipusService.php");
$autotipusadatatvevo="";
function kiiro($legordulo)
{
  foreach ($legordulo as $key => $value) {
    print '<option value="' . $key . '" >' . $value . '</option>';
  };
}
function getMarka($kapcsolat)
{
  $marka = MarkaFeltolto($kapcsolat);
  kiiro($marka);
};
function getFajta($kapcsolat)
{
  $fajta = FajtaFeltolto($kapcsolat);
  kiiro($fajta);
};
function getKategoria($kapcsolat)
{
  $kategoria = KategoriaFeltolto($kapcsolat);
  kiiro($kategoria);
};
function getKornyezetVedelem($kapcsolat)
{
  $kornyezetvedelem = KornyezetVedelemFeltolto($kapcsolat);
  kiiro($kornyezetvedelem);
};
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
  $fajta = $_POST["fajta"];
  $kategoria = $_POST["kategoria"];
  $premium = isset($_POST["premium"]);
  $kornyezetvedelem = $_POST["kornyezetvedelem"];
  $ar=$_POST["ar"];
  $GLOBALS["autotipusadatatvevo"] =AutotipusAdatAtvevo($marka,$tipus ,$fajta, $kategoria, $premium, $kornyezetvedelem,$ar);
  print $fajta.$marka.$ar;
}
function printresult(){
  print $GLOBALS["autotipusadatatvevo"];
}
