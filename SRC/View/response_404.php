<?php
$path = dirname(__DIR__, 1);
$hostname = getenv('HTTP_HOST');
$replacedPath = str_ireplace("\\", "/", $path);
$izé = "//Car-Rental";
$url = str_ireplace($_SERVER['DOCUMENT_ROOT'], "", $replacedPath);
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Requested page can't be found</title>
    <link rel="stylesheet" href=<?php print '"' . (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $hostname . $url . '/View/css/response_404.css"' ?>>
</head>

<body>
    <h1 class="h1404">OOPS Page Not Found Error:404</h1>
    <?php
    //print '<p><img src="'.(isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$hostname.$url.'/Fileok/Kepek/toy-car-crash.gif" alt=""></p>';
    ?>
</body>

</html>