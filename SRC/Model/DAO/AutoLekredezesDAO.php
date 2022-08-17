<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");

function LekerdezesAutok_kivantIntervalumba($kezdoDATE,$vegDATE){
$kapcsolat=$GLOBALS["kapcsolat"];
    $sql="SELECT `Márka`,`Tipus`,`Fajta_neve`,`Kategoria`,`Prémium`,`Ár`,`Hajtaslanc`,`Evjarat`,`Valtotipus` FROM `autokolcsonzo`.`autotipus` 
    JOIN `autokolcsonzo`.`fajta` ON `autokolcsonzo`.`autotipus`.`Fajta_ID`= `autokolcsonzo`.`fajta`.`ID`
    JOIN `autokolcsonzo`.`kategoria` ON `autokolcsonzo`.`autotipus`.`Kategoria_ID`= `autokolcsonzo`.`kategoria`.`ID`
    JOIN `autokolcsonzo`.`ar` ON `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`ar`.`AutoTipusID` 
    JOIN `autokolcsonzo`.`cars` ON `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`cars`.`Autotipus_id`
    JOIN `autokolcsonzo`.`valtotipus` ON `autokolcsonzo`.`valtotipus`.`id`= `autokolcsonzo`.`cars`.`valtotipus_id`
    JOIN `autokolcsonzo`.`hajtaslanc` ON `autokolcsonzo`.`hajtaslanc`.`id`= `autokolcsonzo`.`cars`.`hajtaslanc_id`
    
    WHERE `cars`.`id` 
    NOT IN 
    (SELECT `Car_ID` FROM `autokolcsonzo`.`contract_car_join` WHERE `contract_car_join`.`Contract_ID` IN (SELECT id FROM `autokolcsonzo`.`contract` WHERE ('$kezdoDATE' BETWEEN `Kezdődátum` AND `Végdátum`) OR ('$vegDATE' BETWEEN `Kezdődátum` AND `Végdátum`)));";
 $result=  mysqli_query($kapcsolat,$sql);
    $kulsoTomb=[];  
    
    
    while($egysor = mysqli_fetch_array($result))
    {
    $belsotomb=[];
    $belsotomb["Márka"]=$egysor["Márka"];
    $belsotomb["Tipus"]=$egysor["Tipus"];
    $belsotomb["Fajta_neve"]=$egysor["Fajta_neve"];
    $belsotomb["Kategoria"]=$egysor["Kategoria"];
    $belsotomb["Prémium"]=$egysor["Prémium"];
    $belsotomb["Ár"]=$egysor["Ár"];
    $belsotomb["Hajtaslanc"]=$egysor["Hajtaslanc"];
    $belsotomb["Evjarat"]=$egysor["Evjarat"];
    $belsotomb["Valtotipus"]=$egysor["Valtotipus"];
        
    array_push($kulsoTomb,$belsotomb);
    }
    print $sql;
    var_dump($kulsoTomb);
    return $kulsoTomb;
}





     

// végső lekérdezes
// SELECT `Márka`,`Tipus`,`Fajta_ID`,`Kategoria_ID`,`Prémium`,`Ár`,`hajtaslanc_id`,`Evjarat`,`valtotipus_id`,`Autotipus_id` FROM `autotipus` JOIN `ar` ON `autotipus`.`ID`= `ar`.`AutoTipusID` JOIN `cars` ON `autotipus`.`ID`= `cars`.`Autotipus_id` WHERE `cars`.`id` NOT IN (SELECT `Car_ID` FROM `autokolcsonzo`.`contract_car_join` WHERE `contract_car_join`.`Contract_ID` IN (SELECT id FROM `autokolcsonzo`.`contract` WHERE ('$kezdoDATE' BETWEEN `Kezdődátum` AND `Végdátum`) OR ('$vegDATE' BETWEEN `Kezdődátum` AND `Végdátum`)));

?>
