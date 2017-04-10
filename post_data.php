<?php
ob_start();
session_start();
include_once 'config.php';
if(isset($_SESSION['id'])!="") {
    $id = $_SESSION['id'];
	$count = intval(mysqli_fetch_array(mysqli_query($db, "SELECT post_count FROM admin WHERE id=".$id))['post_count']);
	$count = (string)($count +1);
	//echo $count."  id=".$id;
	try{		
			if(mysqli_query($db, "UPDATE admin SET post_count = '".$count."' WHERE id = '".$id."'")){
			$title = $_POST['title'];
			$para = $_POST['para'];
			mysqli_query($db, "INSERT into posts(username,title,content,time) VALUES('".$_SESSION['login_user']."','".$title."','".$para."','".date('Y-m-d H:i:s',time())."') ");

			header("Location: new_post.html");
		}
		else {
			echo mysql_error();
		}
			
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}	
?>
