<?php
$localhost = 'localhost';
$username  = 'root';
$password  = '';
$database  = 'employee';

// Connection
$con = mysqli_connect($localhost, $username, $password, $database);

// Check Connection
if (!$con) {
    header("Location: /att/config/error.php?message=$error_message");
    die();
}
?>