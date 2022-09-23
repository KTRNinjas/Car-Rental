<?php 
namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Model".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."ImageDAO.php");

use mysqli;
use \Tests\Support\UnitTester;

class ImageDAO_Integration_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_image_path_inserted(){
     //given
     $host = "127.0.0.1";
     $user = "root";
     $password = "";
     $kapcsolat = mysqli_connect($host, $user, $password);
     $GLOBALS['kapcsolat']=$kapcsolat;
     $carID=1;
     $path="tesztpath";
     //when
     $result = kepFeltoltesDAO($carID,$path);
     //then
     $this->assertTrue($result);
     //After
     $sql="DELETE FROM `autokolcsonzo`.`car_images` WHERE `path`='testpath'";
     $this->assertTrue(mysqli_query($kapcsolat,$sql));
    }
}
