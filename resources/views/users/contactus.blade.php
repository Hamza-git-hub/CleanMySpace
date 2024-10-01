<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Adjust form for responsiveness */
        .about .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .about h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333333; /* Adjust heading color */
        }
        .about label {
            display: block;
            margin-bottom: 10px;
            color: #333333; /* Adjust label color */
        }
        .about input[type="text"],
        .about textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in width */
        }
        .about input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .about input[type="submit"]:hover {
            background-color: #0056b3;
        }

       .container{
        width: 80rem;
       }

        /* Responsive adjustments */
        @media only screen and (max-width: 768px) {
            .about .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>



<!--header section start-->

<section class="header">

    <a href="home" class="logo">Clean My Space.</a>
    <nav class="navbar">
        <a href="dashboard">Home</a>
        <a href="package">Package</a>
        <a href="servicechart">Chart</a>
        <a href="team">Team</a>
        <a href="about">About</a>
        <a href="servicestatus">Status</a>
        <a href="contactus">ContactUs</a>
        <a href="logout">Logout</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</section>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<!--header section end-->

<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Contact Us</h1>
</div>


<!--about section start-->
<section class="about">

    <div class="container">
        <h1>Contact Us</h1>
        <form action="{{ route('contactus-form') }}" method="post" class="form-edit">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>


</section>

<!--about section end-->



<!--footer section start-->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="home"><i class="fas fa-angle-right"></i>Home</a>
            <a href="package"><i class="fas fa-angle-right"></i>Package</a>
            <a href="about"><i class="fas fa-angle-right"></i>About</a>
            <a href="contactus"><i class="fas fa-angle-right"></i>Contactus</a>
            <a href="logout"><i class="fas fa-angle-right"></i>Logout</a>

        </div>

       <!-- Contact Info Section -->
<div class="box">
    <h3>Contact Info</h3>
    <a href="tel:+820-001-9727"><i class="fas fa-phone"></i> +820-001-9727 </a>
    <a href="tel:+982-565-7737"><i class="fas fa-phone"></i> +982-565-7737 </a>
    <a href="mailto:hamzaex25@gmail.com"><i class="fas fa-envelope"></i> hamzaex25@gmail.com </a>
    <a href="https://www.google.com/maps?q=Ahmedabad,India"><i class="fas fa-map"></i> Ahmedabad, India - 380004 </a>
</div>

<div class="box">
    <h3>Follow Us</h3>
    <a href="https://www.instagram.com/read.as_hamza/"><i class="fab fa-instagram"></i> Instagram </a>
    <a href="https://twitter.com/your_twitter_username/"><i class="fab fa-twitter"></i> Twitter </a>
    <a href="https://www.facebook.com/your_facebook_username/"><i class="fab fa-facebook-f"></i> Facebook </a>
    <a href="https://www.linkedin.com/in/your_linkedin_profile/"><i class="fab fa-linkedin"></i> LinkedIn </a>
</div>

    </div>

    <div class="credit"> Created By <span> Mr.Hamza Momin & Mr.Shadan Ansari </span> | all right reserved! </div>

    </section>
<!--footer section end-->


<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>





