<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "car_controller.php");
updateCarController();
insertCarController();
initCarController();
deleteCarController();
$hostname = getenv('HTTP_HOST');
$replacedPath = str_ireplace("\\", "/", $path);
$izé = "//Car-Rental";
$url = str_ireplace($_SERVER['DOCUMENT_ROOT'], "", $replacedPath);
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Az autófelvevő honlapja</title>
    <link rel="stylesheet" href=<?php print '"' . (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $hostname . $url . '/View/css/autofelvevo.css"' ?>>
</head>

<body>
    <?php
    kepFeltoltesController();
    printCarsInDB();

    ?>
    <button><b>+</b>Új autó felvétele</button>

    <form id="insertForm" action="" method="post">
        <?php

        ?>
        <input class="smallerInput" type="text" name="rendszam" placeholder="Rendszám" size="4" required>
        <input class="smallerInput" type="text" name="alvazszam" placeholder="Alvázszám" size="8" required>
        <select class="smallerInput" name="autotipus" id="" onchange="if(this.value=='autotipusfelvevo'){location=this.value}" required>
            <option value="">Válasszon autótípust</option>
            <?php getAllAutoTipusController(); ?>
            <option value="autotipusfelvevo">Új autótípus felvétele</option>'
        </select>
        <select class="smallerInput" name="hajtaslanc" id="" required>
            <option value="">Válasszon hajtáslánctípust</option>
            <?php getAllHajtaslancController(); ?>
        </select>
        <select class="smallerInput" name="valtotipus" id="" required>
            <option value="">Válasszon váltótípust</option>
            <?php getAllValtotipusController(); ?>
        </select>
        <input class="smallerInput" type="number" name="evjarat" size="4" id="" placeholder="Évjárat" required>
        <input class="smallerInput" type="number" name="teljesitmeny" size="8" id="" placeholder="Teljesítmény" required>
        <input class="smallerInput" type="number" name="biztositas" size="9" id="" placeholder="Biztosítási díj" required>
        <input class="smallerInput" type="number" name="kilometer" size="14" id="" placeholder="Kilométeróra állása" required>
        <input class="smallerInput" type="test" name="forgalmi" id="" placeholder="Forgalmi megújításának ideje" onfocus="(this.type='date')" required>
        <input class="smallerInput" type="submit" name="insertCar" value="Új autó felvétele">
    </form>
</body>

</html>