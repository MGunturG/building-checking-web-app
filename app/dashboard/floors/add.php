<?php
session_start();

// check if the user already logged in or not
if($_SESSION['login_status'] != "logged_in") {
	header("location:../../login.php?login_status=not_logged_in");
}

include "../../config.php";
include "../../function_helper/db_query.php";
include "../../function_helper/class/Floor.php";

$_Floor = new Floor();

// this triggered when a form was submitted
if (isset($_POST['floor_Submit'])) {
	$floor_name = $_POST['floor_Name'];

	// get current data, later to check if there are already exists data
	$current_data = get_data("select floor_name from floors where floor_name = '$floor_name'");

	if (count($current_data) === 0) { // if there is no data
		$_Floor->AddNewFloor($floor_name); // then add new data
		header("location:add.php?status=success");
	} else {
		header("location:add.php?status=existed");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add floor</title>
</head>
<body>
	<header>
	<?php
	if (isset($_GET['status'])) {
		if ($_GET['status'] == "success") {
			echo "floor added!";
		} else if ($_GET['status'] == "existed") {
			echo "floor already exist!";
		}
	}
	?>
	</header>
	<p>please use the following criteria, e.g. you want to add new floor, floor 1. you must
		write it e.g. Floor 1. With capital on first word followed with floor number.
	<form method="POST" autocomplete="off">
	    <table>
	        <tr>
	            <td>Add new floor</td>
	            <td><input type="text" name="floor_Name" required></td>
	        </tr>
	        <tr>
	            <td><input type="submit" name="floor_Submit" value="add new floor"></td>
	        </tr>
	    </table>
	</form>
</body>
</html>