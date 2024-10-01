<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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



<!--home section start-->

<section class="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background:url(image/kitchen.jpeg) no-repeat">
                <div class="content">
                    <span>Clean My Space</span>
                    <h3>Mini Services</h3>
                    
                </div>
            </div>

            

            <div class="swiper-slide slide" style="background:url(image/furnitured_room.jpeg) no-repeat">
                <div class="content">
                    <span>Clean My Space</span>
                    <h3>Furnished Apartment</h3>
                    
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url(image/Unfurnitured_room.jpg) no-repeat">
                <div class="content">
                    <span>Clean My Space</span>
                    <h3>Unfurnished Apartment</h3>
                    
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url(image/furnished_banglow1.jpg) no-repeat">
                <div class="content">
                    <span>Clean My Space</span>
                    <h3>Furnished Bangalow</h3>
                    
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url(image/unfurnished_banglow.jpg) no-repeat">
                <div class="content">
                    <span>Clean My Space</span>
                    <h3>Unfurnished Bangalow</h3>
                    
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url(image/furnitured_room1.jpeg) no-repeat">
                <div class="content">
                    <span>Clean My Space</span>
                    <h3>Book By Room</h3>
                    
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!--home section end-->


<!--home about section start-->

<section class="home-about">

    <div class="image">
        <img src="image/about_clean.jpg" alt="">
    </div>

    <div class="content">
        <h3>About Us</h3>
        <p>Does deep cleaning your house seem like an overwhelming chore to you, 
            and you do not know where to start? Don't worry! 
            Plenty of people feel that way when it comes to cleaning their homes. 
            The good news is that there is a simple solution to this problem which is hiring professionals offering home cleaning services in Ahmedabad, 
            India from Clean My Space. We also offer specific services like kitchen deep cleaning, 
            bathroom deep cleaning or sofa/mattress cleaning if you don't want to get your entire house cleaned.</p>
        <a href="about.php" class="btn">Read More</a>
    </div>

</section>

<!--home about section end-->



<!--home package section start-->

<section class="home-package">

    <h1 class="heading-title">Our Package</h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="image/about.jpeg" alt="">
            </div>
            <div class="content">
                <h3>Classic Services</h3>
                <p>Wiping & mopping of floor & balcony, bathroom deep cleaning. 
                   Dry dusting of ceiling, walls & windows, dry vacuuming of furniture</p>
                <a href="package.php" class="btn">View More</a>
            </div>   
        </div>

        <div class="box">
            <div class="image">
                <img src="image/premium.jpg" alt="">
            </div>
            <div class="content">
                <h3>Premium Services</h3>
                <p>Deep cleaning of bedroom, living room, bathroom, kitchen & balcony. 
                    Floor deep cleaning by single disc machine, vacuuming of sofa & carpets</p>
                <a href="package.php" class="btn">View More</a>
            </div>   
        </div>

        <div class="box">
            <div class="image">
                <img src="image/platinum.jpg" alt="">
            </div>
            <div class="content">
                <h3>Platinum Services</h3>
                <p>Areas of Premium + deep cleaning of wooden floor & furniture.
                    Includes wet vacuuming of sofa, mattresses and cushioned chairs</p>
                <a href="package.php" class="btn">View More</a>
            </div>   
        </div>

    </div>

</section>

<!--home package section end-->


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


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/script.js"></script> 

</body>
</html>