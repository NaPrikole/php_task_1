<?php

function getListOfFile($dir)
{
	$nameOfDir = "uploads/";
	return $result = glob($nameOfDir.'*.*');
}

function uploadFile($uploadPath)
{
	if($uploadPath)
	{
		$uploadfile = $uploadPath . basename($_FILES['userfile']['name']);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
			return $uploadfile;
		}
	} else
	  {
		  return false;
 	  }
}

function removeFile($dir, $fileName)
{
	if($dir && file_exists($fileName))
	{
		unlink($fileName);
		return true;
	}
	else {
		return false;
	}
}

function getSizeOfFile($dir)
{
	$nameOfDir = "uploads/";
	$result = glob($nameOfDir.'*.*');

	foreach ($result as $key) {
		$fileSize[] = (filesize($key) . "\n");
	}
  return $fileSize;
}

function sizeConverter($size)
{
	if($size >= 1024 && $size < 1024 * 1024)
	{
		$size = round($size / 1024, 2) . ' KB';

	}
	elseif ($size >= 1024 * 1024)
	{
		$size = round($size / 1024 / 1024, 1) . ' MB';
	}
	else
	{
		$size = $size . ' B';
	}
	return $size;
}

function getPerms($file)
{
	if(0777 === fileperms($file))
	{
  	return true;
  }
	else
  {
  	return false;
  }
}
?>
