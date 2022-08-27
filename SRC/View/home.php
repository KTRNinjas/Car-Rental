<?php
$path = dirname(__DIR__, 1);
require_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "home_controller.php");
session_start();
require_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "Autolekerdezes_controller.php");
$hostname = getenv('HTTP_HOST');
$replacedPath = str_ireplace("\\", "/", $path);
$izé = "//Car-Rental";
$url = str_ireplace($_SERVER['DOCUMENT_ROOT'], "", $replacedPath);
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href=<?php print '"' . (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $hostname . $url . '/View/css/home.css"' ?>
    >
    
</head>

<body>
    <h1>Home</h1>
    <a href="/registration">Regisztráció</a>
    <form action="" method="post">
        <input type="e-mail" name="mail" placeholder="E-mail" required>
        <input type="password" name="pass" placeholder="Password" required>
        <input type="submit" name="login" value="Belépés">
    </form>
    <a href="/testimplementation2">Routing GET paraméterek</a><br>
    <a href="/autotipusfelvevo">Autótípus felvétel</a><br>
    <a href="/Foni_oldala">Árfelvétel</a><br>
    <a href="/Autofelvetel">Autófelvétel</a><br>
    <?php
    loginController();
    ?>
    
    <form action="" method="POST">
        <input type="text" name="kezdoDATE" id="" placeholder="Kezdő dátum" onfocus="(this.type='date')" required>
        <input type="text" name="vegDATE" id="" placeholder="Vég dátum" onfocus="(this.type='date')" required>
        <input type="submit" value="Lefoglalas" name="Lefoglalas">
    </form>

        <table>
    <?php
    autolekerdezes();
    ?>
    </table>


</body>

</html>