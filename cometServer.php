<?php 
	header("Content-type:text/event-stream");
	header('Cache-Control: no-cache');
	//header('Content-Type: application/json');
	ob_start();
	include("config.php");
	//include("login.php");
	if ($db->connect_error){
    	die("Connection failed: " . $db->connect_error);
	}
	$query1 = "SELECT * from posts";
	$res1 = $db->query($query1);
	# get the number of rows from the "post" table
	$old_row_count = $res1->num_rows;
	while(true){ 
		# run the query again to get the new_row_count;
		if(isset($_SESSION['id'])){
			$res2 = $db->query($query1);
			$new_row_count =  $res2->num_rows;
			console.log($_SESSION("login_user"));
			if($new_row_count > $old_row_count){
				$new_posts_count = $new_row_count - $old_row_count;
				# get all the "new" posts from the database;
				$query2 = "SELECT * FROM posts ORDER BY id DESC LIMIT ".$new_posts_count;
				$res3 = $db->query($query2);
				echo "event:changeInDB";
				$data = array();
				while($row = $res3->fetch_assoc()){
					$post = array(
						"id"=>$row['id'],
						"title"=>$row['title'],
						"username"=>$row['username'],
						"content"=>$row['content'],
						);
					# push all the "new" posts to data array;
					array_push($data, $post);
				}
				# flush the data;
				echo "data: ".json_encode($data)."\n\n";
				ob_flush();
				flush();
			}	
		}
		
		sleep(3);
	}	
	

?>
	