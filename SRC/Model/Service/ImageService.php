<?php
$path=dirname(__DIR__,2);
//include_once($path.DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."car_dao.php");
include_once($path.DIRECTORY_SEPARATOR."FileMuveletek".DIRECTORY_SEPARATOR."Kepfeltoltes.php");
include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."ImageDAO.php");
function kepFeltoltesService($carID){
$imagePaths=kepFeltoltes($carID);
for($i=0;$i<count($imagePaths);$i++){
kepFeltoltesDAO($carID,$imagePaths[$i]);
}
}
function getPicturesOfACarService($carID){
    $paths=getPicturesOfACarDAO($carID);
    if(count($paths)==0){
        $paths[0]=noImageReturn();
        return $paths;
    }else{
        return $paths;
    }
}
function deleteAllImagesOfACarService($carID){
    $paths=getPicturesOfACarDAO($carID);
    deleteAllImagesOfACar($paths,$carID);
   // if (!isset($GLOBALS['imageErrors'][$carID])) {
   //     deleteAllImagesOfACarDAO($carID);
   // }   
}
