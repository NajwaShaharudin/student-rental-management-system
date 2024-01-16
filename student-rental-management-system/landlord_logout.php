<?php
session_start();
session_destroy();
header("Location: landlord_login.php"); // Redirect to the home page or any other page
exit();
?>
