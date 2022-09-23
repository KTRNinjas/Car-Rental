<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "AutoTipusService.php");
//nincs m;g meg a file
function initCarController()
{
    $GLOBALS['autotipus'] = getallAutotipusService();
}
function makeHeader()
{
    print '<div class="grid-item"></div>';
    print '<div class="grid-item"><small>Márka</small></div>';
    print '<div class="grid-item"><small>Tipus</small></div>';
    print '<div class="grid-item"><small>Fajta_ID</small></div>';
    print '<div class="grid-item"><small>Kategoria_ID</small></div>';
    print '<div class="grid-item"><small>Prémium</small></div>';
    print '<div class="grid-item"><small>Környezetvédelmi_ID</small></div>';
}



function printAutotipusInDB(){
    $hyphen = "'";
    $autotipus = $GLOBALS['autotipus'];
    for ($i = 0; $i < count($autotipus); $i++) {
        print '<form action="" method="post" enctype="multipart/form-data">';
        print '<div class="grid-container">';
        if ($i == 0) {
            makeHeader();
        }
        // $uri = $GLOBALS['seenurl'] . '/Fileok/Kepek/Autok/' . getPicturesOfAautotipuservice($autotipus[$i]['id'])[0];

        print '<input type="text" id=carID' . $autotipus[$i]['id'] . ' name="carID" size="0" value="' . $autotipus[$i]['id'] . '" hidden>';

        print '<style>
        #carImageStyle' . $autotipus[$i]['id'] . '{
            background-image: url("' . $uri . '");
            background-repeat: no-repeat;
            background-size: contain;
        }
        </style>';
        print '<div class="grid-item multirow-image" id="carImageStyle' . $autotipus[$i]['id'] . '"';
        print '<span></span>';
        print '</div>';
        print '<div class="grid-item">';
        print '<input class="smallerInput" type="text" name="rendszam" size="5" value="' . $autotipus[$i]['Rendszám'] . '" required>
      </div>';
        print '<div class="grid-item"><input class="smallerInput" type="text" name="alvazszam" size="9" value="' . $autotipus[$i]['Alvázszám'] . '" required></div>';

        print '<div class="grid-item"><select class="smallerInput" name="autotipus" id="" onchange="if(this.value==' . $hyphen . 'autotipusfelvevo' . $hyphen . '){location=this.value}" required>
      <option value="">Válasszon autótípust</option>';
        getAllAutoTipusController($autotipus[$i]['marka']);
        print '<option value="autotipusfelvevo">Új autótípus felvétele</option>';
        print '</select></div>';

        print '<div class="grid-item"><select class="smallerInput" name="hajtaslanc" id="" required>
      <option value="">Válasszon hajtásláncot</option>';
        getAllHajtaslancController($autotipus[$i]["hajtaslanc"]);
        print '</select></div>';

        print '<div class="grid-item"><select class="smallerInput" name="valtotipus" id="" required>
      <option value="">Válasszon váltótípust</option>';
        getAllValtotipusController($autotipus[$i]["valtotipus"]);
        print '</select></div>';

        print '<div class="grid-item"><input class="smallerInput" type="number" name="evjarat" id="" value="' . $autotipus[$i]['Evjarat'] . '" size="4" required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="number" name="teljesitmeny" id="" value="' . $autotipus[$i]['Teljesitmeny'] . '" size=4 required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="number" name="biztositas" id="" value="' . $autotipus[$i]['Biztositasi_dij'] . '" size=7 required></div>';

        print '<div class="grid-item"> <input class="smallerInput" type="number" name="kilometer" id="" value="' . $autotipus[$i]['km'] . '" size="6" required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="date" name="forgalmi" id="" size="6" value="' . $autotipus[$i]['Forgalmi_megujitasanak_ideje'] . '" required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="date" name="kivezetve" id="" value="' . $autotipus[$i]['Kivezetve'] . '"></div>';


        print '<div class="grid-item"><input type="submit" name="updateCar" value="Mentés"></div>';

        print '<div class="grid-item"><input type="submit" name="deleteCar" value="Törlés"></div>';
        print '<div class="grid-item">';
        print ' <input type="file" accept=".png, .jpg, .jpeg" name="autoPictureToUpload[]" id="autoPictureToUpload' . $autotipus[$i]['id'] . '" onchange="document.getElementById(' . $hyphen . 'autoPictureUpload' . $autotipus[$i]['id'] . $hyphen . ').click();" multiple="multiple" size="0" hidden>';
        print '<input type="button" value="Képfeltöltés" onclick="
        document.getElementById(carID' . $autotipus[$i]['id'] . ');
        document.getElementById(' . $hyphen . 'autoPictureToUpload' . $autotipus[$i]['id'] . $hyphen . ').click();" />';
        print '<input type=submit name="autoPictureUpload" id="autoPictureUpload' . $autotipus[$i]['id'] . '" hidden>';

        print '</div>';
        if (isset($GLOBALS['imageErrors'][$autotipus[$i]['id']])) {
            print '<div class="multicolumn-error-message">';
            print $GLOBALS['imageErrors'][$autotipus[$i]['id']];
            print '</div>';
        }
        print '</div>';
        print '</form>';
    }

}