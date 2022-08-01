<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "car_controller.php");
initCarController();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Az autófelvevő honlapja</title>
</head>

<body>
    <table class="autok">
        <thead>
            <?php makeHeader() ?>
        </thead>
        <tbody>
            <?php printCarsInDB() ?>
            <tr>
                <td>
                <?php ?>
                </td>
            </tr>
        </tbody>
    </table>
    <button><b>+</b>Új autó felvétele</button>
    <form action="" method="post">
        <?php 
        insertCarController();
        ?>
        <input type="text" name="rendszam" placeholder="Rendszám" required>
        <input type="text" name="alvazszam" placeholder="Alvázszám" required>
        <select name="autotipus" id="" required>
            <option value="">Válasszon autótípust</option>
            <?php getAllAutoTipusController(); ?>
        </select>
        <select name="hajtaslanc" id="" required>
            <option value="">Válasszon hajtáslánctípust</option>
            <?php getAllHajtaslancController(); ?>
        </select>
        <select name="valtotipus" id="" required>
            <option value="">Válasszon váltótípust</option>
            <?php getAllValtotipusController(); ?>
        </select>
        <input type="number" name="evjarat" id="" placeholder="Évjárat" required>
        <input type="number" name="teljesitmeny" id="" placeholder="Teljesítmény" required>
        <input type="number" name="biztositas" id="" placeholder="Biztosítási díj" required>
        <input type="number" name="kilometer" id="" placeholder="Kilométeróra állása" required>
        <input type="text" name="forgalmi" id="" placeholder="Forgalmi megújításának ideje" onfocus="(this.type='date')" required>
        <input type="submit" name="insertCar" value="Új autó felvétele">
    </form>
</body>

</html>