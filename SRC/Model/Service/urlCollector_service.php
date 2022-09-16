<?php 
include_once($path . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'DAO' . DIRECTORY_SEPARATOR . 'urlCollector_DAO.php');
function urlCollectorService($urls){
  urlCollectorDAO($urls);
}
?>