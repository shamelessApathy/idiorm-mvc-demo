<?php


echo "Scanning directory \n";

// Get all files in current directory
$array = scandir(__DIR__);



// Take each file, check if it is a JPEG or not, if it is push it to a new array
$image_array = array();
foreach ($array as $image)
{
	$test_ext = explode('.', $image);
	if ($test_ext[1] === "jpeg")
	{
		array_push($image_array, $image);
	}
}



// Take each image. Compress the fuck out of it then re-save as same name
foreach ($image_array as $image)
{
	$size = filesize($image);
	if ($size != 0)
	{
		$compress = new Imagick($image);
		$compress->setImageCompressionQuality(0);
		$compress->writeImage($image);		
	}

	
}
?>