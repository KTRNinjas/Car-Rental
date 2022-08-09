<?php
namespace Tests\Unit;




use \Tests\Support\UnitTester;

class ExampleTest extends \Codeception\Test\Unit
{
//protected UnitTester $tester;

    protected function _before()
    {
        $path=dirname(__DIR__,2);
        include_once($path.DIRECTORY_SEPARATOR."Connection".DIRECTORY_SEPARATOR."Dbconn.php");
        include_once($path.DIRECTORY_SEPARATOR.'AutotipusSQL.php');         
    }

    // tests
    public function test_MainAutotipusTablaLetrehozas()
    {
        //given
        $kapcsolat=[];
        sleep(2);
        //when
        $result= MainAutotipusTablaCreate($kapcsolat);
        
        //then
        $this->assertequals("Az autotipus tabla letrehozasa",$result);

        
    }
}