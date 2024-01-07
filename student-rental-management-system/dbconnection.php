<?php
	$type = $_POST['type'];
    $rent = $_POST['rent'];
    $address = $_POST['address'];
    $info = $_POST['info'];

	// Database connection
	$conn = new mysqli('localhost','root','','rental_house_system');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into house (type, rent, address, info) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $type, $rent, $address, $info);
		$execval = $stmt->execute();
		echo $execval;
		echo 
		"<script> 
		alert('House Successfully Added');
        document.location.href = 'landlordhouse.php';
		</script>";
		$stmt->close();
		$conn->close();
	}
?>