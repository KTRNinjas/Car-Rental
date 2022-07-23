<?php
require_once("indexcontroller.php");
require_once("testimplemetation_controller.php");
require_once("testimplementation_controller2.php");


function getRoutes()
{

    return $GLOBALS['routes'];
}
/*function collectRoutes(){
    $pageRoute=getRouteOfThisPage();
    $fileLocation=getFileLocationOfThisPage();
    $GLOBALS['routes'][$pageRoute] = $fileLocation;
    print $fileLocation;
}*/
/*function addRoute()
{
    $pageRoute=getRouteOfThisPage();
    print $pageRoute;
    $fileLocation=getFileLocationOfThisPage();
    print $fileLocation;
    $GLOBALS['routes'][$pageRoute] = $fileLocation;
}*/
