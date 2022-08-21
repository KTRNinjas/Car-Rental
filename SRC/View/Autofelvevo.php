<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "car_controller.php");
updateCarController();
insertCarController();
initCarController();
deleteCarController();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Az autófelvevő honlapja</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(12, 0fr);
            align-content: center;
            grid-gap: 5px;
        }

        .grid-item {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    printCarsInDB();
    ?>
    <button><b>+</b>Új autó felvétele</button>

    <form id="insertForm" action="" method="post">
        <?php

        ?>
        <input type="text" name="rendszam" placeholder="Rendszám" size="4" required>
        <input type="text" name="alvazszam" placeholder="Alvázszám" size="8" required>
        <select name="autotipus" id="" onchange="if(this.value=='autotipusfelvevo'){location=this.value}" required>
            <option value="">Válasszon autótípust</option>
            <?php getAllAutoTipusController(); ?>
            <option value="autotipusfelvevo">Új autótípus felvétele</option>'
        </select>
        <select name="hajtaslanc" id="" required>
            <option value="">Válasszon hajtáslánctípust</option>
            <?php getAllHajtaslancController(); ?>
        </select>
        <select name="valtotipus" id="" required>
            <option value="">Válasszon váltótípust</option>
            <?php getAllValtotipusController(); ?>
        </select>
        <input type="number" name="evjarat" size="4" id="" placeholder="Évjárat" required>
        <input type="number" name="teljesitmeny" size="8" id="" placeholder="Teljesítmény" required>
        <input type="number" name="biztositas" size="9" id="" placeholder="Biztosítási díj" required>
        <input type="number" name="kilometer" size="14" id="" placeholder="Kilométeróra állása" required>
        <input type="test" name="forgalmi" id="" placeholder="Forgalmi megújításának ideje" onfocus="(this.type='date')" required>
        <input type="submit" name="insertCar" value="Új autó felvétele">
    </form>
</body>

</html>