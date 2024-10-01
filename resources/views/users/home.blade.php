<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 15px; /* Reduced padding */
    background-color: #f8f9fa;
}

.logo {
    font-size: 20px; /* Smaller logo size */
    text-decoration: none;
    color: #333;
}

.navbar {
    display: flex;
}

.navbar a {
    margin-left: 15px; /* Less space between links */
    text-decoration: none;
    font-size: 14px; /* Reduced font size for links */
    color: #333;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 5px; /* Less gap */
}

.user-info i {
    margin-right: 5px; /* Reduced icon spacing */
    font-size: 16px;
    color: #0a0101;
}

.user-info span {
    font-size: 14px; /* Smaller font size */
    font-weight: bold;
    color: #0a0101;
    font-family: 'Poppins', sans-serif;
}

.profile-container h2 {
    font-size: 16px; /* Reduced profile name size */
    color: #333;
}

@media screen and (max-width: 768px) {
    .navbar {
        display: none;
    }
    .user-info {
        display: flex;
        justify-content: flex-end;
        margin-right: 40px; /* Reduced right margin */
        font-size: 14px; /* Adjusted font size for mobile */
        font-family: 'Poppins', sans-serif;
    }
    #menu-btn {
        display: block;
    }
}

        .cost-calculator {
            padding: 20px;
            background: #f8f9fa;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cost-calculator .form-group {
            margin-bottom: 15px;
        }
        .cost-calculator label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        .cost-calculator input,
        .cost-calculator select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .cost-calculator input:focus,
        .cost-calculator select:focus {
            outline: none;
            border-color: #aaa;
        }
        .cost-calculator .btn {
            background: #007bff;
            color: #333;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .cost-calculator .btn:hover {
            background: #0056b3;
        }
        .cost-calculator #cost-result {
            margin-top: 20px;
        }
        .cost-calculator #estimated-cost {
            color: #28a745;
            font-weight: bold;
        }

        .profile-container {
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile-image {
    width: 80px; /* Adjust the size as needed */
    height: 80px;
    border-radius: 50%; /* Makes the image round */
    object-fit: cover; /* Ensures the image scales well */
    border: 2px solid #ddd;
}

.profile-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 50%; /* Makes the placeholder round */
    background-color: #333;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
    border: 2px solid #ddd;
}

h2 {
    font-size: 18px;
    color: #333;
}

.ai-assistant {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding: 10px;
            z-index: 1000;
        }

        .ai-assistant-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            font-size: 16px;
        }

        .ai-assistant-body {
            flex: 1;
            padding: 10px;
            max-height: 300px;
            overflow-y: auto;
        }

        .ai-assistant-input {
            display: flex;
            margin-top: 10px;
        }

        .ai-assistant-input input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
        }

        .ai-assistant-input button {
            padding: 8px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 5px;
            border-radius: 5px;
        }

        .ai-message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f1f1f1;
        }

        .user-message {
            background-color: #e0f7fa;
            align-self: flex-end;
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
        <div id="menu-btn" class="fa fa-bars"></div>
        <div id="menu-btn" class="fa fa-bars"></div>

        @if (isset($user))
            <div class="profile-container">
                @if ($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->firstname }}" class="profile-image">
                @else
                    <div class="profile-placeholder">{{ strtoupper(substr($user->firstname, 0, 1)) }}{{ strtoupper(substr($user->lastname, 0, 1)) }}</div>
                @endif
                <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
            </div>
        @else
            <h2>User not found</h2>
        @endif


    </section>

    <!--header section end-->

    <!--home section start-->
    <section class="home">
        <div id="swiper-container" class="swiper home-slider">
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
<!-- AI Assistant section start -->
<div class="ai-assistant">
    <div class="ai-assistant-header">AI Assistant</div>
    <div class="ai-assistant-body" id="chat-body">
        <div class="ai-message">Hello! How can I assist you today?</div>
    </div>
    <div class="ai-assistant-input">
        <input type="text" id="user-input" placeholder="Type your message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>
