<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Registration Form</title>

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
       if (isset($_POST["submit"])) {
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();
        
        if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
         array_push($errors,"All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($errors, "Email is not valid");
        }
        if (strlen($password)<8) {
         array_push($errors,"Password must be at least 8 charactes long");
        }
        if ($password!==$passwordRepeat) {
         array_push($errors,"Password does not match");
        }
        require_once"database.php";
        $sql = "SELECT * FROM landlord_register WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }

        if (count($errors)>0) {
         foreach ($errors as  $error) {
             echo "<div class='alert alert-danger'>$error</div>";
         }
        }else{
           
            $sql = "INSERT INTO landlord_register (fullname, email, password) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStat = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStat) {
                mysqli_stmt_bind_param($stmt,"sss", $fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
        }
    }
        ?>
           
                    <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form action="registration.php" method="post">
                              <fieldset>
                              <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
                              </fieldset>
                              <fieldset>
                              <input type="email" class="form-control" name="email" placeholder="Email:">
                              <fieldset>
                              <input type="password" class="form-control" name="password" placeholder="Password:">
                              </fieldset>
                              <fieldset>
                              <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
                              </fieldset>
                              <fieldset>
                                <button type="submit" value="Register" name="submit" class="btn btn-primary">Register</button>
                              </fieldset>
                              <fieldset>
                              <div><p>Already Registered? <a href="login.php">Login Here</a></p></div>
                              </fieldset>
                              
                        </form>
                    </div>
        </div>
    </section>
    <!-- ***** Registration Area Ends ***** -->
    
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