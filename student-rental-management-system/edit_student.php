<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <title>Edit Student</title>
</head>
<body>
<div class="container">
        <header class="d-flex justify-content-between my-4">
            <div class="text-center"> <!-- Center align the content -->
                <h3>Edit Student</h3>
            </div>
            <div>
            <a href="view_studentList.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process_student.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("database.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM student WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                    <div class = "form-element my-4">
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row["name"]; ?>">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="phone_num" placeholder="Phone Number" value="<?php echo $row["phone_num"]; ?>">
            </div>
            <div class = "form-element my-4">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row["email"]; ?>">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $row["address"]; ?>">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="matricNo" placeholder="Matric Number" value="<?php echo $row["matricNo"]; ?>">
            </div>
            <div class = "form-element my-4">
            <input type="text" class="form-control" name="ic_no" placeholder="IC Number" value="<?php echo $row["ic_no"]; ?>">
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="edit" value="Edit Student">
            </div>
                <?php
            }else{
                echo "<h3>Student Does Not Exist</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>