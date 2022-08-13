<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");

function GetLekerdezesAutoTipusok(){
    $kapcsolat=$GLOBALS["kapcsolat"];  
    $sql = "SELECT `ID`, `Rendszám`, `Alvázszám`,  `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`,
    (SELECT ID FROM `autokolcsonzo`.`szerzodes` WHERE `autokolcsonzo`.`cars`.`ID`= `autokolcsonzo`.`szerzodes`.`Szerzodes_szama` ) AS `SzerzodesID`,
    (SELECT `Szerzodes_szama` FROM `autokolcsonzo`.`szerzodes` WHERE `autokolcsonzo`.`cars`.`ID`= `autokolcsonzo`.`szerzodes`.`Szerzodes_szama` ) AS `Szerzodes_szam`,
    `km` FROM `autokolcsonzo`.`cars`";

    $lekerdezesAutoTipusok=[];
    $lekerdezesAutoTipusokKulsotomb=[];
    $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_assoc($result)){
        $lekerdezesAutoTipusok["ID"]= $egysor["ID"];
        $lekerdezesAutoTipusok["Rendszám"]= $egysor["Rendszám"];
        $lekerdezesAutoTipusok["Alvázszám"]= $egysor["Alvázszám"];
        $lekerdezesAutoTipusok["Evjarat"]= $egysor["Evjarat"];
        $lekerdezesAutoTipusok["Teljesitmeny"]= $egysor["Teljesitmeny"];
        $lekerdezesAutoTipusok["Biztositasi_dij"]= $egysor["Biztositasi_dij"];
        $lekerdezesAutoTipusok["SzerzodesID"]= $egysor["SzerzodesID"];
        $lekerdezesAutoTipusok["Szerzodes_szam"]= $egysor["Szerzodes_szam"];
        $lekerdezesAutoTipusok["km"]= $egysor["km"];
        array_push($lekerdezesAutoTipusokKulsotomb,$lekerdezesAutoTipusok);
        
    }

    return $lekerdezesAutoTipusokKulsotomb;
}

?>
