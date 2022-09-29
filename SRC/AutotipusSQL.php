<?php 
function creatAutotipusTable($kapcsolat){
    creatAutotipusManiTable($kapcsolat);
    creatFajtaTable($kapcsolat);
    creatKategoriaTable($kapcsolat);
    creatKornyezetvedelemTable($kapcsolat);
}

//táblák felosztasa
function creatAutotipusManiTable($kapcsolat){
    $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL ,`Tipus` VARCHAR(50) NOT NULL ,`Fajta_ID` INT UNSIGNED NOT NULL , `Kategoria_ID` INT UNSIGNED NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az autotipus tábla létrehozása";
    Query($kapcsolat, $üzenet, $sql);
}
function creatFajtaTable($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`fajta` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Fajta_neve` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Fajta tábla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
}
function creatKategoriaTable($kapcsolat){
    $sql = "CREATE TABLE `autokolcsonzo`.`kategoria` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Kategoria` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Kategoria tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
}
function creatKornyezetvedelemTable($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`környezetvédelmibesorolás` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `KörnyezetvédelmiBesorolás` VARCHAR(50) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Környezetvédelmi besorolás tábla létrehozása";
    Query($kapcsolat, $üzenet, $sql);

}

function AdatfelvetelAutoFajta($kapcsolat){
    $sql ="INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, 'Combi')";
    $üzenet = "a fajtába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql ="INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, 'Terepjáró')";
    $üzenet = "a fajtába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql ="INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, 'Sedan')";
    $üzenet = "a fajtába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql ="INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, 'PickUp')";
    $üzenet = "a fajtába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql ="INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, 'SUV')";
    $üzenet = "a fajtába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql ="INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, '4X4')";
    $üzenet = "a fajtába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
}
function AdatfelvetelAutoKategoria($kapcsolat){
    $sql="INSERT INTO `autokolcsonzo`.`kategoria` (`ID`, `Kategoria`) VALUES (NULL, 'Kis személy')";
    $üzenet = "a Kategoria táblába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql="INSERT INTO `autokolcsonzo`.`kategoria` (`ID`, `Kategoria`) VALUES (NULL, 'Személy autó')";
    $üzenet = "a Kategoria táblába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql="INSERT INTO `autokolcsonzo`.`kategoria` (`ID`, `Kategoria`) VALUES (NULL, 'Kis teher')";
    $üzenet = "a Kategoria táblába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
    $sql="INSERT INTO `autokolcsonzo`.`kategoria` (`ID`, `Kategoria`) VALUES (NULL, 'Teher')";
    $üzenet = "a Kategoria táblába felvettünk egy elemet";
    Query($kapcsolat, $üzenet, $sql);
 }
 function KornyezetvedelmiBesorolas($kapcsolat){
     $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'E1')";
     $üzenet = "a KornyezetvedelmiBesorolas táblába felvettünk egy elemet";
     Query($kapcsolat, $üzenet, $sql);
     $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'E2')";
     $üzenet = "a KornyezetvedelmiBesorolas táblába felvettünk egy elemet";
     Query($kapcsolat, $üzenet, $sql);
     $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'E3')";
     $üzenet = "a KornyezetvedelmiBesorolas táblába felvettünk egy elemet";
     Query($kapcsolat, $üzenet, $sql);
     $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'E4')";
     $üzenet = "a KornyezetvedelmiBesorolas táblába felvettünk egy elemet";
     Query($kapcsolat, $üzenet, $sql);
     $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'E5')";
     $üzenet = "a KornyezetvedelmiBesorolas táblába felvettünk egy elemet";
     Query($kapcsolat, $üzenet, $sql);
     $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'E6')";
     $üzenet = "a KornyezetvedelmiBesorolas táblába felvettünk egy elemet";
     Query($kapcsolat, $üzenet, $sql);  
 }
function AutotipusTablamegvaltoztatasa($kapcsolat){
    $sql="ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Környezetvédelmi_ID`) REFERENCES `környezetvédelmibesorolás`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet= "Az autotipus tábla környezetvédelemmel kaszádolva ";
    Query($kapcsolat,$üzenet,$sql);
    $sql="ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Kategoria_ID`) REFERENCES `kategoria`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet= "az autotipus tábla Kategóriával kaszkádolva ";
    Query($kapcsolat,$üzenet,$sql);
    $sql="ALTER TABLE `autokolcsonzo`.`autotipus` ADD FOREIGN KEY (`Fajta_ID`) REFERENCES `fajta`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    $üzenet= "az autotipus tábla Fajtával kaszkádolva ";
    Query($kapcsolat,$üzenet,$sql);
}
?>