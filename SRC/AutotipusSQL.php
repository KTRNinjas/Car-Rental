<?php
require_once("Connection/Dbconn.php");
$SideTableNevArray=[];
$arrayAdat = [];
function CreatSQL($kapcsolat, $arrayAdat, $tabla, $oszlop)
{
    for ($i = 0; $i < count($arrayAdat); $i++) {
        $sql = "INSERT INTO `autokolcsonzo`.`$tabla` (`ID`, `$oszlop`) VALUES (NULL, '$arrayAdat[$i]')";
        $üzenet = "a $tabla tablaba felvettünk egy elemet";
        Query($kapcsolat, $üzenet, $sql);
    }
}
function creatAutotipusTable($kapcsolat)
{
    $tablaNeveArray=['fajta','kategoria','környezetvédelmibesorolás','márka'];
    $SideTableNevArray=['Fajta_neve','Kategoria','KörnyezetvédelmiBesorolás','Márka'];
    MainAutotipusTablaCreate($kapcsolat);
    SidetablaCreator($kapcsolat,$tablaNeveArray,$SideTableNevArray);
}


function MainAutotipusTablaCreate($kapcsolat){
    $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL ,`Tipus` VARCHAR(50) NOT NULL ,`Fajta_ID` INT UNSIGNED NOT NULL , `Kategoria_ID` INT UNSIGNED NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az autotipus tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
}
function SidetablaCreator($kapcsolat,$tablaNeveArray,$SideTableNevArray){  
    for($i=0;$i<count($tablaNeveArray);$i++){
    $sql = "CREATE TABLE `autokolcsonzo`.`$tablaNeveArray[$i]` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `$SideTableNevArray[$i]` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az $tablaNeveArray[$i] tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    }
}
function MarkafelvetelAutoFajta($kapcsolat)
{
    $arrayAdat = ['BMW', 'Mercedes', 'Nissan'];
    $tabla = 'márka';
    $oszlop = 'Márka';
    CreatSQL($kapcsolat, $arrayAdat, $tabla, $oszlop);
}
function AdatfelvetelAutoFajta($kapcsolat)
{
    $arrayAdat = ['Combi', 'Terepjáró', 'Sedan', 'PickUp', 'SUV', '4X4'];
    $tabla = 'fajta';
    $oszlop = 'Fajta_neve';
    CreatSQL($kapcsolat, $arrayAdat, $tabla, $oszlop);
}

function AdatfelvetelAutoKategoria($kapcsolat)
{
    $arrayAdat = ['Kis személy', 'Személy autó', 'Kis teher', 'Teher'];
    $tabla = 'kategoria';
    $oszlop = 'Kategoria';
    CreatSQL($kapcsolat, $arrayAdat, $tabla, $oszlop);
}
function KornyezetvedelmiBesorolas($kapcsolat)
{
    $arrayAdat = ['E1', 'E2', 'E3', 'E4', 'E5', 'E6'];
    $tabla = 'környezetvédelmibesorolás';
    $oszlop = 'KörnyezetvédelmiBesorolás';
    CreatSQL($kapcsolat, $arrayAdat, $tabla, $oszlop);
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
}
