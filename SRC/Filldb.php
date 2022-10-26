<?php
require_once("FilldbData.php");
if(file_exists(__DIR__.DIRECTORY_SEPARATOR.'c3.php')){
    include_once __DIR__.DIRECTORY_SEPARATOR.'c3.php';
}
InitDb($kapcsolat);
