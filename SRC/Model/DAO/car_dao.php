<?php 
$path=dirname(__DIR__,2);
require_once($path.DIRECTORY_SEPARATOR."Connection".DIRECTORY_SEPARATOR."Dbconn.php");
function getAllCars(){
    $kapcsolat=$GLOBALS['kapcsolat'];
    $cars=[];
    $sql="SELECT Rendszám,Alvázszám,(SELECT hajtaslanc FROM `autokolcsonzo`.`hajtaslanc` WHERE id=hajtaslanc_id) AS hajtaslanc,(SELECT valtotipus FROM `autokolcsonzo`.`valtotipus` WHERE id=valtotipus_id) AS valtotipus,Evjarat,Teljesitmeny,Biztositasi_dij,km,Forgalmi_megujitasanak_ideje,(SELECT Márka FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS marka,Kivezetve FROM `autokolcsonzo`.`cars`";
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