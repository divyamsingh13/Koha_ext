<?php
include 'db.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM `patronimage` WHERE `cardnumber`='$id' ;";
  $result = $mysql->query("$sql");
  $row = $result->fetch_array(MYSQL_ASSOC);
  //var_dump($row);
  header("Content-type: image/png");
  echo $row['imagefile'];
  //<img src="data:image/jpeg;base64,<?php echo base64_encode( $row['imagefile'] ); ?" alt="Image Not Found" />
?>
