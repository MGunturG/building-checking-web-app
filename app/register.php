<?php
include "config.php";
include "function_helper/db_query.php";
include "function_helper/class/User.php";

$_User = new User();

// this triggered when a form was submitted
if (isset($_POST['register_Submit'])) {
	// sanitize
	$username = $_POST['username'];
	$password = $_POST['password'];

	$current_data = get_data("select username from users where username = '$username'");
	if (count($current_data) === 0) {
		// insert new data
		$_User->AddNewUser($username, $password, 'maintainer');
		header("location:register.php?register_status=success");
	} else {
		header("location:register.php?register_status=failed");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>register</title>
</head>
<header>
	<?php
	// register_status is passed from function_helper/register.php
	// check on code line 12 and 17
	if (isset($_GET['register_status'])) {
		if ($_GET['register_status'] == "success") {
			echo "silakan login menggunakan akun baru anda";
		} else if ($_GET['register_status'] == "failed") {
			echo "username sudah teregister, gunakan username lain ya";
		}
	}
	?>
</header>
<body>
	<form method="POST" autocomplete="off">
	    <table>
	        <tr>
	            <td>Username</td>
	            <td><input type="text" name="username" required></td>
	        </tr>
	        <tr>
	            <td>Password</td>
	            <td><input type="password" name="password" required></td>
	        </tr>
	        <tr>
	            <td><input type="submit" name="register_Submit" value="register"></td>
	        </tr>
	    </table>
	</form>
</body>
</html>