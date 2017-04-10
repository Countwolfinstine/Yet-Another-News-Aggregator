<?php 
extract($_GET);
session_start();
include("config.php"); 

//echo $userName;
      $username = mysqli_real_escape_string($db,$userName);
      $mypassword = mysqli_real_escape_string($db,$password); 
      
      $sql = "SELECT id FROM admin WHERE username = '$username' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);	
      if($count == 1) {
        	$_SESSION['login_user'] = $username;
			$id = intval($row['id']);
			$_SESSION['id'] =$id;
				
			echo $username." id = ".$id;
      	}
      else {
        	$error = "Your Login Name or Password is invalid";
      		echo $error;	
      }
   

?>