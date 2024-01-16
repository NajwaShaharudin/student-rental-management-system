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
                        <li><a href="landlordhouse.php">Register House</a></li>   
                        <li><a href="landlordviewstud.php" class="active">Review Applicants</a></li>        
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Student <em>Application</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="approve-applicants">
        <div class="container">
            <br>
            <br>
            <h2>Approve Student Applicants</h2>
            <div class="row mt-2">
                <?php
                // Include your database connection file
                require 'database.php';

                // Fetch and display pending student applications
                $query = "SELECT * FROM student_applications WHERE status = 'pending'";
                $query_run = mysqli_query($conn, $query);
                $check_applications = mysqli_num_rows($query_run) > 0;

                if ($check_applications) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Applicant: <?php echo $row['student_name']; ?></h4>
                                    <p><strong>House ID:</strong> <?php echo $row['house_id']; ?></p>
                                    <!-- Add buttons to approve and reject applicants -->
                                    <form action="process_approve_applicant.php" method="POST">
                                        <input type="hidden" name="application_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                        <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No pending applications";
                }
                ?>
            </div>
            <br>
        </div>
    </section>
    
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