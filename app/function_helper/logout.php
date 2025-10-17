<?php
// as usual, session
session_start();

// destroy current session
session_destroy();

// then, redirect to login page
header("location:../login.php?login_status=logout")
?>