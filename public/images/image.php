<?php
$form_id = $_GET["id"];
//$imageId = $_GET["imageid"];

//$path = __DIR__.'/../../app/storage/students/' . $form_id . '/images/profile/' . $imageId; students/0001/Photo.jpg

if($form_id=='missing')
	$path = __DIR__.'/not_found.jpg';
else
	$path = __DIR__.'/../../storage/' . $form_id; 

 // Prepare content headers
$finfo = finfo_open(FILEINFO_MIME_TYPE); 
$mime = finfo_file($finfo, $path);
$length = filesize($path);

header ("content-type: $mime"); 
header ("content-length: $length"); 

// @TODO: Cache images generated from this php file

readfile($path); 
exit;
?> 