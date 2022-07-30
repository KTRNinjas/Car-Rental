<?php
include_once("../Model/Service/AutoTipusService.php");
$autotipusadatatvevo="";
function kiiro($legordulo)
{
  foreach ($legordulo as $key => $value) {
    print '<option value="' . $key . '" >' . $value . '</option>';
  };
}
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
  $fajta = $_POST["fajta"];
  $kategoria = $_POST["kategoria"];
  $premium = isset($_POST["premium"]);
  $kornyezetvedelem = $_POST["kornyezetvedelem"];
  $GLOBALS["autotipusadatatvevo"] =AutotipusAdatAtvevo($marka, $fajta, $kategoria, $premium, $kornyezetvedelem);
  print $fajta.$marka;
}
function printresult(){
  print $GLOBALS["autotipusadatatvevo"];
}
