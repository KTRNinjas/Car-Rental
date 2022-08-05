<?php
    $path=dirname(__DIR__,2);
    include_once($path.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'DAO'.DIRECTORY_SEPARATOR.'ArDAO.php');
    function GetAutotipusokService(){
        return GetautotipusDAO();
    }
    
    function insertArservice($autoTipusID,$Ar){
        insertArDAO($autoTipusID,$Ar);
    }
    function updateArService($autoTipusID,$Ar,$ArID){
        updateArDAO($autoTipusID,$Ar,$ArID);
    }
