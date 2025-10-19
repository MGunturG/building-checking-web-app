<?php
class Floor {
	// add new floor
	function AddNewFloor($floor_name) {
		// run_query function was included on function_helper/db_query.php
		run_query("insert into floor values('','$floor_name')");
	}
}
?>