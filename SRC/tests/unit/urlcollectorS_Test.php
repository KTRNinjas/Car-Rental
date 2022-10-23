<?php
namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "urlCollector_service.php");
use \Tests\Support\UnitTester;

class urlcollectorService_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;
    protected function _before()
    {
    }
    // tests
    public function test_url_collectorService_dup()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $db_host="127.0.0.1";
        $db_user="root";
        $db_password="";
        $conn="mysql:host=$db_host";
        $db_conn=new \PDO($conn,$db_user,$db_password);
        /* $db_conn=[];*/
        $GLOBALS["db_conn"]=$db_conn; 
        $urls=["http://localhost/Profil_modositas"];
        //When
        urlCollectorService($urls);
        $sql="SELECT `id` FROM `autokolcsonzo`.`honlapok` ";
        $query_result=$db_conn->query($sql);
        $query_result=$query_result->fetchAll();
        //Then
        $this->assertEquals(count($query_result), 1); //assertTrue
    }
    public function test_url_collectorService_newdata()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $db_host="127.0.0.1";
        $db_user="root";
        $db_password="";
        $conn="mysql:host=$db_host";
        $db_conn=new \PDO($conn,$db_user,$db_password);
        /* $db_conn=[];*/
        $GLOBALS["db_conn"]=$db_conn; 
        $urls=["http://localhost/Profil_modositas", "http://localhost/Autofelvevo"];
        //When
        urlCollectorService($urls);
        $sql="SELECT `id` FROM `autokolcsonzo`.`honlapok` ";
        $query_result=$db_conn->query($sql);
        $query_result=$query_result->fetchAll();
        //Then
        $this->assertEquals(count($query_result), 2); //assertTrue
    }
  }
?>