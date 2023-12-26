<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <title>Student List</title>
   
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <div class="text-center"> <!-- Center align the content -->
                <h3>Student List</h3>
            </div>
            <div>
                <a href="admin_dashboard.php" class="btn btn-primary">Back</a>
            </div>
            </header>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Matric Number</th>
                <th>IC Number</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include('database.php');
        $sqlSelect = "SELECT * FROM student";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['phone_num']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['address']; ?></td>
                <td><?php echo $data['matricNo']; ?></td>
                <td><?php echo $data['ic_no']; ?></td>
                <td>
                    <a href="edit_student.php?id=<?php echo $data['id']; ?>"> <span class="glyphicon glyphicon-edit"></span></a><br>
                </td>
                <td>
                <a href="delete_student.php?id=<?php echo $data['id']; ?>"  ><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>