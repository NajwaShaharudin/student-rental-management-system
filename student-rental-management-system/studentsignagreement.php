<?php
// Include your database connection file
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $application_id = mysqli_real_escape_string($conn, $_POST['application_id']);
    $startRental = mysqli_real_escape_string($conn, $_POST['startRental']);
    $endRental = mysqli_real_escape_string($conn, $_POST['endRental']);

    // Insert data into the sign_agreements table
    $insert_agreement_query = "INSERT INTO sign_agreements (application_id, startRental, endRental) 
                               VALUES ('$application_id', '$startRental', '$endRental')";

    if (mysqli_query($conn, $insert_agreement_query)) {
        echo "<script> 
            alert('Agreement Signed Successfully');
            document.location.href = 'student_mainPage.php';
            </script>";
        exit();
    } else {
        echo "Error: " . $insert_agreement_query . "<br>" . mysqli_error($conn);
        // Handle the case where the insertion fails
    }
} else {
    echo "Invalid request";
    // Handle the case where the form is not submitted
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>RENTAL HOUSE MANAGEMENT SYSTEM</title>

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
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="student_mainPage.php" class="logo"><em>House Rental</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        <li><a href="student_mainPage.php">Home</a></li>   
                        <li><a href="studentlisthouse.php">House Listing</a></li>   
                        <li><a href="studentapproval.php" class="active">Sign Agreement</a></li>   
                        <li><a href="student_complain.php">Report House</a></li>
                        <li><a href="student_logout.php">Logout</a></li> 
                                   
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Sign <em>Agreement</em></h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <h2>Sign Agreement</h2>
            <br>
            <form action="studentsignagreement.php" method="post">
                <!-- Hidden input to store the application_id -->
                <input type="hidden" name="application_id" value="<?php echo $_GET['application_id']; ?>">

                <div class="form-group">
                    <label for="startRental">Start Rental Date:</label>
                    <input type="date" class="form-control" id="startRental" name="startRental" required>
                </div>

                <div class="form-group">
                    <label for="endRental">End Rental Date:</label>
                    <input type="date" class="form-control" id="endRental" name="endRental" required>
                </div>

                <button type="submit" class="btn btn-primary">Sign Agreement</button>
            </form>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

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