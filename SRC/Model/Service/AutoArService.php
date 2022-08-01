<?php
$path = dirname(__DIR__, 1);
include_once($path . "/DAO/AutoArDAO.php");
function AutotipusAdatAtvevo($marka, $tipus, $ar)
{
   return AutoTipusTarolo($marka, $tipus, $ar); //ar beszur'as
}
