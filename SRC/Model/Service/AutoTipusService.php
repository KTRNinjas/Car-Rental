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
    function Marka($kapcsolat){
        return MarkaFeltolto($kapcsolat);
    }
    function AutotipusAdatAtvevo($marka,$tipus,$fajta,$kategoria,$premium,$kornyezetvedelem,$ar){
       return AutoTipusTarolo($marka,$tipus,$fajta,$kategoria,$premium,$kornyezetvedelem,$ar); //ar beszur'as
    }
