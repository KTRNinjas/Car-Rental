<?php
$imageErrors = [];
function getTargetDir()
{
  $path = dirname(__DIR__, 1);
  return $path . DIRECTORY_SEPARATOR . "Fileok" . DIRECTORY_SEPARATOR . "Kepek" . DIRECTORY_SEPARATOR . "Autok" . DIRECTORY_SEPARATOR;
}
function noImageReturn()
{
  return "noimage.jpg";
}
function deleteAllImagesOfACar($paths, $carID)
{
  for ($i = 0; $i < count($paths); $i++) {
    if (!unlink(getTargetDir() . $paths[$i])) {
      $GLOBALS['imageErrors'][$carID] = $paths[$i] . " file nem törölhető";
    }
  }
}
function kepFeltoltes($carID)
{

  //$files = array_filter($_FILES['autoPictureToUpload']['name']); //Use something similar before processing files.
  // Count the number of uploaded files in array
  $total_count = count($_FILES['autoPictureToUpload']['name']);
  $path = $GLOBALS['path'];
  $targetDir  = getTargetDir();
  $uploadedImagePaths = [];
  for ($i = 0; $i < $total_count; $i++) {
    //The temp file path is obtained
    $tmpFilePath = $_FILES['autoPictureToUpload']['tmp_name'][$i];
    $tmpFilePath = check_if_image_file_is_actual_image_or_fake_image($tmpFilePath, $i, $carID);
    $tmpFilePath = check_if_file_already_exists($tmpFilePath, $targetDir, $i, $carID);
    $tmpFilePath = check_file_size($tmpFilePath, $i, $carID);
    $tmpFilePath = check_if_image_is_jpeg_or_png($tmpFilePath, $targetDir, $i, $carID);
    //A file path needs to be present
    if ($tmpFilePath != "") {
      //Setup our new file path
      $newFilePath = $targetDir . DIRECTORY_SEPARATOR . $_FILES['autoPictureToUpload']['name'][$i];
      //File is uploaded to temp dir
      if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        //Other code goes here
        array_push($uploadedImagePaths, $_FILES['autoPictureToUpload']['name'][$i]);
      }
    }
  }
  return $uploadedImagePaths;
}
function check_if_image_file_is_actual_image_or_fake_image($tmpFilePath, $i, $carID)
{
  error_reporting(0);
  try {
    $check = getimagesize($_FILES['autoPictureToUpload']["tmp_name"][$i]);
  } catch (Error $err) {
    $check = false;
  }
  error_reporting(1);
  if ($check == false) {
    $GLOBALS['imageErrors'][$carID] = "File is not an image.";
    return "";
  } else {
    return $tmpFilePath;
  }
}
function check_if_file_already_exists($tmpFilePath, $target_dir, $i, $carID)
{
  $target_file = $target_dir . basename($_FILES["autoPictureToUpload"]["name"][$i]);
  if (file_exists($target_file)) {
    $GLOBALS['imageErrors'][$carID] = "File already exists.";
    return "";
  } else {
    return $tmpFilePath;
  }
}
function check_file_size($tmpFilePath, $i, $carID)
{
  if ($_FILES["autoPictureToUpload"]["size"][$i] > 5000000) {
    $GLOBALS['imageErrors'][$carID] = "File is too large.";
    return "";
  } else {
    return $tmpFilePath;
  }
}
function check_if_image_is_jpeg_or_png($tmpFilePath, $target_dir, $i, $carID)
{
  $target_file = $target_dir . basename($_FILES["autoPictureToUpload"]["name"][$i]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $GLOBALS['imageErrors'][$carID] = "Only JPG, JPEG & PNG files are allowed.";
    return "";
  } else {
    return $tmpFilePath;
  }
}
