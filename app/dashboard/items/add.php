<?php
// session, as usually
session_start();

// check if user already logged in or not
// using session. "login_status" passed from
// login.php on line 21
if ($_SESSION['login_status'] != "logged_in") {
	header("location:../index.php?login_status=not_logged_in");
} 

include "../../config.php";
include "../../function_helper/db_query.php";
include "../../function_helper/class/Item.php";

$_Item = new Item();

// get data
$data_item = run_query("select distinct item_name from items");
$data_floor = run_query("select distinct floor from items");
$data_area = run_query("select distinct area from items");

// this triggered when form was submitted
if (isset($_POST['item_Submit'])) {
	$item_name = ucwords($_POST['item_name']);
	$which_floor = ucwords($_POST['floor_name']);
	$which_area = ucwords($_POST['area_name']);

	// to check duplicate data on database
	$current_data = run_query("select * from items where item_name = '$item_name' and floor = '$which_floor' and area='$which_area'");

	if ($current_data && $current_data->num_rows == 0){ // if data doesn't exists
		$_Item->AddNewItem($item_name, $which_floor, $which_area); // insert new data
		header("location:add.php?status=success");
	} else {
		header("location:add.php?status=existed"); // else, dont insert new data
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Items</title>
</head>
<body>
	<header>
		<?php
		if (isset($_GET['status'])) {
			if ($_GET['status'] == "success") {
				echo "new data added!";
			} else if ($_GET['status'] == "existed") {
				echo "data already exist!";
			}
		}
		?>
	</header>

	<form method="POST">
		<div>
            <label>Pick Floor: </label>
			<input type="text" list="floor-suggestions" name="floor_name" required autocomplete="off">
			<datalist id="floor-suggestions">
				<?php foreach ($data_floor as $key): ?>
					<option value="<?php echo $key['floor']?>"><?php echo $key['floor']?></option>
				<?php endforeach ?>
			</datalist>
        </div>

        <div>
            <label>Pick Area: </label>
			<input type="text" list="area-suggestions" name="area_name" required autocomplete="off">
			<datalist id="area-suggestions">
				<?php foreach ($data_area as $key): ?>
					<option value="<?php echo $key['area']?>"><?php echo $key['area']?></option>
				<?php endforeach ?>
			</datalist>
        </div>

        <div>
            <label>Enter new Item: </label>
			<input type="text" list="item-suggestions" name="item_name" required autocomplete="off">
			<!-- <datalist id="item-suggestions">
				<?php foreach ($data_item as $key): ?>
					<option value="<?php echo $key['item_name']?>"><?php echo $key['item_name']?></option>
				<?php endforeach ?>
			</datalist> -->
        </div>

        <div>
            <button type="submit" name="item_Submit">Submit</button>
        </div>
	</form>
</body>
</html>