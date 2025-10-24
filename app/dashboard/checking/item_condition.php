<?php
include '../../config.php';
include '../../function_helper/db_query.php';

$get_item_id = get_data("select id from items");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>item conditions</title>
</head>
<body>
	<table>
		<tr>
			<th>Item Name</th>
			<th>Condition</th>
			<th>Floor</th>
			<th>Area</th>

		</tr>
		<?php foreach ($get_item_id as $id => $item_id): ?>
			<?php $id = $id + 1; ?>

			<?php $item_data = mysqli_fetch_assoc(run_query("select item_name, floor, area from items where id = '$id'")); ?>

			<?php 
			$item_condition = mysqli_fetch_assoc(run_query("select item_condition from checking_log where item_id = '$id' order by date_checked desc")); 
			$item_condition == NULL ? $item_condition['item_condition'] = "havent checked":'no';
			?>
		<tr>
			<td><?php echo($item_data['item_name']); ?></td>
			<td><?php echo($item_condition['item_condition']); ?></td>
			<td><?php echo($item_data['floor']); ?></td>
			<td><?php echo($item_data['area']); ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>