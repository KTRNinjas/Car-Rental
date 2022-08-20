<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoLekredezesDAO.php");


function GetLekerdezesAutok($kezdoDATE, $vegDATE)
{
   $cars = LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE);
   return arSzamolo($kezdoDATE, $vegDATE, $cars);
}
function arSzamolo($kezdoDATE, $vegDATE, $cars)
{
   $kezdoDATE = new DateTime($kezdoDATE);
   $vegDATE = new DateTime($vegDATE);
   for ($i = 0; $i < count($cars); $i++) {
      $cars[$i]["ÖsszÁr"] = $cars[$i]["Ár"] * ($vegDATE->diff($kezdoDATE)->format("%a"));
   }
   return $cars;
}
