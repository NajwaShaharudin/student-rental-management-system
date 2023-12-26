<?php
if (isset($_GET['id'])) {
include("database.php");
$id = $_GET['id'];

//Check if the user confirms deletion
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    $sql = "DELETE FROM student WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "Student Account Deleted Successfully!";
        header("Location: view_studentList.php");
    } else {
        die("Something went wrong");
    }
} else {
    // Display confirmation dialog
    echo "<script>
            if(confirm('Are you sure you want to delete this student account?')) {
                window.location.href = 'delete_student.php?id=$id&confirm=true';
            } else {
                window.location.href = 'view_studentList.php';
            }
          </script>";
}
} else {
echo "Student does not exist";
}
?>