<?php
if(!isset($_GET['text']))
{
die("No text provided");
}
 
header ("Content-type: image/png");
$textToConvert = $_GET['text'];
$font   = 4;
$width  = ImageFontWidth($font) * strlen($textToConvert);
$height = ImageFontHeight($font);
 
$im = @imagecreate ($width,$height);
$background_color = imagecolorallocate ($im, 255, 255, 255); //this means it's white bg
$text_color = imagecolorallocate ($im, 0, 0,0);//and of course black text
imagestring ($im, $font, 0, 0,  $textToConvert, $text_color);
imagepng ($im);
?> 
 	
<img src="textToImage.php?text=emailAddress@emailProvider.com" height="100px" width="300px">