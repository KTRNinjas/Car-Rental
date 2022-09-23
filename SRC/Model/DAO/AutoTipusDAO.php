<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
//-----
//lekérdezés

function getAllAutotipus()
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $autotipusok = [];
    $today = date("y-m-d");
    $sql = "SELECT ID,Márka,Tipus,Prémium,
    (SELECT Fajta_neve FROM `autokolcsonzo`.`fajta` WHERE id=Fajta_ID ) AS fajta,
    (SELECT Kategoria FROM `autokolcsonzo`.`kategoria` WHERE id=Kategoria_ID ) AS kategoria,
    (SELECT KörnyezetvédelmiBesorolás FROM `autokolcsonzo`.`környezetvédelmibesorolás` WHERE id=Környezetvédelmi_ID) AS KörnyezetvédelmiBesolas FROM `autokolcsonzo`.`autotipus`";
    $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_assoc($result)) {
        $autotipus = [];
        foreach ($egysor as $key => $value) {
            
                $autotipus[$key] = $value;
            
        }
        array_push($autotipusok, $autotipus);
    }
    return $autotipusok;
}
function updateAutotipusDAO($marka,$tipus,$premium,$fajta_ID,$kategoria_ID,$kornyezetvedelem_ID){
    $kapcsolat = $GLOBALS['kapcsolat'];
    if ($kivezetve != '') {
        $sql = "UPDATE `autokolcsonzo`.`autotipus` SET `Márka` = '$marka', `Tipus` = '$tipus', `Prémium` = '$premium', `Fajta_ID` = '$fajta_ID', `Kategoria_ID` = '$kategoria_ID', `Környezetvédelmi_ID` = '$kornyezetvedelem_ID'";
    } else {
        $sql = "UPDATE `autokolcsonzo`.`autotipus` SET `Márka` = '$marka', `Tipus` = '$tipus', `Prémium` = '$premium', `Fajta_ID` = '$fajta_ID', `Kategoria_ID` = '$kategoria_ID', `Környezetvédelmi_ID` = '$kornyezetvedelem_ID'";
    }
    $ok = mysqli_query($kapcsolat, $sql);
    return $ok;
}


//----
function AutoTipusTarolo($Marka, $Tipus, $Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas)
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`,`Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, '$Marka','$Tipus', '$Fajta', '$Kategoria', '$Premium', '$KornyezetvedelmiBesorolas')";
    $üzenet = "Az autotipus felvétel ";
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        return $üzenet . " sikeres volt!<br><br>";
    } else return $üzenet . " sikertelen volt!<br><br>";
}
function SQLFeltolto($kapcsolat, $sql, $value)
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_array($result)) {
        $SQLTomb[$egysor["ID"]] = $egysor[$value];
    }
    return $SQLTomb;
}
function FajtaFeltoltoDAO()
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "SELECT * FROM `autokolcsonzo`.`fajta`";
    $Fajta = [];
    $Fajta = SQLFeltolto($kapcsolat, $sql, "Fajta_neve");
    return $Fajta;
}
function KategoriaFeltoltoDAO()
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "SELECT * FROM `autokolcsonzo`.`kategoria`";
    $Kategoria = [];
    $Kategoria = SQLFeltolto($kapcsolat, $sql, "Kategoria");
    return $Kategoria;
}
function KornyezetVedelemFeltoltoDAO()
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "SELECT * FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
    $Környezetvédelmibesorolás = [];
    $Környezetvédelmibesorolás = SQLFeltolto($kapcsolat, $sql, "KörnyezetvédelmiBesorolás");
    return $Környezetvédelmibesorolás;
}
