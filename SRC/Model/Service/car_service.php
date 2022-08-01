<?php 
$path=dirname(__DIR__,1);
include_once($path.DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."car_dao.php");
function getAllCarsService(){
    return getAllCars();
}
function getAllHajtaslancService(){
    return getAllHajtaslancDAO();
}
function getAllValtotipusService(){
    return getAllValtotipusDAO();
}
function getAllAutoTipusService(){
return getAllAutoTipusDAO();
}
function insertCarService($rendszam,$alvazszam,$hajtaslanc_id,$valtotipus_id,$evjarat,$teljesitmeny,$biztositasi_dij,$kilometer,$forgalmi,$autotipus_id){
    return insertCarDAO($rendszam,$alvazszam,$hajtaslanc_id,$valtotipus_id,$evjarat,$teljesitmeny,$biztositasi_dij,$kilometer,$forgalmi,$autotipus_id);
}
?>