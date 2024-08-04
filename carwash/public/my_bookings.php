<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

include '../private/database.php';

$userEmail = $_SESSION['email'];
$sql = "SELECT * FROM bookings WHERE email = '$userEmail'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
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
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color: #4CAF50;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
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
        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 10px;
            }

            .navbar ul {
                flex-direction: column;
            }

            .navbar ul li {
                text-align: center;
                width: 100%;
            }

            table, th, td {
                display: block;
                width: 100%;
            }

            th, td {
                box-sizing: border-box;
                width: 100%;
            }

            td {
                border-top: 1px solid #ddd;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            tr {
                display: block;
                margin-bottom: 10px;
            }
        }
    </style>
    <title>Wash Me Please - My Bookings</title>
    <link rel="stylesheet" href="styles.css">
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
        <h2>My Bookings</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>House Number</th>
                    <th>Date & Time</th>
                    <th>Time Slot</th>
                    <th>Car Size</th>
                    <th>Service</th>
                    <th>Other Services</th>
                    <th>Additional Info</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['location']}</td>
                                <td>{$row['house_number']}</td>
                                <td>{$row['date_time']}</td>
                                <td>{$row['time_slot']}</td>
                                <td>{$row['car_size']}</td>
                                <td>{$row['service']}</td>
                                <td>{$row['other_services']}</td>
                                <td>{$row['additional_info']}</td>
                                <td>{$row['status']}</td>
                                <td><a href='update_booking.php?id={$row['id']}'>Update</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No bookings found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>&copy; 2024 Wash Me Please. All rights reserved.</p>
    </footer>
</body>
</html>
