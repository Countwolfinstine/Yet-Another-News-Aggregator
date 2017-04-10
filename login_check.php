<?php 
	 session_start();
	if (isset($_SESSION['id'])) { 
	 	
		echo $_SESSION['login_user'];
		
	} 
	else {
		echo "-1";
	}
?>