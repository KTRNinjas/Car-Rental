<?php
$path = dirname(__DIR__, 2);
include($path . "/Connection/Dbconn.php");
function AutoTipusTarolo($Marka,$Tipus ,$Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas,$Ar)
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`,`Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`, `Ar`) VALUES (NULL, '$Marka','$Tipus', '$Fajta', '$Kategoria', '$Premium', '$KornyezetvedelmiBesorolas','$Ar')"; // modositott

    $üzenet = "Az autotipus felvétel ";
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        return $üzenet . " sikeres volt!<br><br>";
    } else return $üzenet . " sikertelen volt!<br><br>";
}
function SQLFeltolto($kapcsolat, $sql, $value)
{
    $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_array($result)) {
        $SQLTomb[$egysor["ID"]] = $egysor[$value];
    }
    return $SQLTomb;
}
//marka
function MarkaFeltolto($kapcsolat)
{
    $sql = "SELECT * FROM `autokolcsonzo`.`márka`";
    $Marka = [];
    $Marka = SQLFeltolto($kapcsolat, $sql, "Márka");
    return $Marka;
}
function FajtaFeltolto($kapcsolat)
{
    $sql = "SELECT * FROM `autokolcsonzo`.`fajta`";
    $Fajta = [];
    $Fajta = SQLFeltolto($kapcsolat, $sql, "Fajta_neve");
    return $Fajta;
}
function KategoriaFeltolto($kapcsolat)
{
    $sql = "SELECT * FROM `autokolcsonzo`.`kategoria`";
    $Kategoria = [];
    $Kategoria = SQLFeltolto($kapcsolat, $sql, "Kategoria");
    return $Kategoria;
}
function KornyezetVedelemFeltolto($kapcsolat)
{
    $sql = "SELECT * FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
    $Környezetvédelmibesorolás = [];
    $Környezetvédelmibesorolás = SQLFeltolto($kapcsolat, $sql, "KörnyezetvédelmiBesorolás");
    return $Környezetvédelmibesorolás;
}
