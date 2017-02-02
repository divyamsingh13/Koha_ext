<?php
session_start();
$m=$_SESSION["save"];
require('fpdf.php');
$pdf = new FPDF();
for($i=0;$i<=$m-1;$i++)
{
	$pdf->Image("bar$i.jpeg");
}
$pdf->Output();
for($i=0;$i<=$m-1;$i++)
{
	$file1= "bar$i.jpeg";
	unlink($file1);
}

?>
