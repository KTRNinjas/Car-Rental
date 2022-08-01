<?php 
$path = dirname(__DIR__, 1);
    include_once($path."/DAO/AutoTipusDAO.php");
    function AutotipusAdatAtvevo($marka,$tipus,$premium,$ar){
       return AutoTipusTarolo($marka,$tipus,$premium,$ar); //ar beszur'as
    }
