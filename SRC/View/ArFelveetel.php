<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto árfelvevő</title>
    <?php
    include_once("../Controller/ArFelvevoController.php");
    ?>
</head>
<body>
    <form action="" method="POST">
        <label name="markaTipus" for="">
            <input type="text" name="markaTipus" required placeholder="Márka Tipus">
        </label>
        <label name="ar" for="">
            <input type="text" name="ar" required placeholder="Ár">
        </label>
        <?php 
            initAutoarbekuldes()
        ?>
        <button type="submit" name="Autotipusbekuldes">Beküldés</button>
        <?php
        printresult()
        ?>
    </form>
</body>
</html>