<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Service' . DIRECTORY_SEPARATOR . 'ArService.php');

$url="/Foni_oldala";
    $filelocation=$path.DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."Foniindex.php";
    $routes[$url]=$filelocation;

function TakeAutoTipusHeader()
{
    print "<Th>Márka </Th>";
    print "<Th>Tipus </Th>";
    print "<Th>Fajta </Th>";
    print "<Th>AR </Th>";
}
function TakeAutoTipusBody()
{
    $GetAutotipusok = GetAutotipusokService();
    $display = "";
    $hiddenArID="";
    for ($i = 0; $i < count($GetAutotipusok); $i++) {
        print "<tr>";
        foreach ($GetAutotipusok[$i] as $key => $value) {

            if ($key != "ID" && $key != "Ar"&& $key!="ArID") {
                print "<Td>" . $value . "</Td>";
            } else {
                if ($key == "Ar" && $value != null) {
                    $display = $display . 'value="' . $value . '"';
                    $hiddenArID='<input type="number" name="ArID" value="' . $GetAutotipusok[$i]['ArID'] . '" hidden>';
                } else if ($key == "Ar") {
                    $display = $display . 'placeholder="Ár"';
                }
            }
        }
        $autoTipusID = $GetAutotipusok[$i]["ID"];
        $formAr = '<form action="" method="POST">'.$hiddenArID.'
            <input type="number" name="autoTipusID" value="' . $autoTipusID . '" hidden>
            <input type="number" name="Ar" ' . $display . ' required>
            <input type="submit" name="bekuldes" value="Árbeírás">
            </form>';
        $display = "";
        $hiddenArID="";
        print "<Td>" . $formAr . "</Td>";
        print "</tr>";
    }
    if (isset($_POST['bekuldes'])) { //gomb beküldés
        $autoTipusID = $_POST['autoTipusID'];
        $Ar = $_POST['Ar'];
        if(isset($_POST['ArID'])){
            $ArID=$_POST['ArID'];
            
            updateArService($autoTipusID,$Ar,$ArID);
        }else{
        insertArservice($autoTipusID, $Ar);
        }
    }
}
