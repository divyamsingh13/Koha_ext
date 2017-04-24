
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
</style><?php
include "db.php";
$from=$_GET['from'];
$to=$_GET['to'];
$query = "SELECT * FROM items ";
// $query4 = "SELECT *
// FROM issues i1
// JOIN items i2 ON i1.itemnumber = i2.itemnumber JOIN old_issues i3 ON i1.itemnumber=i3.itemnumber
// WHERE i2.itype = 'TB'";
//$query2 = "SELECT * FROM old_issues WHERE returndate>='2016-12-01 00:00:00' AND returndate<='2016-12-31 23:59:59'";
echo "<h1 align='center'>Status Of Books Issued/Returned From ".$from." to ".$to."</h1>";
echo"
						<html>
						<table>
						<tr>
							<td>S no </td>
							<td>Type of book</td>
							<td>Total no. of books issued</td>
							<td>Total no. of books returned</td>
							<td>Less than 5 days</td>
							<td>Greater than five days</td> 
						</tr>
		
					";
$run1 = mysql_query($query);
$gb[4];
$ref[4];
// $tb[4];
$bb[4];
for($i=0;$i<4;$i++)
{
	$gb[$i]  = 0;
	$ref[$i] = 0;
	// $tb[$i] = 0;
	$bb[$i] = 0;
}
$i=0;
// //echo $tb[0];
while($row= mysql_fetch_array($run1))
{	//echo $tb[0];
	
	$item=$row['itemnumber'];
	$query2="SELECT * FROM issues WHERE itemnumber='$item' AND issuedate>='$from' AND issuedate<='$to'";
	
	$query3="SELECT * FROM old_issues WHERE itemnumber='$item' AND returndate>='$from' AND returndate<='$to'";
	
	$run2=mysql_query($query2);
	
	$run3= mysql_query($query3);
	// if($row['itype']=='TB')
	// {
	// 	$i++;
	// 		echo $i." ";
	// }
	if(mysql_num_rows($run2)!=0)
	{
		// if($row['itype']=='TB')
		// 	echo "1";
		
		
	

		if($row['itype']=='GB')
		{
			$gb[0]++;

		}
		if($row['itype']=='REF')
			$ref[0]++;
		// if($row['itype']=='TB')
		// 	$tb[0]++;
		if($row['itype']=='BB')
			$bb[0]++;
	}
	else
	{
		$query4="SELECT * FROM old_issues WHERE itemnumber='$item' AND issuedate>='$from' AND issuedate<='$to'";
		$run4 = mysql_query($query4);
		if(mysql_num_rows($run4)!=0)
		{
			if($row['itype']=='GB')
			{
				$gb[0]++;

			}
			if($row['itype']=='REF')
				$ref[0]++;
			// if($row['itype']=='TB')
			// 	$tb[0]++;
			if($row['itype']=='BB')
				$bb[0]++;
		}
			
	}

	if(mysql_num_rows($run3)!=0)
	{
		$flag=0;
$row3=mysql_fetch_array($run3);

      	$due=$row3['date_due'];
	  	$return=$row3['returndate'];
	
		if($due < $return)
		{
			$start_date = new DateTime($due);
			$since_start = $start_date->diff(new DateTime($return));
			if($since_start->days > 5)
				$flag = 1;
			elseif($since_start->days > 0 && $since_start->days < 5)
				$flag = 2;

		}

		if($row['itype']=='GB')
		{
			$gb[1]++;
			if($flag==1)
				$gb[2]++;
			elseif($flag==2)
				$gb[3]++;
		}
		if($row['itype']=='REF')
		{
			$ref[1]++;
			if($flag==1)
				$ref[2]++;
			elseif($flag==2)
				$ref[3]++;
		}
		// if($row['itype']=='TB')
		// {
		// 	$tb[1]++;
		// 	if($flag==1)
		// 		$tb[2]++;
		// 	elseif($flag==2)
		// 		$tb[3]++;
		// }
		if($row['itype']=='BB')
		{
			$bb[1]++;
			if($flag==1)
				$bb[2]++;
			elseif($flag==2)
				$bb[3]++;
		}
	}
}
echo "<div align='center' id='print'><input type='button' value='PRINT' onclick='printpage()' class='myButton' id='print'><br/></div>";
echo "<tr>
		<td>1.</td>
		
		<td>General Books</td>
		<td>$gb[0]</td>
		<td>$gb[1]</td>
		<td>$gb[2]</td>
		<td>$gb[3]</td>
	  </tr>"; 
echo "<tr>
		<td>2.</td>
		<td>Reference Books</td>
		<td>$ref[0]</td>
		<td>$ref[1]</td>
		<td>$ref[2]</td>
		<td>$ref[3]</td>
	  </tr>";
echo "<tr>
		<td>3.</td>
		<td>Book Bank Books</td>
		<td>$bb[0]</td>
		<td>$bb[1]</td>
		<td>$bb[2]</td>
		<td>$bb[3]</td>
	  </tr>";
// echo "<tr>
// 		<td>4.</td>
// 		<td>Question papers & solution</td>
// 		<td>$tb[0]</td>
// 		<td>$tb[1]</td>
// 		<td>$tb[2]</td>
// 		<td>$tb[3]</td>
// 	  </tr>";
// echo "1";

?>
