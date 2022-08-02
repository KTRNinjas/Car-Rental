<?php
    $path=dirname(__DIR__,1);
    include_once($path.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'Service'.DIRECTORY_SEPARATOR.'ArService.php');
    var_dump(GetAutotipusokService());
    //most táblázattal csináljuk meg  de majd cseréljük ki span és div-re 
    function fillArTableWithAutoTipusok(){

    }
    function TakeAutoTipusHeader(){
        print "<Th>Márka </Th>";
        print "<Th>Tipus </Th>";
        print "<Th>Fajta </Th>";
    }
?>