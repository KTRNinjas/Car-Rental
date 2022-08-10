<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Routing" . DIRECTORY_SEPARATOR . "routing.php");
include_once($path . DIRECTORY_SEPARATOR . "FileMuveletek" . DIRECTORY_SEPARATOR . "uninstall_routing.php");
uninstallRouting();
