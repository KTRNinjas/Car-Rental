<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Service' . DIRECTORY_SEPARATOR . 'AutolekerdezesService.php');
function autolekerdezes()
{
    Autolekerdezesfejlec();
    AutolekerdezesBody();
}




function Autolekerdezesfejlec()
{
    print "<th><small>Rendszám</small></th>";
    print "<th><small>Alvázszám</small></th>";
    print "<th><small>Autótípus</small></th>";
    print "<th><small>Teljesítmény</small></th>";
    print "<th><small>Biztosítási díj</small></th>";
}
function AutolekerdezesBody()
{
    $GetLekerdezesAutok = GetLekerdezesAutok();
    $i = 0;

    for ($i = 0; $i < count($GetLekerdezesAutok); $i++) {
        print "<tr>";
        foreach ($GetLekerdezesAutok[$i] as $key => $value) {
            print "<td>" . $value . "</td>";
        }
        print "</tr>";
    }
}
