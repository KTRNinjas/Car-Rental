<?php
require("Connection/Dbconn.php");
InitDb($kapcsolat);
function InitDb($kapcsolat){
    $üzenet="az adatbázis létrehozása ";
    $sql="CREATE DATABASE Autokolcsonzo";
    Query($kapcsolat,$üzenet,$sql);
}
function TablaFelvetele(){
   $sql=" CREATE TABLE `autokolcsonzo`.`autokolcsonz` (`ID` INT(4) NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL , `Fajta` VARCHAR(50) NOT NULL , `Kategoria` VARCHAR(50) NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi besorolás` VARCHAR(50) NOT NULL , `Ársáv` VARCHAR NOT NULL , PRIMARY KEY (`ID `)) ENGINE = InnoDB";
    $üzenet="Az autokolcsonzo tabla letrehozasa";
   Query($kapcsolat,$üzenet,$sql);

}
function Query($kapcsolat,$üzenet,$sql){
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
    print $üzenet." sikeres volt!<br><br>";
    } else print $üzenet." sikertelen volt!<br><br>";

}

?>