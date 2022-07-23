<?php

$path = dirname(__DIR__, 2);
include($path . "/Connection/Dbconn.php");
AutoTipusTarolo($kapcsolat, "BMW", "Teher", "Benzines", 1, "e5");//elős elem felvétele nem kell a kodba 

function AutoTipusTarolo($kapcsolat, $Marka, $Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas)
{
    $Macskakorom = '"';
    print $Macskakorom;
    $sql = "INSERT INTO `Autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Fajta`, `Kategoria`, `Prémium`, `Környezetvédelmi besorolás`, `Ársáv`) VALUES (NULL,
" . $Macskakorom . $Marka . $Macskakorom . ",
" . $Macskakorom . $Fajta . $Macskakorom . ",
" . $Macskakorom . $Kategoria . $Macskakorom . ",
" . $Premium . ",
" . $Macskakorom . $KornyezetvedelmiBesorolas . $Macskakorom . ",
" . $Macskakorom . "70" . $Macskakorom . ");";
    $üzenet = "az auto ";
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print $üzenet . " sikeres volt!<br><br>";
    } else print $üzenet . " sikertelen volt!<br><br>";
    print $sql;
}
function FajtaFeltolto($kapcsolat){
    $result= mysqli_query($kapcsolat ,"SELECT * FROM `fajta`");
    $Fajta=[];
    $Fajtak =[];
    while($egysor=mysqli_fetch_array($result)){
        array_push($Fajtak,$Fajta[$egysor["ID"]=$egysor["Fajta_neve"]])  
     }
     return $Fajtak;
}