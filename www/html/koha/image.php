<?php 
$dpi = 96;
//at 300 DPI for printing.
/*
A4 measures 210 × 297 millimeters or 8.27 × 11.69 inches. In PostScript, its dimensions are rounded off to 595 × 842 points. Folded twice, an A4 sheet fits in a C6 size envelope (114 × 162 mm). Part of the ISO 216 standard.*/
$width = 8.27*$dpi;
$height = 11.69*$dpi;

$image = imagecreatetruecolor ( $width , $height );
$white = imagecolorallocate($image, 250, 250, 250);
imagefill($image, 0, 0, $white);
$x=30;
$y=30;
$font="files/arial_th.ttf";
$size = 10;
$i=0;
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "AJAY KUMAR GARG ENGINEERING COLLEGE");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "27th Km Stone,Delhi-Hapur Bypass Road, Ghaziabad-201009");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "Phones:(0121)27662841 to 2762851 Fax:2761844,2761845");
$x=$x+60;
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "Name");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "Student No.");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "Course/Branch");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, "Batch");
$i=1;
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, ":");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, ":");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, ":");
imagettftext($image, $size, 0, $x, $y+20*$i++, imagecolorallocate($image, 20, 20, 20), $font, ":");
imagejpeg($image,"new.jpg",100);
echo '<img src="new.jpg" alt="not found" style="border : 1px solid #000" />';

?>