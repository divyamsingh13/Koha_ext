<?php 
//var_dump($_GET);
include "Barcode39.php"; 
$x = trim($_GET['text']);
$bc = new Barcode39($x);
$bc->barcode_text = false;  
$bc->draw();
 ?>
