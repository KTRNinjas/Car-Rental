<?php
$path = dirname(__DIR__, 1);
require_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "home_controller.php");
session_start();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Home</h1>
    <a href="/registration">Regisztráció</a>
    <form action="" method="post">
        <input type="e-mail" name="mail" placeholder="E-mail" required>
        <input type="password" name="pass" placeholder="Password" required>
        <input type="submit" name="login" value="Belépés">
    </form>

    <?php
    loginController();
    ?>
</body>

</html>