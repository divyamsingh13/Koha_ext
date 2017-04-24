<script>
	function printpage()
  	{
  		window.print()
  	}
</script>
<style>
	table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
td {
    text-align: center;
}
</style>


<?php
echo "<script>alert('1')</script>";
include "db.php";
$from=$_GET['from'];
$to=$_GET['to'];
$btype=$_GET['btype'];
if($btype=='GB')
	echo "<h1 align='center'>Fine Collection Record For General Books</h1>";
elseif($btype=='REF')
	echo "<h1 align='center'>Fine Collection Record For Reference Books</h1>";
elseif($btype=='BB')
	echo "<h1 align='center'>Fine Collection Record For Book Bank Books</h1>";
elseif($btype=='TB')
	echo "<h1 align='center'>Fine Collection Record For Question Papers</h1>";


echo "<div align='center' id='print'><input type='button' value='PRINT' onclick='printpage()' class='myButton' id='print'><br/></div>";

$query = "SELECT * FROM items WHERE itype='$btype'";
$dif=0;
$run1 = mysql_query($query);
//echo mysql_error();
// echo "<h1> </h1>";
echo"
						<html>
						<table>
						<tr>
							<td>S no <td>
							<td>DATE<td>
							<td>member id<td>
							<td>name<td>
							<td>Ref No.<td>
							<td>due date<td>
							<td>return date<td> 
							
							<td>Fine collected<td>
						</tr>
		
					";
					$sno=0;

while($row= mysql_fetch_array($run1))
{	//echo $tb[0];
	$item=$row['itemnumber'];
	$query2="SELECT * FROM accountlines WHERE itemnumber='$item' AND accounttype='F' ORDER BY timestamp ASC";
	$run2=mysql_query($query2);
	//echo mysql_error();
	

	while($row1=mysql_fetch_array($run2))
	{
		
		if($row1['amount']>0)
		{	
			$fine=$row1['amount'];
			$borrower=$row1['borrowernumber'];

			$query4="SELECT * FROM old_issues WHERE itemnumber='$item' AND borrowernumber='$borrower' AND returndate>='$from' AND returndate<='$to'"; //changed from $query4="SELECT * FROM old_issues WHERE itemnumber='$item' AND borrowernumber='$borrower';
			$run4=mysql_query($query4);
			$row3=mysql_fetch_array($run4);
			echo mysql_error();
			$query3="SELECT * FROM borrowers WHERE borrowernumber='$borrower'";
			$run3=mysql_query($query3);

			while($row2=mysql_fetch_array($run3))
			{
				$date=$row1['timestamp'];
				$memberid=$row2['cardnumber'];
				$name=$row2['firstname']." ".$row2['surname'];
				$ref=$row['itemnumber'];
				$due=$row3['date_due'];
				
	  			$return=$row3['returndate'];
	  			if($due<$return)
	  			{
	  				$start_date = new DateTime($due);
					$dif = $start_date->diff(new DateTime($return));
					
				}
			
			



	  	// 		$due=explode(str($due));
	  	// 		$due=$due[0];
	  	// 		$return=explode(str($return));
	  	// 		$return=$return[0];
	  	// 		$start_date = strtotime($due);
	  			
	  	// 		$end_date=strtotime($return);
	  			
	  	// 		$diff=$end_date-$start_date;
				// $since_start = round(abs($diff)/86400);
				$sno++;
					echo"
		
							<tr>
								<td>$sno<td>
								<td>$date<td>
								<td>$memberid<td>
								<td>$name<td>
								<td>$ref<td>
								<td>$due<td>
								<td>$return<td>
																
								<td>$fine<td>

							</tr>
							</html>
						";
			}
	 	}
	}
		

}
	?>