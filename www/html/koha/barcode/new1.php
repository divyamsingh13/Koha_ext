<?php
session_start();
$m=$_SESSION["newsession"];
require('fpdf.php');
$pdf = new FPDF();
for($i=1;$i<=$m/10;$i++)
{
	$pdf->Image("bar$i.jpeg");
}
$pdf->Output();
for($i=1;$i<=$m/10;$i++)
{
	$file1= "bar$i.jpeg";
	unlink($file1);
}

?>
