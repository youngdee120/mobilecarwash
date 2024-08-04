<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        body, ul {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #f97316;
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #333;
        }

        .navbar ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #333;
            color: #f97316;
        }

        .navbar a.active {
            background-color: #333;
            color: #f97316;
        }
        .services-section {
            background: #f9f9f9;
            padding: 2rem 0; /* Add padding for top and bottom */
        }

        #hero {
            background: url('../images/car-wash-min.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 5rem 1rem;
        }

        #hero h2 {
            font-size: 2.8rem;
        }

        #hero p {
            font-size: 1.2rem;
            margin: 1rem 0; /* Add margin for spacing */
        }

        button {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add transition for smooth hover effect */
        }

        button:hover {
            background: blue;
            color: white;
            text-decoration: none;
        }

        #services .service-packages {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px; /* Increase gap for better spacing */
            margin: 20px; /* Add margin for spacing */
            flex-wrap: wrap; /* Allow wrapping for smaller screens */
        }

        #services h3 {
            text-align: center;
            font-size: 40px;
            margin: 1rem 0; /* Add margin for spacing */
        }

        #services h3 span {
            color: #f97316;
        }

        .package {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1 1 300px; /* Allow flexibility in width */
            max-width: 320px; /* Set max width for each package */
        }

        .package-header {
            padding: 10px;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .package-header.silver {
            background-color: #f97316;
        }

        .package-header.gold {
            background-color: #f97316;
        }

        .package-header.platinum {
            background-color: #f97316;
        }

        .package-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .package-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .package-list li:last-child {
            border-bottom: none;
        }

        .package-list li:nth-child(even) {
            background-color: #f9f9f9;
        }

        .about-us {
            background-color: #f9f9f9;
            padding: 40px 20px;
            text-align: left; /* Aligns text to the left */
        }

        .about-us h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .about-content {
            display: flex;
            align-items: center; /* Center the image vertically */
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap; /* Allows wrapping on smaller screens */
        }

        .about-text {
            flex: 1; /* Allows the text to take remaining space */
            max-width: 600px; /* Limit the maximum width of the text */
            margin-right: 20px; /* Space between text and image */
        }

        .about-text h3 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .about-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 10px 0;
            color: #666;
        }

        .about-image {
            flex: 1; /* Allows the image to take remaining space */
            max-width: 600px; /* Limit the maximum width of the image */
        }

        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }


        #contact h3{
            text-align: center;
            font-size: 35px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            margin-top: 0.5rem;
        }

        form input, form textarea {
            padding: 0.5rem;
            margin-top: 0.5rem;
            width: 100%;
            max-width: 300px;
        }
        .reviews {
            background-color: #f9f9f9; /* Light background color for contrast */
            padding: 50px 0; /* Padding for top and bottom */
            text-align: center; /* Center-align text */
        }

        .reviews .heading {
            font-size: 2.5rem; /* Increase heading font size */
            color: #333; /* Dark text color */
            margin-bottom: 30px; /* Spacing below the heading */
            font-weight: bold; /* Bold font for emphasis */
        }

        .reviews-container {
            display: flex; /* Use flexbox layout */
            justify-content: center; /* Center align items */
            flex-wrap: wrap; /* Allow wrapping for rows */
            padding: 0 20px; /* Add horizontal padding */
        }

        .swiper-wrapper {
            display: flex; /* Use flexbox to arrange slides */
            flex-wrap: wrap; /* Allow wrapping */
            justify-content: center; /* Center the slides in the container */
            width: 100%; /* Ensure it takes full width */
        }

        .swiper-slide {
            background: #fff; /* White background for each slide */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            padding: 20px; /* Padding for slide content */
            width: calc(33.333% - 20px); /* Adjust width for three columns with gaps */
            margin: 10px; /* Margin for spacing */
            transition: transform 0.3s ease; /* Smooth transform transition */
        }

        .swiper-slide:hover {
            transform: translateY(-10px); /* Lift effect on hover */
        }

        .swiper-slide img {
            width: 100px; /* Fixed size for customer images */
            height: 100px; /* Maintain aspect ratio */
            border-radius: 50%; /* Circular images */
            margin: 15px 0; /* Spacing around images */
        }

        .swiper-slide h3 {
            font-size: 1.5rem; /* Heading size for customer name */
            color: #007bff; /* Primary color for customer names */
            margin: 10px 0; /* Margin for spacing */
        }

        .swiper-slide p {
            font-size: 1rem; /* Regular font size for reviews */
            color: #555; /* Slightly darker text for readability */
            line-height: 1.6; /* Improve readability with line height */
        }

        .stars {
            display: flex; /* Flex display for stars */
            justify-content: center; /* Center the stars */
            margin-top: 10px; /* Margin above stars */
        }

        .stars i {
            color: #ffcc00; /* Gold color for stars */
            margin: 0 2px; /* Spacing between stars */
            font-size: 1.2rem; /* Size for star icons */
        }
        footer {
            background-color: #f97316;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        /* Responsive Styles */
        @media (max-width: 768px) {
            .swiper {
                grid-template-columns: repeat(2, 1fr); /* Two columns on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .swiper {
                grid-template-columns: 1fr; /* One column on very small screens */
            }
        }
    </style>
    <title>Wash Me Please</title>
</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="client_dashboard.php" class="active">Services</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="my_bookings.php">My bookings</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
    <div class="services-section">
    <section id="hero">
        <h2>Kenya's Preferred Mobile Car Wash</h2>
        <p>Eco-friendly, convenient, and flexible car washing at your preferred location. Experience a new level of convenience with our mobile services that bring the car wash to you, ensuring that your vehicle remains spotless without the hassle of visiting a physical location.</p>
        <a href="booking.php"><button>Book Now</button></a>
    </section>
    <section id="services">
        <h3>Our <span>Services</span></h3>
        <div class="service-packages">
            <div class="package">
                <div class="package-header silver">SILVER PACKAGE</div>
                <ul class="package-list">
                    <li>Body wash</li>
                    <li>Interior wipe down</li>
                    <li>Interior vacuum</li>
                    <li>Window cleaning</li>
                    <li>Basic tire cleaning</li>
                    <li>Quick wax finish</li>
                    <li>-</li>
                    <li>-</li>
                </ul>
            </div>
            <div class="package">
                <div class="package-header gold">GOLD PACKAGE</div>
                <ul class="package-list">
                    <li>Body wash</li>
                    <li>Interior wipe down</li>
                    <li>Interior vacuum</li>
                    <li>Tyre shine</li>
                    <li>Dashboard polish</li>
                    <li>Windshield water enhancement</li>
                    <li>Underbody wash</li>
                    <li>-</li>
                </ul>
            </div>
            <div class="package">
                <div class="package-header platinum">PLATINUM PACKAGE</div>
                <ul class="package-list">
                    <li>Body wash</li>
                    <li>Interior wipe down</li>
                    <li>Interior vacuum</li>
                    <li>Tyre shine</li>
                    <li>Dashboard polish</li>
                    <li>Windshield water enhancement</li>
                    <li>Engine wash</li>
                    <li>Body waxing</li>
                </ul>
            </div>
        </div>
    </section>
</div>
<section id="about" class="about-us">
    <h2>About Us</h2>
    <div class="about-content">
        <div class="about-text">
            <h3>Welcome to Mobile Car Wash</h3>
            <p>
                At Mobile Car Wash, we take pride in delivering top-notch mobile car wash services across Kenya. Our mission is to provide our customers with an unparalleled car washing experience, offering convenience and quality that exceeds expectations.
            </p>
            <p>
                Our team consists of experienced professionals who are passionate about cars and dedicated to ensuring your vehicle looks its best. We use eco-friendly products and advanced techniques to clean and protect your vehicle while being mindful of the environment.
            </p>
            <p>
                Whether you're at home, work, or anywhere in between, we bring our services directly to you. With flexible scheduling and a commitment to customer satisfaction, you can trust us to keep your car spotless and shining.
            </p>
        </div>
        <div class="about-image">
            <img src="../images/login.jpg" alt="Car Wash Service">
        </div>
    </div>
</section>

<!-- Customer reviews starts -->
<section class="reviews">
    <h1 class="heading">Customer Reviews</h1>

    <div class="reviews-container">
        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <p>I've used Johannes Car Wash services multiple times, and I am always impressed by their attention to detail. My car looks brand new after each wash! Highly recommend!</p>
                    <img src="../images/customer1.jpeg" alt="Customer Review">
                    <h3>Jane Doe</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>The convenience of door-to-door service is fantastic! The team is professional and friendly, and they really know how to make my car shine. I'm a satisfied customer!</p>
                    <img src="../images/customer2.jpeg" alt="Customer Review">
                    <h3>John Smith</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>Great service! They arrived on time and did an amazing job cleaning my car. I've tried other services, but Johannes Car Wash is the best by far!</p>
                    <img src="../images/customer3.jpeg" alt="Customer Review">
                    <h3>Emily Johnson</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>I appreciate how thorough the team is! They pay attention to every little detail and my car always comes out looking spotless. Definitely my go-to car wash!</p>
                    <img src="../images/customer4.jpeg" alt="Customer Review">
                    <h3>Michael Brown</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>Fast and efficient service! My car was cleaned and detailed in no time. The quality of work exceeded my expectations. I will definitely be using their services again!</p>
                    <img src="../images/customer5.jpeg" alt="Customer Review">
                    <h3>Sarah Davis</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <p>I've never been happier with a car wash! They treated my car with such care and the end result was stunning. Highly recommend Johannes Car Wash!</p>
                    <img src="../images/customer6.jpeg" alt="Customer Review">
                    <h3>David Wilson</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Customer reviews ends -->
    <section id="contact">
        <h3>Contact Us</h3>
        <form action="process_contact.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </section>
</div>
<footer>
    <p>&copy; 2024 Wash Me Please. All rights reserved.</p>
</footer>
<script src="script.js"></script>
</body>
</html>
