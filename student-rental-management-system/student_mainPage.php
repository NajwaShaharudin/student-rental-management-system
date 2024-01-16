<?php
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION["student"])) {
    header("Location: student_login.php");
    exit();
}

    $loggedInStudent = $_SESSION["student"];
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Rental Management System</title>

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
                        <li><a href="studentlisthouse.php" class="active">House Listing</a></li>   
                        <li><a href="studentapproval.php">Sign Agreement</a></li>   
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
    <!-- ***** Header Area End ***** -->
    
    
   

   <!-- ***** Cars Starts ***** -->
   <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Featured <em>Properties</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Discover our featured properties, each embodying exquisite design and modern luxury. 
                            These residences boast spacious interiors, premium amenities, and prime locations. 
                            Elevate your lifestyle with our carefully curated selection of exceptional homes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/rumaha.jpg" alt="">
                        </div>
                        <div class="down-content">

                            <h4>BRAND NEW unit at Starling Bandar Rimbayu *LIMITED UNITS*</h4>

                            <p>House &nbsp;/&nbsp; For Sale &nbsp;/&nbsp; 100 sq m &nbsp;</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/rumahb.jpg" alt="">
                        </div>
                        <div class="down-content">
                        
                            <h4>Double Storey Semi D Vista Kirana Ayer Keroh Melaka</h4>

                            <p>House &nbsp;/&nbsp; Rent &nbsp;/&nbsp; 100 sq m &nbsp;</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/rumahc.jpg" alt="">
                        </div>
                        <div class="down-content">

                            <h4>Parkland Residence @ Sungai Melaka for rent</h4>

                            <p>House &nbsp;/&nbsp; For Sale &nbsp;/&nbsp; 100 sq m &nbsp;</p>

                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="main-button text-center">
                <a href="properties.html">View Properties</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

            <br>

   <!-- ***** Footer Start ***** -->
   <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                          Copyright © Rental House Management System
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