<?php
require("Connection/Dbconn.php");
include_once("ArFeltolto.php");
include_once("registration_data.php");
include_once("AutotipusSQL.php");
include_once("car_data.php");
include_once("contract_data.php");
include_once("role_data.php");
include_once("car_image_data.php");

function InitDb($kapcsolat)
{

    $üzenet = "adatbazis törlése";
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
    fillAutotipus($kapcsolat);
    fillArak($kapcsolat);

    Contract_create($kapcsolat);
    Contract_car_table_beszuro($kapcsolat);
    insertRoles($kapcsolat);
}
function TablaFelvetele($kapcsolat)
{
    CreateArtabla($kapcsolat);
    MainAutotipusTablaCreate($kapcsolat);
    SidetablaCreator($kapcsolat);
    create_contact($kapcsolat);
    create_account($kapcsolat);
    create_user_account_join($kapcsolat);
    create_cars($kapcsolat);
    create_valtotipus($kapcsolat);
    create_hajtaslanc($kapcsolat);
    createRoleTable($kapcsolat);
    createCarImageTable($kapcsolat);
    Create_Contract_car_join_table($kapcsolat);
    create_contract_table($kapcsolat);
}
function Query($kapcsolat, $üzenet, $sql)
{
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print '<p style="color:green;">' . $üzenet . ' sikeres volt!</p><br>';
        return $üzenet . "Sikeres volt!";
    } else {
        print '<p style="color:red;">' . $üzenet . " sikertelen volt!</p><br>";
        return $üzenet . "Sikertelen volt!";
    }
}
function Tablamegvaltoztatas($kapcsolat)
{
    Arcascadolas($kapcsolat);
    AutotipusTablamegvaltoztatasa($kapcsolat);
    CarsTablamegvaltoztatasa($kapcsolat);
    hajtaslancCascad($kapcsolat);
    valtotipusCascad($kapcsolat);
    alterRoleTable($kapcsolat);
    alterCarImageTable($kapcsolat);
}
