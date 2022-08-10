<?php

namespace tests\unit;

use \Tests\Support\UnitTester;

class contract_data_test extends \Codeception\Test\Unit
{
   //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_contract_table_generated()
    {
      //given
      $path=dirname(__DIR__,2);
      include_once($path . DIRECTORY_SEPARATOR . "Filldb.php");
      $host="localhost";
      $user="root";
      $password="";
      $kapcsolat=mysqli_connect($host,$user,$password);
      //when
      $result=create_contract_table($kapcsolat);
      
      //then
      $this->assertEquals("contract tábla létrehozása Sikeres volt!", $result);
    }
}