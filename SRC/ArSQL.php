<?php 
require_once("Connection/Dbconn.php");
function CreatAutoArTable($kapcsolat){
     $sql="CREATE TABLE `autokolcsonzo`.`autoar` (`ID` INT(10) NOT NULL AUTO_INCREMENT , `MarkaTipus` VARCHAR(50) NOT NULL , `Ar` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
     $üzenet = "Az autotipus tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);  
    print $sql;
}

?>