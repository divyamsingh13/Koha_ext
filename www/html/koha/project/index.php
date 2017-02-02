<?php
	/*******************************************************************************
	* AKGEC BARCODE GENERATOR                                                      *                    *
	*                                                                              *
	* Version: 1.00                                                                *
	* Date:    2016-09-17                                                          *
	* Author:  Vaibhav Bansal                                                      *
	*******************************************************************************/
	session_start();
	include "Barcode39.php";
	$t=0;
	extract($_POST);
	for($x=@$r1; $x<=@$r2; $x++)
	{
		$t++;
	}
	$_SESSION["newsession"]=$t;
	if(isset($sub1))
	{
		$n=1;
		for($x=$r1; $x<=$r2; $x++)
		{
			@$bc=new Barcode39($x);
			$bc->draw("barcode$n.png");
			$n++;
		}
		header("location:bar1.php");
		
	}
		
	
	if(isset($sub))
	{
		@$bc=new Barcode39($barcode);
		$bc->draw("barcode.png");
		header("location:bar.php");
	}
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
<h1 color=white align=center>BARCODE GENERATOR</h1>
<div class="cl">
	<center>
		<h1>Enter number:</h1>
		<div class="a">
			<form method="post">
				<p><input type="text" name="barcode"></p>
    			<p><input type="submit" name="sub"></p>
			</form>
		</div>
	</center>
	
</div>
<div class="v"></div>
<div class="cl">
	<center>
		<h1>Enter Range:</h1>
		<div class="a">
        	<form method="post">
				<p><input type="text" name="r1"></p>
    			<p><input type="text" name="r2"></p>
    			<p><input type="submit" name="sub1"></p>
                
			</form>
        </div>
	</center>
</div>
</body>
</html>

