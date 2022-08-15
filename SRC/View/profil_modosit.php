<?php
$path = dirname(__DIR__, 1);
require_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "profil_controller.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil módosítása</title>
</head>

<body>
  <h2>Profil adatainak módosítása</h2>
  <form method="post">
    <?php
    profilModifyController();
    ?>
  </form>
  <form method="post">
    <?php
    profilDeleteController();
    ?>
  </form>
</body>

</html>