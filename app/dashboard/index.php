// checking if the user already logged in or not
<?php
// session, as usually
session_start();

// check if login_status on session history is "logged_in" or not
// if login_status NOT "logged_in", the redirect to login page
// (location on ../index.php) and pass login_status to "not_logged_in"
if ($_SESSION['login_status'] != "logged_in"); {
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
<a href="logout.php">click here to logout</a>
</body>
</html>