<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");

function LekerdezesAutok_kivantIntervalumba($kezdoDATE,$vegDATE){
$kapcsolat=$GLOBALS["kapcsolat"];
    $sql="SELECT `Márka`,`Tipus`,`Fajta_ID`,`Kategoria_ID`,`Prémium`,`Ár`,`hajtaslanc_id`,`Evjarat`,`valtotipus_id`,`Autotipus_id` FROM `autokolcsonzo`.`autotipus`
     JOIN `autokolcsonzo`.`ar` ON `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`ar`.`AutoTipusID` 
     JOIN `autokolcsonzo`.`cars` ON `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`cars`.`Autotipus_id` 
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
    $belsotomb["Fajta_ID"]=$egysor["Fajta_ID"];
    $belsotomb["Kategoria_ID"]=$egysor["Kategoria_ID"];
    $belsotomb["Prémium"]=$egysor["Prémium"];
    $belsotomb["Ár"]=$egysor["Ár"];
    $belsotomb["hajtaslanc_id"]=$egysor["hajtaslanc_id"];
    $belsotomb["Evjarat"]=$egysor["Evjarat"];
    $belsotomb["valtotipus_id"]=$egysor["valtotipus_id"];
    $belsotomb["Autotipus_id"]=$egysor["Autotipus_id"];
    array_push($kulsoTomb,$belsotomb);
    }

    return $kulsoTomb;
}
//  Márka tipus fajta kategoria premium,Ar,valto,hajtaslanc évjárat,

// Car_id=Autotipus_id;

// SELECT `Márka`,`Tipus`,`Kategoria_ID`,`Fajta_ID`,`Prémium` FROM `autotipus` WHERE 1 



// Autotipus és ár osszerrakasa
// SELECT `Márka`,`Tipus`,`Fajta_ID`,`Kategoria_ID`,`Prémium`,`Ár`
// FROM `autotipus` 
// JOIN `ar` ON `autotipus`.`ID`= `ar`.`AutoTipusID`;




//kilistaz cars_table Tipus_table, Ar_table 
// SELECT `Márka`,`Tipus`,`Fajta_ID`,`Kategoria_ID`,`Prémium`,`Ár`,`hajtaslanc_id`,`valtotipus_id`
//  FROM `autotipus` 
//  JOIN `ar` ON `autotipus`.`ID`= `ar`.`AutoTipusID`
//  JOIN `cars` ON `autotipus`.`ID`= `cars`.`Autotipus_id`


////kilistaz cars_table Tipus_table, Ar_table id-al   !!!autotipus.ID !!!!
// SELECT `Márka`,`Tipus`,`Fajta_ID`,`Kategoria_ID`,`Prémium`,`Ár`,`hajtaslanc_id`,`Evjarat`,`valtotipus_id`,`Autotipus_id` FROM `autotipus` JOIN `ar` ON `autotipus`.`ID`= `ar`.`AutoTipusID` JOIN `cars` ON `autotipus`.`ID`= `cars`.`Autotipus_id`;




// végső lekérdezes
// SELECT `Márka`,`Tipus`,`Fajta_ID`,`Kategoria_ID`,`Prémium`,`Ár`,`hajtaslanc_id`,`Evjarat`,`valtotipus_id`,`Autotipus_id` FROM `autotipus` JOIN `ar` ON `autotipus`.`ID`= `ar`.`AutoTipusID` JOIN `cars` ON `autotipus`.`ID`= `cars`.`Autotipus_id` WHERE `cars`.`id` NOT IN (SELECT `Car_ID` FROM `autokolcsonzo`.`contract_car_join` WHERE `contract_car_join`.`Contract_ID` IN (SELECT id FROM `autokolcsonzo`.`contract` WHERE ('$kezdoDATE' BETWEEN `Kezdődátum` AND `Végdátum`) OR ('$vegDATE' BETWEEN `Kezdődátum` AND `Végdátum`)));

?>
