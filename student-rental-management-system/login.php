<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Student Rental Management System</title>

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
    

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Landlord Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Login Form Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container">

        <?php
        if (isset($_POST["login"])) {
           $fullName = $_POST["fullname"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM landlord_register WHERE fullname = '$fullName'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Fullname does not match</div>";
            }
        }
        ?>
           
                    <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form id="contact" action="login.php" method="post">
                              <fieldset>
                              <input type="fullname" placeholder="Enter Full Name:" name="fullname" class="form-control">
                              </fieldset>
                              <fieldset>
                              <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                              </fieldset>
                              <fieldset>
                                <button type="submit" value="Login" name="login" class="main-button">Login</button>
                              </fieldset>
                              <fieldset>
                              <div><p>Not registered yet? <a href="registration.php">Register here</a></p></div>
                              </fieldset>
                        </form>
                    </div>
        </div>
    </section>
    <!-- ***** Login Form Area Ends ***** -->
    
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