<?php 
function setCustomBatch(){
		$c = "1410074";
		$f = substr($c,0,2);
		$s = $f+4;
		$b = "20".$f."-"."20".$s;
		return $b;
	}
	function getDUP(){
		
		$d="DUP110074";//$this->cardnumber;
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
	echo setCustomBatch();
	echo DUPlevel();
 ?>