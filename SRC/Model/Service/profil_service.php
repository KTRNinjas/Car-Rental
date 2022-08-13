<?php 
  $path=dirname(__DIR__,2);
  include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "contract_DAO.php");
  function fillOutMagan(){
    if(isset($magan)){
      $magan=$_POST["magan"];
      print ' <form method="post"><input type="text" placeholder="Lakcím"><input type="text" placeholder="Bankszámlaszám"></form>';
    }
  }
?>