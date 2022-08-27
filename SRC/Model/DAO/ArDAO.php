<?php
    $path=dirname(__DIR__,2);
    include_once($path.DIRECTORY_SEPARATOR.'Connection'.DIRECTORY_SEPARATOR.'Dbconn.php');
    function GetautotipusDAO(){
      $kapcsolat=$GLOBALS["kapcsolat"];  
      $sql="SELECT `ID`,`Márka`,`Tipus`,
      (SELECT ID FROM `autokolcsonzo`.`Ar` WHERE `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`Ar`.`AutoTipusID` ) AS `ArID`,
      (SELECT Ár FROM `autokolcsonzo`.`Ar` WHERE `autokolcsonzo`.`autotipus`.`ID`= `autokolcsonzo`.`Ar`.`AutoTipusID` ) AS `Ar`,
      
      
      (SELECT Fajta_neve FROM `autokolcsonzo`.`fajta` WHERE `ID`=`Fajta_ID`) AS `Fajta` FROM `autokolcsonzo`.`autotipus`; ";
      $autoTipusokTomb=[];
      $autoTipusokKulsoTomb=[];
      $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_assoc($result)) {
        $autoTipusokTomb["ID"]= $egysor["ID"];
        $autoTipusokTomb["Márka"]=$egysor["Márka"];
        $autoTipusokTomb["Tipus"]=$egysor["Tipus"];
        $autoTipusokTomb["Fajta"]=$egysor["Fajta"];
        $autoTipusokTomb["Ar"]=$egysor["Ar"];
        $autoTipusokTomb["ArID"]=$egysor["ArID"];
        array_push($autoTipusokKulsoTomb,$autoTipusokTomb);
    }
    return $autoTipusokKulsoTomb;
    }
    function insertArDAO($autoTipusID,$Ar){
        $sql="INSERT INTO `autokolcsonzo`.`Ar` (`ID`, `Ár`, `AutoTipusID`) VALUES (NULL, '$Ar', '$autoTipusID')";
        $kapcsolat=$GLOBALS["kapcsolat"];
        $ok=mysqli_query($kapcsolat,$sql);
    }
    function updateArDAO($autoTipusID,$Ar,$ArID){
        $sql="UPDATE `autokolcsonzo`.`Ar` SET `Ár` = '$Ar', `AutoTipusID` = '$autoTipusID' WHERE `Ar`.`ID` = $ArID ";
        $kapcsolat=$GLOBALS["kapcsolat"];
        $ok=mysqli_query($kapcsolat,$sql);
    }
    