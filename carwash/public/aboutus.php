<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Car Wash</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            object-fit: cover;
        }

        .navbar {
            background-color: #f97316;
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #333;
            width: 100%;
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

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
            width: 100%;
        }

        .abody {
            width: 80%; /* Set a max width for better centering */
            padding: 20px;
            margin: 20px auto; /* Center the content horizontally */
        }

        .about-section {
            padding: 20px;
            background-color: rgba(189, 189, 189, 0.8);
            border-radius: 10px;
            margin: 20px 0; /* Add vertical margin for spacing */
        }

        .about-section-items h3 {
            margin-top: 20px;
        }

        .Slogan {
            margin: 10px 0;
            font-style: italic;
        }

        .row-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .row-gallery img {
            max-width: 30%;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .row-gallery img:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #f97316;
            color: white;
            text-align: center;
            padding: 1rem;
            width: 100%;
        }

        .footer-content {
            margin-bottom: 1rem;
        }

        .footer-content h3 {
            margin: 0;
        }

        .footer-content p {
            margin: 5px 0;
        }

        .socials {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .socials li {
            display: inline;
        }

        .socials a {
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .footer-bottom {
            font-size: 0.8rem;
        }

        .footer-bottom span {
            font-weight: bold;
        }

        .map-container {
            margin-top: 20px;
            text-align: center;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<video class="video-background" autoplay loop muted>
    <source src="../images/background.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="navbar">
    <ul>
        <li><a href="client_dashboard.php">Services</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="my_bookings.php">My bookings</a></li>
        <li><a href="aboutus.php" class="active">About Us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="abody">
    <div class="about-section">
        <div class="about-section-items">
            <p>Welcome to Getty Mobile Car Wash, Kenya's premier mobile car wash service. We specialize in delivering top-notch car wash services right to your doorstep, any day of the week. Our service area covers Nakuru County and surrounding regions, providing convenience and quality to our valued customers.</p>

            <h3>Our Slogan</h3>
            <div class="Slogan">
                <p>"Let us take care of the vehicle that takes care of your everyday"</p>
            </div>

            <h3>Our Philosophy</h3>
            <p>We believe that your car deserves the best care without you having to leave the comfort of your home or office. Our team is dedicated to providing exceptional service, ensuring that each vehicle is cleaned to the highest standards. Our customer-centric approach has earned us a reputation for reliability and excellence.</p>

            <h3>Services We Offer</h3>
            <ul>
                <li>Exterior Car Wash</li>
                <li>Interior Detailing</li>
                <li>Engine Cleaning</li>
                <li>Waxing and Polishing</li>
                <li>Leather Conditioning</li>
                <li>Headlight Restoration</li>
                <li>And much more!</li>
            </ul>

            <h3>Future Plans</h3>
            <p>We are committed to expanding our services to more regions within Kenya, continually enhancing our service offerings and investing in the latest car care technologies. Our vision is to be the leading mobile car wash service provider in Kenya, known for our quality, convenience, and customer satisfaction.</p>

            <div class="map-container">
                <h3>Our Service Area</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127744.2312998749!2d36.040849950000006!3d-0.30309814999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x178fff63b87d2f7b%3A0x21e7df53e43b06c6!2sNakuru%20County!5e0!3m2!1sen!2ske!4v1592836829118!5m2!1sen!2ske"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0">
                </iframe>
            </div>
        </div>
        <br/><br/>

        <div class="row-gallery">
            <img src="../images/1.jpg" alt="Car Wash Image 1">
            <img src="../images/2.jpg" alt="Car Wash Image 2">
            <img src="../images/3.jpg" alt="Car Wash Image 3">
            <img src="../images/4.jpg" alt="Car Wash Image 4">
            <img src="../images/5.jpg" alt="Car Wash Image 5">
            <img src="../images/6.jpg" alt="Car Wash Image 6">
            <img src="../images/7.jpg" alt="Car Wash Image 7">
            <img src="../images/login.jpg" alt="Car Wash Image 8">
            <img src="../images/car-wash-min.jpg" alt="Car Wash Image 9">
        </div>
    </div>
</div>

<footer>
    <div class="footer-content">
        <h3>Mobile Car Wash</h3>
        <p>Email: gettycarwash@gmail.com</p>
        <p>Call: 0711701061</p>
        <p>Address: Nakuru County, Kenya</p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>© 2024 Getty Mobile Car Wash. Created by <span>Getty</span></p>
    </div>
</footer>
</body>
</html>
