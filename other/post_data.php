<?php
try{
	$title = $_POST['title'];
	$para = $_POST['para'];
	$f = fopen("post_this_data.txt",'w') or die("Unable to open file!");
	fwrite($f,"__TITLE__\n");
	fwrite($f,$title."\n");
	fwrite($f,"__PARA__\n");
	fwrite($f,$para);
	fclose($f);
	echo "<h1>fwrite Successful</h1>";
}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
?>
