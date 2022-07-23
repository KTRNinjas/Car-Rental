<?php 
$path = dirname(__DIR__, 1);

include($path."/Routing/routing.php");
include_once($path."/FileMuveletek/uninstall_routing.php");
$url="/";
$fileLocation=$_SERVER['DOCUMENT_ROOT']."/index.php";
$routes[$url]=$fileLocation;
print $fileLocation;
initRouting();
uninstallRouting();
