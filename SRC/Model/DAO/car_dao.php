<?php 
$path=dirname(__DIR__,2);
require_once($path.DIRECTORY_SEPARATOR."Connection".DIRECTORY_SEPARATOR."Dbconn.php");
function getAllCars(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $cars=[];
    $today=date("y-m-d");
    $sql="SELECT Rendszám,Alvázszám,(SELECT hajtaslanc FROM `autokolcsonzo`.`hajtaslanc` WHERE id=hajtaslanc_id) AS hajtaslanc,(SELECT valtotipus FROM `autokolcsonzo`.`valtotipus` WHERE id=valtotipus_id) AS valtotipus,Evjarat,Teljesitmeny,Biztositasi_dij,km,Forgalmi_megujitasanak_ideje,(SELECT Márka FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS marka,Kivezetve FROM `autokolcsonzo`.`cars` WHERE Kivezetve IS NULL OR DATE(Kivezetve)>'$today'";
    $result=mysqli_query($kapcsolat, $sql);
    while($egysor=mysqli_fetch_assoc($result)){
        $car=[];
        foreach($egysor as $key=>$value){
        $car[$key]=$value;
        }
        array_push($cars,$car);
   }
   return $cars;
}
function getAllHajtaslancDAO(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $sql="SELECT * FROM `autokolcsonzo`.`hajtaslanc`";
    $result=mysqli_query($kapcsolat, $sql);
    $hajtaslanc=[];
    while($egysor=mysqli_fetch_assoc($result)){
        $hajtaslanc[$egysor['id']]=$egysor['Hajtaslanc'];
        var_dump($hajtaslanc);
   }
   return $hajtaslanc;
}
function insertCar($rendszam,$alvazszam,$hajtaslanc_id,$valtotipus_id,$evjarat,$teljesitmeny,$biztositasi_dij,$kilometer,$forgalmi,$autotipus_id){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $cars=[];
    $today=date("y-m-d");
    $sql="SELECT Rendszám,Alvázszám,(SELECT hajtaslanc FROM `autokolcsonzo`.`hajtaslanc` WHERE id=hajtaslanc_id) AS hajtaslanc,(SELECT valtotipus FROM `autokolcsonzo`.`valtotipus` WHERE id=valtotipus_id) AS valtotipus,Evjarat,Teljesitmeny,Biztositasi_dij,km,Forgalmi_megujitasanak_ideje,(SELECT Márka FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS marka,Kivezetve FROM `autokolcsonzo`.`cars` WHERE Kivezetve IS NULL OR DATE(Kivezetve)>'$today'";
    $result=mysqli_query($kapcsolat, $sql);
    while($egysor=mysqli_fetch_assoc($result)){
        $car=[];
        foreach($egysor as $key=>$value){
        $car[$key]=$value;
        }
        array_push($cars,$car);
   }
   return $cars;
}
?>