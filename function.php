<?php

function getListOfFile($dir)
{
	/*
	  Получаю в массив $result все файлы из требуемой директории.
  	Если в будущем мне понадобитьсься вывести разные таблицы по директориям
		я смогу это легко сделать инициализируя директории как переменные.
		example $nameOfDir2 = "uploads2";
	*/
	$nameOfDir = "storage/";
	return $result = glob($nameOfDir.'*.*');
}

//Метод загрузки файлов.

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

// Метод удаления файлов.

function removeFile($dir, $fname)
{
	if($dir && $fname)
	{
		unlink($fname);
		return true;
	}
	else {
		return false;
	}
}

// Метод для получения размера файла, по умолчанию в килобайтах.

function getSizeOfFile($dir)
{
	$nameOfDir = "storage/";
	$result = glob($nameOfDir.'*.*');

	foreach ($result as $key) {
		$fileSize[] = (filesize($key) . "\n");
	}
  return $fileSize;
}



// function convFileSize($size)
// {
// 	$fsize = $size;
// 	if($fsize >= 1024 && $fsize < 1024*1024)
// 	{
// 		$fsize = round($fsize / 1024, 2).' KB';
// 	} elseif ($fsize >= 1024*1024)
// 	{
// 		$fsize = round($fsize / 1024 / 1024, 1).' MB';
// 	} else
// 	{
// 		$fsize = $fsize.' B';
// 	}
// 	return $fsize;
// }

// function getPerms($file)
// {
// 	if(0777 === fileperms($file))
// 	{
//   	return true;
//   } else
//   {
//   	return false;
//   }
// }
?>
