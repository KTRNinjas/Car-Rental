<?php
    $path=dirname(__DIR__,2);
    include_once($path.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'DAO'.DIRECTORY_SEPARATOR.'ARDAO.php');
    function GetAutotipusokService(){
        return GetautotipusDAO();
    }
    
    function insertArservice($autoTipusID,$Ar){
        insertArDAO($autoTipusID,$Ar);
    }
    

?>