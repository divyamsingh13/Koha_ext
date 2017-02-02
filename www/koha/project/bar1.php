<?php
session_start();
$s=$_SESSION["newsession"];
echo $s;
for($i=0;$i<=$s/10;$i++)
{
  $q=0;
  $page = array(imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200),imagecreate(760,1200));	
  for($y=0;$y<=2;$y++)
  {                                                                                                                                                                  
	$b=0;
	for($x=1;$x<=10;$x++)
	{
		$k=$x+10*($i);
		$dest = @imagecreatefrompng("barcode$k.png");	
		@imagecopymerge($page[$i], $dest, 20+$q, $b, 0, 0, 170, 95, 100);
		$b=$b+102;
		
		
	}
	$q=$q+290;
  }

 //header("Content-type: image/jpeg");
 //imagejpeg($page,null,100);
 imagejpeg($page[$i], "bar$i.jpeg",100);
}
$save=$i;
$_SESSION["save"]=$save;
?>
<html>
<body>
<div style='float:right; margin-top:50px;' >
<button type="button" style="height:100px; width:100px;"><a href="new1.php">Print</a></button>
<a href="new1.php">Print</a>

</div>
<div>
<?php
for($i=0;$i<=$s/10;$i++){
print "<img src='bar$i.jpeg'>";
}?>
</div>
</body>
</html>
<?php
for($i=0;$i<=$s/10;$i++)
{
for($x=1;$x<=10;$x++)
	{
		$k=$x+10*($i);
		@$file= "barcode$k.png";
		@unlink($file);
	}
	//$file1="bar$i.jpeg";
	//unlink($file1);
}
?>		
