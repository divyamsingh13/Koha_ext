<?php 
// Get real path for our folder
$rootPath = realpath('./folder');
// $imgfile=__DIR__."/folder/j.jpg";
// var_dump(getimagesize($imgfile));

class PhotoConverter{
	var $name,$ext,$height,$width,$maintainRatio,$newHeight,$newWidth;
	public function __construct($file) {
		
	}
}
// Initialize archive object
// $zip = new ZipArchive();
// $zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

function ptoid($photo){
	return explode('.',$photo)[0];
}

$zip = new ZipArchive();
$result = $zip->open('file.zip');
$filename = array();

if($result){
	echo $zip->numFiles;
	for ($i = 0; $i < $zip->numFiles; $i++) {
    	array_push($filename, $zip->getNameIndex($i));
 	}
 	$c="";
 	var_dump($filename);
 	foreach ($filename as $photoid) {
 		$t = substr($photoid, 0,strpos($photoid,'.'));
 		echo $t;
 		$c=$c.ptoid($photoid)." , $photoid
";
 	}
 	$zip->addFromString('test.txt', $c);
	$zip->close();
}

// Create recursive directory iterator
/** @var SplFileInfo[] $files *//*
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);

        // Add current file to "delete list"
        // delete it later cause ZipArchive create archive only after calling close function and ZipArchive lock files until archive created)
    }
}

// Zip archive will be created only after closing object
$zip->close();
*/
// Delete all files from "delete list"
?>

