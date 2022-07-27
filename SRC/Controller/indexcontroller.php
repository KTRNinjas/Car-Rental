<?php
$path = dirname(__DIR__, 1);
include_once($path . "/Routing/routing.php");
include_once($path . "/FileMuveletek/uninstall_routing.php");
uninstallRouting();
