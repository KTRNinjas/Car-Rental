<?php
$path = dirname(__DIR__, 1);
$hostname = getenv('HTTP_HOST');
$replacedPath = str_ireplace("\\", "/", $path);
$izé = "//Car-Rental";
$url = str_ireplace($_SERVER['DOCUMENT_ROOT'], "", $replacedPath);
include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "AutoTipusFelvevoController.php");
initAutotipusController();
createAutotipusController();
updateAutotipusController();
deleteAutotipusController();

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php print '"' . (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $hostname . $url . '/View/css/autotipusfelvevo.css"' ?>>
    <title>Autotipus felvétel</title>
</head>

<body>
    <?php
    printAutotipusInDB()
    ?>
    <form action="" method="POST">
        <label name="marka" for="">
            <input type="text" name="marka" required placeholder="Márka">
        </label>
        <label name="tipus" for="">
            <input type="text" name="tipus" required placeholder="Tipus">
        </label>
        <select name="fajta" id="" required>
            <option value="">Válaszon fajtát</option>
            <?php
            getFajta();
            ?>
        </select>
        <select name="kategoria" required id="">
            <option value="">Válaszon kategoriát</option>
            <?php
            getKategoria();
            ?>
        </select>
        
        <input type="checkbox" name="premium" id="premium" value="off">
        <select name="kornyezetvedelem" required id="">
            <option value="">Válaszon környezetvédelmi besorolást</option>
            <?php
            getKornyezetVedelem();
            ?>
        </select>
        <button type="submit" name="Autotipusbekuldes">Beküldés</button>
    </form>
</body>

</html>