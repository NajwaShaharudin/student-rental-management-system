<?php
$type = $_POST["type"];
$rent = $_POST["rent"];
$address = $_POST["address"];
$info = $_POST["info"];

$host = "localhost";
$dbname = "rental_house_system";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO house (House_ID, Img, Address, Info, Rent, Categories, LL_IC_Num)
        VALUES ('', '', '$address', '$info', '$rent', '$type', '')";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>