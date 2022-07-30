<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autotipus felvétel</title>
    <?php
    include_once("../Controller/AutoFelvevoController.php");
    ?>
</head>
<body>
    <form action="" method="POST">
        <label name="marka" for="">
            <input type="text" name="marka" required placeholder="Márka">
        </label>
        <select name="fajta" id="">
            <option value="">Válaszon fajtát</option>
            <?php
            getFajta($kapcsolat);
            ?>
        </select>
        <select name="kategoria" id="">
            <option value="">Válaszon kategoriát</option>
            <?php
                getKategoria($kapcsolat);
            ?>
        </select>
        <label for="">
            <input name="premium" type="checkbox" value="off">
                Prémium
            </input>
        </label>
        <select name="kornyezetvedelem" id="">
            <option value="">Válaszon környezetvédelmi besorolást</option>
            <?php
                getKornyezetVedelem($kapcsolat);
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