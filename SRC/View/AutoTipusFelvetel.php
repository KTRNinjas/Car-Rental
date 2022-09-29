<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autotipus felvétel</title>
    <?php
    $path = dirname(__DIR__, 1);
    include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "AutoTipusFelvevoController.php");
    updateAutotipusController();
    initCarController();
    printAutotipusInDB();
    deleteAutotipusController();
?>
</head>

<body>
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
        <label for="">
            <input name="premium" type="checkbox" value="off">
            Prémium
            </input>
        </label>
        <select name="kornyezetvedelem" required id="">
            <option value="">Válaszon környezetvédelmi besorolást</option>
            <?php
            getKornyezetVedelem();
            ?>
        </select>
        <?php
        initAutotipusbekuldes();
        ?>
        <button type="submit" name="Autotipusbekuldes">Beküldés</button>
    </form>
    <div>
        <?php
        printresult();
        ?>
    </div>

</body>

</html>