<?php
$path = dirname(__DIR__, 1);
require_once($path . "/Controller/testimplementation_controller2.php");

print "testimplementation2";
if (isset($_GET["name"])) {
    print $_GET["name"];
}
