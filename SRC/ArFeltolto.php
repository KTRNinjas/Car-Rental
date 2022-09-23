<?php
function fillAutotipus($kapcsolat)
{
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'BMW', 'M3', '1', '1', '1', '6')";
    Query($kapcsolat, "BMW M3 betöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'Nissan', 'Mikra', '1', '1', '1', '6')";
    Query($kapcsolat, "Nissan Nissan betöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'Dacia', 'Logan', '1', '1', '1', '6')";
    Query($kapcsolat, "Dacia Logan betöltése ", $sql);
}
function fillArak($kapcsolat)
{
    $sql = "INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '5000', '1');";
    Query($kapcsolat, "Audi S8 árbetöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '6000', '2');";
    Query($kapcsolat, "Volksvagen Passat árbetöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '7000', '3');";
    Query($kapcsolat, "Jeep Wrangler árbetöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '8000', '4');";
    Query($kapcsolat, "BMW M3 árbetöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '9000', '5');";
    Query($kapcsolat, "Nissan Mikra árbetöltése ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '10000', '6');";
    Query($kapcsolat, "Dacia Logan árbetöltése ", $sql);
}
function CreateArtabla($kapcsolat)
{
    $sql = "CREATE TABLE `autokolcsonzo`.`Ar` (`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Ár` INT(50) UNSIGNED NOT NULL , `AutoTipusID` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    Query($kapcsolat, "Árlista tábla létrehozása", $sql);
}
function Arcascadolas($kapcsolat)
{
    $sql = "ALTER TABLE `autokolcsonzo`.`Ar` ADD  CONSTRAINT `ar_autotipus`  FOREIGN KEY (`AutoTipusID`) REFERENCES `autotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    Query($kapcsolat, "Az artabla cascadolás ", $sql);
}
