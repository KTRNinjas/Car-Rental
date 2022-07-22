<?php
require_once("testimplemetation_controller.php");
$routes = [];

function getRoutes()
{
    
    return $GLOBALS['routes'];
}
function collectRoutes(){
    //addRoute();
    $pageRoute=getRouteOfThisPage();
    print $pageRoute;
    $fileLocation=getFileLocationOfThisPage();
    print $fileLocation;
    $GLOBALS['routes'][$pageRoute] = $fileLocation;
}
function addRoute()
{
    $pageRoute=getRouteOfThisPage();
    print $pageRoute;
    $fileLocation=getFileLocationOfThisPage();
    print $fileLocation;
    $GLOBALS['routes'][$pageRoute] = $fileLocation;
}
