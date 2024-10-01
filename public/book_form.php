<?php 

    $connection = mysqli_connect('localhost','root','','clean_db');

    if(isset($_POST['send'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $room = $_POST['room'];
        $date = $_POST['date'];

        $request = " insert into book_form(firstname, lastname, email, phone, address, room, date) values
        ('$firstname','$lastname','$email','$phone','$address','$room','$date')";

        mysqli_query($connection, $request);

        header('location:package.php');
    }else{
        echo 'something went wront try again';
    }

?>

