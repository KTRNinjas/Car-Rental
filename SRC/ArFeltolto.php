<?php
    function fillAutotipus($kapcsolat){
        $sql="INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'BMW', 'M3', '1', '1', '1', '6')";
        Query($kapcsolat,"BMW M3 betöltése ",$sql);
        $sql="INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'Nissan', 'Mikra', '1', '1', '1', '6')";
        Query($kapcsolat,"Nissan Nissan betöltése ",$sql);
        $sql="INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'Dacia', 'Logan', '1', '1', '1', '6')";
        Query($kapcsolat,"Dacsia Logan betöltése ",$sql);
    }


?>