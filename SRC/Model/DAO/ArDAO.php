<?php
    $path=dirname(__DIR__,2);
    include_once($path.DIRECTORY_SEPARATOR.'Connection'.DIRECTORY_SEPARATOR.'Dbconn.php');
    function GetautotipusDAO(){
      $kapcsolat=$GLOBALS["kapcsolat"];  
      $sql="SELECT `ID`,`Márka`,`Tipus`,(SELECT Fajta_neve FROM `autokolcsonzo`.`fajta` WHERE `ID`=`Fajta_ID`) AS `Fajta` FROM `autokolcsonzo`.`autotipus`";
      $autoTipusokTomb=[];
      $autoTipusokKulsoTomb=[];
      $result = mysqli_query($kapcsolat, $sql);
    while ($egysor = mysqli_fetch_assoc($result)) {
        $autoTipusokTomb["ID"]= $egysor["ID"];
        $autoTipusokTomb["Márka"]=$egysor["Márka"];
        $autoTipusokTomb["Tipus"]=$egysor["Tipus"];
        $autoTipusokTomb["Fajta"]=$egysor["Fajta"];
        array_push($autoTipusokKulsoTomb,$autoTipusokTomb);
    }
    return $autoTipusokKulsoTomb;
    }
    function insertArDAO($autoTipusID,$Ar){
      
    }

?>