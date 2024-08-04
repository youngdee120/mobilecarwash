<?php
session_start();
include '../private/database.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch bookings

$bookingsSql = "SELECT b.*, u.name AS user_name, u.phone AS user_phone 
                FROM bookings b 
                JOIN users u ON b.email = u.email 
                ORDER BY b.date_time DESC";
$bookingsResult = $conn->query($bookingsSql);

if ($bookingsResult === false) {
    die("Query failed: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
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
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow-x: auto; /* Enable horizontal scrolling */
        display: block; /* Make the table block element for overflow */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        position: sticky; /* Keep the header fixed */
        top: 0;
    }
    button {
    padding: 10px 15px; /* Padding for better size */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners */
    color: white; /* Text color */
    font-weight: bold; /* Bold text */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    }

    button.approve {
        background-color: #007bff; /* Blue color */
    }

    button.approve:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    button.decline {
        background-color: #dc3545; /* Red color */
    }

    button.decline:hover {
        background-color: #c82333; /* Darker red on hover */
    }
    footer {
        background-color: #f97316;
        color: white;
        text-align: center;
        padding: 1rem;
        position: fixed; /* Fix the footer at the bottom */
        left: 0; /* Align to the left */
        right: 0; /* Align to the right */
        bottom: 0; /* Align to the bottom */
    }


    @media screen and (max-width: 768px) {
        table {
            display: block; /* Allow scrolling on smaller screens */
            overflow-x: auto;
            white-space: nowrap; /* Prevent text from wrapping */
        }

        th, td {
            display: inline-block; /* Make the cells inline-block */
            width: auto; /* Allow the cells to size based on content */
        }
    }
</style>

</head>
<body>
<div class="navbar">
        <ul>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="admin_bookings.php" class="active">Bookings</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <h3>Bookings</h3>
        <table border="1">
        <thead>
            <tr>
                <th>User</th>
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
            if ($bookingsResult->num_rows > 0) {
                while ($row = $bookingsResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['user_name']}</td>
                            <td>{$row['user_phone']}</td>
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
                           <td>
                    <button class='approve' onclick='updateStatus(" . htmlspecialchars($row['id']) . ", \"Approved\")'>Approve</button>
                    <button class='decline' onclick='updateStatus(" . htmlspecialchars($row['id']) . ", \"Declined\")'>Decline</button>
                </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    <footer>
        <p>&copy; 2024 Wash Me Please. All rights reserved.</p>
    </footer>
    <script src="admin.js"></script>
</body>
</html>
