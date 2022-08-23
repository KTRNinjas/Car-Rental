<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");

function LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE)
{
    $kapcsolat = $GLOBALS["kapcsolat"];
    $sql = "SELECT `autotipus`.`Márka`,`autotipus`.`Tipus`,`fajta`.`Fajta_neve`,`kategoria`.`Kategoria`,`autotipus`.`Prémium`,`Ar`.`Ár`,`hajtaslanc`.`Hajtaslanc`,`Evjarat`,`valtotipus`.`Valtotipus` FROM `autokolcsonzo`.`cars`
JOIN `autokolcsonzo`.`autotipus` ON `autokolcsonzo`.`cars`.`Autotipus_id`= `autokolcsonzo`.`autotipus`.`ID`
JOIN `autokolcsonzo`.`fajta` ON `autokolcsonzo`.`autotipus`.`Fajta_ID`= `autokolcsonzo`.`fajta`.`ID`  
JOIN `autokolcsonzo`.`kategoria` ON `autokolcsonzo`.`autotipus`.`Kategoria_ID`= `autokolcsonzo`.`kategoria`.`ID`
JOIN `autokolcsonzo`.`Ar` ON `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`Ar`.`AutoTipusID` 
JOIN `autokolcsonzo`.`valtotipus` ON `autokolcsonzo`.`valtotipus`.`id`= `autokolcsonzo`.`cars`.`valtotipus_id`
JOIN `autokolcsonzo`.`hajtaslanc` ON `autokolcsonzo`.`hajtaslanc`.`id`= `autokolcsonzo`.`cars`.`hajtaslanc_id`
WHERE `cars`.`id` NOT IN(SELECT `Car_ID` FROM `autokolcsonzo`.`contract_car_join`) AND (`cars`.`Kivezetve`>'$vegDATE' OR `cars`.`Kivezetve` IS NULL)  OR `cars`.`id`
NOT IN 
(SELECT `Car_ID` FROM `autokolcsonzo`.`contract_car_join` WHERE `contract_car_join`.`Contract_ID` IN (SELECT id FROM `autokolcsonzo`.`contract` WHERE NOT((`Végdátum`<'$kezdoDATE') OR (`Kezdődátum`>'$vegDATE')))) AND (`cars`.`Kivezetve`>'$vegDATE' OR `cars`.`Kivezetve` IS NULL)";
    $result =  mysqli_query($kapcsolat, $sql);

    $kulsoTomb = [];

    while ($egysor = mysqli_fetch_array($result)) {
        $belsotomb = [];
        $belsotomb["Márka"] = $egysor["Márka"];
        $belsotomb["Tipus"] = $egysor["Tipus"];
        $belsotomb["Fajta_neve"] = $egysor["Fajta_neve"];
        $belsotomb["Kategoria"] = $egysor["Kategoria"];
        $belsotomb["Prémium"] = $egysor["Prémium"];
        $belsotomb["Hajtaslanc"] = $egysor["Hajtaslanc"];
        $belsotomb["Evjarat"] = $egysor["Evjarat"];
        $belsotomb["Valtotipus"] = $egysor["Valtotipus"];
        $belsotomb["Ár"] = $egysor["Ár"];

        array_push($kulsoTomb, $belsotomb);
    }
    return $kulsoTomb;
}
