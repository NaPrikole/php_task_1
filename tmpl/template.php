<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo TITLE; ?></title>
</head>
<body>
	<?php
		if($errors){
			foreach($errors as $err){
			 echo "<div style=\"background-color: red\">
				      <p>{$err}</p>
				   </div>";
			}
		} elseif($data){
			echo "<div style=\"background-color: lightgreen\">
				     <p>{$data}</p>
				  </div>";
		}
	?>
	<hr>
	<form enctype="multipart/form-data" action="" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
		<h2>Upload File</h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="userfile" id="fileSelect">
        <input type="submit" value="Upload">
        <p><strong>Note:</strong> max size of 2 MB.</p>
	</form>
	<br>
	<hr>
	<br>
	<table border="1" width="500">
		<thead>
		<tr>
			<th>Num</th>
			<th>File Name</th>
			<th>Size</th>
			<th>Command</th>
		</tr>
		</thead>
		<tbody>
			<?php
				$fileList = getListOfFile(UPLOADDIR);
				$fileSize = getSizeOfFile(UPLOADDIR);
				//var_dump($fileSize);
				//die;
				$number = 1;
				if($fileList){
					foreach($fileList as $file){
						$fname = $file;
						$i = $number;
						$i--;
					  $fsize = $fileSize[$i];
						$text = "<td>
									<form action=\"\" method=\"post\">
										<input type=\"hidden\" name=\"fname\" value=\"{$fname}\">
										<button type=\"submit\">Delete</button>
									</form>
								 </td>\n";
						echo "<tr align=\"center\">\n";
				    	echo "<td>{$number}</td>\n";
				    	echo "<td>{$fname}</td>\n";
				    	echo "<td>{$fsize}</td>\n";
				    	echo $text;
				    	echo "</tr>\n";
						$number++;
					}
				} else {
					echo "<tr align=\"center\">\n";
					echo "<td colspan=\"4\">Failed opening directory for reading.</td>\n";
					echo "</tr>\n";
				}
			?>
		</tbody>
	</table>
</body>
</html>
