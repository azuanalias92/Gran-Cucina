<?php
ob_start();
session_start();
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('gran_cucina', $conn);
 
$username = mysql_real_escape_string($username);
$query = "SELECT *
        FROM user
        WHERE U_ID = '$username';";
 
$result = mysql_query($query);
 
if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
{
    header('Location: index.php');
}
 
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
//$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
$password = md5($password);
if($password != $userData['U_PASSWORD']) // Incorrect password. So, redirect to login_form again.
{
    header('Location: index.php');
}else{ // Redirect to home page after successful login.
	session_regenerate_id();
	$_SESSION['sess_user_id'] = $userData['U_ID'];
	$_SESSION['sess_username'] = $userData['U_FNAME'];
	session_write_close();
	header('Location: home.php');
}
?>