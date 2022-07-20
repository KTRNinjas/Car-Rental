<?php 
  include("../Controller/registration_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regisztráció</title>
</head>
<body>
  <div>
    <form action="GET_POST">
      <input type="text" id="Name">User név</input>
      <input type="text" id="pass">Password</input>
      <button type="submit">Regisztál</button>
    </form>
  </div>
</body>
</html>