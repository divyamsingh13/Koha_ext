<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="output.css">

<?php        
 ob_start();
$servername= "localhost";
$username= "root";
$passwd= "";
$db= "koha";

$conn=mysqli_connect($servername,$username,$passwd,$db);
var_dump($conn);
if(!$conn)
	die("Connection Failed".mysqli_connect_error());
 if(isset($_POST['submit']))
 {
	 
	 $st_id=$_POST['stnumber'];
	 $st_id_begg=$_POST['begg'];
	 $st_id_end=$_POST['end'];
	if(empty($st_id)&&isset($st_id_begg)&&isset($st_id_end)){
	 
	 
	 include 'Barcode39.php';
	 error_reporting(0);
	echo "series";
	 for($i=$st_id_begg;$i<=$st_id_end;$i++){
	 include "code.php";
	 }
	 
}
 else{
 	echo "solo";
 	include 'Barcode39.php';
	 error_reporting(0);
	 include "code_solo.php";}
 }
?>
