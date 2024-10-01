<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Team section styling */
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            background-color: #f4f4f9;
        }

        .team-member {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            text-align: center;
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .team-member p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }

        .team-member strong {
            color: #555;
        }
    </style>
</head>
<body>

    <!-- Header section -->
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

    <!-- Team section -->
    <h1 style="text-align:center;">Meet Our Team</h1>
    <section class="team-members">
        @foreach($teamMembers as $member)
            <div class="team-member">
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                <p><strong>Name:</strong> {{ $member->name }}</p>
                <p><strong>Role:</strong> {{ $member->role }}</p>
                <p><strong>Details:</strong> {{ $member->details }}</p>
            </div>
        @endforeach
    </section>

    <!-- Footer section -->
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
        <div class="credit">Created By <span>Mr. Hamza Momin & Mr. Shadan Ansari</span> | all rights reserved!</div>
    </section>

</body>
</html>
