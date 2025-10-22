<?php
// session, as usually
session_start();

// check if user already logged in or not
// using session. "login_status" passed from
// login.php on line 21
if ($_SESSION['login_status'] != "logged_in") {
	header("location:../index.php?login_status=not_logged_in");
} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>
</head>
<body>
<h2>yes, this is dashboard page</h2>
<h4>also, welcome aboard, <?php echo $_SESSION['username']; ?>!</h4>
<h4>and your role is <?php echo $_SESSION['user_role']; ?>.</h4>
<a href="../function_helper/logout.php">click here to logout</a>
</body>
</html>