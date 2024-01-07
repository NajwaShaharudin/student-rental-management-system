<?php
include("database.php");
if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone_num = mysqli_real_escape_string($conn, $_POST["phone_num"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $matricNo = mysqli_real_escape_string($conn, $_POST["matricNo"]);
    $ic_no = mysqli_real_escape_string($conn, $_POST["ic_no"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE student SET name = '$name', phone_num = '$phone_num', email = '$email', address = '$address', matricNo = '$matricNo', ic_no = '$ic_no' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Student Updated Successfully!";
        header("Location:view_studentList.php");
    }else{
        die("Something went wrong");
    }
}
?>