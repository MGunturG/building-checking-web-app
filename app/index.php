<?php
// as usuall, start session
session_start();

// check if the user already logged in or not
if($_SESSION['login_status'] == "logged_in") {
	header("location:dashboard/index.php");
} else {
	header("location:login.php?login_status=not_logged_in");
}
?>