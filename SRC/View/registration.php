<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regisztráció</title>
</head>

<body>
  <div>
    <form action="" method="POST">
      <input type="text" name="surname" placeholder="Vezetéknév" required></input>
      <input type="text" name="firstname" placeholder="Keresztnév" required></input>
      <input type="email" name="mail" placeholder="E-mail" required></input>
      <input type="password" name="pass" placeholder="Password" required></input>
      <button type="submit" name="submit">Regisztál</button>
    </form>
  </div>
  <?php
  $path = dirname(__DIR__, 1);
  include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "registration_controller.php");
  initRegistration($_POST);
  ?>
</body>

</html>