<?php
require("Connection/Dbconn.php");
include_once("registration_data.php");
InitDb($kapcsolat);
function InitDb($kapcsolat)
{
    $üzenet="adatbazis torlése";
    $sql = "DROP DATABASE autokolcsonzo";
    Query($kapcsolat,$üzenet,$sql);
    $üzenet = "az adatbázis létrehozása ";
    $sql = "CREATE DATABASE autokolcsonzo";
    Query($kapcsolat, $üzenet, $sql);
    TablaFelvetele($kapcsolat);
    Adatfelvetel($kapcsolat);

}
function AdatFelvetel($kapcsolat){
    AdatfelvetelAutoFajta($kapcsolat);
    AdatfelvetelAutoKategoria($kapcsolat);
    KornyezetvedelmiBesorolas($kapcsolat);
}
function TablaFelvetele($kapcsolat)
{
    create_contact($kapcsolat);
    create_account($kapcsolat);
    create_user_account_join($kapcsolat);
    $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL , `Fajta_ID` INT UNSIGNED NOT NULL , `Kategoria_ID` INT UNSIGNED NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az autotipus tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql="CREATE TABLE `autokolcsonzo`.`fajta` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Fajta_neve` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Fajta tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql = "CREATE TABLE `autokolcsonzo`.`kategoria` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Kategoria` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Kategoria tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
    $sql="CREATE TABLE `autokolcsonzo`.`környezetvédelmibesorolás` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `KörnyezetvédelmiBesorolás` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Környezetvédelmi besorolás tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
}
function Query($kapcsolat, $üzenet, $sql)
{
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print $üzenet . " sikeres volt!<br><br>";
    } else print $üzenet . " sikertelen volt!<br><br>";
}


?>
