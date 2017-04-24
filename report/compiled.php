


<?php
include "db.php";
$from=$_GET['from'];
$to=$_GET['to'];
$query = "SELECT * FROM issues WHERE issuedate>='$from' AND issuedate<='$to'";
$quer = "SELECT * FROM old_issues WHERE issuedate>='$from' AND issuedate<='$to'";
echo mysql_error();
$query2 = "SELECT * FROM old_issues WHERE returndate>='$from' AND returndate<='$to'";
echo mysql_error();
$run1 = mysql_query($query);
$ru = mysql_query($quer);
echo mysql_error();
$run2 = mysql_query($query2);
echo mysql_error();
$issue = mysql_num_rows($run1) + mysql_num_rows($ru);
$returned = mysql_num_rows($run2);
$morethanfive=0;
$lessthanfive=0;
echo "<h1 align='center'> Details Of Books Delayed(Less Than And Greater Than 5 Days) </h1>";
while($row = mysql_fetch_array($run2))
{
	$due=$row['date_due'];
	$return=$row['returndate'];
	
	if($due < $return)
		{
			$start_date = new DateTime($due);
			$since_start = $start_date->diff(new DateTime($return));
			if($since_start->days > 5)
				$morethanfive++;
			elseif($since_start->days > 0 && $since_start->days < 5)
				$lessthanfive++;

		}
}

$totalfine=0;
$books=0;
$query3 = "SELECT * FROM accountlines WHERE date>='$from' AND date<='$to' AND accounttype='F'";
$run3 = mysql_query($query3);
echo mysql_error();
while($row2 = mysql_fetch_array($run3))
{
	  $fine=$row2['amount'];
	 $totalfine+=$fine;
	 if($fine>0)
	 	 $books++;


}
echo "<div align='center' id='print'><input type='button' value='PRINT' onclick='printpage()' class='myButton' id='print'><br/></div>";

?>
<html>
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
<table>
<tr>
	<td>Period<td>
	<td>No. of books issued<td>
	<td>No. of books returned<td>
	<td>Less than 5 days delayed<td>
	<td>More than 5 days delayed<td> 
	<td>No. of books fined<td>
	<td>Fine collected<td>
</tr>
<tr>
	<td><?php echo $from;?> - <?php echo $to;?><td>
	<td><?php echo $issue;?><td>
	<td><?php echo $returned;?><td>
	<td><?php echo $lessthanfive;?><td>
	<td><?php echo $morethanfive;?><td> 
	 <td><?php echo $books;?><td>
	<td><?php echo $totalfine;?><td> 
</tr>
</html>
