<?php 
  $path=dirname(__DIR__,1);
  include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "profil_service.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User profil</title>
</head>
<body>
<div>
  <form action="" method="post">
  <input type="checkbox" name="magan">Magánszemély<br>
  <input type="checkbox" name="ceges">Céges vásárló
  </form>

  <form action="" method="post">
    <input type="text" placeholder="Lakcím">
    <input type="text" placeholder="Bankszámlaszám">
  </form>
  </div>
</body>
</html>