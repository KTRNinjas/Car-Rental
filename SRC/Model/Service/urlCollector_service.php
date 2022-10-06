<?php 
include_once($path . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'DAO' . DIRECTORY_SEPARATOR . 'urlCollector_DAO.php');
function urlCollectorService($urls){
  $url_dao=getURL_DAO();
  $new_urls=[];
  for($i=0; $i<count($urls); $i++){
    if(!in_array($urls[$i],$url_dao)){                        //lineáris keresés      
      $new_urls[]=$urls[$i];
    }
  }
  urlCollectorDAO($new_urls);
}
?>