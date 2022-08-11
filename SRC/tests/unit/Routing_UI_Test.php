<?php
$path = dirname(__DIR__, 2);
require_once($path . "/Routing/routing.php");
require_once($path . "/Controller/master_controller.php");

use PHPUnit\Framework\TestCase;

class RoutingTest extends TestCase
{
    function test_if_routing_finds_homephp()
    {
        //given
        $serverRequestUri = "/";
        //when
        $result = initRouting($serverRequestUri, false);
        //then
        $this->assertEquals(dirname(__DIR__, 2) . '/View/home.php', $result, "A / jellel a Home-ra kell jutni");
    }
    function test_if_routing_finds_testimplementationphp()
    {
        //given
        $serverRequestUri = "/testimplementation";
        //when
        $result = initRouting($serverRequestUri, false);
        //then
        $this->assertEquals(dirname(__DIR__, 2) . '/View/testimplementation.php', $result, "A /testimplementationnel a localhost/testimplementation-ra kell jutni");
    }
    function test_if_routing_finds_testimplementation2php()
    {
        //given
        $serverRequestUri = "/testimplementation2";
        //when
        $result = initRouting($serverRequestUri, false);
        //then
        $this->assertEquals(dirname(__DIR__, 2) . '/View/testimplementation2.php', $result, "A /testimplementation2nel a localhost/testimplementation2-ra kell jutni");
    }
    function test_if_routing_finds_testimplementation2php_with_GET_parameters()
    {
        //given
        $serverRequestUri = "/testimplementation2?name=Jerry";
        //when
        $result = initRouting($serverRequestUri, false);
        //then
        $this->assertEquals(dirname(__DIR__, 2) . '/View/testimplementation2.php', $result, "A /testimplementation2?name=Jerry-vel a localhost/testimplementation2-ra kell jutni");
    }
    function test_if_routing_doesnt_find_testimplementation3()
    {
        //given
        $serverRequestUri = "/testimplementation3";
        //when
        $result = initRouting($serverRequestUri, false);
        //then
        $this->assertEquals(dirname(__DIR__, 2) . '/View/response_404.php', $result, "A /testimplementation3-mal mivel ilyen nincs a response_404.php-re kell jutni");
    }
}
