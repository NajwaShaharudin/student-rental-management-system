<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>

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


    <div class="container">

     <!-- ***** Registration Form Area Starts ***** -->
     <?php
        if (isset($_POST["submit"])){
            $name = $_POST["name"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password_Repeat = $_POST["password_Repeat"];
            $phone_num = $_POST["phone_num"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $matricNo = $_POST["matricNo"];
            $ic_no = $_POST["ic_no"];
            
           
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($name) OR empty($username) OR empty($password) OR empty($password_Repeat) OR empty($phone_num) OR empty($email) OR empty($address) OR empty($email) OR empty($matricNo) OR empty($ic_no)) {
                array_push($errors,"All fields are required");
               }
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format");
            }
               if (strlen($password)<8) {
                array_push($errors,"Password must be at least 8 charactes long");
               }
               if ($password!==$password_Repeat) {
                array_push($errors,"Password does not match");
               }
               require_once"database.php";

               if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
               }else{

                $sql = "INSERT INTO student (name, username, password, phone_num, email, address, matricNo, ic_no) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                $prepareStat = mysqli_stmt_prepare($stmt,$sql);
             if ($prepareStat) {
                mysqli_stmt_bind_param($stmt,"ssssssss",$name, $username, $passwordHash, $phone_num, $email, $address, $matricNo, $ic_no);
                mysqli_stmt_execute($stmt);

                // Store relevant information in session
                $_SESSION['user'] = [
                    'username' => $username,
                    'email' => $email
                ];

                echo "<div class='alert alert-success'>Student account registered successfully.</div>";
            }else{
                die("Something went wrong");
                 }
                }
            }
        ?>
        <!-- ***** Registration Process Area Ends ***** -->

        <header class="d-flex justify-content-between my-4">
            <h3>Add New Student Account</h3>
            <div>
                <a href="admin_dashboard.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="regs_student.php" method="post">
            <div class = "form-element my-4">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class = "form-element my-4">
                <input type="text" class="form-control" name="username" placeholder="Username *last IC number">
            </div>
            <div class = "form-element my-4">
            <input type="password" class="form-control" name="password" placeholder="Password *matric number">
            </div>
            <div class = "form-element my-4">
            <input type="password" class="form-control" name="password_Repeat" placeholder="Repeat Password">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="phone_num" placeholder="Phone Number">
            </div>
            <div class = "form-element my-4">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="matricNo" placeholder="Matric Number">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="ic_no" placeholder="IC Number">
            </div>
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="submit" value="Register Student">
            </div>
        </form>
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