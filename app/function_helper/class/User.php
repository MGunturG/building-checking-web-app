<?php
class User {
	// add new user
	function AddNewUser($username, $password, $role) {
		// run_query function was included on function_helper/db_query.php
		run_query("insert into users (username,password,role) values ('$username','$password','$role')");
	}
}
?>