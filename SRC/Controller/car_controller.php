<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "car_service.php");
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "ImageService.php");
$cars = [];
$path = dirname(__DIR__, 1);
$url = "/Autofelvetel";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "Autofelvevo.php";
$routes[$url] = $fileLocation;
$hostname = getenv('HTTP_HOST');
$replacedPath = str_ireplace("\\", "/", $path);
$izé = "//Car-Rental";
$seenurl = str_ireplace($_SERVER['DOCUMENT_ROOT'], "", $replacedPath);
function initCarController()
{
    $GLOBALS['cars'] = getAllCarsService();
}
function makeHeader()
{
    print '<div class="grid-item"></div>';
    print '<div class="grid-item"><small>Rendszám</small></div>';
    print '<div class="grid-item"><small>Alvázszám</small></div>';
    print '<div class="grid-item"><small>Autótípus</small></div>';
    print '<div class="grid-item"><small>Hajtáslánc</small></div>';
    print '<div class="grid-item"><small>Váltótípus</small></div>';
    print '<div class="grid-item"><small>Évjárat</small></div>';
    print '<div class="grid-item"><small>Teljesítmény</small></div>';
    print '<div class="grid-item"><small>Biztosítási díj</small></div>';
    print '<div class="grid-item"><small>Kilométeróra állása</small></div>';
    print '<div class="grid-item"><small>Forgalmi megújításának ideje</small></div>';
    print '<div class="grid-item"><small>Kivezetve</small></div>';
}

