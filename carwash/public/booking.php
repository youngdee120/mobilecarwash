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

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }

        .form-container {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            padding: 20px;
            margin-right: 20px;
            width: 100%;
        }

        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50%;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        #bookingForm {
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        #bookingForm h2 {
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }

        #bookingForm label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        #bookingForm input[type="text"],
        #bookingForm input[type="tel"],
        #bookingForm input[type="email"],
        #bookingForm input[type="datetime-local"],
        #bookingForm select,
        #bookingForm textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }

        #bookingForm button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: #fff;
            font-size: 1.1em;
            cursor: pointer;
            margin-bottom: 10px;
        }

        #bookingForm button:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            font-size: 20px;
            text-align: center;
            background-color: #f97316;
            color: white;
            position: fixed;
            bottom: 0;
        }

        textarea {
            resize: none;
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .image-container {
                width: 100%;
                margin-top: 20px;
            }

            #bookingForm {
                padding: 15px;
            }

            #bookingForm h2 {
                font-size: 1.2em;
            }

            #bookingForm label,
            #bookingForm input[type="text"],
            #bookingForm input[type="tel"],
            #bookingForm input[type="email"],
            #bookingForm input[type="datetime-local"],
            #bookingForm select,
            #bookingForm textarea {
                font-size: 0.9em;
            }

            #bookingForm button {
                font-size: 1em;
            }
        }
    </style>
    <title>Wash Me Please - Booking</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="client_dashboard.php">Services</a></li>
            <li><a href="booking.php" class="active">Booking</a></li>
            <li><a href="my_bookings.php">My bookings</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="form-container">
            <form action="../private/submit_booking.php" id="bookingForm" method="post">
                <div class="form-step" id="step1">
                    <h2>Step 1 of 3</h2>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <button type="button" onclick="nextStep(1)">Next</button>
                </div>
                <div class="form-step" id="step2" style="display:none;">
                    <h2>Step 2 of 3</h2>
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                    <label for="houseNumber">House Number:</label>
                    <input type="text" id="houseNumber" name="houseNumber" required>
                    <label for="dateTime">Date & Time:</label>
                    <input type="datetime-local" id="dateTime" name="dateTime" required>
                    <label for="timeSlot">Time:</label>
                    <select id="timeSlot" name="timeSlot" required>
                        <option value="7:00 AM">7:00 AM</option>
                        <option value="7:30 AM">7:30 AM</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="7:30 PM">7:30 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                    </select>
                    <button type="button" onclick="prevStep(1)">Previous</button>
                    <button type="button" onclick="nextStep(2)">Next</button>
                </div>
                <div class="form-step" id="step3" style="display:none;">
                    <h2>Step 3 of 3</h2>
                    <label for="carSize">Car Size:</label>
                    <select id="carSize" name="carSize" required>
                        <option value="compact">Compact (Small Car)</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="truck">Truck</option>
                    </select>
                    <label for="service">Service:</label>
                    <select id="service" name="service" required>
                        <option value="bodyWash">Body Wash - 300 KSh</option>
                        <option value="interiorCleaning">Interior Cleaning - 500 KSh</option>
                        <option value="fullService">Full Service - 800 KSh</option>
                    </select>
                    <label>Other Services:</label>
                    <div>
                        <input type="checkbox" id="carpetCleaning" name="otherServices[]" value="carpetCleaning">
                        <label for="carpetCleaning">Carpet Cleaning</label>
                    </div>
                    <div>
                        <input type="checkbox" id="parkingCleaning" name="otherServices[]" value="parkingCleaning">
                        <label for="parkingCleaning">Parking Cleaning</label>
                    </div>
                    <label for="additionalInfo">Additional Info:</label>
                    <textarea id="additionalInfo" name="additionalInfo" rows="4"></textarea>
                    <button type="button" onclick="prevStep(2)">Previous</button>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="image-container">
            <img src="../images/car-wash-min.jpg" alt="Promotional Image">
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Wash Me Please. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
