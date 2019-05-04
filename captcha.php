<?php
session_start();
$ranStr = rand(100000,999999);
$_SESSION['dnss_code'] = $ranStr;
$newImage = imagecreatefromjpeg("images/bg_cap.jpg");
$txtColor = imagecolorallocate($newImage, 0, 0, 0);
imagestring($newImage, 5, 5, 5, $ranStr, $txtColor);
header("Content-type: image/jpeg");
imagejpeg($newImage);
?>