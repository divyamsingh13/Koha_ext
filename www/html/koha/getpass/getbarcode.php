<?php 
include "Barcode39.php"; 
$x = trim($_GET['text']);
$bc = new Barcode39($x);
$bc->barcode_text = false;  
$bc->draw();
 ?>