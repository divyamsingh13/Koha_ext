<?php
$z = imagecreate(760,1200);
$dest = imagecreatefrompng("barcode.png");	
$q=0;
for($y=0;$y<=2;$y++)
  {  
	imagecopymerge($z, $dest, 20+$q, 0, 0, 0, 170, 95, 100);
	$q=$q+290;
  }
imagejpeg($z, "qwe.jpeg",100);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Image</title>
</head>
<body>
<div style='float:left'>
<img src="qwe.jpeg">
</div>
<div style='float:right;'>
<button type="button" style="height:100px; width:100px; margin-top:0px;"><a href="new.php">Print</a></button>
<a href="new.php">Print</a>
</div>
</body>
</html>
<?php
$file1= "barcode.png";
	unlink($file1);
?>