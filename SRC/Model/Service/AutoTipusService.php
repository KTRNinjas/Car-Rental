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

?>