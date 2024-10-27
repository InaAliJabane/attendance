<?php
// Configure session to expire when the browser is closed
session_set_cookie_params([
    'lifetime' => 0, // Expires when browser is closed
    'path' => '/',
    'domain' => '', // Add your domain if necessary
    'secure' => isset($_SERVER['HTTPS']), // True if using HTTPS
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not authenticated
    header("Location: /att/login.php");
    exit;
}

// If the user is authenticated, they can proceed with the page content
?>
