<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
//include_once($path . DIRECTORY_SEPARATOR . 'Filldb.php');
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "urlCollector_DAO.php");


use \Tests\Support\UnitTester;

class urlcollectorDAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;
    protected function _before()
    {
    }
    // tests
    public function test_url_collector()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $db_host="127.0.0.1";
        $db_user="root";
        $db_password="";
        $conn="mysql:host=$db_host";
        $db_conn=new \PDO($conn,$db_user,$db_password);
        
        $GLOBALS["db_conn"]=$db_conn; 
        $urls=["http://localhost/Profil_modositas"];
        //When
        $result = urlCollectorDAO($urls);
        //Then
        $this->assertTrue($result); //assertTrue
    }
    public function test_geturlDAO()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $db_host="127.0.0.1";
        $db_user="root";
        $db_password="";
        $conn="mysql:host=$db_host";
        $db_conn=new \PDO($conn,$db_user,$db_password);
       
        $GLOBALS["db_conn"]=$db_conn; 
        //When
        $result = getURL_DAO();
        //Then
        $this->assertEquals($result[0], "http://localhost/Profil_modositas"); //assertTrue
    }
  }