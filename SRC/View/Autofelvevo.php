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

                </td>
            </tr>
        </tbody>
    </table>
    <button><b>+</b>Új autó felvétele</button>
    <form action="" method="post">
        <?php //$evjarat,$teljesitmeny,$biztositasi_dij,$kilometer,$forgalmi,$autotipus_id;
        ?>
        <input type="text" name="rendszam" value="Rendszám" required>
        <input type="text" name="alvazszam" value="Alvázszám" required>
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
    </form>
</body>

</html>