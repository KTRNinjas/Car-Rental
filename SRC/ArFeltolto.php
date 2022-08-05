<?php
    function fillAutotipus($kapcsolat){
        $sql="INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'BMW', 'M3', '1', '1', '1', '6')";
        Query($kapcsolat,"BMW M3 betöltése ",$sql);
        $sql="INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'Nissan', 'Mikra', '1', '1', '1', '6')";
        Query($kapcsolat,"Nissan Nissan betöltése ",$sql);
        $sql="INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'Dacia', 'Logan', '1', '1', '1', '6')";
        Query($kapcsolat,"Dacsia Logan betöltése ",$sql);
    }
    function CreateArtabla($kapcsolat){
        $sql="CREATE TABLE `autokolcsonzo`.`Ar` (`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Ár` INT(50) UNSIGNED NOT NULL , `AutoTipusID` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
        Query($kapcsolat,"Árlista tábla létrehozása",$sql);
    }
    function Arcascadolas($kapcsolat){
        $sql="ALTER TABLE `autokolcsonzo`.`ar` ADD FOREIGN KEY (`AutoTipusID`) REFERENCES `autotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
        Query($kapcsolat,"Az artabal cascadolás ",$sql);
    }
