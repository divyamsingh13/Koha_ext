<?php $sql = "SELECT * FROM `borrowers` WHERE `cardnumber` = '$st_id'";
			$result = mysqli_query($conn,$sql) or die(mysqli_error());
			//($result);
			$row = mysqli_fetch_array($result);
			var_dump($row);
			//$bld=$dept=$dept = '';
			$sql = "SELECT `borrowernumber` FROM `borrowers` WHERE `cardnumber` = '1410007'";
			$result = mysqli_query($conn,$sql) or die(mysqli_error());
			$bn = mysqli_fetch_array($result);
			$bn = trim($bn['borrowernumber']);
			echo "\n".$bn;
			$sql = "SELECT * FROM `borrower_attributes` WHERE `borrowernumber` = $bn";
			$r2 = mysqli_query($conn,$sql) or die(mysqli_error());
			$r4 = mysqli_fetch_array($r2);
			var_dump($r4);
			echo '??';
			while ($r = mysqli_fetch_assoc($xxx)) {
				if($r['code']=='BLD'){
					$bld=$r['attribute'];
					echo $bld;
				}
				if($r['code']=='DEPT'){
					$dept=$r['attribute'];
					echo $dept;
				}
				if($r['code']=='PAT_YEAR'){
					$year=$r['attribute'];
					echo $year;
				}
			}
			if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
			
	               $name =  $row['firstname'];
				   $stnumber =  $row['cardnumber'];
				   $course =  "xx";//$row['sort1'];
				   //$year =  $row['sort2'];
				   $blood =  $bld;//;$row['blood'];
				   $address =  $row['address'];
					
					if(isset($st_id)&&(!empty($st_id)))
					//set Barcode39 object
					$location='barcode/';
					{	
						$data=$st_id;	
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
<img src="<?php echo $stnumber; ?>.png" id="pic">
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