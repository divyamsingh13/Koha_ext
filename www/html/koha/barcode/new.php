<?php
require('fpdf.php');
$pdf = new FPDF();
$pdf->Image('qwe.jpeg');
$pdf->Output();
$file1= "qwe.jpeg";
unlink($file1);
?>