<?php

$hostName = "localhost";
$dbUser = 'root';
$dbPassword = '';   
$dbName = "rental_house_system";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong". mysqli_connect_error());
}
?>