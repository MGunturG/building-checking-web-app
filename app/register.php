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
	<form method="POST" action="function_helper/register.php" autocomplete="off">
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
	            <td><input type="submit" value="register"></td>
	        </tr>
	    </table>
	</form>
</body>
</html>