<?php 
// Include your database connection file
require_once '../config/dbcon.php';
session_start(); // Start session if not already started

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $secret = password_hash($_POST['secret'], PASSWORD_BCRYPT); // Hash the secret
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $regdate = $_POST['regdate'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $note = $_POST['note'];

    // Check if email already exists
    $email_check_query = "SELECT * FROM tbl_employee WHERE email = ?";
    if ($stmt = $con->prepare($email_check_query)) {
        // Bind the email parameter
        $stmt->bind_param("s", $email);
        
        // Execute the statement
        $stmt->execute();
        
        // Store the result
        $stmt->store_result();

        // Check if the email already exists
        if ($stmt->num_rows > 0) {
            $_SESSION['message'] = 'Email already exists.';
            $_SESSION['message_type'] = 'error';
        } else {
            // Prepare an insert statement if the email doesn't exist
            $sql = "INSERT INTO tbl_employee (fullname, email, password, secret, gender, phone, address, regdate, status, role, note, location_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            if ($stmt_insert = $con->prepare($sql)) {
                // Bind the parameters
                $stmt_insert->bind_param("ssssssssssis", $fullname, $email, $password, $secret, $gender, $phone, $address, $regdate, $status, $role, $note, $location);

                // Attempt to execute the prepared statement
                if ($stmt_insert->execute()) {
                    $_SESSION['message'] = 'Employee added successfully!';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Error: ' . $stmt_insert->error;
                    $_SESSION['message_type'] = 'error';
                }

                // Close the insert statement
                $stmt_insert->close();
            } else {
                $_SESSION['message'] = 'Error preparing statement: ' . $con->error;
                $_SESSION['message_type'] = 'error';
            }
        }

        // Close the email check statement
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
