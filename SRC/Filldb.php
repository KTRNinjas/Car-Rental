<?php
require("Connection/Dbconn.php");
include_once("ArFeltolto.php");
include_once("registration_data.php");
include_once("AutotipusSQL.php");
InitDb($kapcsolat);
function InitDb($kapcsolat)
{

    $üzenet = "adatbazis torlése";
    $sql = "DROP DATABASE autokolcsonzo";
    Query($kapcsolat, $üzenet, $sql);
    $üzenet = "az adatbázis létrehozása ";
    $sql = "CREATE DATABASE autokolcsonzo";
    Query($kapcsolat, $üzenet, $sql);
    TablaFelvetele($kapcsolat);
    Adatfelvetel($kapcsolat);

    Tablamegvaltoztatas($kapcsolat);

}
function AdatFelvetel($kapcsolat){
    fill_user_data($kapcsolat);
    AdatfelvetelAutoFajta($kapcsolat);
    AdatfelvetelAutoKategoria($kapcsolat);
    KornyezetvedelmiBesorolas($kapcsolat);
    fillAutotipus($kapcsolat);
    
}
function TablaFelvetele($kapcsolat)
{
    CreateArtabla($kapcsolat);
    creatAutotipusTable($kapcsolat);
    create_contact($kapcsolat);
    create_account($kapcsolat);
    create_user_account_join($kapcsolat);

}
function Query($kapcsolat, $üzenet, $sql)
{
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print $üzenet . " sikeres volt!<br><br>";
    } else print $üzenet . " sikertelen volt!<br><br>";
}
function Tablamegvaltoztatas($kapcsolat){
    Arcascadolas($kapcsolat);
    AutotipusTablamegvaltoztatasa($kapcsolat);
}

?>
