<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if (password_verify($confirm_password, $password)) {
        $sql = "INSERT INTO users (name, email, phone, gender, location, address, password) VALUES ('$name', '$email', '$phone', '$gender', '$location', '$address', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('User inserted successfully! Please login to continue');
                    setTimeout(function(){
                        window.location.href = '../public/login.html';
                    }, 1000);
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>
                alert('Passwords do not match.');
                setTimeout(function(){
                    window.location.href = '../public/signup.html';
                }, 1000);
              </script>";
    }

    $conn->close();
}
?>
