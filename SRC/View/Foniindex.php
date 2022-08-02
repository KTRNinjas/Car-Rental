<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Föni oldala</title>
    <?php
    $path = dirname(__DIR__, 1);
    include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "FoniController.php");
    ?>
</head>

<body>
    <form action="" method="POST">
        <input type="number" placeholder="Ár">
        <input type="submit" name="bekuldes" value="Árbeírás">
    </form>
    <Table>
        <Thead>
            <?php
                TakeAutoTipusHeader();
            ?>
        </Thead>
        <tbody>
            <?php
//TakeAutoTipusBody();
            ?>
        </tbody>
    </Table>
</body>

</html>