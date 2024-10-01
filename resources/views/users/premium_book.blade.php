<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Booking</title>

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

<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Premium Booking</h1>
</div>

<!--book section start-->

<section class="booking">
    <form action="{{ route('premium-form') }}" method="post" class="book-form">
        @csrf
        <div class="flex">
            <div class="inputBox">
                <span>First Name:</span>
                <input type="text" placeholder="Enter Your First Name" name="firstname" value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Last Name:</span>
                <input type="text" placeholder="Enter Your Last Name" name="lastname" value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Enter Your Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Phone:</span>
                <input type="text" placeholder="Enter Your Number" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" placeholder="Enter Your Address" name="address" value="{{ old('address') }}">
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Premium Service:</span>
                <select name="room" class="form-control">
                    <option value="Kitchen" {{ old('room') == 'Kitchen' ? 'selected' : '' }}>Kitchen</option>
                    <option value="BadRoom" {{ old('room') == 'BadRoom' ? 'selected' : '' }}>BadRoom</option>
                    <option value="Garden" {{ old('room') == 'Garden' ? 'selected' : '' }}>Garden</option>
                    <option value="Living Room" {{ old('room') == 'Living Room' ? 'selected' : '' }}>Living Room</option>
                    <option value="Balcony" {{ old('room') == 'Balcony' ? 'selected' : '' }}>Balcony</option>
                </select>
                @error('room')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Appointment Date:</span>
                <input type="date" name="date" id="appointmentDate" value="{{ old('date') }}">
                @error('date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Payment Amount:</span>
                <input type="number" placeholder="Enter Payment Amount" name="payment_amount" value="{{ old('payment_amount') }}" step="0.01">
                @error('payment_amount')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="inputBox">
            <span>Select Payment Method:</span>
            <select id="payment-method" name="payment_method" required>
                <option value="" disabled {{ old('payment_method') ? '' : 'selected' }}>Select a payment method</option>
                <option value="UPI" {{ old('payment_method') == 'UPI' ? 'selected' : '' }}>UPI</option>
                <option value="Credit Card" {{ old('payment_method') == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
            </select>
            @error('payment_method')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div id="upi-payment" class="payment-method" style="display: {{ old('payment_method') == 'UPI' ? 'block' : 'none' }};">
            <div class="inputBox">
                <span>UPI ID:</span>
                <input type="text" placeholder="Enter Your UPI ID" name="upi_id" value="{{ old('upi_id') }}">
                @error('upi_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div id="card-payment" class="payment-method" style="display: {{ old('payment_method') == 'Credit Card' ? 'block' : 'none' }};">
            <div class="inputBox">
                <span>Card Number:</span>
                <input type="text" placeholder="Enter Your Card Number" name="card_number" value="{{ old('card_number') }}">
                @error('card_number')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>Expiry Date:</span>
                <input type="text" placeholder="MM/YY" name="expiry_date" value="{{ old('expiry_date') }}">
                @error('expiry_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>CVV:</span>
                <input type="text" placeholder="Enter Your CVV" name="cvv" value="{{ old('cvv') }}">
                @error('cvv')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="submit" value="Submit" class="btn">
    </form>
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
    <div class="credit"> Created By <span> Mr.Hamza Momin & Mr.Shadan Ansari </span> | all rights reserved! </div>
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
