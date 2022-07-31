<?php
require("Connection/Dbconn.php");
include_once("AutotipusSQL.php");
InitDb($kapcsolat);
function InitDb($kapcsolat)
{
    $üzenet="adatbazis torlése";
    $sql = "DROP DATABASE autokolcsonzo";
    Query($kapcsolat,$üzenet,$sql);
    $üzenet = "az adatbázis létrehozása ";
    $sql = "CREATE DATABASE autokolcsonzo";
    Query($kapcsolat, $üzenet, $sql);
    TablaFelvetele($kapcsolat);


}

function TablaFelvetele($kapcsolat)
{
    creatAutotipusTable($kapcsolat);
}
function Query($kapcsolat, $üzenet, $sql)
{
    $ok = mysqli_query($kapcsolat, $sql);
    if ($ok) {
        print $üzenet . " sikeres volt!<br><br>";
    } else print $üzenet . " sikertelen volt!<br><br>";
}

?>