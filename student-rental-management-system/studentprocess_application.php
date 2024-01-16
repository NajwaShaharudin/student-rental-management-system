<?php
// Include your database connection file
require 'database.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $house_id = $_POST['id'];

    // Fetch student details from the database based on the provided student_id
    $query_student = "SELECT * FROM student WHERE id = $student_id";
    $query_student_run = mysqli_query($conn, $query_student);

    if ($query_student_run && mysqli_num_rows($query_student_run) > 0) {
        $row_student = mysqli_fetch_assoc($query_student_run);

        // Retrieve and store student details
        $student_name = $row_student['name'];
        $student_phone = $row_student['phone_num'];
        $student_email = $row_student['email'];

        // Insert data into the applications table
        $insert_application_query = "INSERT INTO student_applications (house_id, student_name, student_phone, student_email) 
                                     VALUES ('$house_id', '$student_name', '$student_phone', '$student_email')";

        if (mysqli_query($conn, $insert_application_query)) {
            echo "Application submitted successfully";

            // You may redirect the user to a success page or perform other actions as needed
        } else {
            echo "Error: " . $insert_application_query . "<br>" . mysqli_error($conn);
            // Handle the case where the insertion fails
        }
    } else {
        echo "Student not found";
        // Handle the case where the student with the provided id is not found
    }
} else {
    echo "Invalid request";
    // Handle the case where the form is not submitted
}
?>
