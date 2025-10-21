<?php
class Area {
	// get all floors data, return as array
	function GetAllAreaData() {
		return get_data("select * from areas");
	}

	// add new floor
	function AddNewArea($selected_floor_id, $area_name) {
		// run_query function was included on function_helper/db_query.php
		run_query("insert into areas values('','$selected_floor_id','$area_name')");
	}
}
?>