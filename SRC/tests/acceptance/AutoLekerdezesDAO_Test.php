<?php
namespace Tests\Unit;
$path=dirname(__DIR__,2);
//include_once($path.DIRECTORY_SEPARATOR."Filldb.php");

include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."AutoLekredezesDAO.php");
use mysqli;
use \Tests\Support\UnitTester;

class AutoLekredezesDAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }
    // tests

public function test_LekerdezesAutok_kivantIntervalumba()
    {
        //Given
        $host="127.0.0.1";
        $user="root";
        $password="";
        $kapcsolat=mysqli_connect($host,$user,$password);
        //when
        $kezdoDATE="2022-08-20";
        $vegDATE="2022-08-31";
        $result=LekerdezesAutok_kivantIntervalumba($kezdoDATE,$vegDATE);
        //then
        $this->assertEquals("AudiTeszt",$result[0]["Márka"]);
        $this->assertEquals("AudiTeszt",$result[1]["Márka"]);
        $this->assertEquals("VolkswagenTeszt",$result[2]["Márka"]);
       
    }
}