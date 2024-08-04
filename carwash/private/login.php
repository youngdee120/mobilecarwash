<?php
session_start(); // Start the session
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful, set the session variable
            $_SESSION['email'] = $email;
            // Redirect to client_dashboard.php
            header("Location: ../public/client_dashboard.php");
            exit(); // Make sure to exit after redirecting
        } else {
            echo "<script>
                    alert('Invalid password.');
                    window.location.href = '../public/login.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('No user found with this email.');
                window.location.href = '../public/login.html';
              </script>";
    }

    $conn->close();
}
?>
