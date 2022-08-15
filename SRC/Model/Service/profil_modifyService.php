<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "profil_modositDAO.php");
function profilModifyService($id, $surname, $firstname, $mail, $pass, $license, $phone)
{
  if (empty($phone) || $phone == "") {
    $phone = 'NULL';
  }
  profilModifyDAO($id, $surname, $firstname, $mail, $pass, $license, $phone);
}
function automatic_profil_fill_service($id)
{
  return automatic_profil_fill($id);
}
function deleteProfilService($id)
{
  deleteProfilDAO($id);
}
