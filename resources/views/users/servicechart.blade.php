<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Chart</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .service-name {
            font-size: 18px; /* Adjust as needed */
            font-weight: bold; /* Make the service name bold */
            color: #333; /* Customize color */
        }

        .service-price {
            font-size: 16px; /* Adjust as needed */
            font-style: italic; /* Make the price italic */
            color: #030303; /* Customize color */
        }

        /* Additional styles for better appearance */
        .home-about {
            margin-bottom: 20px; /* Space between sections */
        }

        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4); /* Black with opacity */
        }

        .modal-content {
            background-color: white;
            margin: auto;
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
    </style>
</head>
<body>

<!-- Header Section -->
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

<!-- Heading Section -->
<div class="heading" style="background:url(image/heading.png) no-repeat">
    <h1>Service Packages</h1>
</div>

<!-- Classic Service Section -->
<section class="home-about">
    <div class="image">
        <img src="image/about.jpeg" alt="Classic Services">
    </div>
    <div class="content">
        <h3>Classic Services</h3>
        <ul>
            <li><span class="service-name">1. Refrigerator:</span> <span class="service-price">₹1500</span></li><br>
            <li><span class="service-name">2. Bathroom:</span> <span class="service-price">₹1000</span></li><br>
            <li><span class="service-name">3. A/c Service:</span> <span class="service-price">₹1200</span></li><br>
            <li><span class="service-name">4. Dusting:</span> <span class="service-price">₹800</span></li><br>
            <li><span class="service-name">5. Mopping:</span> <span class="service-price">₹600</span></li><br>
        </ul>
        <a href="classic_book" class="btn">Clean Now</a>
        <button class="btn" onclick="openModal('classic')">Details</button>
    </div>
</section>

<!-- Premium Service Section -->
<section class="home-about">
    <div class="image">
        <img src="image/premium.jpg" alt="Premium Services">
    </div>
    <div class="content">
        <h3>Premium Services</h3>
        <ul>
            <li><span class="service-name">1. Kitchen:</span> <span class="service-price">₹2000</span></li><br>
            <li><span class="service-name">2. Bedroom:</span> <span class="service-price">₹1800</span></li><br>
            <li><span class="service-name">3. Garden:</span> <span class="service-price">₹2200</span></li><br>
            <li><span class="service-name">4. Living Room:</span> <span class="service-price">₹2400</span></li><br>
            <li><span class="service-name">5. Balcony:</span> <span class="service-price">₹1500</span></li><br>
        </ul>
        <a href="premium_book" class="btn">Clean Now</a>
        <button class="btn" onclick="openModal('premium')">Details</button>
    </div>
</section>

<!-- Platinum Service Section -->
<section class="home-about">
    <div class="image">
        <img src="image/platinum.jpg" alt="Platinum Services">
    </div>
    <div class="content">
        <h3>Platinum Services</h3>
        <ul>
            <li><span class="service-name">1. Furnished Apartment:</span> <span class="service-price">₹3000</span></li><br>
            <li><span class="service-name">2. Unfurnished Apartment:</span> <span class="service-price">₹3000</span></li><br>
            <li><span class="service-name">3. Furnished Bungalow:</span> <span class="service-price">₹4000</span></li><br>
            <li><span class="service-name">4. Unfurnished Bungalow:</span> <span class="service-price">₹3500</span></li><br>
        </ul>
        <a href="platinum_book" class="btn">Clean Now</a>
        <button class="btn" onclick="openModal('platinum')">Details</button>
    </div>
</section>

<!-- Modal Structure -->
<div id="classicModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('classic')">&times;</span>
        <h3>Classic Services - Inclusions & Exclusions</h3>
        <h4>Inclusions:</h4>
        <ul>
            <li>Complete interior and exterior cleaning of the refrigerator, including shelves and compartments.</li>
            <li>Deep cleaning of bathroom surfaces, including tiles, floors, basins, and toilets.</li>
            <li>Cleaning and servicing of A/C filters and vents.</li>
            <li>Comprehensive dusting of all surfaces, including furniture, shelves, and electronics.</li>
            <li>Regular mopping of floors using disinfectants for a sanitized environment.</li>
        </ul>
        <h4>Exclusions:</h4>
        <ul>
            <li>Refrigerator defrosting services.</li>
            <li>Heavy mold or mildew removal in bathrooms.</li>
            <li>A/C gas refilling or advanced repairs.</li>
            <li>Dusting of extremely delicate or high-value items (e.g., artwork, antiques).</li>
            <li>Mopping in areas with pre-existing damage (e.g., cracked tiles or broken surfaces).</li>
        </ul>
    </div>
</div>

<div id="premiumModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('premium')">&times;</span>
        <h3>Premium Services - Inclusions & Exclusions</h3>

        <h4>Inclusions:</h4>
        <ul>
            <li>Thorough cleaning of all kitchen surfaces, including countertops, cabinets, and appliances (exterior).</li>
            <li>Detailed cleaning of bedroom surfaces, including furniture, windows, and floors, plus vacuuming if required.</li>
            <li>Complete garden cleanup, including debris removal, trimming, and basic lawn maintenance.</li>
            <li>Comprehensive cleaning of living room areas, including furniture dusting, vacuuming, and floor mopping.</li>
            <li>Balcony cleaning, including railing scrubbing, floor mopping, and debris removal.</li>
        </ul>

        <h4>Exclusions:</h4>
        <ul>
            <li>Deep cleaning of kitchen appliances' interiors (e.g., oven, refrigerator).</li>
            <li>Specialized cleaning for heavy stains on bedroom carpets or upholstery.</li>
            <li>Advanced gardening tasks (e.g., planting, fertilizing, complex lawn care).</li>
            <li>Cleaning of delicate or high-value living room items (e.g., artwork, antiques).</li>
            <li>Balcony repair or painting services.</li>
        </ul>
    </div>
</div>

<div id="platinumModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('platinum')">&times;</span>
        <h3>Platinum Services - Inclusions & Exclusions</h3>

        <h4>Inclusions:</h4>
        <ul>
            <li>Complete cleaning of furnished apartments, including all rooms, furniture dusting, and polishing.</li>
            <li>Thorough cleaning of unfurnished apartments, focusing on floors, walls, and general areas (up to 1500 sq ft).</li>
            <li>Deep cleaning of furnished bungalows, including all furniture, appliances (exterior), and surface areas (up to 2500 sq ft).</li>
            <li>Thorough cleaning of unfurnished bungalows, focusing on floors, walls, and open spaces (up to 2000 sq ft).</li>
            <li>Detailed cleaning of windows, doors, and frames, including hard-to-reach areas.</li>
            <li>Special attention to bathrooms and kitchens for both furnished and unfurnished properties.</li>
        </ul>

        <h4>Exclusions:</h4>
        <ul>
            <li>Cleaning of additional square footage beyond the specified limits (1500 sq ft for apartments, 2000-2500 sq ft for bungalows).</li>
            <li>Deep cleaning inside large appliances (e.g., refrigerators, ovens, dishwashers).</li>
            <li>Restoration services for damaged furniture or flooring.</li>
            <li>Painting or repair services for walls or fixtures.</li>
            <li>Specialized cleaning for delicate items like artwork or antiques.</li>
        </ul>
    </div>
</div>

<!-- Footer Section -->
<section class="footer">
    <!-- Footer content unchanged -->
</section>

<script>
    function openModal(serviceType) {
        document.getElementById(serviceType + 'Modal').style.display = 'block';
    }

    function closeModal(serviceType) {
        document.getElementById(serviceType + 'Modal').style.display = 'none';
    }
</script>

</body>
</html>
