<!DOCTYPE html>
<html>
<link rel="stylesheet" href="new.css" type="text/css" media="print" />
<script type="text/javascript">

function init()
{
	document.getElementById("loader").style.visibility="hidden";
}
// function init()
// {
// 	document.getElementById("loader").style.visibility="visible";
// }

	function show()
	{
		
		var xmlhttp;
		var from = document.getElementById("fromdate").value;
		var to = document.getElementById("todate").value;
		document.getElementById("loader").style.visibility="visible";
// }
		//var type = document.getElementById("report").value;
		
		if(window.XMLHttpRequest)
		{
			//code for IE7,firefox,chrome,opera,safari	
			
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
			xmlhttp.open("GET","compiled.php?from="+from+"&to="+to,true)
			xmlhttp.send();	
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
			{
				document.getElementById("loader").style.visibility="hidden";
				document.getElementById("show").innerHTML=xmlhttp.responseText;
			}
		}
	}

	function printpage()
  	{
  		window.print()
  	}


</script>
<style>
	.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<head>
	<title>reports</title>
</head>
<body onload="init();">
<div id="form">
	<label>From Date</label>
	<input type='date' id='fromdate'></input>
	<br></br>
	<label>To Date</label>
	<input type='date' id='todate'></input>
	<br>
	<!-- <label>Report type</label>
	<select id="report" onchange='book();'>
		<option value="">SELECT</option>
		<option value="1">REPORT 1</option>
		<option value="2">REPORT 2</option>
		<option value="3">REPORT 3</option>
	</select> -->
	
	<input type="submit" name="" onclick="show();">
</div>
<div id="show"></div>
 <div class="loader" id="loader"></div>
</body>
</html>