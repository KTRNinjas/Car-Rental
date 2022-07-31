<?php
$path = dirname(__DIR__, 1);
installRouting();
function installRouting()
{
    createIndexPHP();
    createHtaccess();
}
function createIndexPHP()
{
    $path=$GLOBALS['path'];
    $hyphen = "'";
    $index = fopen($_SERVER['DOCUMENT_ROOT'] . "/index.php", "w") or die("Unable to open file!");
    $replacedPath=str_ireplace("\\","\\\\",$path);
    $content =
        '<?php
include_once("' . $replacedPath . DIRECTORY_SEPARATOR.'Controller'.DIRECTORY_SEPARATOR.'indexcontroller.php");
initRouting($_SERVER[' . $hyphen . 'REQUEST_URI' . $hyphen . ']);
print  ' . $hyphen . '<form action="" method="POST">
<input type="submit" name="uninstall" value="Routing uninstallálása">
</form>' . $hyphen . ' 
?>
';
    fwrite($index, $content);
    fclose($index);
    print "<h1>index.php creation finished</h1>";
}
function createHtaccess()
{
    $htaccess = fopen($_SERVER['DOCUMENT_ROOT'] . "/.htaccess", "w") or die("Unable to open file!");
    /*$content = '
    RewriteEngine On
    RewriteBase ///
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php [L]
    ';*/
    $content = '
    RewriteEngine On
    RewriteBase ///
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.+)$ index.php [QSA,L]
    ';
    fwrite($htaccess, $content);
    fclose($htaccess);
    print "<h1>.htaccess creation finished</h1>";
}
