<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student|Complain Form</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

 <!-- ***** Preloader Start ***** -->
 <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <div class="container-fluid">

    <?php
    include 'database.php';

    if (isset($_POST['create'])){
         $message = $_POST['message'];

         $stmt = $conn -> prepare ("SELECT * FROM complain WHERE message = ?");
         $stmt -> bind_param("s", $message);
         $stmt ->execute();
         $result = $stmt->get_result();

         if (empty($message)){
            array_push($errors, "All fields are required");
         } else {
            $stmt = $conn->prepare("INSERT INTO complain (message, status) VALUES (?, 'pending')");
            $stmt -> bind_param ("s", $message);
            $stmt->execute();
            echo "<div class='alert alert-success'>You complain has been received.</div>";
        }
    }
    ?>

     <!-- ***** Complain Form Area Starts ***** -->
    
        <header class="d-flex justify-content-between my-4">
            <h3>Complain Form</h3>
            <div>
            <button class="button btn btn-grey">
              <a href="student_mainPage.php">Back</a>
            </button>
            </div>
        </header>
        <form action="student_complain.php" id="complain-form" method="post">
        <input type="hidden" name="id" value="">
		<div class="form-group">
			<label for="" class="control-label">Description of the Problem</label>
			<textarea cols="30" rows="3" name="message" required="" class="form-control"></textarea>
		</div>
		<button type="submit" name="create" class="button btn btn-primary btn-sm">Create</button>
		<button class="button btn btn-secondary btn-sm" type="reset">Cancel</button>

    </div>

             <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>
</html>