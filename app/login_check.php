<?php 
// start session
session_start();

// include config to connect database
include 'config.php';

// get data from submited form
$uname = $_POST['username'];
$passwd = $_POST['password'];

// query/get user data from database table
$get_data = mysqli_query($db_connection, "select * from users where username='$uname' and password='$passwd'");

// veriy if we got some data
$legit = mysqli_num_rows($get_data);

if ($legit > 0) { // if we get some data
	$_SESSION['username'] = $uname; // set current session username
	$_SESSION['status'] = "logged_in"; // set current user login status
	header("location:dashboard/index.php"); // redirect to dashboard/index.php
} else {
	header("location:index.php?login_status=failed"); // redirect to index.php with flag login status is failed
}
?>