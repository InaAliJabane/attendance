<?php
session_start(); // Start the session
require_once '../config/dbcon.php';
// Check if form is submitted
if (isset($_POST['save'])) {
    // Capture form data
    $location_name = $_POST['location_name'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $meters = $_POST['meters'];
    $note = $_POST['note'];
    $status = $_POST['status'];

    // Prepare the SQL statement
    $sql = "INSERT INTO tbl_location (location_name, longitude, latitude, meters, note, status) 
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("ssssss", $location_name, $longitude, $latitude, $meters, $note, $status);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $_SESSION['message'] = 'Location added successfully!';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Error: ' . $stmt->error;
            $_SESSION['message_type'] = 'error';
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['message'] = 'Error preparing statement: ' . $con->error;
        $_SESSION['message_type'] = 'error';
    }

    // Redirect back to the form page
    header("Location: ../view/location_add.php");
    exit();
}
?>
