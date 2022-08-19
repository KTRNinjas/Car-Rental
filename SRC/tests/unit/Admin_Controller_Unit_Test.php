<?php

namespace Tests\Unit;

use \Tests\Support\UnitTester;

class AdminControllerTest extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_vasarlo_Is_Preselected_in_legördülő()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "AdminController.php");
        $testData[1] = "vásárló";
        $testData[2] = "admin";
        $testData[3] = "főnök";
        //When
        $result = createRoleLegördülő(1, true, $testData);
        //Then
        $this->assertEquals('<select name="roleSelect" id="roleSelect"><option value="1" selected>vásárló</option><option value="2">admin</option><option value="3">főnök</option></select>', $result);
    }
    public function test_if_admin_Is_Preselected_in_legördülő()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "AdminController.php");
        $testData[1] = "vásárló";
        $testData[2] = "admin";
        $testData[3] = "főnök";
        //When
        $result = createRoleLegördülő(2, true, $testData);
        $this->assertEquals('<select name="roleSelect" id="roleSelect"><option value="1">vásárló</option><option value="2" selected>admin</option><option value="3">főnök</option></select>', $result);
    }
    public function test_if_fonok_Is_Preselected_in_legördülő()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "AdminController.php");
        $testData[1] = "vásárló";
        $testData[2] = "admin";
        $testData[3] = "főnök";
        //When
        $result = createRoleLegördülő(3, true, $testData);
        $this->assertEquals('<select name="roleSelect" id="roleSelect"><option value="1">vásárló</option><option value="2">admin</option><option value="3" selected>főnök</option></select>', $result);
    }
}
