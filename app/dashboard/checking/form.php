<?php
session_start();

include '../../config.php';
include '../../function_helper/db_query.php';

$selected_floor = $_GET['floor'] ?? null;
$data_floor = run_query("select distinct floor from items order by floor asc");
$data_floor = mysqli_fetch_all($data_floor, MYSQLI_ASSOC);

$items = [];
if ($selected_floor) {
	$data_item = run_query("select id, item_name, area from items where floor = '$selected_floor' order by area, item_name");
	$data_item = mysqli_fetch_all($data_item, MYSQLI_ASSOC);
	// var_dump($data_item);
}

if (isset($_POST['checking_Submit'])) {
	$item_condition = $_POST['condition'] ?? [];
	$checked_by = $_SESSION['username'];
	$floor = $_POST['floor'];
	$date_checked = date('Y-m-d H:i:s');

	foreach ($item_condition as $item_id_input => $condition_input) {
		if ($condition_input == "Good" || $condition_input == "Bad") {
			run_query("insert into checking_log (item_id, item_condition, checked_by, date_checked) values ('$item_id_input', '$condition_input', '$checked_by', '$date_checked')");
		}
	}

	echo "success submited checking form";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Checklist</title>
</head>
<body>

    <h1>Item Checklist</h1>

    <form method="GET">
        <label for="floor">Select Floor:</label>
        <select name="floor" id="floor" onchange="this.form.submit()">
            <option value="">-- Choose a floor --</option>
            <?php foreach ($data_floor as $floor): ?>
                <option value="<?php echo htmlspecialchars($floor['floor']); ?>" 
                    <?php echo ($floor['floor'] == $selected_floor) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($floor['floor']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <hr>

    <?php if ($selected_floor && !empty($data_item)): ?>
        
        <h2>Checking Floor: <?php echo htmlspecialchars($selected_floor); ?></h2>

        <form method="POST">
            <input type="hidden" name="floor" value="<?php echo htmlspecialchars($selected_floor); ?>">

            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Area</th>
                        <th>Condition (Good)</th>
                        <th>Condition (Bad)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_item as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['area']); ?></td>
                            <td>
                                <input type="radio" 
                                       name="condition[<?php echo $item['id']; ?>]" 
                                       value="Good" 
                                       required>
                            </td>
                            <td>
                                <input type="radio" 
                                       name="condition[<?php echo $item['id']; ?>]" 
                                       value="Bad">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <br>
            <div>
                <label for="checked_by">Your Name:</label>
                <input type="text" name="checked_by" id="checked_by" value="<?php echo $_SESSION['username']; ?>" disabled>
            </div>
            <br>
            <div>
                <button type="submit" name="checking_Submit">Submit Checklist</button>
            </div>

        </form>

    <?php elseif ($selected_floor): ?>
        <p>No items found for this floor.</p>
    <?php endif; ?>

</body>
</html>