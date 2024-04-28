<?php
require_once 'db_connect.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $leave_subject = $conn->real_escape_string($_POST['leave_subject']);
    $leave_dates = $conn->real_escape_string($_POST['leave_dates']);
    $leave_message = $conn->real_escape_string($_POST['leave_message']);
    $leave_type = $conn->real_escape_string($_POST['leave_type']);
    
    // Insert into leave_records table
    $sql = "INSERT INTO leave_records (employee_id, leave_type, start_date, end_date, status) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $start_date = date("Y-m-d", strtotime(explode(",", $leave_dates)[0])); // Assuming multiple dates are comma-separated
        $end_date = date("Y-m-d", strtotime(explode(",", $leave_dates)[count(explode(",", $leave_dates)) - 1])); // Assuming multiple dates are comma-separated
        
        // Bind variables to the prepared statement as parameters
        $employee_id = 1; // Assuming you have a logged-in user
        $status = "Pending"; // Assuming all leaves are initially pending
        
        $stmt->bind_param("issss", $employee_id, $leave_type, $start_date, $end_date, $status);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Leave applied successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
