<?php
session_start();
include '../private/database.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch users
$usersSql = "SELECT * FROM users ORDER BY created_at DESC";
$usersResult = $conn->query($usersSql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* styles.css */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
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

    </style>
</head>
<body>
<div class="navbar">
        <ul>
            <li><a href="admin_dashboard.php" class="active">Dashboard</a></li>
            <li><a href="admin_bookings.php">Bookings</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h2>Admin Dashboard</h2>

        <h3>Users</h3>
        <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Location</th>
                <th>Address</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($usersResult->num_rows > 0) {
                while ($row = $usersResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['location']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['created_at']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No users found</td></tr>";
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
