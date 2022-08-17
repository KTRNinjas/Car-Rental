<?php
namespace Tests\Unit;

use \Tests\Support\UnitTester;

class profil_modify_service_unit_test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_profilModifyService_called_with_a_phone_number()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model".DIRECTORY_SEPARATOR."Service" . DIRECTORY_SEPARATOR . "profil_modifyService.php");
        
        //When
        $result = profilModifyService(null,null,null,null,null,null,123456,true);
        //Then
        $this->assertEquals(123456, $result);
    }
    public function test_if_profilModifyService_called_with_null_phone_number()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model".DIRECTORY_SEPARATOR."Service" . DIRECTORY_SEPARATOR . "profil_modifyService.php");
        
        //When
        $result = profilModifyService(null,null,null,null,null,null,null,true);
        //Then
        $this->assertEquals(null, $result);
    }
    public function test_if_profilModifyService_called_with_empty_phone_number()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model".DIRECTORY_SEPARATOR."Service" . DIRECTORY_SEPARATOR . "profil_modifyService.php");
        
        //When
        $result = profilModifyService(null,null,null,null,null,null,"",true);
        //Then
        $this->assertEquals(null, $result);
    }
}
