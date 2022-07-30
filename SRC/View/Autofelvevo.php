<?php
$path=dirname(__DIR__,1);
include_once($path.DIRECTORY_SEPARATOR."Controller".DIRECTORY_SEPARATOR."car_controller.php");
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
        <?php makeHeader()?>
        </thead>
        <tbody>
        <?php printCarsInDB() ?>
            <tr>
                <td>Új autó felvétele:</td>
            </tr>
        </tbody>
    </table>
</body>
</html>