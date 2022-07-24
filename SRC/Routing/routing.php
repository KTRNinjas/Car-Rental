<?php
$path = dirname(__DIR__, 1);
require_once($path . "/Controller/master_controller.php");
function initRouting()
{
    $request = $_SERVER['REQUEST_URI'];
    $path = dirname(__DIR__, 1);
    $foundPage = false;
    foreach ($GLOBALS['routes'] as $url => $filenameAndLocation) {
        if (matcher($url, $request)) {
            require_once($filenameAndLocation);
            $foundPage = true;
        }
    }
    if (!$foundPage) {
        http_response_code(404);
        require_once($path . "/View/response_404.php");
    }
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
    $pattern = str_ireplace("/", "\\/", $url);
    return $pattern;
}
