<?php
session_start();
$s=$_SESSION["newsession"];
//echo $s;
for($i=1;$i<=$s/10;$i++)
{
  $q=0;
  $z = array(imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200),imagecreate(700,1200));	
  for($y=0;$y<=2;$y++)
  {                                                                                                                                                                  
	$b=0;
	for($x=1;$x<=10;$x++)
	{
		$k=$x+10*($i-1);
		$dest = imagecreatefrompng("barcode$k.png");	
		imagecopymerge($z[$i-1], $dest, 10+$q, $b, 0, 0, 170, 95, 100);
		$b=$b+105;
		
		
	}
	$q=$q+265;
  }

 //header("Content-type: image/jpeg");
 //imagejpeg($z,null,100);
 imagejpeg($z[$i-1], "bar$i.jpeg",100);
}
?>
<html>
<body>
<div style='float:right; margin-top:50px; margin-right:300px;' >
<button type="button" style="height:100px; width:100px;"><a href="new1.php">Print</a></button>
</div>
<div>
<?php
for($i=1;$i<=$s/10;$i++){
print "<img src='bar$i.jpeg'>";
}?>
</div>
</body>
</html>
<?php
for($i=1;$i<=$s/10;$i++)
{
for($x=1;$x<=10;$x++)
	{
		$k=$x+10*($i-1);
		$file= "barcode$k.png";
		unlink($file);
	}
	//$file1="bar$i.jpeg";
	//unlink($file1);
}
?>		
