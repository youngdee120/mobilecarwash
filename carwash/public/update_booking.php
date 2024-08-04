<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

include '../private/database.php';

// Fetch booking details
if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];
    $sql = "SELECT * FROM bookings WHERE id = $bookingId";
    $result = $conn->query($sql);
    $booking = $result->fetch_assoc();
}

// Update booking details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $houseNumber = $_POST['houseNumber'];
    $dateTime = $_POST['dateTime'];
    $timeSlot = $_POST['timeSlot'];
    $carSize = $_POST['carSize'];
    $service = $_POST['service'];
    $otherServices = isset($_POST['otherServices']) ? implode(", ", $_POST['otherServices']) : '';
    $additionalInfo = $_POST['additionalInfo'];

    $sql = "UPDATE bookings SET name='$name', phone='$phone', email='$email', location='$location', house_number='$houseNumber', date_time='$dateTime', time_slot='$timeSlot', car_size='$carSize', service='$service', other_services='$otherServices', additional_info='$additionalInfo' WHERE id=$bookingId";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Record updated successfully!');
        setTimeout(function(){
            window.location.href = 'my_bookings.php';
        }, 1000);
      </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    header("Location: my_bookings.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('../images/login.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="datetime-local"],
        select,
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Checkbox Styles */
        input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type="checkbox"] + label {
            margin-bottom: 10px;
        }

        div {
            margin-bottom: 10px;
        }

        footer {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            font-size: 20px;
            text-align: center;
            background-color: #f97316;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            form {
                flex-direction: column;
            }
        }
    </style>
    <title>Update Booking</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="client_dashboard.php">Services</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="my_bookings.php" class="active">My bookings</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h2>Update Booking</h2>
        <form action="update_booking.php?id=<?php echo $bookingId; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $booking['name']; ?>" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $booking['phone']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $booking['email']; ?>" required>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $booking['location']; ?>" required>
            <label for="houseNumber">House Number:</label>
            <input type="text" id="houseNumber" name="houseNumber" value="<?php echo $booking['house_number']; ?>" required>
            <label for="dateTime">Date & Time:</label>
            <input type="datetime-local" id="dateTime" name="dateTime" value="<?php echo $booking['date_time']; ?>" required>
            <label for="timeSlot">Time:</label>
            <select id="timeSlot" name="timeSlot" required>
                <option value="7:00 AM" <?php if($booking['time_slot'] == '7:00 AM') echo 'selected'; ?>>7:00 AM</option>
                <option value="7:30 AM" <?php if($booking['time_slot'] == '7:30 AM') echo 'selected'; ?>>7:30 AM</option>
                <option value="8:00 AM" <?php if($booking['time_slot'] == '8:00 AM') echo 'selected'; ?>>8:00 AM</option>
                <option value="8:30 AM" <?php if($booking['time_slot'] == '8:30 AM') echo 'selected'; ?>>8:30 AM</option>
                <option value="9:00 AM" <?php if($booking['time_slot'] == '9:00 AM') echo 'selected'; ?>>9:00 AM</option>
                <option value="9:30 AM" <?php if($booking['time_slot'] == '9:30 AM') echo 'selected'; ?>>9:30 AM</option>
                <option value="10:00 AM" <?php if($booking['time_slot'] == '10:00 AM') echo 'selected'; ?>>10:00 AM</option>
                <option value="10:30 AM" <?php if($booking['time_slot'] == '10:30 AM') echo 'selected'; ?>>10:30 AM</option>
                <option value="11:00 AM" <?php if($booking['time_slot'] == '11:00 AM') echo 'selected'; ?>>11:00 AM</option>
                <option value="11:30 AM" <?php if($booking['time_slot'] == '11:30 AM') echo 'selected'; ?>>11:30 AM</option>
                <option value="12:00 PM" <?php if($booking['time_slot'] == '12:00 PM') echo 'selected'; ?>>12:00 PM</option>
                <option value="12:30 PM" <?php if($booking['time_slot'] == '12:30 PM') echo 'selected'; ?>>12:30 PM</option>
                <option value="1:00 PM" <?php if($booking['time_slot'] == '1:00 PM') echo 'selected'; ?>>1:00 PM</option>
                <option value="1:30 PM" <?php if($booking['time_slot'] == '1:30 PM') echo 'selected'; ?>>1:30 PM</option>
                <option value="2:00 PM" <?php if($booking['time_slot'] == '2:00 PM') echo 'selected'; ?>>2:00 PM</option>
                <option value="2:30 PM" <?php if($booking['time_slot'] == '2:30 PM') echo 'selected'; ?>>2:30 PM</option>
                <option value="3:00 PM" <?php if($booking['time_slot'] == '3:00 PM') echo 'selected'; ?>>3:00 PM</option>
                <option value="3:30 PM" <?php if($booking['time_slot'] == '3:30 PM') echo 'selected'; ?>>3:30 PM</option>
                <option value="4:00 PM" <?php if($booking['time_slot'] == '4:00 PM') echo 'selected'; ?>>4:00 PM</option>
                <option value="4:30 PM" <?php if($booking['time_slot'] == '4:30 PM') echo 'selected'; ?>>4:30 PM</option>
                <option value="5:00 PM" <?php if($booking['time_slot'] == '5:00 PM') echo 'selected'; ?>>5:00 PM</option>
                <option value="5:30 PM" <?php if($booking['time_slot'] == '5:30 PM') echo 'selected'; ?>>5:30 PM</option>
                <option value="6:00 PM" <?php if($booking['time_slot'] == '6:00 PM') echo 'selected'; ?>>6:00 PM</option>
                <option value="6:30 PM" <?php if($booking['time_slot'] == '6:30 PM') echo 'selected'; ?>>6:30 PM</option>
                <option value="7:00 PM" <?php if($booking['time_slot'] == '7:00 PM') echo 'selected'; ?>>7:00 PM</option>
                <option value="7:30 PM" <?php if($booking['time_slot'] == '7:30 PM') echo 'selected'; ?>>7:30 PM</option>
                <option value="8:00 PM" <?php if($booking['time_slot'] == '8:00 PM') echo 'selected'; ?>>8:00 PM</option>
            </select>
            <label for="carSize">Car Size:</label>
            <select id="carSize" name="carSize" required>
                <option value="compact" <?php if($booking['car_size'] == 'compact') echo 'selected'; ?>>Compact (Small Car)</option>
                <option value="sedan" <?php if($booking['car_size'] == 'sedan') echo 'selected'; ?>>Sedan</option>
                <option value="suv" <?php if($booking['car_size'] == 'suv') echo 'selected'; ?>>SUV</option>
                <option value="truck" <?php if($booking['car_size'] == 'truck') echo 'selected'; ?>>Truck</option>
            </select>
            <label for="service">Service:</label>
            <select id="service" name="service" required>
                <option value="bodyWash" <?php if($booking['service'] == 'bodyWash') echo 'selected'; ?>>Body Wash - 300 KSh</option>
                <option value="interiorCleaning" <?php if($booking['service'] == 'interiorCleaning') echo 'selected'; ?>>Interior Cleaning - 500 KSh</option>
                <option value="fullService" <?php if($booking['service'] == 'fullService') echo 'selected'; ?>>Full Service - 800 KSh</option>
            </select>
            <label>Other Services:</label>
            <div>
                <input type="checkbox" id="carpetCleaning" name="otherServices[]" value="carpetCleaning" <?php if(strpos($booking['other_services'], 'carpetCleaning') !== false) echo 'checked'; ?>>
                <label for="carpetCleaning">Carpet Cleaning</label>
            </div>
            <div>
                <input type="checkbox" id="parkingCleaning" name="otherServices[]" value="parkingCleaning" <?php if(strpos($booking['other_services'], 'parkingCleaning') !== false) echo 'checked'; ?>>
                <label for="parkingCleaning">Parking Cleaning</label>
            </div>
            <label for="additionalInfo">Additional Info:</label>
            <textarea id="additionalInfo" name="additionalInfo" rows="4"><?php echo $booking['additional_info']; ?></textarea>
            <button type="submit">Update</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Wash Me Please. All rights reserved.</p>
    </footer>
</body>
</html>
