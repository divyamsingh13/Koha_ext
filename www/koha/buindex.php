<?php 
$abc = "database.csv";
$xyz = "new.csv";
$a = fopen($abc, "r+");
$b = fopen($xyz, "r+");
// $r = "ad.txt";
// $s = "bd.txt";
// $c = fopen($r, "w+");
// $d = fopen($s, "w+");
$new = file($xyz,FILE_IGNORE_NEW_LINES);
$lol = file($abc,FILE_IGNORE_NEW_LINES);
// sort($lol);
// sort($new);
$haha=0;
$notindb = array();
$counter=0;
echo '<p style="color:green;">';
echo "Not in New File<br>";
foreach ($lol as $key) {
	$haha=0;
	if($key!=""){
		foreach ($new as $newkey) {
			if($key === $newkey){
				$haha=1;
				break;
			}
		}
	}
	if($haha==0){
		$counter++;
		echo $counter." - ".$key."<br>";
		// array_push($notindb,$key);
	}
}
echo '</p>';

echo '<p style="color:red;">';
echo "Not in Database CSV<br>";
$notinnew = array();
$counter=0;
foreach ($new as $key) {
	$haha=0;
	if($key!=""){
		foreach ($lol as $newkey) {
			if($key === $newkey){
				$haha=1;
				break;
			}
		}
	}
	if($haha==0){
		$counter++;
		echo $counter." - ".$key."<br>";
		// array_push($notindb,$key);
	}
}
echo '<p style="color:red;">';
 //print_r($notindb); 
echo '</p>';

echo '<p style="color:green;">';
 //print_r($notinnew); 
echo '</p>';

// var_dump($new);
// while($temp = fgets($a)){
// 	array_push($abca, $temp);
// }
// while($temp = fgets($b)){
// 	array_push($xyza, $temp);
// }
// var_dump($abca);
echo "<br>"."<br>"."<br>"."<br>";
// var_dump($xyza);
 ?>