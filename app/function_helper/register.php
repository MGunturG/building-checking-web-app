<?php
include "../config.php";

// sanitize
$username = mysqli_real_escape_string($db_connection, $_POST['username']);
$password = mysqli_real_escape_string($db_connection, $_POST['password']);

// check if there is another user with same username
$data = mysqli_query($db_connection, "select username from users where username = '$username'");

if (mysqli_num_rows($data) > 0) { // if the query result has some return, possibly there is another user already registered
	// if there another user with same username, flag failed
	header("location:../register.php?register_status=failed");
} else {
	// else, input data to database
	$query = "insert into users (username,password,role) values ('$username','$password','maintainer')";
	if (mysqli_query($db_connection, $query) == true) {
		header("location:../register.php?register_status=success");
	} else {
		echo "Error submit formnya ";
	}
}
?>