<?php
// start session => buat session
session_start();

// define credential ke database
// define('STRING', 'some_string_here');
define('DB_SERVER', 'localhost');
define('DB_UNAME', 'root');
define('DB_PASSWD', '');
define('DB_NAME', 'building_checking_db');

// create db connection as object (yes, for singleton, so 
// we don't call the connection again, everytime) and check
// connection
$db_connect = new mysqli(DB_SERVER, DB_UNAME, DB_PASSWORD, DB_NAME);
if (db_connect == false) {
	die("Error, can't connect to database server"); // php you scary dude, DIE!
}

// this function below to check if the user logged on not
// to protect the page from not logged user accessing the app
//
// [!] we can put this on first line on any protected page
//
// if user login status NOT LOGGEDIN or NOT IDENTICAL to true
// 	redirect to login page
// 	exit
//
function require_login() {
	if (!isset($_SESSION['loggedin'] || $_SESSION['loggenin'] !== true) {
		header(Location: login.php);
		exit;
	}
}
?>
