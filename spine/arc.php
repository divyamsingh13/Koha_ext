
<?php
$img = imagecreatetruecolor(120, 20);
$bg = imagecolorallocate ( $img, 255,255,255 );
imagefilledrectangle($img,0,0,120,20,$bg);
imagejpeg($img,"myimg.jpg",100);
?>