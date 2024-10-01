<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .service-item {
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 8px; /* Rounded corners */
            padding: 10px; /* Space inside the box */
            margin: 10px; /* Space between boxes */
            display: inline-block; /* Aligns items horizontally */
            text-align: center; /* Center text and image */
            width: 150px; /* Increase width for each box */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
        }

        .service-image {
            width: 120px; /* Set the width of the image */
            height: auto; /* Keep the aspect ratio */
            margin-bottom: 5px; /* Space below the image */
        }

        /* Booking Form Styles */
        .booking-form {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .booking-form input,
        .booking-form select,
        .booking-form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .booking-form button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }

        .booking-form button:hover {
            background-color: #218838;
        }

        /* Modal styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.view-details-btn {
    background-color: #007bff; /* Blue background */
    color: white; /* White text color */
    padding: 10px 15px; /* Top/bottom and left/right padding */
    font-size: 16px; /* Font size */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
}

.view-details-btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.05); /* Slightly larger on hover */
}

.view-details-btn:focus {
    outline: none; /* Remove outline on focus */
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
<!--header section end-->

<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Package</h1>
</div>

<section class="home-about">
    <div class="image">
        <img src="image/about.jpeg" alt="">
    </div>

    <div class="content">
        <h3>Classic Services</h3>
        @foreach ($services as $service)
            @if ($service->category == 'Classic')
                <p>{{ $service->name }} - ₹{{ $service->price }}</p>
            @endif
        @endforeach
    </div>
</section>

<section class="home-about">
    <div class="image">
        <img src="image/premium.jpg" alt="">
    </div>

    <div class="content">
        <h3>Premium Services</h3>
        @foreach ($services as $service)
            @if ($service->category == 'Premium')
                <p>{{ $service->name }} - ₹{{ $service->price }}</p>
            @endif
        @endforeach
    </div>
</section>

<section class="home-about">
    <div class="image">
        <img src="image/platinum.jpg" alt="">
    </div>

    <div class="content">
        <h3>Platinum Services</h3>
        @foreach ($services as $service)
            @if ($service->category == 'Platinum')
                <p>{{ $service->name }} - ₹{{ $service->price }}</p>
            @endif
        @endforeach
    </div>
</section>

<section class="home-about">
    <div class="content">
        <h3>Other Services</h3>
        @foreach ($services as $service)
            @if ($service->category === 'Other')
                <div class="service-item">
                    @if($service->image)
                        <img src="{{ asset('storage/services/' . basename($service->image)) }}" alt="{{ $service->name }}" class="service-image">
                    @else
                        <p>No image available for this service.</p>
                    @endif
                    <p>{{ $service->name }} - ₹{{ $service->price }}</p>

                    <button class="view-details-btn" onclick="openModal('serviceModal{{ $service->id }}')">View Details</button>

                    <!-- Modal for viewing details -->
                    <div id="serviceModal{{ $service->id }}" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('serviceModal{{ $service->id }}')">&times;</span>
                            <h3>{{ $service->name }} Details</h3>
                            <p><strong>Price:</strong> ₹{{ $service->price }}</p>
                            <p><strong>Details:</strong> {{ $service->details }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>


<section class="home-about">
    <div class="booking-form">
        <h3>Book a Service</h3>

        @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <form action="book-service" method="POST">
            @csrf

            <!-- Service Selection -->
            <label for="service">Select Service:</label>
            <select name="service" id="service" required>
                <option value="">Choose a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - ₹{{ $service->price }}</option>
                @endforeach
            </select>

            <!-- Customer Information -->
            <label for="customer_name">Your Name:</label>
            <input type="text" name="customer_name" id="customer_name" placeholder="Enter your name" required>

            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number" placeholder="Enter your contact number" required>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" placeholder="Enter your address" required>

            <!-- Appointment Date -->
            <label for="date">Date of Service:</label>
            <input type="date" name="date" id="appointmentDate" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">

            <!-- Payment Amount -->
            <label for="payment_amount">Payment Amount:</label>
            <input type="number" name="payment_amount" id="payment_amount" placeholder="Enter payment amount" step="0.01" required>

            <!-- Payment Method Section -->
            <h3>Payment Method</h3>
            <label for="payment-method">Select Payment Method:</label>
            <select id="payment-method" name="payment_method" required>
                <option value="" disabled selected>Select a payment method</option>
                <option value="UPI">UPI</option>
                <option value="Credit Card">Credit Card</option>
            </select>

            <!-- UPI Payment Section -->
            <div id="upi-payment" class="payment-method" style="display:none;">
                <label for="upi_id">UPI ID:</label>
                <input type="text" name="upi_id" id="upi_id" placeholder="Enter your UPI ID">
            </div>

            <!-- Credit Card Payment Section -->
            <div id="card-payment" class="payment-method" style="display:none;">
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" id="card_number" placeholder="Enter your card number">

                <label for="expiry_date">Expiry Date (MM/YY):</label>
                <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YY">

                <label for="cvv">CVV:</label>
                <input type="text" name="cvv" id="cvv" placeholder="Enter your CVV">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">Book Now</button>
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
            <a href="contactus"><i class="fas fa-angle-right"></i>Contactus</a>
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

    <div class="credit"> Created By <span> Mr. Hamza Momin & Mr. Shadan Ansari </span> | All rights reserved! </div>
</section>
<!--footer section end-->

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
    document.getElementById('payment-method').addEventListener('change', function() {
        var paymentMethod = this.value;
        var upiPayment = document.getElementById('upi-payment');
        var cardPayment = document.getElementById('card-payment');

        // Hide both payment sections initially
        upiPayment.style.display = 'none';
        cardPayment.style.display = 'none';

        // Display the relevant section based on payment method selection
        if (paymentMethod === 'UPI') {
            upiPayment.style.display = 'block';
        } else if (paymentMethod === 'Credit Card') {
            cardPayment.style.display = 'block';
        }
    });

    // Setting the minimum date for the service date to today
    var dateInput = document.getElementById('appointmentDate');
    var today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);

    document.addEventListener('DOMContentLoaded', function () {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            alert(successAlert.innerText); // Show the success message in an alert box
            // You can also auto-hide the success message after a few seconds
            setTimeout(function () {
                successAlert.style.display = 'none';
            }, 5000); // Hide after 5 seconds
        }
    });

    // Function to open modal
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

// Function to close modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    const modals = document.getElementsByClassName('modal');
    for (let i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = 'none';
        }
    }
}

</script>
</body>
</html>
