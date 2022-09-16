<?php
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "urlCollector_service.php");
function urlCollector()
{
  $routes=$GLOBALS["routes"];
  $urls=[];
  foreach($routes as $key=>$value){
    array_push($urls,$key);
  }
  urlCollectorService($urls);
}

?>