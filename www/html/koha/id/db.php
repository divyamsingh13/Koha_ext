<?php 
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'koha_library';
$mysql = new mysqli($db_host,$db_user,$db_pass,$db_name);

if($mysql->connect_error){
	die("Error Connecting to DB.".$mysql->connect_errno. "Error -> " .$mysql->connect_error);
}

 ?>
