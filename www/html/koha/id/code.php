<?php $sql = "SELECT * FROM `borrowers` WHERE `cardnumber` = '$i'";
			$result = mysqli_query($conn,$sql) or die(mysqli_error());
			//var_dump($result);

			/*if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result)){
	               $name =  $row['name'];
				   $stnumber =  $row['stnumber'];
				   $course =  $row['course'];
				   $year =  $row['year'];
				   $blood =  $row['blood'];
				   $address =  $row['address'];
					if(isset($i)&&(!empty($i)))
					//set Barcode39 object
					$location='barcode/';
					{	$data=$i;	
					$bc=new Barcode39($data);
					if($data!=NULL){
					$bc->draw($location.$data.".gif");
?>
<table>
<tr>
<td id="left">
<img src = "logo.png" id = "logo">
<div id="head"><b>AJAY KUMAR GARG ENGINEERING COLLEGE</b></div><br>
<div id="address_head">27th km Stone, Delhi-Hapur Bypass Road, Ghaziabad-201009<br>
Phones:(0121)27662841 to 2762851 Fax: 2761844,2761845<br></div><br>
<div id="id"><i><u><br>IDENTITY CARD</u></i><br></div><br>
<img src="logo.png" id="pic">
<div id="content"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b><?php echo $name;?><br>
<b>Student no.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $stnumber;?><br>
<b>Course/Bransh&nbsp;&nbsp;:</b><?php echo $course;?><br>
<b>Batch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b><?php echo $year;?><br><br><br>
<?php
	$location='barcode/';
	$image_name=$location.$data.".gif";
	echo "<div id=\"foot\"><img src='".$image_name."'id=\"bar_code\"><b>Director</b></div>";


 ?>

</td>

<td><div id="address">	
<b>Blood Group&nbsp;&nbsp;&nbsp;&nbsp;:</b><?php echo $blood;?><br>
<b>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $address;?></div><br><br>
<div id="rules"><center><b><u>Rules</b></u></center><br>
1.This card is non-transferable.<br>
2.Students must carry this card in the institute and should produce the same on demand.<br>
3.The loss of this card should be immediately repoted to the authorities.<br></div>
</td>
</tr>
<br>
<?php
}
			}
	 }
 }


 ?>