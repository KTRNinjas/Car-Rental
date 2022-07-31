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
            <input type="text" name="marka"  placeholder="Márka">
        </label>
        <label name="tipus" for="">
            <input type="text" name="tipus" placeholder="Tipus">
        </label>
        <select name="fajta" id="" >
            <option value="">Válaszon fajtát</option>
            
        </select>
        <select name="kategoria" id="">
            <option value="">Válaszon kategoriát</option>
            
        </select>
        <label for="">
            <input name="premium" type="checkbox" value="off">
                Prémium
            </input>
        </label>
        <select name="kornyezetvedelem" id="">
            <option value="">Válaszon környezetvédelmi besorolást</option>
            
        </select>
            <?php
                initAutotipusbekuldes();
            ?>
        <label name="ar" for="">
            <input type="text" name="ar" placeholder="Ár">
        </label>
        <button type="submit" name="Autotipusbekuldes">Beküldés</button>
    </form>
    <div>
        <?php
        printresult();
        ?>
    </div>
</body>
</html>