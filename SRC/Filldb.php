<?php
require("Connection/Dbconn.php");
require_once("FilldbData.php");
InitDb($kapcsolat);
<<<<<<< HEAD
?>
=======
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
    fillAutotipus($kapcsolat);
    insertRoles($kapcsolat);
}
function TablaFelvetele($kapcsolat)
{
    CreateArtabla($kapcsolat);
    creatAutotipusTable($kapcsolat);
    create_contact($kapcsolat);
    create_account($kapcsolat);
    create_user_account_join($kapcsolat);
    create_cars($kapcsolat);
    create_valtotipus($kapcsolat);
    create_hajtaslanc($kapcsolat);
    createRoleTable($kapcsolat);
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
}
>>>>>>> 6ceea11 (kesz a kaskadolas)
