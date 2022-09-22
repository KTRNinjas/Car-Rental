<?php
$SideTableNevArray = [];
$arrayAdat = [];
$tablaID = [];
$tablaNev = [];

function insert_adatok($kapcsolat, $arrayAdat, $tabla, $oszlop)
{
    for ($i = 0; $i < count($arrayAdat); $i++) {
        $sql = "INSERT INTO `autokolcsonzo`.`$tabla` (`ID`, `$oszlop`) VALUES (NULL, '$arrayAdat[$i]')";
        $üzenet = "a $tabla sikeresen felvetük a $arrayAdat[$i] elemet";
        Query($kapcsolat, $üzenet, $sql);
    }
}
function Cascade($kapcsolat, $tablaID, $tablaNev)
{
    for ($i = 0; $i < count($tablaID); $i++) {
        $sql = "ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`$tablaNev[$i]`) REFERENCES `$tablaID[$i]`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
        $üzenet = "az autotipus tabla sikeresen megvaltoztatva";
        Query($kapcsolat, $üzenet, $sql);
    }
}
function MainAutotipusTablaCreate($kapcsolat)
{
    $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL ,`Tipus` VARCHAR(50) NOT NULL ,`Fajta_ID` INT UNSIGNED NOT NULL , `Kategoria_ID` INT UNSIGNED NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az autotipus tabla letrehozasa";
    return Query($kapcsolat, $üzenet, $sql);
    
}
function SidetablaCreator($kapcsolat)
{
    $tablaNeveArray = ['fajta', 'kategoria', 'környezetvédelmibesorolás'];
    $SideTableNevArray = ['Fajta_neve', 'Kategoria', 'KörnyezetvédelmiBesorolás'];
    for ($i = 0; $i < count($tablaNeveArray); $i++) {
        $sql = "CREATE TABLE `autokolcsonzo`.`$tablaNeveArray[$i]` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `$SideTableNevArray[$i]` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
        $üzenet = "Az $tablaNeveArray[$i] tabla letrehozasa";
        Query($kapcsolat, $üzenet, $sql);
    }
}
function AdatfelvetelAutoFajta($kapcsolat)
{
    $arrayAdat = ['Combi', 'Terepjáró', 'Sedan', 'PickUp', 'SUV', '4X4'];
    $tabla = 'fajta';
    $oszlop = 'Fajta_neve';
    insert_adatok($kapcsolat, $arrayAdat, $tabla, $oszlop);
}

function AdatfelvetelAutoKategoria($kapcsolat)
{
    $arrayAdat = ['Kis személy', 'Személy autó', 'Kis teher', 'Teher'];
    $tabla = 'kategoria';
    $oszlop = 'Kategoria';
    insert_adatok($kapcsolat, $arrayAdat, $tabla, $oszlop);
}
function KornyezetvedelmiBesorolas($kapcsolat)
{
    $arrayAdat = ['E1', 'E2', 'E3', 'E4', 'E5', 'E6'];
    $tabla = 'környezetvédelmibesorolás';
    $oszlop = 'KörnyezetvédelmiBesorolás';
    insert_adatok($kapcsolat, $arrayAdat, $tabla, $oszlop);
}

function AutotipusTablamegvaltoztatasa($kapcsolat)
{
    $tablaID = ['Fajta_ID', 'Kategoria_ID', 'Környezetvédelmi_ID'];
    $tablaNev = ['fajta', 'kategoria', 'környezetvédelmibesorolás'];
    Cascade($kapcsolat, $tablaNev, $tablaID);
}
