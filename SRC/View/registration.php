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
      <input type="text" name="surname" required>Vezetéknév</input>
      <input type="text" name="firstname" required>Keresztnév</input>
      <input type="email" name="mail" required>E-mail</input>
      <input type="text" name="pass" required>Password</input>
      <button type="submit" name="submit">Regisztál</button>
    </form>
  </div>
  <?php 
  include("../Controller/registration_controller.php");
  init($_POST);
?>
</body>
</html>