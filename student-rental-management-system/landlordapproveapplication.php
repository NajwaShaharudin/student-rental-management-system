<?php
// Include your database connection file
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $application_id = mysqli_real_escape_string($conn, $_POST['application_id']);

    // Check which button was clicked (Approve or Reject)
    if (isset($_POST['approve'])) {
        // Update the application status to 'approved'
        $update_query = "UPDATE student_applications SET status = 'approved' WHERE id = $application_id";
    } elseif (isset($_POST['reject'])) {
        // Update the application status to 'rejected'
        $update_query = "UPDATE student_applications SET status = 'rejected' WHERE id = $application_id";
    }

    if (mysqli_query($conn, $update_query)) {
        header("Location: landlordapproveapplicant.php");
        exit();
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
        // Handle the case where the update fails
    }
} else {
    echo "Invalid request";
    // Handle the case where the form is not submitted
}
?>
