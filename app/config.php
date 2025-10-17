<?php
define('DB_SERVER', 'localhost');
define('DB_UNAME', 'root');
define('DB_PASSW', '');
define('DB_NAME', 'building_checking_db');

$db_connection = mysqli_connect(DB_SERVER, DB_UNAME, DB_PASSW, DB_NAME);
if (!$db_connection) {
	die("Gagal koneksi ke db: ") . mysqli_connect_error();
}
?>
