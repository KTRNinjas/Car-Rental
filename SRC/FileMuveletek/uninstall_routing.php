<?php
function uninstallRouting()
{
   if (isset($_POST["uninstall"])) {
      $index = $_SERVER['DOCUMENT_ROOT'] . "/index.php";
      unlink($index) or die("Unable to delete file!");
      print "<h1>Uninstalled</h1>";
      print "If you want to re-enable routing for the project go to FileMuveletek and run install_routing.php";
   }
}
