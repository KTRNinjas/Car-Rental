<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
function getAllCars()
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $cars = [];
    $today = date("y-m-d");
    $sql = "SELECT id,Rendszám,Alvázszám,
    (SELECT Márka FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS marka,
    (SELECT Tipus FROM `autokolcsonzo`.`autotipus` WHERE id=Autotipus_id ) AS tipus,
    (SELECT hajtaslanc FROM `autokolcsonzo`.`hajtaslanc` WHERE id=hajtaslanc_id) AS hajtaslanc,
    (SELECT valtotipus FROM `autokolcsonzo`.`valtotipus` WHERE id=valtotipus_id) AS valtotipus,Evjarat,Teljesitmeny,Biztositasi_dij,km,Forgalmi_megujitasanak_ideje,Kivezetve FROM `autokolcsonzo`.`cars` WHERE Kivezetve IS NULL OR DATE(Kivezetve)>'$today'";
    $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_assoc($result)) {
        $car = [];
        foreach ($egysor as $key => $value) {
            if ($key == 'marka' || $key == 'tipus') {
                if ($key == 'marka') {
                    $car['marka'] = $egysor['marka'] . " " . $egysor['tipus'];
                }
            } else {
                $car[$key] = $value;
            }
        }
        array_push($cars, $car);
    }
    return $cars;
}

function getAllAutoTipusDAO()
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "SELECT * FROM `autokolcsonzo`.`autotipus`";
    $result = mysqli_query($kapcsolat, $sql);
    $cartype = [];
    while ($egysor = mysqli_fetch_assoc($result)) {
        $cartype[$egysor['ID']] = $egysor['Márka'] . " " . $egysor['Tipus'];
    }
    return $cartype;
}
function getAllHajtaslancDAO()
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "SELECT * FROM `autokolcsonzo`.`hajtaslanc`";
    $result = mysqli_query($kapcsolat, $sql);
    $hajtaslanc = [];
    while ($egysor = mysqli_fetch_assoc($result)) {
        $hajtaslanc[$egysor['id']] = $egysor['Hajtaslanc'];
    }
    return $hajtaslanc;
}
function getAllValtotipusDAO()
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "SELECT * FROM `autokolcsonzo`.`valtotipus`";
    $result = mysqli_query($kapcsolat, $sql);
    $valtotipus = [];
    while ($egysor = mysqli_fetch_assoc($result)) {
        $valtotipus[$egysor['id']] = $egysor['Valtotipus'];
    }
    return $valtotipus;
}
function insertCarDAO($rendszam, $alvazszam, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositasi_dij, $kilometer, $forgalmi, $autotipus_id)
{
    $kapcsolat = $GLOBALS['kapcsolat'];

    $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, '$rendszam', '$alvazszam', '$hajtaslanc_id', '$valtotipus_id', '$evjarat', '$teljesitmeny', '$biztositasi_dij', '$kilometer', '$forgalmi', '$autotipus_id', NULL)";
    $ok = mysqli_query($kapcsolat, $sql);
    return $ok;
}
function updateCarDAO($rendszam, $alvazszam, $autotipus_id, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositas, $kilometer, $forgalmi, $kivezetve, $carID)
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    if ($kivezetve != '') {
        $sql = "UPDATE `autokolcsonzo`.`cars` SET `Rendszám` = '$rendszam', `Alvázszám` = '$alvazszam', `hajtaslanc_id` = '$hajtaslanc_id', `valtotipus_id` = '$valtotipus_id', `Evjarat` = '$evjarat', `Teljesitmeny` = '$teljesitmeny', `Biztositasi_dij` = '$biztositas', `km` = '$kilometer', `Forgalmi_megujitasanak_ideje` = '$forgalmi', `Autotipus_id` = '$autotipus_id', `Kivezetve` = '$kivezetve' WHERE `cars`.`id` = $carID ";
    } else {
        $sql = "UPDATE `autokolcsonzo`.`cars` SET `Rendszám` = '$rendszam', `Alvázszám` = '$alvazszam', `hajtaslanc_id` = '$hajtaslanc_id', `valtotipus_id` = '$valtotipus_id', `Evjarat` = '$evjarat', `Teljesitmeny` = '$teljesitmeny', `Biztositasi_dij` = '$biztositas', `km` = '$kilometer', `Forgalmi_megujitasanak_ideje` = '$forgalmi', `Autotipus_id` = '$autotipus_id', `Kivezetve` = NULL  WHERE `cars`.`id` = $carID ";
    }
    $ok = mysqli_query($kapcsolat, $sql);
    return $ok;
}
function deleteCarDAO($carID)
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "DELETE FROM `autokolcsonzo`.cars WHERE `autokolcsonzo`.`cars`.`id` = $carID";
    $ok = mysqli_query($kapcsolat, $sql);
    return $ok;
}
