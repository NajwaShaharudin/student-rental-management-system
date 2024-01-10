<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rental_house_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Define variables and initialize with empty values
$type = $rent = $address = $info = $image = "";

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = $_POST["type"];
  $rent = $_POST["rent"];
  $address = $_POST["address"];
  $info = $_POST["info"];

  // Handle file upload
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      $image = basename($_FILES["image"]["name"]);

      // Insert form data into MySQL database table
      $sql = "INSERT INTO house (type, rent, address, info, image_url) VALUES ('$type', '$rent', '$address', '$info', '$image')";

      if (mysqli_query($conn, $sql)) {
        echo "<script> 
		alert('House Successfully Added');
        document.location.href = 'landlordhouse.php';
		</script>";;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "<script> 
	  alert('Sorry, there was an error uploading your file.');
	  document.location.href = 'landlordhouse.php';
	  </script>";;
    }
  }
}

// Close database connection
mysqli_close($conn);
?>
