<?php
session_start();

// check if the user already logged in or not
if($_SESSION['login_status'] != "logged_in") {
	header("location:../../login.php?login_status=not_logged_in");
}

include "../../config.php";
include "../../function_helper/db_query.php";
// include "../../function_helper/class/Area.php";


if (isset($_POST['area_Submit'])){
	$selected_floor_id = $_POST['selected_floor'];
	$area_name = $_POST['area_name'];

	$current_data = get_data("select area_name from areas where floor_id = '$selected_floor_id' and area_name = '$area_name'");

	if (count($current_data) === 0) { // if there is no data
		run_query("insert into areas values('','$selected_floor_id','$area_name')");
		header("location:add.php?status=success");
	} else {
		header("location:add.php?status=existed");
	}
}

// get floors data
$floors_data = get_data("select * from floors");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add new area</title>
</head>
<body>
	<header>
	<?php
	if (isset($_GET['status'])) {
		if ($_GET['status'] == "success") {
			echo "new area added!";
		} else if ($_GET['status'] == "existed") {
			echo "area already exist!";
		}
	}
	?>
	</header>

	<form method="POST">
		<div>
            <label for="floor_choice">Choose floor:</label>
            <select name="selected_floor" required>
                <option value="">--Select an option--</option>
                
                <?php foreach ($floors_data as $data): ?>
                <option value="<?php echo $data["id"] ?>"><?php echo $data["floor_name"]?></option>
            	<?php endforeach ?>

            </select>
        </div>

        <div>
            <label for="area-name-entry">Enter new area: </label>
            
            <input type="text" name="area_name" required>
        </div>

        <div>
            <button type="submit" name="area_Submit">Submit</button>
        </div>
	</form>
</body>
</html>