function printCarsInDB()
{
    $hyphen = "'";
    $cars = $GLOBALS['cars'];
    for ($i = 0; $i < count($cars); $i++) {
        print '<form action="" method="post" enctype="multipart/form-data">';
        print '<div class="grid-container">';
        if ($i == 0) {
            makeHeader();
        }
        $uri = $GLOBALS['seenurl'] . '/Fileok/Kepek/Autok/' . getPicturesOfACarService($cars[$i]['id'])[0];

        print '<input type="text" id=carID' . $cars[$i]['id'] . ' name="carID" size="0" value="' . $cars[$i]['id'] . '" hidden>';

        print '<style>
        #carImageStyle' . $cars[$i]['id'] . '{
            background-image: url("' . $uri . '");
            background-repeat: no-repeat;
            background-size: contain;
        }
        </style>';
        print '<div class="grid-item multirow-image" id="carImageStyle' . $cars[$i]['id'] . '"';
        print '<span></span>';
        print '</div>';
        print '<div class="grid-item">';
        print '<input class="smallerInput" type="text" name="rendszam" size="5" value="' . $cars[$i]['Rendszám'] . '" required>
      </div>';
        print '<div class="grid-item"><input class="smallerInput" type="text" name="alvazszam" size="9" value="' . $cars[$i]['Alvázszám'] . '" required></div>';

        print '<div class="grid-item"><select class="smallerInput" name="autotipus" id="" onchange="if(this.value==' . $hyphen . 'autotipusfelvevo' . $hyphen . '){location=this.value}" required>
      <option value="">Válasszon autótípust</option>';
        getAllAutoTipusController($cars[$i]['marka']);
        print '<option value="autotipusfelvevo">Új autótípus felvétele</option>';
        print '</select></div>';

        print '<div class="grid-item"><select class="smallerInput" name="hajtaslanc" id="" required>
      <option value="">Válasszon hajtásláncot</option>';
        getAllHajtaslancController($cars[$i]["hajtaslanc"]);
        print '</select></div>';

        print '<div class="grid-item"><select class="smallerInput" name="valtotipus" id="" required>
      <option value="">Válasszon váltótípust</option>';
        getAllValtotipusController($cars[$i]["valtotipus"]);
        print '</select></div>';

        print '<div class="grid-item"><input class="smallerInput" type="number" name="evjarat" id="" value="' . $cars[$i]['Evjarat'] . '" size="4" required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="number" name="teljesitmeny" id="" value="' . $cars[$i]['Teljesitmeny'] . '" size=4 required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="number" name="biztositas" id="" value="' . $cars[$i]['Biztositasi_dij'] . '" size=7 required></div>';

        print '<div class="grid-item"> <input class="smallerInput" type="number" name="kilometer" id="" value="' . $cars[$i]['km'] . '" size="6" required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="date" name="forgalmi" id="" size="6" value="' . $cars[$i]['Forgalmi_megujitasanak_ideje'] . '" required></div>';

        print '<div class="grid-item"><input class="smallerInput" type="date" name="kivezetve" id="" value="' . $cars[$i]['Kivezetve'] . '"></div>';


        print '<div class="grid-item"><input type="submit" name="updateCar" value="Mentés"></div>';

        print '<div class="grid-item"><input type="submit" name="deleteCar" value="Törlés"></div>';
        print '<div class="grid-item">';
        print ' <input type="file" accept=".png, .jpg, .jpeg" name="autoPictureToUpload[]" id="autoPictureToUpload' . $cars[$i]['id'] . '" onchange="document.getElementById(' . $hyphen . 'autoPictureUpload' . $cars[$i]['id'] . $hyphen . ').click();" multiple="multiple" size="0" hidden>';
        print '<input type="button" value="Képfeltöltés" onclick="
        document.getElementById(carID' . $cars[$i]['id'] . ');
        document.getElementById(' . $hyphen . 'autoPictureToUpload' . $cars[$i]['id'] . $hyphen . ').click();" />';
        print '<input type=submit name="autoPictureUpload" id="autoPictureUpload' . $cars[$i]['id'] . '" hidden>';

        print '</div>';
        if (isset($GLOBALS['imageErrors'][$cars[$i]['id']])) {
            print '<div class="multicolumn-error-message">';
            print $GLOBALS['imageErrors'][$cars[$i]['id']];
            print '</div>';
        }
        print '</div>';
        print '</form>';
    }
}
function updateCarController()
{
    if (isset($_POST['updateCar'])) {
        $rendszam = $_POST['rendszam'];
        $alvazszam = $_POST['alvazszam'];
        $autotipus_id = $_POST['autotipus'];
        $hajtaslanc_id = $_POST['hajtaslanc'];
        $valtotipus_id = $_POST['valtotipus'];
        $evjarat = $_POST['evjarat'];
        $teljesitmeny = $_POST['teljesitmeny'];
        $biztositas = $_POST['biztositas'];
        $kilometer = $_POST['kilometer'];
        $forgalmi = $_POST['forgalmi'];
        $kivezetve = $_POST['kivezetve'];
        $carID = $_POST['carID'];
        updateCarService($rendszam, $alvazszam, $autotipus_id, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositas, $kilometer, $forgalmi, $kivezetve, $carID);
        header('Location: /Autofelvetel', true, 303);
    }
}
function getAllHajtaslancController($hajtaslancInput = null)
{
    $hajtaslanc = getAllHajtaslancService();
    foreach ($hajtaslanc as $key => $value) {
        if ($value != $hajtaslancInput) {
            print '<option value="' . $key . '">' . $value . '</option>';
        } else {
            print '<option value="' . $key . '" selected>' . $value . '</option>';
        }
    }
}
function getAllValtotipusController($valtotipusInput = null)
{
    $valtotipus = getAllValtotipusService();
    foreach ($valtotipus as $key => $value) {
        if ($value != $valtotipusInput) {
            print '<option value="' . $key . '">' . $value . '</option>';
        } else {
            print '<option value="' . $key . '" selected>' . $value . '</option>';
        }
    }
}
function getAllAutoTipusController($marka = null)
{
    $autotipus = getAllAutoTipusService();
    foreach ($autotipus as $key => $value) {
        if ($value != $marka) {
            print '<option value="' . $key . '">' . $value . '</option>';
        } else {
            print '<option value="' . $key . '" selected>' . $value . '</option>';
        }
    }
}
function insertCarController()
{
    if (isset($_POST['insertCar'])) {
        $rendszam = $_POST['rendszam'];
        $alvazszam = $_POST['alvazszam'];
        $hajtaslanc_id = $_POST['hajtaslanc'];
        $valtotipus_id = $_POST['valtotipus'];
        $evjarat = $_POST['evjarat'];
        $teljesitmeny = $_POST['teljesitmeny'];
        $biztositasi_dij = $_POST['biztositas'];
        $kilometer = $_POST['kilometer'];
        $forgalmi = $_POST['forgalmi'];
        $autotipus_id = $_POST['autotipus'];
        insertCarService($rendszam, $alvazszam, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositasi_dij, $kilometer, $forgalmi, $autotipus_id);
        header('Location: /Autofelvetel', true, 303);
        exit;
    }
}
function deleteCarController()
{
    if (isset($_POST['deleteCar'])) {
        $carID = $_POST['carID'];
        deleteAllImagesOfACarService($carID);
        var_dump($GLOBALS['imageErrors']);
        if (!isset($GLOBALS['imageErrors'][$carID])) {
            deleteCarService($carID);
            header('Location: /Autofelvetel', true, 303);
            exit;
        }
    }
}
function kepFeltoltesController()
{
    if (isset($_POST["autoPictureUpload"])) {
        $carID = $_POST['carID'];
        kepFeltoltesService($carID);
        if (count($GLOBALS['imageErrors']) == 0) {
            header('Location: /Autofelvetel', true, 303);
            exit;
        }
    }
}
