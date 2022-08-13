<?php
function creatSzerzodesTabal($kapcsolat){
    $sql = "CREATE TABLE `autokolcsonzo`.`szerzodes` (`ID` INT NOT NULL AUTO_INCREMENT , `Szerzodes_szama` INT NOT NULL , `Szerzodes_kezdete` DATE NOT NULL , `Szerzodes_lejarta` DATE NOT NULL , `Szerzodo_neve` INT NOT NULL ,  PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az Szerzodes tábla létrehozása";
    Query($kapcsolat, $üzenet, $sql);
}
    function szerzodescascadolas($kapcsolat){
        $sql="ALTER TABLE `autokolcsonzo`.`szerzodes` ADD FOREIGN KEY (`Szerzodes_szama`) REFERENCES `szerzodes`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
        Query($kapcsolat,"Az artabla cascadolás ",$sql);
    }
    // function Arcascadolas($kapcsolat){
    //     $sql="ALTER TABLE `autokolcsonzo`.`Ar` ADD FOREIGN KEY (`AutoTipusID`) REFERENCES `autotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
    //     Query($kapcsolat,"Az artabla cascadolás ",$sql);
    // }
