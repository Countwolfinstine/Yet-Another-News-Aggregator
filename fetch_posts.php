<?php
	session_start();
	include_once 'config.php';
	$num_rows = mysqli_query($db,"SELECT COUNT(*) FROM posts");
	if($num_rows>$_GET['id']){
		$id1 = $_GET['id'];
		$id2 = $id1 -10;
		$arr = array();
		$file_list = mysqli_query($db, "SELECT * FROM posts WHERE id <= '$id1' and id > '$id2'");
		while($row = $file_list->fetch_assoc()){
				$row_array['id'] = $row['id'];
				$row_array['username'] = $row['username'];
				$row_array['title'] = $row['title'];
				$row_array['content'] = $row['content'] ;
				array_push($arr,$row_array);
		}	
		echo json_encode($arr);
	}
?>