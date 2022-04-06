<?php session_start(); ?>
<?php
$captcha = $_SESSION['captcha'];

$img = imagecreatetruecolor(150, 60);
$bg = imagecolorallocate($img, 22, 86, 165);        // background color blue
$fg = imagecolorallocate($img, 255, 255, 255);      // text color white    

imagefill($img, 0, 0, $bg);                                     // fill the image with the background color
$bbox = imagettfbbox(25, 0, './arial.ttf', $captcha);             // get the bounding box of the text

$x = ceil((150 - $bbox[4] + $bbox[0])/2);                       // calculate the x position of the text so the text is centered on the image
$y = ceil((60 - $bbox[5] + $bbox[1])/2);                        // calculate the y position



imagettftext($img, 25, 0, $x, $y, $fg, './arial.ttf', $captcha);  // write text on image



header("Cache-Control: no-store, no-cache, must-revalidate");   // prevent browser caching
header('Content-type: image/png');

$captchaimg = imagepng($img);

imagedestroy($img);
?>