<?php
include "db.php";

$query2="SELECT * FROM accountlines WHERE  accounttype='F' ORDER BY timestamp ASC";
	//$run2=mysql_query($query2);

$run1 = mysql_query($query2);
echo mysql_error();

echo"
						<html>
						<table>
						<tr>
							<td>S no <td>
							<td>DATE<td>
							<td>member id<td>
							<td>name<td>
							<td>book ref no<td>
							<td>no of days late returned<td> 
							
							<td>Fine collected<td>
						</tr>
		
					";
					$sno=0;

while($row1= mysql_fetch_array($run1))
{	//echo $tb[0];
	$item=$row['itemnumber'];
	$query = "SELECT * FROM items WHERE itype='GB' AND itemnumber='$item'";
	$run= mysql_query($query);
	echo mysql_error();
	$row = mysql_fetch_array($run);
	$borrower=$row1['borrowernumber'];
	if(mysql_num_rows()>0)
	{

		
			
			if($row1['amount']>0)
			{	
				$fine=$row1['amount'];
				$borrower=$row1['borrowernumber'];

				$query4="SELECT * FROM old_issues WHERE itemnumber='$item' ";
				$run4=mysql_query($query4);
				$row3=mysql_fetch_array($run4);

				$query3="SELECT * FROM borrowers WHERE borrowernumber='$borrower'";
				$run3=mysql_query($query3);

				while($row2=mysql_fetch_array($run3))
				{
					$date=$row1['timestamp'];
					$memberid=$row2['caednumber'];
					$name=$row2['firstname']." ".$row2['surname'];
					$ref=$row['barcode'];
					$due=$row3['date_due'];
		  			$return=$row3['returndate'];
		  			$start_date = new DateTime($due);
					$since_start = $start_date->diff(new DateTime($return));
					$sno++;
						echo"
			
								<tr>
									<td>$sno<td>
									<td>$date<td>
									<td>$memberid<td>
									<td>$name<td>
									<td>$ref<td>
									<td><td>
									<td>$fine<td>

								</tr>
								</html>
							";
				}
		 	}
		
		
	}
}
	?>