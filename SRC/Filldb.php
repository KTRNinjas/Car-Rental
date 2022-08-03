<?php
require("Connection/Dbconn.php");
include_once("registration_data.php");
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
}
function AdatFelvetel($kapcsolat)
{
    fill_user_data($kapcsolat);
    AdatfelvetelAutoFajta($kapcsolat);
    AdatfelvetelAutoKategoria($kapcsolat);
    KornyezetvedelmiBesorolas($kapcsolat);
}
function TablaFelvetele($kapcsolat)
{
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
