<?php
// Include your database connection file
require 'database.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $house_id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_phone = $_POST['student_phone'];

    // Add additional fields as needed

    // Insert the application details into the database
    $insert_query = "INSERT INTO applications (id, student_name, student_email, student_phone) VALUES ('$house_id', '$student_name', '$student_email', '$student_phone')";

    if (mysqli_query($conn, $insert_query)) {
        echo "<script> 
		alert('House Successfully Book');
        document.location.href = 'studenthousedetails.php';
		</script>";
        // You may redirect the user to a thank-you page or show a confirmation message
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        // Handle the case where the insertion fails
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the form is not submitted through POST, redirect or handle accordingly
    header('Location: studentapplication.php');
    exit();
}
?>
