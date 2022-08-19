<?php
$path = dirname(__DIR__, 2);
require_once($path . "/Routing/routing.php");

use PHPUnit\Framework\TestCase;

class RoutingTest extends TestCase
{
  protected function setUp(): void
  {
  }
  function test_if_routing_finds_a_valid_route()
  {
    //given
    $url = "testurl/testurl";
    $fileLocation = __DIR__;
    $routes[$url] = $fileLocation;
    $GLOBALS['routes'] = $routes;
    $server = 'testurl/testurl';
    //When
    $result = initRouting($server, true);
    //Then
    $this->assertEquals(__DIR__, $result, "A testurl/testurl címre a TEST/Unit mappába kellene irányítania");
  }
  function test_if_routing_doesnt_find_a_valid_route()
  {
    //given
    $url = "testurl/testurl";
    $fileLocation = __DIR__;
    $routes[$url] = $fileLocation;
    $GLOBALS['routes'] = $routes;
    $server = 'testurl/invalidRoute';
    //When
    $result = initRouting($server, true);
    //Then
    $this->assertEquals(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'response_404.php', $result, "A testurl/testurl címre a /View/ mappába, a response_404-php-ra kellene irányítania");
  }
  function test_if_routing_can_accept_GET_parameters_in_url()
  {
    //given
    $url = "testurl/testurl";
    $fileLocation = __DIR__;
    $routes[$url] = $fileLocation;
    $GLOBALS['routes'] = $routes;
    $server = 'testurl/testurl?valami=valami';
    //When
    $result = initRouting($server, true);
    //Then
    $this->assertEquals(__DIR__, $result, "A testurl/testurl?bemenő=input címre a Tests/Unit mappára kell irányítania");
  }
  function test_if_other_pages_cant_be_accesses_via_GET_parameter()
  {
    //given
    $url = "testurl/testurl2";
    $fileLocation = __DIR__;
    $routes[$url] = $fileLocation;
    $GLOBALS['routes'] = $routes;
    $server = 'testurl/testurl?2';
    //When
    $result = initRouting($server, true);
    //Then
    $this->assertEquals(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'response_404.php', $result, "A testurl/testurl?2 címre a /View/ mappába, a response_404-php-ra kellene irányítania");
  }
  function test_if_replacer_replaces_slash_sign_backslash_sign()
  {
    //given
    $url = "/test";
    //when
    $result = replacer($url);
    //then
    $this->assertEquals($result, '\\/test', 'A /test bemenőadathoz hozzá kéne konkatenálnia egy \\-t');
  }
  function test_if_replacer_doesnt_replace_random_character()
  {
    //given
    $url = "test&";
    //when
    $result = replacer($url);
    //then
    $this->assertEquals($result, 'test&', 'A test& bemenőadatot békén kell hagynia');
  }
  function test_if_getmatcher_can_accept_questionmarks()
  {
    //given
    $pattern = "test";
    $request = "test?";
    //when
    $result = getMatcher($pattern, $request);
    //then
    $this->assertTrue($result, 'A ? végzódéső url-ekre true-val kell visszatérnie');
  }
  function test_if_getmatcher_can_accept_anything_after_questionmark()
  {
    //given
    $pattern = "test";
    $request = "test?blablabla";
    //when
    $result = getMatcher($pattern, $request);
    //then
    $this->assertTrue($result, 'A ? végzódéső url-ekre true-val kell visszatérnie');
  }
  function test_if_getmatcher_cant_accept_anything_without_questionmark()
  {
    //given
    $pattern = "test";
    $request = "testblablabla";
    //when
    $result = getMatcher($pattern, $request);
    //then
    $this->assertFalse($result, 'A nem ? végzódéső url-ekre false-al kell visszatérnie');
  }
  function test_if_matcher_can_accept_anything_with_questionmark()
  {
    //given
    $url = "test/test";
    $request = "test/test?blablabla";
    //when
    $result = matcher($url, $request);
    //then
    $this->assertTrue($result, 'A ? végzódéső url-ekre true-val kell visszatérnie');
  }
  function test_if_matcher_cant_accept_anything_with_questionmark()
  {
    //given
    $url = "test/test";
    $request = "test/testblablabla";
    //when
    $result = matcher($url, $request);
    //then
    $this->assertFalse($result, 'A nem ? végzódéső url-ekre false-al kell visszatérnie');
  }
  function test_if_matcher_doesnt_accept_question_marked_urls_if_they_dont_exist_in_project()
  {
    //given
    $url = "test/test";
    $request = "invalidadress/test?blablabla";
    //when
    $result = matcher($url, $request);
    //then
    $this->assertFalse($result, 'invalidasressre végzódéső url-ekre false-al kell visszatérnie');
  }
  function test_if_matcher_doesnt_accept_urls_not_existing_in_project()
  {
    //given
    $url = "test/test";
    $request = "invalidadress/test";
    //when
    $result = matcher($url, $request);
    //then
    $this->assertFalse($result, 'invalidasressre végzódéső url-ekre false-al kell visszatérnie');
  }
  function test_if_matcher_does_accept_urls_existing_in_project()
  {
    //given
    $url = "test/test";
    $request = "test/test";
    //when
    $result = matcher($url, $request);
    //then
    $this->assertTrue($result, 'A projektben létező url-ekre true-val kell visszatérnie');
  }
}
