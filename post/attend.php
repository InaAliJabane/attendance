<?php
session_start();
header('Content-Type: application/json'); // Ensure JSON response
require_once("../config/dbcon.php");

// Get employee ID from session (assuming the user is logged in)
$employee_id = $_SESSION['user_id'];
$shift = $_POST['shift'];
$shift_date = date('Y-m-d'); // Today's date
$current_time = new DateTime("now", new DateTimeZone("Africa/Nairobi")); // Current time in Nairobi (GMT+3)

// Define shift timings as full DATETIME values
$morning_shift_start = new DateTime($shift_date . ' 08:00', new DateTimeZone("Africa/Nairobi"));
$morning_shift_end = new DateTime($shift_date . ' 12:00', new DateTimeZone("Africa/Nairobi"));
$evening_shift_start = new DateTime($shift_date . ' 16:00', new DateTimeZone("Africa/Nairobi"));
$evening_shift_end = new DateTime($shift_date . ' 20:00', new DateTimeZone("Africa/Nairobi"));

// Check if today is Friday
if (date('N') == 5) { // 5 means Friday
    echo json_encode(['error' => 'Attendance is not allowed on Fridays.']);
    exit;
}

// Determine shift start and end times based on selected shift
if ($shift === 'enter') {
    $shift_start_time = $morning_shift_start->format('Y-m-d H:i:s');
    $shift_end_time = $morning_shift_end->format('Y-m-d H:i:s');
} elseif ($shift === 'out') {
    $shift_start_time = $evening_shift_start->format('Y-m-d H:i:s');
    $shift_end_time = $evening_shift_end->format('Y-m-d H:i:s');
} else {
    echo json_encode(['error' => 'Invalid shift type selected.']);
    exit;
}

// Check if the employee has already marked attendance for this shift today
$stmt = $con->prepare("SELECT * FROM tblattendance WHERE employee_id = ? AND shift_date = ? AND shift_start_time = ? AND shift_end_time = ?");
$stmt->bind_param("isss", $employee_id, $shift_date, $shift_start_time, $shift_end_time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['error' => 'You have already marked attendance for this shift today.']);
    exit;
}

// Calculate attendance status as "Present" or "Late"
$status = 'Late';
if ($shift === 'enter' && $current_time <= $morning_shift_start) {
    $status = 'Present';
} elseif ($shift === 'out' && $current_time >= $evening_shift_start && $current_time <= $evening_shift_end) {
    $status = 'Present';
}

// Insert attendance record
$stmt = $con->prepare("INSERT INTO tblattendance (employee_id, shift_date, shift_start_time, shift_end_time, status, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("issss", $employee_id, $shift_date, $shift_start_time, $shift_end_time, $status);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Attendance recorded successfully.']);
} else {
    echo json_encode(['error' => 'Failed to record attendance.']);
}

// Close the prepared statement and database connection
$stmt->close();
$con->close();
?>
