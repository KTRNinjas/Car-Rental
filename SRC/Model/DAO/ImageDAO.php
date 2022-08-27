<?php
function kepFeltoltesDAO($carID, $path)
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$carID', '$path') ";
    return mysqli_query($kapcsolat, $sql);
}
function getPicturesOfACarDAO($carID)
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "SELECT `path` FROM `autokolcsonzo`.`car_images` WHERE car_id='$carID'";
    $result = mysqli_query($kapcsolat, $sql);
    $paths = [];
    while ($egysor = mysqli_fetch_assoc($result)) {
        array_push($paths, $egysor['path']);
    }
    return $paths;
}
