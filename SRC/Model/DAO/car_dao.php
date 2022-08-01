<?php 
$path=dirname(__DIR__,2);
require_once($path.DIRECTORY_SEPARATOR."Connection".DIRECTORY_SEPARATOR."Dbconn.php");
function getAllCars(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $cars=[];
    $today=date("y-m-d");
    $sql="SELECT Rendszám,Alvázszám,(SELECT Márka FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS marka,(SELECT Tipus FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS tipus,(SELECT hajtaslanc FROM `autokolcsonzo`.`hajtaslanc` WHERE id=hajtaslanc_id) AS hajtaslanc,(SELECT valtotipus FROM `autokolcsonzo`.`valtotipus` WHERE id=valtotipus_id) AS valtotipus,Evjarat,Teljesitmeny,Biztositasi_dij,km,Forgalmi_megujitasanak_ideje,Kivezetve FROM `autokolcsonzo`.`cars` WHERE Kivezetve IS NULL OR DATE(Kivezetve)>'$today'";
    $result=mysqli_query($kapcsolat, $sql);
    while($egysor=mysqli_fetch_assoc($result)){
        $car=[];
        foreach($egysor as $key=>$value){
        if($key=='marka'||$key=='tipus'){
            if($key=='marka'){
                $car['marka']=$egysor['marka']." ".$egysor['tipus'];
            }
        }else{
            $car[$key]=$value;
        }
        }
        array_push($cars,$car);
   }
   return $cars;
}
function getAllAutoTipusDAO(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $sql="SELECT * FROM `autokolcsonzo`.`autotipus`";
    $result=mysqli_query($kapcsolat, $sql);
    $cartype=[];
    while($egysor=mysqli_fetch_assoc($result)){
        $cartype[$egysor['Márka']]=$egysor['Márka']." ".$egysor['Tipus'];
   }
   return $cartype;
}
function getAllHajtaslancDAO(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $sql="SELECT * FROM `autokolcsonzo`.`hajtaslanc`";
    $result=mysqli_query($kapcsolat, $sql);
    $hajtaslanc=[];
    while($egysor=mysqli_fetch_assoc($result)){
        $hajtaslanc[$egysor['id']]=$egysor['Hajtaslanc'];
   }
   return $hajtaslanc;
}
function getAllValtotipusDAO(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $sql="SELECT * FROM `autokolcsonzo`.`valtotipus`";
    $result=mysqli_query($kapcsolat, $sql);
    $valtotipus=[];
    while($egysor=mysqli_fetch_assoc($result)){
        $valtotipus[$egysor['id']]=$egysor['Valtotipus'];
   }
   return $valtotipus;
}
function insertCarDAO($rendszam,$alvazszam,$hajtaslanc_id,$valtotipus_id,$evjarat,$teljesitmeny,$biztositasi_dij,$kilometer,$forgalmi,$autotipus_id){
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
