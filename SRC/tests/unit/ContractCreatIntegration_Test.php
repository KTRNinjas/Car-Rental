<?php
namespace Tests\Unit;
$path=dirname(__DIR__,2);
include_once($path.DIRECTORY_SEPARATOR."Filldb.php");

include_once($path.DIRECTORY_SEPARATOR."contract_data.php");
use mysqli;
use \Tests\Support\UnitTester;

class ContractCreatTest extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }
    // tests
    public function test_Contract_create_contracts()
    {
        //Given
        $host="127.0.0.1";
        $user="root";
        $password="";
        $kapcsolat=mysqli_connect($host,$user,$password);

        //When
//        Contract_create($kapcsolat);
        $sql="SELECT * FROM `autokolcsonzo`.`contract` ";
        $contract_Adatok=[];
        $result=mysqli_query($kapcsolat,$sql);
        $gyujtoArry_contract_Adatok=[];
        while($egysor = mysqli_fetch_assoc($result)){
            $contract_Adatok["id"]= $egysor["id"];
            $contract_Adatok["Kezdődátum"]= $egysor["Kezdődátum"];
            $contract_Adatok["Végdátum"]= $egysor["Végdátum"];
            $contract_Adatok["Account_ID"]= $egysor["Account_ID"];
            $contract_Adatok["Visszavétel_időpontja"]= $egysor["Visszavétel_időpontja"];
            array_push($gyujtoArry_contract_Adatok,$contract_Adatok);
            
        }

        //Then
        $this->assertEquals(3,count($gyujtoArry_contract_Adatok));
        $this->assertEquals(1,$gyujtoArry_contract_Adatok[0]["id"]);
        $this->assertEquals("2022-08-24",$gyujtoArry_contract_Adatok[0]["Kezdődátum"]);
        $this->assertEquals("2022-08-31",$gyujtoArry_contract_Adatok[0]["Végdátum"]);
        $this->assertEquals(0,$gyujtoArry_contract_Adatok[0]["Account_ID"]);
        $this->assertEquals('2022-08-31',$gyujtoArry_contract_Adatok[0]["Visszavétel_időpontja"]);
               
        $this->assertEquals(2,$gyujtoArry_contract_Adatok[1]["id"]);
        $this->assertEquals("2022-08-25",$gyujtoArry_contract_Adatok[1]["Kezdődátum"]);
        $this->assertEquals("2022-08-29",$gyujtoArry_contract_Adatok[1]["Végdátum"]);
        $this->assertEquals(0,$gyujtoArry_contract_Adatok[1]["Account_ID"]);
        $this->assertEquals('2022-08-31',$gyujtoArry_contract_Adatok[1]["Visszavétel_időpontja"]);

        $this->assertEquals(3,$gyujtoArry_contract_Adatok[2]["id"]);
        $this->assertEquals("2022-09-26",$gyujtoArry_contract_Adatok[2]["Kezdődátum"]);
        $this->assertEquals("2022-09-30",$gyujtoArry_contract_Adatok[2]["Végdátum"]);
        $this->assertEquals(0,$gyujtoArry_contract_Adatok[2]["Account_ID"]);
        $this->assertEquals('0000-00-00',$gyujtoArry_contract_Adatok[2]["Visszavétel_időpontja"]);
        
    }
    public function test_Create_Contract_car_join_table()
    {
        //Given
        $host="127.0.0.1";
        $user="root";
        $password="";
        $kapcsolat=mysqli_connect($host,$user,$password);
        $sql="DROP TABLE `autokolcsonzo`.`contract_car_join`";
        $this->assertTrue(mysqli_query($kapcsolat,$sql));
        //when
        $result =Create_Contract_car_join_table($kapcsolat);
        
        //then
        $this->assertEquals("Contract car join tabla létrehozasa Sikeres volt!",$result);
        
    }
    

}
?>