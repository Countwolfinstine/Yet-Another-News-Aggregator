<?php
	set_time_limit(0);
	header("Content-type:text/event-stream");
	header("Cache-Content: no-cache");
	require_once("config.php");
	ob_start();
	
	$query1 = "SELECT * from posts";
	$res1 = $db->query($query1);
	$old_row_count = $res1->num_rows;
	
	while(true){
		$res2 = $db->query($query1);
		$new_row_count =  $res2->num_rows;
		if($new_row_count > $old_row_count){
			$new_posts_count = $new_row_count - $old_row_count;
			# get all the "new" posts from the database;
			$query2 = "SELECT * FROM posts ORDER BY id DESC LIMIT ".$new_posts_count;
			$res3 = $db->query($query2);
			$data = array();
			
			while($row = $res3->fetch_assoc()){
			$post = array(
				"username"=>$row['username'],
				"title"=>$row['title'],
				"content"=>$row['content'],
				"id"=>$row['id']
				);
			array_push($data, $post);
			
			}	
			echo "event:received\n";
			echo "retry:10000\n";
			echo "data: ".json_encode($data)."\n\n";
			//echo "data: ".json_encode($data)."\n\n";
			ob_flush();
			flush();
			$old_row_count = $new_row_count;
			}
		sleep(3);

	}



?>