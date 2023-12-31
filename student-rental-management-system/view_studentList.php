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
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Phone Number</th>
                <th style="text-align:center">Email</th>
                <th style="text-align:center">Address</th>
                <th style="text-align:center">Matric Number</th>
                <th style="text-align:center">IC Number</th>
            </tr>
        </thead>
        <tbody>
        
        
        <?php
        include('database.php');

        //Pagination variables
        $results_per_page = 3; //Number of results per page

         //Determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
            $page = 1; //if no specific page is requested, default to the first page
        } else {
            $page = $_GET['page'];
        }

        //calculate the starting index for the LIMIT clause
        $start_index = ($page -1) * $results_per_page; 

        //find out the number of results stored in database
        $sqlSelect = "SELECT * FROM student LIMIT $start_index, $results_per_page";
        $result = mysqli_query($conn,$sqlSelect);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='text-align: left;'>{$row['id']}</td>";
            echo "<td style='text-align: left;'>{$row['name']}</td>";
            echo "<td style='text-align: left;'>{$row['phone_num']}</td>";
            echo "<td style='text-align: left;'>{$row['email']}</td>";
            echo "<td style='text-align: left;'>{$row['address']}</td>";
            echo "<td style='text-align: left;'>{$row['matricNo']}</td>";
            echo "<td style='text-align: left;'>{$row['ic_no']}</td>";
            echo "<td><a href='edit_student.php?id={$row['id']}'><span class='glyphicon glyphicon-edit'></span></a><br></td>";
            echo "<td><a href='delete_student.php?id={$row['id']}'><span class='glyphicon glyphicon-trash'></span></a><br></td>";
            echo "</tr>";
        }
        
        ?>
         </tbody>
      </table>

        <?php
        //retrieve selected results from database and display them on page
         $sqlCount = "SELECT COUNT(*) AS total FROM student";
         $resultCount = mysqli_query($conn, $sqlCount);
         $row = mysqli_fetch_assoc($resultCount);

         //determine number of total pages available
         $total_pages = ceil($row['total'] / $results_per_page);

         echo '<div class="text-center">';
         echo '<ul class="pagination">';

         //display the link to the pages
         for ($i = 1; $i <= $total_pages; $i++) {
             echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
         }
         echo '</ul>';
         echo '</div>';
        ?>
    </div>
</body>
</html>