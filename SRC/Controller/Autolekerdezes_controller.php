<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Service' . DIRECTORY_SEPARATOR . 'AutolekerdezesService.php');
function autolekerdezes()
{
    AutolekerdezesBody();
}




function Autolekerdezesfejlec()
{
    print "<th><small>Márka</small></th>";
    print "<th><small>Tipus</small></th>";
    print "<th><small>Fajta</small></th>";
    print "<th><small>Kategoria</small></th>";
    print "<th><small>Prémium díj</small></th>";
    print "<th><small>Hajtaslanc</small></th>";
    print "<th><small>Evjarat</small></th>";
    print "<th><small>Valtotipus</small></th>";
    print "<th><small>Napi Ár</small></th>";
    print "<th><small>ÖsszÁr</small></th>";
}
function AutolekerdezesBody()
{
    if (isset($_POST["Lefoglalas"])) {
        Autolekerdezesfejlec();
        $kezdoDATE = $_POST["kezdoDATE"];
        $vegDATE = $_POST["vegDATE"];
        $GetLekerdezesAutok = GetLekerdezesAutok($kezdoDATE, $vegDATE);
        for ($i = 0; $i < count($GetLekerdezesAutok); $i++) {
            print "<tr>";
            foreach ($GetLekerdezesAutok[$i] as $key => $value) {
                if ($key != "Prémium") {
                    print "<td>" . $value . "</td>";
                } else {
                    if ($value == 1) {
                        print  "<td>Premium</td>";
                    } else {
                        print  "<td>Nem premium </td>";
                    }
                }
            }
            print "</tr>";
        }
    }
}
