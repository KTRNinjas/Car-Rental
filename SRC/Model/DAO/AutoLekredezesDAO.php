<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");

function GetLekerdezesAutoTipusok(){
    $kapcsolat=$GLOBALS["kapcsolat"];  
    $sql = "SELECT `id`, `Rendszám`, `Alvázszám`,  `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km` FROM `autokolcsonzo`.`cars`";

    $lekerdezesAutoTipusok=[];
    $lekerdezesAutoTipusokKulsotomb=[];
    $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_assoc($result)){
        $lekerdezesAutoTipusok["id"]= $egysor["id"];
        $lekerdezesAutoTipusok["Rendszám"]= $egysor["Rendszám"];
        $lekerdezesAutoTipusok["Alvázszám"]= $egysor["Alvázszám"];
        $lekerdezesAutoTipusok["Evjarat"]= $egysor["Evjarat"];
        $lekerdezesAutoTipusok["Teljesitmeny"]= $egysor["Teljesitmeny"];
        $lekerdezesAutoTipusok["Biztositasi_dij"]= $egysor["Biztositasi_dij"];
        $lekerdezesAutoTipusok["km"]= $egysor["km"];
        array_push($lekerdezesAutoTipusokKulsotomb,$lekerdezesAutoTipusok);
        
    }

    return $lekerdezesAutoTipusokKulsotomb;
}

?>
