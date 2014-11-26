<?php

/*
 * Following code will create a new case row
 * All case details are read from HTTP Post Request
 */

// check for required fields
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['email']) && isset($_POST['address'])  && isset($_POST['tel_num'])) 
{
	// connecting to db;
	$con=mysqli_connect("localhost","root","","gran_cucina");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//checking
	//if($password1 != $password2)
		//header('Location: registration.html');
 
	if(strlen($username) > 30)
		header('Location: add_user.html');
	
	$fname = mysqli_real_escape_string($con, $_POST["fname"]);
	$lname = mysqli_real_escape_string($con, $_POST["lname"]);
	$username = mysqli_real_escape_string($con, $_POST["username"]);
	$password = md5($_POST["password"]);
	$password = mysqli_real_escape_string($con, $password );	
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$address = mysqli_real_escape_string($con, $_POST["address"]);
	$tel_num = mysqli_real_escape_string($con, $_POST["tel_num"]);
	//print_r( $_POST ) ;
	

    // mysql inserting a new row
    $sql= "INSERT INTO user(U_ID,U_PASSWORD,U_FNAME,U_LNAME,U_ADDRESS,U_TEL,U_EMAIL) 
	VALUES ('$username','$password','$fname','$lname','$address','$tel_num','$email')";

	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Successful";

	mysqli_close($con);
	
}
    
?>