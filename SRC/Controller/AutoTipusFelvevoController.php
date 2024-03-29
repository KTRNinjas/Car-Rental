<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "AutoTipusService.php");
$url = "/autotipusfelvevo";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "AutoTipusFelvetel.php";
$routes[$url] = $fileLocation;

function initAutotipusController()
{
  $GLOBALS['autotipus'] = autotipusService();
};
function AutotmakeHeader()
{
  print '<div class="grid-item"><small>Márka</small></div>';
  print '<div class="grid-item"><small>Tipus</small></div>';
  print '<div class="grid-item"><small>Prémium</small></div>';
  print '<div class="grid-item"><small>Fajta</small></div>';
  print '<div class="grid-item"><small>Kategoria</small></div>';
  print '<div class="grid-item"><small>Környezetvédelmi besorolás</small></div>';
}



function printAutotipusInDB()
{
  $hyphen = "'";
  $autotipus = $GLOBALS['autotipus'];
  for ($i = 0; $i < count($autotipus); $i++) {
    print '<form action="" method="post" enctype="multipart/form-data">';
    print '<div class="grid-container">';

    if ($i == 0) {
      AutotmakeHeader();
    }

    print '<input type="text" id=AutotipusID' . $autotipus[$i]['ID'] . ' name="AutotipusID" size="0" value="' . $autotipus[$i]['ID'] . '" hidden>';
    print '<input class="smallerInput" type="text" name="marka"  value="' . $autotipus[$i]['Márka'] . '" required>
        ';
    print '<input class="smallerInput" type="text" name="tipus"  value="' . $autotipus[$i]['Tipus'] . '" required>';
    if ($autotipus[$i]['Prémium'] == 1) {
      print '<input class="smallerInput" type="checkbox" name="premium"  value="on" checked="true">';
    } else {
      print '<input class="smallerInput" type="checkbox" name="premium" value="off">';
    }


    print '<select class="smallerInput" name="fajta" id=""  required>
      <option value="">Válasszon Fajtát</option>';
    getFajta($autotipus[$i]['fajta']);
    print '</select>';

    print '<select class="smallerInput" name="kategoria" id=""  required>
      <option value="">Válasszon kategoriat</option>';
    getKategoria($autotipus[$i]['kategoria']);
    print '</select>';

    print '<select class="smallerInput" name="kornyezetvedelem" id=""  required>
      <option value="">Válasszon környezetvédelmibesorolás</option>';
    getKornyezetVedelem($autotipus[$i]['KörnyezetvédelmiBesolas']);
    print '</select>';

    //bezar
    print '<div class="grid-item"><input type="submit" name="updateAutotipus" value="Mentés"></div>';
    print '<div class="grid-item"><input type="submit" name="deleteAutotipus" value="Törlés"></div>';
    print '</div>';
    print '</form>';
  }
}
//delet
function deleteAutotipusController()
{
  if (isset($_POST['deleteAutotipus'])) {
    $autotipus_ID = $_POST['AutotipusID'];
    deleteAutotipusService($autotipus_ID);
    header('Location: /autotipusfelvevo', true, 303);
    exit;
  }
}

//update
function updateAutotipusController()
{
  if (isset($_POST['updateAutotipus'])) {
    $marka = $_POST['marka'];
    $tipus = $_POST['tipus'];
    $premium = isset($_POST['premium']);
    $fajta_ID = $_POST['fajta'];
    $kategoria_ID = $_POST['kategoria'];
    $kornyezetvedelem_ID = $_POST['kornyezetvedelem'];
    $autotipus_ID = $_POST["AutotipusID"];
    updateAutotipusService($marka, $tipus, $premium, $fajta_ID, $kategoria_ID, $kornyezetvedelem_ID, $autotipus_ID);
    header('Location: /autotipusfelvevo', true, 303);
    exit;
  }
}

function getFajta($fajtaInput = null)
{
  $fajta = FajtaFeltoltoService();
  foreach ($fajta as $key => $value) {
    if ($value != $fajtaInput) {
      print '<option value="' . $key . '">' . $value . '</option>';
    } else {
      print '<option value="' . $key . '" selected>' . $value . '</option>';
    }
  }
};
function getKategoria($kategoriaInput = null)
{
  $kategoria = KategoriaFeltoltoService();
  foreach ($kategoria as $key => $value) {
    if ($value != $kategoriaInput) {
      print '<option value="' . $key . '">' . $value . '</option>';
    } else {
      print '<option value="' . $key . '" selected>' . $value . '</option>';
    }
  }
};
function getKornyezetVedelem($kornyezetvedelemInput = null)
{
  $kornyezetvedelem = KornyezetVedelemFeltoltoService();
  foreach ($kornyezetvedelem as $key => $value) {
    if ($value != $kornyezetvedelemInput) {
      print '<option value="' . $key . '">' . $value . '</option>';
    } else {
      print '<option value="' . $key . '" selected>' . $value . '</option>';
    }
  }
};
function Autotipusbekuldes()
{
  $marka = $_POST["marka"];
  $tipus = $_POST["tipus"];
  $fajta = $_POST["fajta"];
  $kategoria = $_POST["kategoria"];
  $premium = isset($_POST["premium"]);
  $kornyezetvedelem = $_POST["kornyezetvedelem"];
  $GLOBALS["autotipusadatatvevo"] = AutotipusAdatAtvevo($marka, $tipus, $fajta, $kategoria, $premium, $kornyezetvedelem);
  header('Location: /autotipusfelvevo', true, 303);
  exit;
}
function createAutotipusController()
{
  if (isset($_POST["Autotipusbekuldes"])) {
    Autotipusbekuldes();
  }
}