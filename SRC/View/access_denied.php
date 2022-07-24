<?php
$path = dirname(__DIR__, 1);
$hostname = getenv('HTTP_HOST');
$url = '/' . trim($path . "c", $_SERVER['DOCUMENT_ROOT']) . "C";
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access denied</title>
    <link rel="stylesheet" href=<?php print '"' . (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $hostname . $url . '/View/css/access_denied.css"' ?>>
</head>

<body>
    <h1 class="blinkingNotification">Access Denied! <br>You dont have permission to visit this page.</h1>
</body>

</html>