<?php
// Declare variable to store host, DB user name & password
$host = "localhost";
$usern = "root";
$passw = "";

// Create connection to the DB
$con = mysqli_connect($host, $usern, $passw) or die(mysqli_error_connect());

// Create DB
$sql_db = "CREATE DATABASE gran_cucina";
mysqli_query($con, $sql_db);

// Select DB
mysqli_select_db($con, "case");

// Create Table
$sql_tb = "CREATE TABLE user
(
U_ID VARCHAR(25),
U_PASSWORD VARCHAR(50),
U_FNAME VARCHAR(25),
U_LNAME VARCHAR(25),
U_ADDRESS VARCHAR(100),
U_TEL VARCHAR(15),
U_EMAIL VARCHAR(50)
)";

mysqli_query($con, $sql_tb);

?>