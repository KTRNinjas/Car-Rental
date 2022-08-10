<?php 
  $path=dirname(__DIR__,1);
  include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "contract_service.php");
  require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
  function checkAccountController($kapcsolat,$contactID){
    $display=checkAccountService($contactID,$kapcsolat);
    print $display;
  }
  function initContractController(){
   if(isset($_POST["Megrendel"])){
     $kapcsolat=$GLOBALS["kapcsolat"];
     checkAccountController($kapcsolat,$_POST["UserID"]);
     print "Bejutott";
   }
  }
?>