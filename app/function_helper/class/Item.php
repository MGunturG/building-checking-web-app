<?php
class Area {
	// get all floors data, return as array
	function GetAllItemData() {
		return get_data("select * from areas");
	}

	// add new floor
	function AddNewItem($selected_floor_id, $selected_area_id, $item_name, $check_frequency) {
		// run_query function was included on function_helper/db_query.php
		run_query("insert into items values('','$selected_floor_id','$selected_area_id', $check_frequency");
	}
}
?>