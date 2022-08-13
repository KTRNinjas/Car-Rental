<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");

function LekerdezesAutok_kivantIntervalumba($kezdoDATE,$vegDATE){
$kapcsolat=$GLOBALS["kapcsolat"];
    $sql="SELECT `Rendszám` FROM `autokolcsonzo`.`cars` WHERE `cars`.`id` NOT IN (SELECT `Car_ID` FROM `autokolcsonzo`.`contract_car_join` WHERE `contract_car_join`.`Contract_ID` IN (SELECT id FROM `autokolcsonzo`.`contract` WHERE ('$kezdoDATE' BETWEEN `Kezdődátum` AND `Végdátum`) OR ('$vegDATE' BETWEEN `Kezdődátum` AND `Végdátum`))); 
    ";
 $result=  mysqli_query($kapcsolat,$sql);
    $kulsoTomb=[];  
    while($egysor = mysqli_fetch_array($result))
    {
    $belsotomb=[];
    $belsotomb["Rendszám"]=$egysor["Rendszám"];
    array_push($kulsoTomb,$belsotomb);
    }

    return $kulsoTomb;
}
?>
