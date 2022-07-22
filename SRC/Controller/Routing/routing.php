<?php

function initRouting()
{
    $request = $_SERVER['REQUEST_URI'];
    $path = dirname(__DIR__, 2);
    if (matcher('/KTRNINJAS/Car-Rental/SRC/testimplementation', $request)) {
        require($path . "/View/testimplementation.php");
    }else if(matcher('/KTRNINJAS/Car-Rental/SRC/testimplementation2', $request)){
        print matcher('/KTRNINJAS/Car-Rental/SRC/testimplementation', $request);
        require($path . "/View/testimplementation2.php");
    } 
    
    else {
        http_response_code(404);
        print "404";
    }
    // switch ($request) {

    //     case '/KTRNINJAS/Car-Rental/SRC/testimplementation':
    //     case '/testimplementation':

    //         require($path . "/View/testimplementation.php");
    //         break;
    //     case '/KTRNINJAS/Car-Rental/SRC/testimplementation2':

    //         print $path;
    //         require($path . "/View/testimplementation2.php");

    //         print 'bejut';
    //         break;

    //     case '/Adatbazis/Emberek/projektdolgok/valamiafolderben':
    //         print "bent van";
    //         require __DIR__ . '/idiotafoldernev/valamiafolderben.php';
    //         break;

    //     case '/views/authors':
    //         require __DIR__ . '/views/authors.php';
    //         break;

    //     case '/about':
    //         require __DIR__ . '/views/aboutus.php';
    //         break;

    //     default:
    //         http_response_code(404);
    //         require __DIR__ . '/views/404.php';
    //         break;
    // }
}
function matcher($url, $request)
{
    $pattern = replacer($url);
    $exactPattern = "/" . $pattern . "$/";
    if(preg_match($exactPattern, $request) == 1){
        return true;
    }else if(getMatcher($pattern,$request)){
        return true;
    }else{
        return false;
    }
   // return preg_match($exactPattern, $request) == 1 ? true : getMatcher($pattern,$request);
}
function getMatcher($pattern,$request){
    $getPattern = "/" . $pattern . "\?/";
    if(preg_match($getPattern, $request)==1){
        return true;
    }
    return false;
}
function replacer($url)
{
    $pattern = str_ireplace("/", "\\/", $url);
    return $pattern;
}
