<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autotipus felvétel</title>
    <?php
    include_once("../Controller/AutoArController.php");
    ?>
</head>

<body>
    <form action="" method="POST">
        <label name="marka" for="">
            <input type="text" name="marka" placeholder="Márka">
        </label>
        <label name="tipus" for="">
            <input type="text" name="tipus" placeholder="Tipus">
        </label>
        <label name="ar" for="">
            <input type="text" name="ar" placeholder="Ár">
        </label>
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