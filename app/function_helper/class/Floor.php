<?php
class Floor {
	// get all floors data, return as array
	function GetAllFloorData() {
		return get_data("select * from floors");
	}

	// add new floor
	function AddNewFloor($floor_name) {
		// run_query function was included on function_helper/db_query.php
		run_query("insert into floors values('','$floor_name')");
	}
}
?>