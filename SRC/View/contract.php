<?php
  $path=dirname(__DIR__,1);
  include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "contract_controller.php");
  initContractController();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contract</title>
  
</head>
<body>
  <form method="POST">
    <input type="number" name="UserID">
    <input type="submit" name="Megrendel" value="Megrendel"> 
  </form>
  
</body>
</html>