<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Registration</title>
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
                        <a href="index.php" class="logo">House<em> Rental</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                        </ul>        
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

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Landlord Registration</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Registration Form Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container">

    <?php
    include 'database.php';

    if(isset($_POST['register'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];


        $stmt = $conn->prepare("SELECT * FROM landlord WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (empty($fullname) OR empty($username) OR empty($email) OR empty($phone) OR empty($address) OR empty($password)) {
            array_push($errors,"All fields are required");
        } else {
            $stmt = $conn->prepare("INSERT INTO landlord (fullname, username, email, phone, address, password, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
            $stmt->bind_param("ssssss", $fullname, $username, $email, $phone, $address, $password);
            $stmt->execute();
            echo "<div class='alert alert-success'>Your account is pending for approval. Please check back after 1 or 2 days.</div>";
        }
    }
    ?>
                    <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form action="landlord_register.php" method="post">
                              
                              <fieldset>
                              <input type="text" class="form-control" name="fullname" placeholder="Enter you Full Name">
                              </fieldset>
                              <fieldset>
                              <input type="text" class="form-control" name="username" placeholder="Username">
                              </fieldset>
                              <fieldset>
                              <input type="email" class="form-control" name="email" placeholder="Email">
                              </fieldset>
                              <fieldset>
                              <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                              </fieldset>
                              <fieldset>
                              <input type="text" class="form-control" name="address" placeholder="Address">
                              </fieldset>
                              <fieldset>
                              <input type="password" class="form-control" name="password" placeholder="Password">
                              </fieldset>
                              <fieldset>
                                <button type="submit" value="Register" name="register" class="btn btn-primary">Register</button>
                              </fieldset>
                              <fieldset>
                              <div><p>Already Registered? <a href="landlord_login.php">Login Here</a></p></div>
                              </fieldset>
                              
                        </form>
                    </div>
    </div>
    </section>

     <!-- ***** Footer Start ***** -->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © student-utem
                        
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