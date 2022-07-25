<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autofelvétel</title>
    <?php
    include_once("../Controller/AutoFelvevoController.php");
    ?>
</head>

<body>
    <select name="" id="">
        <?php
        getFajta($kapcsolat);

        ?>
    </select>
    <select name="" id="">
        <?php
        getKategoria($kapcsolat);
        ?>
    </select>
    <select name="" id="">
        <?php
        getKornyezetVedelem($kapcsolat);
        ?>
    </select>


</body>

</html>