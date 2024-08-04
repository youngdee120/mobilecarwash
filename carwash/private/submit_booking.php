<?php
include 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $location = $_POST['location'];
    $houseNumber = $_POST['houseNumber'];
    $dateTime = $_POST['dateTime'];
    $timeSlot = $_POST['timeSlot'];
    $carSize = $_POST['carSize'];
    $service = $_POST['service'];
    $otherServices = isset($_POST['otherServices']) ? implode(", ", $_POST['otherServices']) : '';
    $additionalInfo = isset($_POST['additionalInfo']) ? $_POST['additionalInfo'] : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, phone, email, location, house_number, date_time, time_slot, car_size, service, other_services, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $phone, $email, $location, $houseNumber, $dateTime, $timeSlot, $carSize, $service, $otherServices, $additionalInfo);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
        alert('bookings made successfully!');
        setTimeout(function(){
            window.location.href = '../public/my_bookings.php';
        }, 1000);
      </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
