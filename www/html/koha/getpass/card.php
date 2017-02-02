<?php 
include 'db.php';
include 'Barcode39.php';
class student{
	public $bno,$cardnumber,$name,$address,$mob1,$mob2,$branch,$blood,$batch,$isdup;
	public function __construct($s){
		$this->bno = $s['borrowernumber'];
		$this->batch = 'Batch';
		$this->cardnumber = $s['cardnumber'];
		$this->name = $s["firstname"]." ".$s["surname"];
		$this->address = $s['address']." ".$s['address2'];
		$this->mob1 = $s['mobile'];
		$this->mob2 = $s['phone'];
		$this->branch = $s['sort1'];
		$this->blood = $s['sort2'];
		$this->city = $s['city'];
		$this->zipcode = $s['zipcode'];
		$this->isdup=false;
		$this->setBlood();
		$this->getBatch();
		$this->getBranch();
	}
	public 	function getDUPlevel(){
		
		$d=$this->cardnumber;
		$pos=strpos($d,'DUP');
		$level = -1;
		if($pos==0){
			return 0;
		}
		if($pos>0){
			return $d[0];
		}
		return $level;
	}
	public function getCustomBatch(){
		$c = $this->cardnumber;
		$f = substr($c,0,2);
		$s = $f+4;
		$b = "20".$f."-"."20".$s;
		return $b;
	}
	public function getCustomBranch(){
		$c = $this->cardnumber;
		$f = substr($c,2,2);
		$branch = false;
		switch ($f) {
			case '00':
				$branch = "CE";
				break;
			case '10':
				$branch = "CSE";
				break;
			case '13':
				$branch = "IT";
				break;
			case '31':
				$branch = "ECE";
				break;
			case '14':
				$branch = "MCA";
				break;
			case '32':
				$branch = "EI";
				break;
			case '40':
				$branch = "ME";
				break;
			case '21':
				$branch = "EEE";
				break;
			default:
				break;
		}
		return $branch;
	}
	public function setDUP($level){
		
	}
	public function setBlood(){
		global $conn,$mysql;
		$sql = "SELECT * FROM `borrower_attributes` WHERE `borrowernumber` = '$this->bno' AND `code` = 'BLD' ;";
			$result = $mysql->query($sql) or die(mysqli_error());
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$this->blood = $row['attribute'];
			//echo '??';
	}
	public function getBatch(){
		global $conn,$mysql;
		$sql = "SELECT * FROM `borrower_attributes` WHERE `borrowernumber` = '$this->bno' AND `code` = 'PAT_YEAR' ;";
			$result = $mysql->query($sql) or die(mysqli_error());
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$this->batch = $row['attribute'];
			//echo '??';
	}
	public function getBranch(){
		global $conn,$mysql;
		$sql = "SELECT * FROM `borrower_attributes` WHERE `borrowernumber` = '$this->bno' AND `code` = 'DEPT' ;";
			$result = $mysql->query($sql) or die(mysqli_error());
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$this->branch = $row['attribute'];
			//echo '??';
	}
}

function CreateICard($s){
	if($s!=NULL)
	include 'getpasstemplete.php';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ID Card Generator</title>
	<link href="http://allfont.net/allfont.css?fonts=arial-narrow" rel="stylesheet" type="text/css" />
	<style type="text/css">
		@font-face {
			font-family: "Bitstream Vera Serif Bold";
		}
		body{
			font-family: 'Arial Narrow',Arial, Helvetica, sans-serif;
			margin: 0;
			padding: 0;
			border: 0;
		}
		#container{
			margin: auto;
			position: relative;
			width:800px;
		}
		.grid2{
		    position: relative;
		    height: 140px;
		}
		.grid3 {
		    position: relative;
		    height: 60px;
		}
		.card{
			display: inline-block;
			padding: 1px;
			position: relative;
			display: inline-block;
			width: 48%;
			height: 260px;
		}
		.cright {
		    position:absolute;
		}
		.akglogo {
		    position: relative;
		    width: 35px;
		    height: 30px;
		    top: 20px;
		    left: 25px;
		}
		.akghead{
			font-family: 'Arial Narrow', arial;
			display: inline-block;
			position: relative;
			width: 295px;
			margin: auto;
			text-align: center;
			left: 30px;
			font-size: 14px;
			font-weight: 400;
		}
		.akginfo {
		    position: relative;
		    width: 300px;
		    text-align: center;
		    font-size: 10px;
		    left: 65px;
		    
		}
		.akgi {
		    margin: 1px 0px 4px 0px;
		}
		.pngimage{
			width: 90px;
			height: 130px;
		}
		.patimage {
		    position: relative;
		    left: 25px;
		    width: 100px;
		    top: -10px;
		}
		.icardtxt{
			text-align: center;
			font-weight: 600;
			font-size: 14px;
			text-decoration: underline;
		}
		.hinge{
			font-weight: 600;
			position: absolute;
			top: 39px;
			font-size: 14px;
			height: 70px;
		}
		.attr {
		    left: 135px;
		}
		.colons {
		    left: 213px;
		}
		.val1 {
		    width: 150px;
		    left: 220px;
		}
		
		.barcode {
		    top: 0;
		    position: relative;
		    left: 80px;
		}
		.dirsign{
			font-weight: 600;
		    position: relative;
		    top: -27px;
		    left: 310px;
		}
		.rules {
		    position: relative;
		    top: 20px;
		    font-size: 12px;
		    font-style: italic;
		    padding:18px
		}
		.icard {
		    position: relative;
		    height: 260px;
		}

		.address {
		    margin-left: 14px;
		    margin-top: 5px;
		}
		.a{
			position: relative;
			margin-right:5px; 
			font-size:14px;
			font-weight: 600;
		}
		.bld{
			margin-bottom:5px;
		}
	</style>
</head>
<body>
<div id="container">
	<div id="main" >
		<?php
		$xx  = array();
		if (isset($_POST['submit'])&&sizeof($_POST)>=2) {
			
			foreach ($_POST as $key => $value) {
				if($key!="submit")
				array_push($xx, $value);
			}
		}
		//print_r($xx);/*
		foreach ($xx as $sid) {
			
			$cno = trim($sid);
			$result = $mysql->query("SELECT * from `borrowers` WHERE `cardnumber` = '$cno' ;");
			//$result = $mysql->query("SELECT * from `patronimage`;");
			
			$s=NULL;
			if($result){
				$row = $result->fetch_array(MYSQLI_ASSOC);
				//var_dump($row);
				//echo 'In IF';
				//var_dump($row);
				if ($row!=NULL) {
					$s = new student($row);
				}
			}

			CreateICard($s);
		}
		 ?>
	</div>
</div>
</body>
</html>

