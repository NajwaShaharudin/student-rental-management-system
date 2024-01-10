<?php
include 'database.php';

    if (isset($_POST['approve'])) {
        $id = $_POST['id'];
       $select = "UPDATE landlord SET status = 'approved' WHERE id = '$id'";
       $result = mysqli_query($conn, $select);

        echo '<script type = "text/javascript">';
        echo 'alert("User Approved")';
        echo 'window.location.href = "admin_approval.php"';
        echo '</script>';
    }

    if (isset($_POST['deny'])) {
        $id = $_POST['id'];
       $select = "DELETE FROM landlord WHERE id = '$id'";
       $result = mysqli_query($conn, $select);

        echo '<script type = "text/javascript">';
        echo 'alert("User Denied")';
        echo 'window.location.href = "admin_approval.php"';
        echo '</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

      
    <style>
        .center {
            margin: 50px auto;
            max-width: 800px;
        }

        .center h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table th,
        table td {
            text-align: left;
        }
    </style>

</head>
<body>
    <div class="container">
    <header class="d-flex justify-content-between my-4">
            <div class="text-center"> <!-- Center align the content -->
                <h3>Landlord Registration Approval</h3>
            </div>
            <div>
                <a href="admin_dashboard.php" class="btn btn-primary">Back</a>
            </div>
            </header>
        <table class="table table-bordered" id="users">
        <thead>
            <tr>
                <th>#</th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Email</th>
                <th style="text-align:center">Phone Number</th>
                <th style="text-align:center">Address</th>
                
            </tr>
        </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM landlord WHERE status = 'pending' ORDER BY id ASC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                         <td>
                        <form action="admin_approval.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button class="btn btn-success" type="submit" name="approve">Approve</button>
                            </form>
                         </td>
                         <td>
                        <form action="admin_approval.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button class="btn btn-danger" type="submit" name="deny">Deny</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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