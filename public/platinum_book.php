<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platinum Booking</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!--header section start-->

<section class="header">

    <a href="home.php" class="logo">Clean My Space.</a>

    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="package.php">Package</a>
        <a href="about.php">About</a>
        <a href="logout.php">logout</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!--header section end-->

<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Platinum Booking</h1>
</div>

<!--book section start-->

<section class="booking">
    
    <form action="book_form.php" method="post" class="book-form">

        <div class="flex">
            <div class="inputBox">
                <span>First Name:</span>
                <input type="text" placeholder="Enter Your First Name" name="firstname">
            </div>
            <div class="inputBox">
                <span>Last Name:</span>
                <input type="text" placeholder="Enter Your Last Name" name="lastname">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Enter Your Email" name="email">
            </div>
            <div class="inputBox">
                <span>Phone:</span>
                <input type="phone" placeholder="Enter Your Number" name="phone">
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" placeholder="Enter Your Address" name="address">
            </div>
            <div class="inputBox">
                <span>Platinum Service</span>
                <select name="room" class="form-control">
                    <option value="Furnished Apartment">Furnished Apartment</option>
                    <option value="Unfurnished Apartment">Unfurnished Apartment</option>
                    <option value="Furnished Bangalow">Furnished Bangalow</option>
                    <option value="Unfurnished Bangalow">Unfurnished Bangalow</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Appointment Date:</span>
                <input type="date" name="date">
            </div>
        </div>

        <input type="submit" value="submit" class="btn" name="send">

    </form>
</section>

<!--book section end-->









<!--footer section start-->

<section class="footer">

<div class="box-container">

    <div class="box">
        <h3>Quick Links</h3>
        <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
        <a href="package.php"><i class="fas fa-angle-right"></i>Package</a>
        <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
        <a href="logout.php"><i class="fas fa-angle-right"></i>Logout</a>

    </div>

    <div class="box">
        <h3>Contact Info</h3>
        <a href="#"><i class="fas fa-phone"></i> +926-567-5019 </a>
        <a href="#"><i class="fas fa-phone"></i> +982-565-7737 </a>
        <a href="#"><i class="fas fa-envelope"></i> affansiddiqui@2349gmail.com </a>
        <a href="#"><i class="fas fa-map"></i> Ahmedabad, India - 380004 </a>

    </div>

    <div class="box">
        <h3>Follow Us</h3>
        <a href="#"><i class="fab fa-instagram"></i> instagram </a>
        <a href="#"><i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"><i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#"><i class="fab fa-twitter"></i> twitter </a>

    </div>

</div>

<div class="credit"> Created By <span> Mr.Affan Siddiqui & Mr.Aamir Shaikh </span> | all right reserved! </div>

</section>

<!--footer section end-->


<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script src="js/script.js"></script> 

</body>
</html>