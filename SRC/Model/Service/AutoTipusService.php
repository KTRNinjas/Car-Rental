<?php 
$path = dirname(__DIR__, 1);
    include_once($path."/DAO/AutoTipusDAO.php");
    function Feltolto($kapcsolat){
        return FajtaFeltolto($kapcsolat);
    }
    function Kategoria($kapcsolat){
        return KategoriaFeltolto($kapcsolat);
    }
    function KornyezetVedelem($kapcsolat){
        return KornyezetVedelemFeltolto($kapcsolat);
    }
    function AutotipusAdatAtvevo($marka,$tipus,$fajta,$kategoria,$premium,$kornyezetvedelem){
    //Ide kéne egy if($premium==true){$premium=1;}else{$premium=0;} átírás, különben nem működik nálam rajnaig
       return AutoTipusTarolo($marka,$tipus,$fajta,$kategoria,$premium,$kornyezetvedelem);
    }
