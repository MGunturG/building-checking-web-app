<?php
// query all
function get_data($sql_query) {
	// we make this db_connection global so we can
	// access this all we want, not just inside this
	// funtion
	global $db_connection;

	$query_result = mysqli_query($db_connection, $sql_query);
	$rows_of_data = []; // temporary array to hold a data
	
	while ($data = mysqli_fetch_assoc($query_result)) {
		$rows_of_data[] = $data;
	}

	return $rows_of_data; // return as array
}

// query an sql
function run_query($sql_query) {
	global $db_connection;
	return mysqli_query($db_connection, $sql_query);
}
