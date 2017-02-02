
<style>
body{margin:0em;}
.wid{
	width:20em;
	padding-bottom:3em;
	text-align:center;}
.leftmost{
	text-align: center;
	margin-left: 64px;
	/*background: lightblue;*/
	margin-right: 42px;
	margin-top: 0;
	padding-top: 0;
	width: 163px;
	height: 104px;
	float: left;
	}

.margin-class{
	margin-top:34px;
}

</style>

<?php
session_start();
include "db.php";

$r1=$_POST["r1"];
$r2=$_POST["r2"];

//echo "HELLO";
	$f=1.0;
	$query="SELECT * FROM table1 where barcode>='$r1' and barcode<='$r2' ";
	$run=mysql_query($query);
	if($run)
	{
	$c=1;

	?>  
	<!-- <table>
	<tr> -->
	<div style="height: 34px; width: 832px; background: ;"></div>
	<div style="height: 1043px; width: 832px;">
	<?php 
	while($data=mysql_fetch_assoc($run))
	{
		$ref=$data['reference'];
		$call=$data['call_number'];
		$bar=$data['barcode'];
		$author=$data['author_name']; 

	
		for($i=1; $i<100; $i++) {

			if($c == ((30*$i) + 1) || $c == ((30*$i) + 2) || $c == ((30*$i) + 3)) { ?> 
				<div class="leftmost margin-class"> <?php 
				break;
			} 
			else {
				?> 
				<div class="leftmost"> <?php
				break;

			}
		} ?>
			<?php echo $ref;?>	<br>
			<?php echo $call;?>	<br>
			<?php echo $bar;?>	<br>
			<?php echo $author;?>	<br>
		</div>
	<?php
	if($c%3==0) echo "<br>"; 

	$c++;
	}
	?> 
	</div>
	<?php
	}
?>