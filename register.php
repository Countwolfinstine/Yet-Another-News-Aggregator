<?php 
	extract($_GET);
	include("config.php"); 
	//set validation error flag as false
	$error = false;
    $name = mysqli_real_escape_string($db,$name);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    $cpassword = mysqli_real_escape_string($db, $cpassword);
    ///name can contain only alpha characters and space
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    	echo $email_error;

    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    	echo $password_error;

    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    	echo $cpassword_error;

    }
    if (!$error) {
        if(mysqli_query($db, "INSERT INTO admin(username,Email_ID,passcode) VALUES('" . $name . "', '" . $email . "', '" .$password . "')")) 
        {
            $successmsg = "Successfully Registered!";
        	echo $successmsg;
        } 
        else {
            $errormsg = "Email Already exists";
        	echo  $errormsg;
        }

    }

?>