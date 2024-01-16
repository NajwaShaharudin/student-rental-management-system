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
                    <a href="landlordhome.php" class="logo">House<em> Rental</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="landlordhome.php">Home</a></li>
                    <li><a href="landlordlistinghouse.php" class="active">House Listing</a></li>
                    <li><a href="landlordhouse.php">Register House</a></li>   
                        <li><a href="landlordviewstud.php">Review Applicants</a></li>      
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
                        <h2>Our <em>House</em></h2>
                        <p>Spacious, renovated home in prime location. Modern amenities, 
                            cozy backyard, and great neighborhood. A must-see for anyone 
                            looking for a move-in ready property with character and convenience.
                             Do not miss this opportunity 
                            to live your dream!</p>
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

            <div class="contact-form">
                <form action="#" id="contact">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>House Address:</label>
                            <input type="text" name="house_address" placeholder="Enter house address">
                        </div>
                    </div>
                    <div class="col-sm-4 offset-sm-4">
                    <div class="main-button text-center">
                        <button type="submit">Search</button>
                    </div>
                </div>
                <br>
                <br>
                </form>
            </div>
            <div class = "container py-5"> 
                <div class="row mt-2">
                <?php
                require 'database.php';

                $query = "SELECT * FROM house";
                $query_run = mysqli_query($conn, $query);
                $check_house = mysqli_num_rows($query_run) > 0;

                if ($check_house) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="upload/<?php echo $row['image_url']; ?>" width="200px" height="200px" alt="House">
                                    <h3 class="card-title"><?php echo $row['address']; ?></h3>
                                    <h4 class="card-title"><?php echo $row['rent']; ?></h4>
                                    <!-- Add a link to the details page with the house_id parameter -->
                                    <a href="lanlordhousedetails.php?house_id=<?php echo $row['id']; ?>" class="btn btn-info" role="button">View Details</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No House Found";
                }
                ?>
                </div>
            </div>
            <br>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
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