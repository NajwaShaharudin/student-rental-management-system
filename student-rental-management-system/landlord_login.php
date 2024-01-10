<?php
session_start();
include'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Login</title>
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
                        <h2>Landlord Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container">

        <?php
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM landlord WHERE email = ? AND password = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION["status"] = $row['status'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["password"] = $row['password'];

        if ($row['status'] == "approved") {
            echo '<script type="text/javascript">';
            echo 'alert("Login Success");';
            echo 'window.location.href = "landlordhome.php";';
            echo '</script>';
        } elseif ($row['status'] == "pending") {
            echo '<script type="text/javascript">';
            echo 'alert("Your login is still pending for approval");';
            echo 'window.location.href = "landlord_login.php";';
            echo '</script>';
        } else {
            echo "<div class='alert alert-danger'>Incorrect email or password</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Incorrect email or password</div>";
    }

    $stmt->close();
}
?>

    <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form action="landlord_login.php" method="post">
                              <fieldset>
                              <input type="email" class="form-control" name="email" placeholder="Email Address">
                              </fieldset>
                              <fieldset>
                              <input type="password" class="form-control" name="password" placeholder="Password">
                              </fieldset>
                              <fieldset>
                                <button type="submit" value="login" name="login" class="btn btn-primary">Login</button>
                              </fieldset>
                              <fieldset>
                              <div><p>Haven't register yet? <a href="landlord_register.php">Register Here</a></p></div>
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