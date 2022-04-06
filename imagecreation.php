<?php
session_start();

$captcha = $_SESSION['captcha'];

$img = imagecreatetruecolor(150, 60);               // create image base
$bg = imagecolorallocate($img, 22, 86, 165);        // background color blue
$fg = imagecolorallocate($img, 255, 255, 255);      // text color white    

imagefill($img, 0, 0, $bg);                                   // fill the image with the background color
$bbox = imagettfbbox(30, 0, 'arial.ttf', $captcha);           // get the bounding box of the text

// $width = abs($bbox[4] - $bbox[0]);            // get the width of the text
// $height = abs($bbox[5] - $bbox[1]);           // get the height of the text
// $x = ceil($width/2);                             // calculate the x position
// $y = ceil($height/2) + 20;                            // calculate the y position

$x = ceil((150 - $bbox[4] + $bbox[0])/2);
$y = ceil((60 - $bbox[5] + $bbox[1])/2);



imagettftext($img, 30, 0, $x, $y, $fg, 'arial.ttf', $captcha);  // write text on image



header("Cache-Control: no-store, no-cache, must-revalidate");   // prevent browser caching
header('Content-type: image/png');

$captchaimg = imagepng($img);

imagedestroy($img);
?>