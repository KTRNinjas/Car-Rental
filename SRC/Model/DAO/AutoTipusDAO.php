<?php
$path = dirname(__DIR__, 2);
include($path . "/Connection/Dbconn.php");
//AutoTipusTarolo($kapcsolat, "BMW", "Teher", "Benzines", 1, "e5");//elős elem felvétele nem kell a kodba 

function AutoTipusTarolo($Marka, $Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas)
{
    $kapcsolat=$GLOBALS["kapcsolat"];
    $Macskakorom = '"';
    print $Macskakorom;
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, '$Marka', '$Fajta', '$Kategoria', '$Premium', '$KornyezetvedelmiBesorolas')";
    print $sql;
    $üzenet = "az auto ";
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print $üzenet . " sikeres volt!<br><br>";
    } else print $üzenet . " sikertelen volt!<br><br>";
    print $sql;
}
function SQLFeltolto($kapcsolat,$sql,$value){
    $result= mysqli_query($kapcsolat ,$sql);
    print_r($result);
    while($egysor=mysqli_fetch_array($result)){
        $SQLTomb[$egysor["ID"]]=$egysor[$value];  
     }

     return $SQLTomb;

}
function FajtaFeltolto($kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`fajta`" ;
    $Fajta=[];
    $Fajta=SQLFeltolto($kapcsolat,$sql,"Fajta_neve");
    return $Fajta;    
}


function KategoriaFeltolto($kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`kategoria`" ;
    $Kategoria=[];
    $Kategoria=SQLFeltolto($kapcsolat,$sql,"Kategoria");
    return $Kategoria;
    
}

function KornyezetVedelemFeltolto($kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`környezetvédelmibesorolás`" ;
    $Környezetvédelmibesorolás=[];
    $Környezetvédelmibesorolás=SQLFeltolto($kapcsolat,$sql,"KörnyezetvédelmiBesorolás");
    return $Környezetvédelmibesorolás;
}



