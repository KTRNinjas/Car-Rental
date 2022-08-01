<?php 
require_once("Connection/Dbconn.php");
function creatAutotipusTable($kapcsolat){
    $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL ,`Tipus` VARCHAR(50) NOT NULL ,`Ar` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
    $üzenet = "Az autotipus tabla letrehozasa";
    Query($kapcsolat, $üzenet, $sql);
}

?>