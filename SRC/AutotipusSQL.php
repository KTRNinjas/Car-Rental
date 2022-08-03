<?php
require_once("Connection/Dbconn.php");
function creatAutotipusTable($kapcsolat)
{
    $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL ,`Tipus` VARCHAR(50) NOT NULL ,`Fajta_ID` INT UNSIGNED NOT NULL , `Kategoria_ID` INT UNSIGNED NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az autotipus tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "CREATE TABLE `autokolcsonzo`.`fajta` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Fajta_neve` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Fajta tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "CREATE TABLE `autokolcsonzo`.`kategoria` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Kategoria` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Kategoria tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "CREATE TABLE `autokolcsonzo`.`környezetvédelmibesorolás` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `KörnyezetvédelmiBesorolás` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Környezetvédelmi besorolás tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "CREATE TABLE `autokolcsonzo`.`márka` (`ID` INT NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "A Márka tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
}
$array = [];
function CreatSQL($kapcsolat, $array, $tabla, $oszlop)
{
    for ($i = 0; $i < count($array); $i++) {
        $sql = "INSERT INTO `autokolcsonzo`.`$tabla` (`ID`, `$oszlop`) VALUES (NULL, '$array[$i]')";
        $üzenet = "a $tabla tablaba felvettünk egy elemet";
        Query($kapcsolat, $üzenet, $sql);
    }
}
function MarkafelvetelAutoFajta($kapcsolat)
{
    $array = ['BMW', 'Mercedes', 'Nissan'];
    $tabla = 'márka';
    $oszlop = 'Márka';
    CreatSQL($kapcsolat, $array, $tabla, $oszlop);
}
function AdatfelvetelAutoFajta($kapcsolat)
{
    $array = ['Combi', 'Terepjáró', 'Sedan', 'PickUp', 'SUV', '4X4'];
    $tabla = 'fajta';
    $oszlop = 'Fajta_neve';
    CreatSQL($kapcsolat, $array, $tabla, $oszlop);
}

function AdatfelvetelAutoKategoria($kapcsolat)
{
    $array = ['Kis személy', 'Személy autó', 'Kis teher', 'Teher'];
    $tabla = 'kategoria';
    $oszlop = 'Kategoria';
    CreatSQL($kapcsolat, $array, $tabla, $oszlop);
}
function KornyezetvedelmiBesorolas($kapcsolat)
{
    $array = ['E1', 'E2', 'E3', 'E4', 'E5', 'E6'];
    $tabla = 'környezetvédelmibesorolás';
    $oszlop = 'KörnyezetvédelmiBesorolás';
    CreatSQL($kapcsolat, $array, $tabla, $oszlop);
}

function AutotipusTablamegvaltoztatasa($kapcsolat)
{
    $sql = "ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Környezetvédelmi_ID`) REFERENCES `környezetvédelmibesorolás`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet = "az autotipus tabla sikeresen megvaltoztatva";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Kategoria_ID`) REFERENCES `kategoria`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet = "az autotipus tabla sikeresen megvaltoztatva";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Fajta_ID`) REFERENCES `fajta`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet = "az autotipus tabla sikeresen megvaltoztatva";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Márka`) REFERENCES `márka`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet = "az autotipus tabla sikeresen megvaltoztatva";
    Query($kapcsolat, $üzenet, $sql);
}
