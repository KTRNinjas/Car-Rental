<?php
require("Connection/Dbconn.php");
include_once("registration_data.php");
include_once("AutotipusSQL.php");
include_once("car_data.php");
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
function AdatFelvetel($kapcsolat)
{
    fill_user_data($kapcsolat);
    AdatfelvetelAutoFajta($kapcsolat);
    AdatfelvetelAutoKategoria($kapcsolat);
    KornyezetvedelmiBesorolas($kapcsolat);
    fill_valtotipus($kapcsolat);
    fill_hajtaslanc($kapcsolat);
    fill_testcars($kapcsolat);
    fill_testAutoTipus($kapcsolat);
}
function TablaFelvetele($kapcsolat)
{
    creatAutotipusTable($kapcsolat);
    create_contact($kapcsolat);
    create_account($kapcsolat);
    create_user_account_join($kapcsolat);
    create_cars($kapcsolat);
    create_valtotipus($kapcsolat);
    create_hajtaslanc($kapcsolat);
}
function Query($kapcsolat, $üzenet, $sql)
{
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print '<p style="color:green;">'.$üzenet . ' sikeres volt!</p><br>';
    } else print '<p style="color:red;">'.$üzenet . " sikertelen volt!</p><br>";

}
function Tablamegvaltoztatas($kapcsolat){
    AutotipusTablamegvaltoztatasa($kapcsolat);
    CarsTablamegvaltoztatasa($kapcsolat);
}
