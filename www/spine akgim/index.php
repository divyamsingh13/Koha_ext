<?php
	/*******************************************************************************
	* AKGIM BARCODE GENERATOR                                                      *                    *
	*                                                                              *
	* Version: 1.00                                                                *
	* Date:    2016-09-17                                                          *
	* Developers:  ARCHIT AGRAWAL and DIVYAM SINGH                                                     *
	*******************************************************************************/
	session_start();
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
	.cl{height:400px; float:left; width:49%; }
	h1{background:#004053;height:80px;color:#FFFFFF;padding-top:30px;}
	.a{background:#0087A3;width:100%;height:300px;padding-top:30px;}
	.v{height:482px; width:2%; background:#fff; float:left;margin-top:21px;}
</style>
<title>Barcode Generator</title>
</head>

<body>
<h1 color=white align=center>Spine GENERATOR</h1>
<!--<div class="cl">
	<center>
		<h1>Enter number:</h1>
		<div class="a">
			<form method="post">
				<p><input type="text" name="barcode"></p>
    			<p><input type="submit" name="sub"></p>
			</form>
		</div>
	</center>
	
</div>-->
<div class="v"></div>
<div class="cl">
	<center>
		<h1>Enter Range(only 30 allowed):</h1>
		<div class="a">
        	<form method="post" action="vab-spine.php">
				<p><input type="number" name="r1"></p>
    			<p><input type="number" name="r2"></p>
    			<p><input type="submit" name="sub1"></p>
                
			</form>
        </div>
	</center>
</div>
</body>
</html>

