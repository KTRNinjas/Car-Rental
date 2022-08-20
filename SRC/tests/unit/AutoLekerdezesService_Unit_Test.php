<?php

namespace Tests\Unit;
$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR ."Service".DIRECTORY_SEPARATOR. "AutolekerdezesService.php");
use \Tests\Support\UnitTester;

class AutoLekerdezesServiceUnitTests extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_arszamolo_works_with_2_days()
    {
    //Given
    $cars[0]["Ár"]=1000;
    $cars[1]["Ár"]=2000;
    //when
    $results=arSzamolo('2022-01-01','2022-01-03',$cars);
    //Then
    $this->assertEquals(2000,$results[0]['ÖsszÁr']);
    $this->assertEquals(4000,$results[1]['ÖsszÁr']);
    }
    public function test_if_arszamolo_works_with_3_days()
    {
    //Given
    $cars[0]["Ár"]=1000;
    $cars[1]["Ár"]=2000;
    //when
    $results=arSzamolo('2022-01-01','2022-01-04',$cars);
    //Then
    $this->assertEquals(3000,$results[0]['ÖsszÁr']);
    $this->assertEquals(6000,$results[1]['ÖsszÁr']);
    }
    public function test_if_arszamolo_works_with_a_month_days()
    {
    //Given
    $cars[0]["Ár"]=1000;
    $cars[1]["Ár"]=2000;
    //when
    $results=arSzamolo('2022-01-01','2022-02-04',$cars);
    //Then
    $this->assertEquals(34000,$results[0]['ÖsszÁr']);
    $this->assertEquals(68000,$results[1]['ÖsszÁr']);
    }
}
