<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regisztráció</title>
</head>

<body>
  <div>
    <form action="" method="POST">
      <input type="text" name="name">User név</input>
      <input type="email" name="mail">E-mail</input>
      <input type="text" name="pass">Password</input>
      <button type="submit" name="submit">Regisztál</button>
    </form>
  </div>
  <?php
  $path = dirname(__DIR__, 1);
  require_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "testimplemetation_controller.php");
  init($_POST);
  ?>
</body>

</html>