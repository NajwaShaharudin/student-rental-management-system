<?php
// Include your database connection file
require 'database.php';

// Check if the house id is provided in the URL
if(isset($_GET['house_id'])) {
    $house_id = $_GET['house_id'];

    // Fetch house details from the database based on the provided house_id
    $query = "SELECT * FROM house WHERE id = $house_id";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);
        // Retrieve and display house details
        $address = $row['address'];
        $rent = $row['rent'];
        $image_url = $row['image_url'];
        $type = $row['type'];
        $info = $row['info'];
        // Add other details as needed

        // You can use these variables in your HTML to display house details
    } else {
        echo "House not found";
        // Handle the case where the house with the provided id is not found
    }
} else {
    echo "Invalid house id";
    // Handle the case where house_id is not provided in the URL
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

    <style>
        html, body {
        min-height: 100%;
        }
        body, div, form, input, select, textarea, p { 
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
        line-height: 22px;
        }
        .card {
            border: none;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        img {
            max-width: 100%;
            height: auto;
        }
        h1 {
        position: absolute;
        margin: 0;
        font-size: 36px;
        color: #fff;
        z-index: 2;
        }
        .testbox {
        display: flex;
        justify-content: center;
        align-items: center;
        height: inherit;
        padding: 20px;
        }
        form {
        width: 100%;
        padding: 20px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 20px 0 #333; 
        }
        .banner {
        position: relative;
        height: 210px;
        background-image: url("/uploads/media/default/0001/02/328c356e9bba5add698e405d0059aa4207d8f1f6.jpeg");      background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        }
        .banner::after {
        content: "";
        background-color: rgba(0, 0, 0, 0.4); 
        position: absolute;
        width: 100%;
        height: 100%;
        }
        input, textarea, select {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        }
        input {
        width: calc(100% - 10px);
        padding: 5px;
        }
        select {
        width: 100%;
        padding: 7px 0;
        background: transparent;
        }
        textarea {
        width: calc(100% - 12px);
        padding: 5px;
        }
        .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
        color: #333;
        }
        .item input:hover, .item select:hover, .item textarea:hover {
        border: 1px solid transparent;
        box-shadow: 0 0 6px 0 #333;
        color: #333;
        }
        .item {
        position: relative;
        margin: 10px 0;
        }
        input[type="date"]::-webkit-inner-spin-button {
        display: none;
        }
        .item i, input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        font-size: 20px;
        color: #a9a9a9;
        }
        .item i {
        right: 1%;
        top: 30px;
        z-index: 1;
        }
        [type="date"]::-webkit-calendar-picker-indicator {
        right: 0;
        z-index: 2;
        opacity: 0;
        cursor: pointer;
        }
        input[type="time"]::-webkit-inner-spin-button {
        margin: 2px 22px 0 0;
        }
        input[type=radio], input.other {
        display: none;
        }
        label.radio {
        position: relative;
        display: inline-block;
        margin: 5px 20px 10px 0;
        cursor: pointer;
        }
        .question span {
        margin-left: 30px;
        }
        label.radio:before {
        content: "";
        position: absolute;
        top: 2px;
        left: 0;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 2px solid #ccc;
        }
        #radio_5:checked ~ input.other {
        display: block;
        }
        input[type=radio]:checked + label.radio:before {
        border: 2px solid #444;
        background: #444;
        }
        label.radio:after {
        content: "";
        position: absolute;
        top: 7px;
        left: 5px;
        width: 7px;
        height: 4px;
        border: 3px solid #fff;
        border-top: none;
        border-right: none;
        transform: rotate(-45deg);
        opacity: 0;
        }
        input[type=radio]:checked + label:after {
        opacity: 1;
        }
        .btn-block {
        margin-top: 10px;
        text-align: center;
        }
        button {
        width: 150px;
        padding: 10px;
        border: none;
        border-radius: 5px; 
        background: #444;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
        }
        button:hover {
        background: #666;
        }
        @media (min-width: 568px) {
        .name-item, .city-item {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        }
        .name-item input, .city-item input {
        width: calc(50% - 20px);
        }
        .city-item select {
        width: calc(50% - 8px);
        }
        }
      </style>

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
                    <a href="student_mainPage.php" class="logo">House<em> Rental</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="student_mainPage.php">Home</a></li>
                    <li><a href="studentlisthouse.php" class="active">House Listing</a></li>
                    <li><a href="landlordhouse.php">Register House</a></li>   
                        <li><a href="landlordviewstud.php">Review Applicants</a></li>
                        <li><a href="contact.html">Contact</a></li>          
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
                        <h2>House <em>Details</em></h2>
                        <p>Creating a compelling house ad requires landlords to accurately represent property features, location, 
                            and price while considering factors like location, competition, and timing. Attention to detail, high-quality 
                            images, and regular updates contribute to the ad's effectiveness.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="viewdetails">
        <div class="container">
            <br>
            <br>
            <article>
                  <div class="testbox">
                    <div class="card">
                    <img class="card-img-top" src="upload/<?php echo $image_url; ?>" alt="House Image">
                    <div class="card-body">
                        <h2 class="card-title">House Details</h2>
                        <h5 class="card-text"><strong>Address:</strong> <?php echo $address; ?></h5>
                        <br>
                        <h5 class="card-text"><strong>Rent:</strong> <?php echo $rent; ?></h5>
                        <br>
                        <h5 class="card-text"><strong>Type:</strong> <?php echo $type; ?></h5>
                        <br>
                        <h5 class="card-text"><strong>Info:</strong> <?php echo $info; ?></h5>
                        <br>
                        <!-- Add other details as needed -->
                        <a href="studentapplication.php?house_id=<?php echo $row['id']; ?>" class="btn btn-info">Book This House</a>
                    </div>
                  </div>
                  </div>
              </article>
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
