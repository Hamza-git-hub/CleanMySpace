<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platinum Booking</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .inputBox {
            margin-bottom: 20px;
        }
        .payment-method {
            display: none;
            margin-top: 20px;
        }
        .payment-method .inputBox {
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838;
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
<!-- Display success message in alert box if booking is successful -->
@if (session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif
<!--header section end-->

<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Platinum Booking</h1>
</div>

<!--book section start-->
<!-- Booking Form Section -->
<section class="home-about">
    <div class="booking-form">
        <h3>Book a Service</h3>
        <form action="book-service" method="POST">
            @csrf
            <label for="service">Select Service:</label>
            <select name="service" id="service" required>
                <option value="">Choose a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - ₹{{ $service->price }}</option>
                @endforeach
            </select>

            <label for="customer_name">Your Name:</label>
            <input type="text" name="customer_name" id="customer_name" placeholder="Enter your name" required>

            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number" placeholder="Enter your contact number" required>

            <label for="date">Date of Service:</label>
            <input type="date" name="date" id="date" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">

            <button type="submit">Book Now</button>
        </form>
    </div>
</section>

<!--footer section start-->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="home"><i class="fas fa-angle-right"></i>Home</a>
            <a href="package"><i class="fas fa-angle-right"></i>Package</a>
            <a href="about"><i class="fas fa-angle-right"></i>About</a>
            <a href="contactus"><i class="fas fa-angle-right"></i>Contact Us</a>
            <a href="logout"><i class="fas fa-angle-right"></i>Logout</a>
        </div>

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

    <div class="credit"> Created By <span> Mr.Hamza Momin & Mr.Shadan Ansari </span> | All Rights Reserved! </div>
</section>
<!--footer section end-->

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
    // Get the input element for date
    var dateInput = document.getElementById('appointmentDate');
    // Get the current date in yyyy-mm-dd format
    var today = new Date().toISOString().split('T')[0];
    // Set the minimum date attribute to the current date
    dateInput.setAttribute('min', today);

    // Payment method selection logic
    document.getElementById('payment-method').addEventListener('change', function() {
        var paymentMethod = this.value;
        var upiPayment = document.getElementById('upi-payment');
        var cardPayment = document.getElementById('card-payment');

        upiPayment.style.display = 'none';
        cardPayment.style.display = 'none';

        if (paymentMethod === 'UPI') {
            upiPayment.style.display = 'block';
        } else if (paymentMethod === 'Credit Card') {
            cardPayment.style.display = 'block';
        }
    });
</script>
</body>
</html>
