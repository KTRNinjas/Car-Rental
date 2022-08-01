<?php
$path = dirname(__DIR__, 2);
include($path . "/Connection/Dbconn.php");
function AutoTipusTarolo($Marka,$Tipus,$Ar)
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`,`Tipus`, `Ar`) VALUES (NULL, '$Marka','$Tipus', '$Ar')"; // modositott

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
