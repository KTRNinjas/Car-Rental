
<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "user_dao.php");
function registration_form($surname, $firstname, $mail, $pass)
{
  return fill_registration($surname, $firstname, $mail, $pass);
}
function loginService($mail, $pass)
{
  return loginDAO($mail, $pass);
}
?>
