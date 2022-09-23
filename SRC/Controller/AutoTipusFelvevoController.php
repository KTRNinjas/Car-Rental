<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "AutoTipusService.php");
$url = "/autotipusfelvevo";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "AutoTipusFelvetel.php";
$routes[$url] = $fileLocation;

//autotipus lekérdezese
function initCarController()
{
    $GLOBALS['autotipus'] = getallAutotipusService();
  }
function makeHeader()
{
    print '<div class="grid-item"></div>';
    print '<div class="grid-item"><small>Márka</small></div>';
    print '<div class="grid-item"><small>Tipus</small></div>';
    print '<div class="grid-item"><small>Fajta_ID</small></div>';
    print '<div class="grid-item"><small>Kategoria_ID</small></div>';
    print '<div class="grid-item"><small>Prémium</small></div>';
    print '<div class="grid-item"><small>Környezetvédelmi_ID</small></div>';
}



function printAutotipusInDB(){
  $hyphen = "'";
    $autotipus = $GLOBALS['autotipus'];
    for ($i = 0; $i < count($autotipus); $i++) {
    
    print $autotipus[$i]['Márka'];
}


}












//autotipus felvétele
$autotipusadatatvevo = "";
function kiiro($legordulo)
{
  foreach ($legordulo as $key => $value) {
    print '<option value="' . $key . '" >' . $value . '</option>';
  };
}
function getFajta()
{
  $fajta = FajtaFeltoltoService();
  kiiro($fajta);
};
function getKategoria()
{
  $kategoria = KategoriaFeltoltoService();
  kiiro($kategoria);
};
function getKornyezetVedelem()
{
  $kornyezetvedelem = KornyezetVedelemFeltoltoService();
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
  $GLOBALS["autotipusadatatvevo"] = AutotipusAdatAtvevo($marka, $tipus, $fajta, $kategoria, $premium, $kornyezetvedelem);
}
function printresult()
{
  print $GLOBALS["autotipusadatatvevo"];
}
