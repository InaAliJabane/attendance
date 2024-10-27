<?php
// Include your database connection file
require_once '../config/dbcon.php';
session_start(); // Start session if not already started

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password before saving to the database
    $secret = password_hash($_POST['secret'], PASSWORD_BCRYPT); // Hash the secret before saving to the database
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $regdate = $_POST['regdate'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $note = $_POST['note'];

    // Prepare an insert statement
    $sql = "INSERT INTO tbl_employee (fullname, email, password, secret, gender, phone, address, regdate, status, role, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $con->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("sssssssssis", $fullname, $email, $password, $secret, $gender, $phone, $address, $regdate, $status, $role, $note);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $_SESSION['message'] = 'Employee added successfully!';
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
    header("Location: ../view/employee_add.php");
    exit();
}
?>
