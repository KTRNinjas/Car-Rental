<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "AdminController.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminisztrátori felület</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="lastname" id="">
        <input type="text" name="firstname" id="">
        <input type="email" name="email" id="">
        <input type="submit" name="searchUserRole" value="Keresés">
    </form>
    <?php searchForUserRole(); ?>
</body>

</html>