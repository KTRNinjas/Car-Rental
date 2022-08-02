<?php
    $path=dirname(__DIR__,1);
    include_once($path.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'Service'.DIRECTORY_SEPARATOR.'ArService.php');
    //most táblázattal csináljuk meg  de majd cseréljük ki span és div-re 
    function fillArTableWithAutoTipusok(){

    }
    function TakeAutoTipusHeader(){
        print "<Th>Márka </Th>";
        print "<Th>Tipus </Th>";
        print "<Th>Fajta </Th>";
        print "<Th>AR </Th>";
    }
    function TakeAutoTipusBody(){
       $GetAutotipusok =GetAutotipusokService();
       for($i=0;$i<count($GetAutotipusok);$i++){
           print "<tr>";
            foreach($GetAutotipusok[$i] as $key=>$value){
                if($key!="ID"){
                    print "<Td>".$value."</Td>";
                }
            }
            $formAr='<form action="" method="POST">
            <input type="number" placeholder="Ár">
            <input type="submit" name="bekuldes" value="Árbeírás">
            </form>';
            print "<Td>".$formAr."</Td>";
            print "</tr>";

    }
}
?>