<!-- AI Assistant section end -->
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
            <a href="about" class="btn">Read More</a>
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
                    <a href="package" class="btn">View More</a>
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
                    <a href="package" class="btn">View More</a>
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
                    <a href="package" class="btn">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!--home package section end-->

    <!--cost calculator section start-->
    <section class="cost-calculator">
        <h1 class="heading-title">Calculate Your Cleaning Cost</h1>
        <form id="calculator-form">
            <label for="num-rooms">Number of Rooms:</label>
            <input type="number" id="num-rooms" name="num-rooms" required>
            <br>
            <label for="cleaning-type">Cleaning Type:</label>
            <select id="cleaning-type" name="cleaning-type" required>
                <option value="basic">Basic</option>
                <option value="deep">Deep</option>
                <option value="premium">Premium</option>
            </select>
            <br>
            <button type="submit">Calculate Cost</button>
        </form>
        <div id="cost-result">
            <h3>Estimated Cost: <span id="estimated-cost"></span> INR</h3>
        </div>
    </section>
    <!--cost calculator section end-->

    {{-- <div class="container">
        <h1>Welcome, {{ $user->firstname }} {{ $user->lastname }}</h1>
        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail" width="150">
    </div> --}}

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
        <div class="credit"> Created By <span> Mr.Hamza Momin & Mr.Shadan Ansari </span> | all right reserved! </div>
    </section>
    <!--footer section end-->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('#swiper-container', {
            autoplay: {
                delay: 2000,
            },
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        document.getElementById('calculator-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var numRooms = document.getElementById('num-rooms').value;
            var cleaningType = document.getElementById('cleaning-type').value;
            var costPerRoom;

            if (cleaningType === 'basic') {
                costPerRoom = 1500;
            } else if (cleaningType === 'deep') {
                costPerRoom = 3000;
            } else {
                costPerRoom = 4500;
            }

            var estimatedCost = numRooms * costPerRoom;
            document.getElementById('estimated-cost').textContent = '₹' + estimatedCost;
            document.getElementById('cost-result').style.display = 'block';
        });


        function sendMessage() {
            const userInput = document.getElementById('user-input').value;
            if (userInput.trim() === '') return;

            // Append the user's message to the chat body
            const chatBody = document.getElementById('chat-body');
            const userMessage = document.createElement('div');
            userMessage.className = 'ai-message user-message';
            userMessage.textContent = userInput;
            chatBody.appendChild(userMessage);
            document.getElementById('user-input').value = '';  // Clear the input

            // Scroll to the bottom
            chatBody.scrollTop = chatBody.scrollHeight;

            // Simple AI response simulation
            setTimeout(() => {
                const aiResponse = document.createElement('div');
                aiResponse.className = 'ai-message';
                aiResponse.textContent = generateAIResponse(userInput);
                chatBody.appendChild(aiResponse);
                chatBody.scrollTop = chatBody.scrollHeight;
            }, 1000);
        }

        function generateAIResponse(userMessage) {
    // Simple keyword-based response for demonstration
    userMessage = userMessage.toLowerCase();

    if (userMessage.includes('cost')) {
        return 'You can use our cost calculator to estimate your cleaning cost!';
    } else if (userMessage.includes('package')) {
        return 'We offer Classic, Premium, and Platinum services. Would you like more details?';
    } else if (userMessage.includes('team')) {
        return 'Our team is composed of experienced professionals dedicated to providing quality cleaning services.';
    } else if (userMessage.includes('available')) {
        return 'We are available 7 days a week! Let us know your preferred time for a cleaning service.';
    } else if (userMessage.includes('contact')) {
        return 'You can reach us via our contact page or call our customer service at +123456789.';
    } else if (userMessage.includes('feedback')) {
        return 'We value your feedback! Please share your thoughts so we can improve our services.';
    } else if (userMessage.includes('hours')) {
        return 'Our service hours are from 8 AM to 8 PM. You can book your cleaning anytime during these hours.';
    } else if (userMessage.includes('location')) {
        return 'We provide services in multiple locations. Please check our website for specific areas we cover.';
    } else if (userMessage.includes('schedule')) {
        return 'You can easily schedule a service through our booking system on the website.';
    } else if (userMessage.includes('service')) {
        return 'We offer a range of services, including basic, deep, and premium cleaning. What are you interested in?';
    } else {
        return 'I am here to assist you with any questions related to Clean My Space. Just let me know how I can help!';
    }
}

    </script>
    <script src="js/script.js"></script>
</body>
</html>
