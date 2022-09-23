<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
function getallAutotipusService(){
    return getAllAutotipus();
}

function FajtaFeltoltoService()
{
    return FajtaFeltoltoDAO();
}
function KategoriaFeltoltoService()
{
    return KategoriaFeltoltoDAO();
}
function KornyezetVedelemFeltoltoService()
{
    return KornyezetVedelemFeltoltoDAO();
}
function AutotipusAdatAtvevo($marka, $tipus, $fajta, $kategoria, $premium, $kornyezetvedelem)
{
    if ($premium == true) {
        $premium = 1;
    } else {
        $premium = 0;
    }

    return AutoTipusTarolo($marka, $tipus, $fajta, $kategoria, $premium, $kornyezetvedelem);
}
function updateAutotipusService($marka,$tipus,$premium,$_ID,$kategoria_ID,$kornyezetvedelem_ID){
    updateAutotipusDAO($marka,$tipus,$premium,$_ID,$kategoria_ID,$kornyezetvedelem_ID);
}