<?php 
    $path = dirname(__DIR__, 2);
    include($path."/Connection/Dbconn.php");
    AutoTipusTarolo($kapcsolat,"BMW","Teher","Benzines",1,"e5");
    function AutoTipusTarolo($kapcsolat,$Marka,$Fajta,$Kategoria,$Premium,$KornyezetvedelmiBesorolas){
        $Macskakorom='"';
        print $Macskakorom;
        $sql="INSERT INTO `autotipus` (`ID`, `Márka`, `Fajta`, `Kategoria`, `Prémium`, `Környezetvédelmi besorolás`, `Ársáv`) VALUES (NULL,
         ".$Macskakorom.$Marka.$Macskakorom.",
          ".$Macskakorom.$Fajta.$Macskakorom.",
           ".$Macskakorom.$Kategoria.$Macskakorom.",
            $Premium,
             ".$Macskakorom.$KornyezetvedelmiBesorolas.$Macskakorom.", 
             ".$Macskakorom."60".$Macskakorom.")";
        $üzenet = "az auto ";
        $ok = mysqli_query($kapcsolat, $sql);
        if ($ok) {
        print $üzenet." sikeres volt!<br><br>";
        } else print $üzenet." sikertelen volt!<br><br>";
        print $sql;
    }


?>