<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("dbcon.php");
session_start();

header('Content-Type: application/json');

// Initialize response array
$response = array();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $response['error'] = "Username and password are required.";
    echo json_encode($response);
    exit;
}

// Query for user data
$query = "SELECT id, fullname, email, password, location_id, status, role, phone, address FROM tbl_employee WHERE email = ?";
$stmt = $con->prepare($query);
if (!$stmt) {
    $response['error'] = "Database error: " . $con->error;
    echo json_encode($response);
    exit;
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        if ($user['status'] != 1) {
            $response['error'] = "Account inactive. Please contact admin.";
        } else {
            // Check location details
            $location_id = $user['location_id'];
            $location_query = "SELECT id, location_name, longitude, latitude, meters, status FROM tbl_location WHERE id = ?";
            $location_stmt = $con->prepare($location_query);
            if (!$location_stmt) {
                $response['error'] = "Database error: " . $con->error;
                echo json_encode($response);
                exit;
            }

            $location_stmt->bind_param("i", $location_id);
            $location_stmt->execute();
            $location_result = $location_stmt->get_result();

            if ($location_result && $location_result->num_rows === 1) {
                $location = $location_result->fetch_assoc();

                // Store user and location data in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['address'] = $user['address'];
                $_SESSION['location_id'] = $location['id'];
                $_SESSION['location_name'] = $location['location_name'];
                $_SESSION['longitude'] = $location['longitude'];
                $_SESSION['latitude'] = $location['latitude'];
                $_SESSION['meters'] = $location['meters'];
                $_SESSION['location_status'] = $location['status'];
                $_SESSION['logged_in'] = true;

                $response['redirect'] = "index.php";
            } else {
                $response['error'] = "Location not found.";
            }
        }
    } else {
        $response['error'] = "Invalid password.";
    }
} else {
    $response['error'] = "Invalid credentials.";
}

// Output JSON response
echo json_encode($response);
$stmt->close();
$con->close();
?>
