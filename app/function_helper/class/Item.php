<?php
class Item {
	// get all floors data, return as array
	function GetAllItemData() {
		return get_data("select * from items");
	}

	// add new floor
	function AddNewItem($item_name, $which_floor, $which_area) {
		// run_query function was included on function_helper/db_query.php
		run_query("insert into items (item_name, floor, area) values ('$item_name', '$which_floor', '$which_area')");
	}
}
?>