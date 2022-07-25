<?php
$path = dirname(__DIR__, 2);
include($path . "/Connection/Dbconn.php");
//AutoTipusTarolo($kapcsolat, "BMW", "Teher", "Benzines", 1, "e5");//elős elem felvétele nem kell a kodba 

function AutoTipusTarolo($kapcsolat, $Marka, $Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas)
{
    $Macskakorom = '"';
    print $Macskakorom;
    $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'BMW', '1', '1', '1', '2')";
    $üzenet = "az auto ";
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print $üzenet . " sikeres volt!<br><br>";
    } else print $üzenet . " sikertelen volt!<br><br>";
    print $sql;
}

function FajtaFeltolto($kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`fajta`" ;
    $result= mysqli_query($kapcsolat ,$sql);
    $Fajta=[];

    print_r($result);
    while($egysor=mysqli_fetch_array($result)){
        $Fajta[$egysor["ID"]]=$egysor["Fajta_neve"];  
     }

     return $Fajta;
}


function KategoriaFeltolto($kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`kategoria`" ;
    $result= mysqli_query($kapcsolat ,$sql);
    $Kategoria=[];

    print_r($result);
    while($egysor=mysqli_fetch_array($result)){
        $Kategoria[$egysor["ID"]]=$egysor["Kategoria"];  
     }

     return $Kategoria;
}

function KornyezetVedelemFeltolto($kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`környezetvédelmibesorolás`" ;
    $result= mysqli_query($kapcsolat ,$sql);
    $kornyezetvedelemiBesorolas=[];

    print_r($result);
    while($egysor=mysqli_fetch_array($result)){
        $kornyezetvedelemiBesorolas[$egysor["ID"]]=$egysor["KörnyezetvédelmiBesorolás"];  
     }

     return $kornyezetvedelemiBesorolas;
}


