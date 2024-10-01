<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body>

<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Admin Panel</h1>
</div>
<div class="container">

   <div class="content">
      <h3>Hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <a href="logout.php" class="btn">logout</a>
   </div>
   
</div>

   <div class="content">
        <h1>List of Customer</h1>
    </div>
   

    <div class="admin">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Services</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 

                $connection = mysqli_connect('localhost','root','','clean_db');

                if( $connection->connect_error)
                {
                    die("Connection Failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM book_form";
                $result = $connection->query($sql);

                if(!$result)
                {
                    die("Invalid Query: " . $connection->error);
                }

                while($row = $result->fetch_assoc())
                {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[firstname]</td>
                    <td>$row[lastname]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[room]</td>
                    <td>$row[date]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='?id=$row[id]'>Approved</a>
                        <a class='btn btn-danger btn-sm' href=' ?id=$row[id]'>Rejected</a>
                    </td>
                </tr>
                ";
            }
            ?>
               
            </tbody>

        </table>

</body>
</html>