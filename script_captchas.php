<?php

session_start();

$chaine = '123456789ABCDEFGHIKLMNOPQRSTUVWXYZ';

$image = imagecreatefrompng('images/captcha_1.png');

$color = imagecolorallocate($image, 44, 62, 80);

$font = 'fonts/Montserrat-Bold.ttf';

function getCode($length, $chars)
{
	$code = null;
	for ($i=0; $i < $length ; $i++) 
	{ 
		$code .= $chars { mt_rand(0 , strlen($chars) - 1)};
	}
	return $code;
};

$code = getCode(5, $chaine);

$char1 = substr($code, 0,1);
$char2 = substr($code, 1,1);
$char3 = substr($code, 2,1);
$char4 = substr($code, 3,1);
$char5 = substr($code, 4,1);

imagettftext($image, 20, -50, 80, 50, $color, $font, $char1);
imagettftext($image, 20, 20, 120, 50, $color, $font, $char2);
imagettftext($image, 20, -35, 150, 50, $color, $font, $char3);
imagettftext($image, 20, 25, 180, 50, $color, $font, $char4);
imagettftext($image, 20, -15, 210, 50, $color, $font, $char5);

$_SESSION['chars1'] = $char1;
$_SESSION['chars2'] = $char2;
$_SESSION['chars3'] = $char3;
$_SESSION['chars4'] = $char4;
$_SESSION['chars5'] = $char5;

header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);

?>