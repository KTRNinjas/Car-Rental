<?php
$path = dirname(__DIR__, 1);
require_once($path . "/Controller/master_controller.php");
require_once($path . DIRECTORY_SEPARATOR . 'Connection' . DIRECTORY_SEPARATOR . 'dbconn_pdo.php');
//session_start();

$isRoutingTest = false;
/* function getRole($user_id){
    $sql="SELECT `Role_id` From `autokolcsonzo`.`contact` Where `id`=:user_id";
    $db_conn=$GLOBALS["db_conn"];
    $roleid=$db_conn->prepare($sql);
    $roleid->bindParam(':user_id',$user_id);
    $roleid->execute();
} */
function requireRouting($filenameAndLocation, $isTest)
{
 // $user_id=$_SESSION["user_id"];

    if (!$isTest) {
        require_once($filenameAndLocation);
    }
}
function initRouting($serverRequestUri, $isTest = false)
{
    $request = $serverRequestUri;
    $path = dirname(__DIR__, 1);
    foreach ($GLOBALS['routes'] as $url => $filenameAndLocation) {
        if (matcher($url, $request)) {
            http_response_code(200);
            requireRouting($filenameAndLocation, $isTest);
            return $filenameAndLocation;
        }
    }
    if (!$isTest) {
        http_response_code(404);
        require_once($path .DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."response_404.php");
    }
    return $path .DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."response_404.php";
}
function matcher($url, $request)
{
    $pattern = replacer($url);
    $exactPattern = "/^" . $pattern . "$/";
    if (preg_match($exactPattern, $request) == 1) {
        return true;
    } else if (getMatcher($pattern, $request)) {
        return true;
    } else {
        return false;
    }
}
function getMatcher($pattern, $request)
{
    $getPattern = "/^" . $pattern . "\?/";
    if (preg_match($getPattern, $request) == 1) {
        return true;
    }
    return false;
}
function replacer($url)
{
    $pattern = str_ireplace("/", "\\"."/", $url);
    return $pattern;
}
