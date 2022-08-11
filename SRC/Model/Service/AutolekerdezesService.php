<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoLekredezesDAO.php");


function GetLekerdezesAutok(){
    GetLekerdezesAutoTipusok();
}
?>