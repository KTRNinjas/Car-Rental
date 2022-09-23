<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "AutoTipusService.php");
$url = "/autotipusfelvevo";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "AutoTipusFelvetel.php";
$routes[$url] = $fileLocation;



//autotipus lekérdezese
$cars = [];
$path = dirname(__DIR__, 1);
$url = "/Autofelvetel";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "Autofelvevo.php";
$routes[$url] = $fileLocation;
$hostname = getenv('HTTP_HOST');
$replacedPath = str_ireplace("\\", "/", $path);
$izé = "//Car-Rental";
$seenurl = str_ireplace($_SERVER['DOCUMENT_ROOT'], "", $replacedPath);

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
      print '<form action="" method="post" enctype="multipart/form-data">';
      print '<div class="grid-container">';
      if ($i == 0) {
        makeHeader();
    }
    print '<input type="text" id=carID' . $autotipus[$i]['id'] . ' name="carID" size="0" value="' . $autotipus[$i]['id'] . '" hidden>';
    print '<div class="grid-item">';
        print '<input class="smallerInput" type="text" name="marka"  value="' . $autotipus[$i]['Márka'] . '" required>
        ';
        print '<input class="smallerInput" type="text" name="tipus"  value="' . $autotipus[$i]['Tipus'] . '" required>';
        print '<input class="smallerInput" type="text" name="prémium"  value="' . $autotipus[$i]['Prémium'] . '" required>';

        print '<select class="smallerInput" name="fajta" id="" onchange="if(this.value==' . $hyphen . 'autotipusfelvevo' . $hyphen . '){location=this.value}" required>
      <option value="">Válasszon Fajtát</option>';
      getFajta($autotipus[$i]['fajta']);
      print '</select>';

      print '<select class="smallerInput" name="kategoria" id="" onchange="if(this.value==' . $hyphen . 'autotipusfelvevo' . $hyphen . '){location=this.value}" required>
      <option value="">Válasszon kategoriat</option>';
      getKategoria($autotipus[$i]['kategoria']);
      print '</select>';
      print '<select class="smallerInput" name="környezetvédelmibesorolás" id="" onchange="if(this.value==' . $hyphen . 'autotipusfelvevo' . $hyphen . '){location=this.value}" required>
      <option value="">Válasszon környezetvédelmibesorolás</option>';
      getKornyezetVedelem($autotipus[$i]['környezetvédelmibesorolás']);
      print '</select>';
        //bezar
    print '</div>';
    print '</form>';
    print '<div class="grid-item"><input type="submit" name="updateAutotipus" value="Mentés"></div>';
  }
}

function updateAutotipusController(){
  if (isset($_POST['updateAutotipus'])) {
    $marka = $_POST['Márka'];
    $tipus = $_POST['Tipus'];
    $premium=$_POST['prémium'];
    $fajta = $_POST['fajta'];
    $kategoria = $_POST['kategoria'];
    $környezetvédelmibesorolás = $_POST['környezetvédelmibesorolás'];
    updateAutotipusService($marka,$tipus,$premium,$fajta,$kategoria,$kornyezetvedelem);
    header('Location: /Autofelvetel', true, 303);
    exit;
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
